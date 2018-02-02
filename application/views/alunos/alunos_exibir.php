<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-header">Alunos Cadastrados</h3>   
                <?php if($this->session->flashdata('sucesso')) : ?>
                    <div class="alert alert-success">
                     <?php echo $this->session->flashdata('sucesso');?>
                    </div>    
                <?php endif; ?> 
                <?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                     <?php echo $this->session->flashdata('error');?>
                    </div>    
                <?php endif; ?>           
            </div>
            <div class="row">
                <div class="col-lg-13">
                	<div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Aluno</th>
                                            <th>Data de Nascimento</th>
                                            <th>Telefone</th>
                                            <th>RG</th>
                                            <th>CPF</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($objDados as $objResult):
                                    ?>
                                        <tr>
                                            <td><?php echo $objResult->nome ?></td>
                                            <td><?php echo $objResult->data_nascimento ?></td>
                                            <td><?php echo $objResult->telefone ?></td>
                                            <td><?php echo $objResult->rg ?></td>
                                            <td><?php echo $objResult->cpf ?></td>
                                            <td>
                                                <a href="<?php echo base_url('index.php/Alunos/editAluno?idAluno='.$objResult->id_aluno) ?>" class="btn btn-warning">Editar</a>
                                                 <a href="#" class="btn btn-danger" onclick="confirm_del('<?php echo $objResult->nome ?>', <?php echo $objResult->id_aluno ?>)">Remover</a>                         
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="5"><a href="<?php echo base_url('index.php/Alunos/addAluno') ?>" class="btn btn-primary">Cadastrar Aluno</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>
</html>
<script type="text/javascript">
    function confirm_del(nome, id_aluno) {
        var result = confirm("Tem certeza que deseja remover o aluno " + nome + " ?");
        if (result) {
            window.location = '<?php echo base_url('index.php/Alunos/deleteAluno?idAluno=')?>'+id_aluno;
        }
    }
</script>