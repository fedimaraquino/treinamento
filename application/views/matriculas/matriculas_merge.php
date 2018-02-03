<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-8">
					<h3> Realizar Matricula</h3>
					<div id="msgMatricula" class="alert alert-danger no-display">
						Ops... Aluno ja cadastrado no curso <strong id="valueCurso"></strong> no mesmo Periodo/Ano Letivo. Verifique suas matriculas.
                    </div> 
					<form id="formMatricula" method="post" action="<?php echo base_url('index.php/Matriculas/saveMatricula') ?>" enctype="multipart/form-data">
						<fieldset class="form-group">
					    	<label for="cpf">CPF do Aluno(*)</label>
					    	<input onblur="getIdAluno()" id="cpf" required autofocus name="cpf" type="text" class="form-control" placeholder="CPF do Aluno" value="<?php echo isset($cpf)? $cpf : '' ?>" />
					    	<input type="hidden" value="" id="id_aluno" name="id_aluno" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="curso">Curso(*)</label>
					    	<select name="curso" id="curso" class="form-control">
					    		<?php foreach ($arrCursos as $key => $result) : ?>
					    			<option value="<?php echo $result['id_curso'] ?>"><?php echo $result['nome_curso']?></option>
					    		<?php endforeach; ?>
					    	</select>
						</fieldset>
						<fieldset class="form-group">
					    	<label for="periodo">Periodo(*)</label>
					    	<?php
					    	$matutino = null;
					    	$vespertino = null;
					    	$noturno = null;
					    	if(isset($periodo)):
					    		if($periodo == 'Matutino')
					    			$matutino = 'selected';
					    		if($periodo == 'Vespertino')
					    			$vespertino = 'selected';
					    		if($periodo == 'Noturno')
					    			$noturno = 'selected';
					    	endif;
					    	?>
					    	<select class="form-control" name="periodo" id="periodo">
					    		<option  value=""><< Selecione >></option>
					    		<option <?php echo $matutino ?> value="Matutino">Matutino</option>
					    		<option <?php echo $vespertino ?> value="Vespertino">Vespertino</option>
					    		<option <?php echo $noturno ?> value="Noturno">Noturno</option>
					    	</select>
						</fieldset>
						<fieldset class="form-group">
					    	<label for="ano_letivo">Ano Letivo(*)</label>
					    	<input id="ano_letivo" name="ano_letivo" type="text" class="form-control" placeholder="Ano Letivo" maxlength="14" value="<?php echo isset($ano_letivo)? $ano_letivo : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="status">Status(*)</label>
					    	<select class="form-control" name="status" id="status">
					    		<option value="2">Aguardando Pagamento</option>
					    		<option value="1">Ativa</option>
					    		<option value="0">Inativa</option>
					    	</select>
					    </fieldset>	

						<button type="submit" id="cadastroAluno" class="btn btn-primary">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">

	function getIdAluno() {
		var cpf = $('#cpf').val();
		if(cpf != '') {
			$.ajax({
			  method: 'POST',	
			  url: "<?php echo base_url('index.php/Ajax/getidaluno') ?>",
			  data: {'cpf': cpf},
			  dataType: 'json'
			  
			}).done(function(data) {
				if(!data.id_aluno) {
					alert('CPF do aluno Não Encontrado - Cadastre o aluno e tente novamento');
					$('#cadastroAluno').addClass("no-display");
				} else {
					$("#id_aluno").val(data.id_aluno);
					$("#cadastroAluno").removeClass("no-display");
				}

			});
		}
	}	

	$(document).ready(function(){
		$("#cadastroAluno").on('click', function(e){
			e.preventDefault();
			var id_aluno = $("#id_aluno").val();
			var curso = $("#curso").val();
			var periodo = $("#periodo").val();
			var ano_letivo = $("#ano_letivo").val();

			$.ajax({
			  method: 'POST',	
			  url: "<?php echo base_url('index.php/Ajax/verifyMatricula') ?>",
			  data: {'id_aluno': id_aluno, 'periodo' : periodo, 'ano_letivo': ano_letivo},
			  dataType: 'json'
			  
			}).done(function(data) {
				if(!data.matricula)
					$('#formMatricula').submit();
				else
					$('#msgMatricula').removeClass('no-display');
					$('#valueCurso').html(data.matricula);

			});
		})
	})
	
</script>
</html>