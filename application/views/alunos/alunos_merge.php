<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-8">
					<h3> Cadastrar Aluno</h3>
					<form method="post" action="<?php echo base_url('index.php/Alunos/saveAluno') ?>" enctype="multipart/form-data">
						<fieldset class="form-group">
					    	<label for="nome">Nome(*)</label>
					    	<input id="nome" required autofocus name="nome" type="text" class="form-control" placeholder="Nome" value="<?php echo isset($nome)? $nome : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="data_nascimento">Data de Nascimento(*)</label>
					    	<input id="data_nascimento" required autofocus name="data_nascimento" type="text" class="form-control" placeholder="Data de Nascimento" value="<?php echo isset($data_nascimento)? $data_nascimento : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="tel">Telefone(*)</label>
					    	<input id="tel" required autofocus name="tel" type="text" class="form-control" placeholder="Telefone" value="<?php echo isset($telefone)? $telefone : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="cpf">CPF(*)</label>
					    	<input id="cpf" name="cpf" type="text" class="form-control" placeholder="CPF" maxlength="14" value="<?php echo isset($cpf)? $cpf : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="rg">RG(*)</label>
					    	<input id="rg" required autofocus name="rg" type="text" class="form-control" placeholder="RG" value="<?php echo isset($rg)? $rg : '' ?>" />
					    	<input type="hidden" name="id_aluno" value="<?php echo isset($idAluno)? $idAluno : '0' ?>">
						</fieldset>

						<button type="submit" id="cadastroAluno" class="btn btn-primary">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>