<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-8">
					<h3 class="page-header"> Inserir Pontuação</h3>
					<form method="get" action="<?php echo base_url('index.php/Times/savePontuacao') ?>" enctype="multipart/form-data">
						<fieldset class="form-group">
					    	<label for="exampleInputPassword1">Pontuação(*)</label>
					    	<input required autofocus name="pontuacao" type="text" class="form-control" placeholder="Nome" />
					    	<input type="hidden" name="idtime" value="<?php echo $intCodTime ?>">
						</fieldset>
						<button type="submit" class="btn btn-primary">Inserir</button>
					</form>
				</div>
				<div class="col-lg-4">
					<?php foreach ($objFoto as $strFoto): ?>
						<p align="center" style="margin-top:30px;">
							<img src="<?php echo $strFoto->foto?>" width="200" />
						</p>
					<?php endforeach; ?>					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<h3 class="page-header"> Pontuações Cadastradas</h3>
					<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome Time</th>
                                <th>Nome Cartoleiro</th>
                                <th>Pontuação</th>
                                <th>Rodada</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($objDados as $objResult) : ?>
                            <tr>
                                <td><?php echo $objResult->nomeTime?></td>
                                <td><?php echo $objResult->nomeUser?></td>
                                <td><?php echo $objResult->pontuacao?></td>
                                <td><?php echo $objResult->mesPontuacao?></td>
                                <td>
                                	<a href="" class="btn btn-success">Editar Pontuação</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5"><a href="<?php echo base_url('index.php/Times/addTime') ?>" class="btn btn-primary">Novo Time</a></td>
                        </tr>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>