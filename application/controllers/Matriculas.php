<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matriculas extends MY_Controller {

    public function listarMatriculas() {

        $strAluno = $this->input->get('nome_aluno');
        $intAnoLetivo = $this->input->get('ano_letivo');
        $strCurso = $this->input->get('curso');
        $arrWhere = array();
        if($strAluno)
            $arrWhere['a.nome'] = $strAluno;
        if($strCurso)
            $arrWhere['c.id_curso'] = $strCurso;
        if($intAnoLetivo)
            $arrWhere['m.ano_letivo'] = $intAnoLetivo;

        $this->load->model('GetMatriculas_Model');
        $arrDados['objDados'] = $this->GetMatriculas_Model->getListAllMatriculas($arrWhere);
        $arrDados['arrCursos'] = $this->getCursos();
        $arrDados['arrFiltros'] = $arrWhere;
        $this->load->view('matriculas/matriculas_exibir', $arrDados);
    }

	
	public function addMatricula() {
        $arrDados['arrCursos'] = $this->getCursos();
		$this->load->view('matriculas/matriculas_merge', $arrDados);
	}

    public function editMatricula() {
        $this->load->model('GetCursos_Model');

        $idCurso = $this->input->get('idCurso');
        $arrWhere = array();
        if($idCurso)
                $arrWhere['id_curso'] = $idCurso;

        $objCursos = $this->GetCursos_Model->getListCursos($arrWhere);
        $arrDados = array();
        foreach ($objCursos as $objResult) {
                $arrDados['idCurso'] = $objResult->id_curso;
                $arrDados['nome'] = $objResult->nome;
                $arrDados['vlr_matricula'] = $objResult->vlr_matricula;
                $arrDados['periodo'] = $objResult->periodo;
                $arrDados['duracao'] = $objResult->duracao;

        }

        $this->load->view('cursos/cursos_merge', $arrDados);
    }

	public function saveMatricula() {
        $this->load->helper('date');

        $idAluno = $this->input->post('id_aluno');
        $idCurso = $this->input->post('curso');
        $strPeriodo = $this->input->post('periodo');
        $intAnoLetivo = $this->input->post('ano_letivo');
        $intStatus = $this->input->post('status');

        $arrDados = array();
        $arrDados['id_aluno'] = $idAluno;
        $arrDados['id_curso'] = $idCurso;
        $arrDados['periodo'] = $strPeriodo;
        $arrDados['ano_letivo'] = $intAnoLetivo;
        $arrDados['status'] = $intStatus;

        $this->db->insert('matriculas', $arrDados);
        $this->session->set_flashdata('sucesso','Matricula Realizada com Sucesso.');
              
        redirect(base_url('index.php/Matriculas/listarMatriculas'));
                

	}

     public function getCursos() {
        $this->load->model("GetCursos_Model");
        $objCursos = $this->GetCursos_Model->getListCursos();

        $arrDados = array();
        $intCont = 0;
        foreach ($objCursos as $result) {
            $arrDados[$intCont]['id_curso'] = $result->id_curso;
            $arrDados[$intCont]['nome_curso'] = $result->nome;
            $intCont++;
        }

        return $arrDados;
     }
}
