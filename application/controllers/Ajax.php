<?php
/**
* 
*/
class Ajax extends CI_Controller
{
	public function getIdAluno() {
        $cpf = $this->input->post('cpf');
        
        $this->load->model('GetAlunos_Model');
        $arrWhere = array();
        $arrWhere['cpf'] = $cpf;

        $objAluno = $this->GetAlunos_Model->getListAlunos($arrWhere);

        $idAluno = 0;
        foreach ($objAluno as $result) {            
            $idAluno = (int) $result->id_aluno;
            $json_aluno['id_aluno'] = json_encode($idAluno);
        }
        if($idAluno != 0)
            $result = json_encode($json_aluno);
        else {
            $json_aluno['id_aluno'] = false;            
            $result = json_encode($json_aluno);
        }

        echo $result;
    }

    public function verifyMatricula() {
        $id_aluno = $this->input->post('id_aluno');
        $periodo = $this->input->post('periodo');
        $ano_letivo = $this->input->post('ano_letivo');
        $arrWhere = array();
        $arrWhere['id_aluno'] = $id_aluno;
        $arrWhere['periodo'] = $periodo;
        $arrWhere['ano_letivo'] = $ano_letivo;

        $this->load->model('GetMatriculas_Model');
         $objMatricula = $this->GetMatriculas_Model->getMatriculas($arrWhere);
        if(count($objMatricula) == 0){
            $json_matricula['matricula'] = false;
            echo json_encode($json_matricula);
        } else {
            foreach($objMatricula as $result) {
                $idCurso = $result->id_curso;
            }
            $this->load->model('GetCursos_Model');
            $arrWhere = array();
            $arrWhere['id_curso'] = $idCurso;
            $objCursos = $this->GetCursos_Model->getListCursos($arrWhere);
            foreach ($objCursos as $resultCursos) {
                $strCurso = $resultCursos->nome;
                $json_matricula['matricula'] = $strCurso;

                echo json_encode($json_matricula);
            }

        }
        
    }
}