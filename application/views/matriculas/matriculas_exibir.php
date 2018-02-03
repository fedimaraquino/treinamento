<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-header">Listagem de Matriculas</h3>   
                <?php if($this->session->flashdata('sucesso')) : ?>
                    <div class="alert alert-success">
                     <?php echo $this->session->flashdata('sucesso');?>
                    </div>    
                <?php endif; ?>           
            </div>
            <div class="row">
                <?php print_r($arrFiltros) ?>
                 <div class="col-lg-13">
                    <form method="get" action="<?php echo base_url('index.php/Matriculas/listarMatriculas') ?>">
                        <table class="table" style="margin-bottom:20px;">
                            <tr>
                                <td valign="middle">Ano Letivo: <br>
                                    <input value="<?php echo isset($arrFiltros['m.ano_letivo']) ? $arrFiltros['m.ano_letivo'] : '' ?>" style="width: 100px" type="text" class="form-control" name="ano_letivo">
                                </td>

                                <td align="left">Nome do Curso:<br>
                                    <select name="curso" id="curso" class="form-control">
                                        <option value=""><< Seleciona >></option>
                                        <?php foreach ($arrCursos as $key => $result) : ?>
                                            <option value="<?php echo $result['id_curso'] ?>"><?php echo $result['nome_curso']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>

                                <td>Nome do Aluno:<br> 
                                    <input type="text" value="<?php echo isset($arrFiltros['a.nome']) ? $arrFiltros['a.nome'] : '' ?>"  class="form-control" name="nome_aluno" />
                                </td>
                                <td>Status do Pagamento:<br> 
                                    <select name="pagamento" class="form-control">
                                        <option value=""><< Selecione >></option>
                                        <option  value="0">Pendente</option>
                                        <option value="1">Confirmado</option>
                                    </select>
                                </td>
                                <td>
                                    <br><input type="submit" class="btn btn-success" value="FILTRAR" />
                                </td>
                            </tr> 
                        </table>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-13">
                	<div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Matricula</th>
                                            <th>Nome do Aluno</th>
                                            <th>Nome do Curso</th>
                                            <th>Valor da Matricula</th>
                                            <th>Periodo</th>
                                            <th>Ano Letivo</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php if(count($objDados) > 0): ?>
                                        <tbody>
                                        <?php
                                        foreach ($objDados as $objResult):
                                        ?>
                                            <tr>
                                                <td><?php echo $objResult->id_matricula ?></td>
                                                <td><?php echo $objResult->aluno ?></td>
                                                <td><?php echo $objResult->curso ?></td>
                                                <td><?php echo $objResult->vlr_matricula ?></td>
                                                <td><?php echo $objResult->periodo ?></td>
                                                <td><?php echo $objResult->ano_letivo ?></td>
                                                <td><?php echo $objResult->status ?></td>                                      
                                            </tr>
                                        <?php endforeach; ?>                                    
                                        </tbody>
                                    <?php else: ?>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7" align="center">Não há Registros</td>
                                                </tr>
                                            </tbody>
                                    <?php endif; ?>
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