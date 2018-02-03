<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-8">
					<h3> Cadastrar Curso</h3>
					<form method="post" action="<?php echo base_url('index.php/Cursos/saveCurso') ?>" enctype="multipart/form-data">
						<fieldset class="form-group">
					    	<label for="nome">Nome do Curso(*)</label>
					    	<input id="nome" required autofocus name="nome" type="text" class="form-control" placeholder="Nome do Curso" value="<?php echo isset($nome)? $nome : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="vlr_matricula">Valor da Matricula(*)</label>
					    	<input id="vlr_matricula" required autofocus name="vlr_matricula" type="text" class="form-control" placeholder="Valor da Matricula" value="<?php echo isset($vlr_matricula)? $vlr_matricula : '' ?>" />
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
					    	<label for="duracao">Meses de Duração(*)</label>
					    	<input id="duracao" name="duracao" type="number" class="form-control" placeholder="Meses de Duração" maxlength="14" value="<?php echo isset($duracao)? $duracao : '' ?>" />
					    	<input type="hidden" name="id_curso" value="<?php echo isset($idCurso)? $idCurso : '0' ?>">

						</fieldset>

						<button type="submit" id="cadastroCurso" class="btn btn-primary">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>