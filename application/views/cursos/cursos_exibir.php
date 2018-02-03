<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-header">Cursos   Cadastrados</h3>   
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
                                            <th>Nome do Curso</th>
                                            <th>Valor da Matricula</th>
                                            <th>Periodo</th>
                                            <th>Duração</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($objDados as $objResult):
                                    ?>
                                        <tr>
                                            <td><?php echo $objResult->nome ?></td>
                                            <td><?php echo $objResult->vlr_matricula ?></td>
                                            <td><?php echo $objResult->periodo ?></td>
                                            <td><?php echo $objResult->duracao ?></td>
                                            <td>
                                                <a href="<?php echo base_url('index.php/Cursos/editCurso?idCurso='.$objResult->id_curso) ?>" class="btn btn-warning">Editar</a>
                                                 <a href="#" class="btn btn-danger" onclick="confirm_del('<?php echo $objResult->nome ?>', <?php echo $objResult->id_curso ?>)">Remover</a>                         
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="5"><a href="<?php echo base_url('index.php/Cursos/addCurso') ?>" class="btn btn-primary">Cadastrar Curso</a></td>
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
    function confirm_del(nome, id_curso) {
        var result = confirm("Tem certeza que deseja remover o curso " + nome + " ?");
        if (result) {
            window.location = '<?php echo base_url('index.php/Cursos/deleteCurso?idCurso=')?>'+id_curso;
        }
    }
</script>