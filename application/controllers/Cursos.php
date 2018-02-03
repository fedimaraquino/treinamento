<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends MY_Controller {

    public function listarCursos() {

        $this->load->model('GetCursos_Model');
        $arrDados['objDados'] = $this->GetCursos_Model->getListCursos();
        $this->load->view('cursos/cursos_exibir', $arrDados);
    }

	
	public function addCurso() {
		$this->load->view('cursos/cursos_merge');
	}

    public function editCurso() {
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

	public function saveCurso() {
        $this->load->helper('date');

        $strNome = $this->input->post('nome');
        $floatMatricula = $this->input->post('vlr_matricula');
        $strPeriodo = $this->input->post('periodo');
        $intDuracao = $this->input->post('duracao');
        $idCurso = $this->input->post('id_curso');


        $arrDados = array();
        $arrDados['nome'] = $strNome;
        $arrDados['vlr_matricula'] = $floatMatricula;
        $arrDados['periodo'] = $strPeriodo;
        $arrDados['duracao'] = $intDuracao;

        if($idCurso > 0) {
           $this->db->where("id_curso", $idCurso);
           $this->db->update('cursos', $arrDados);
           $this->session->set_flashdata('sucesso','Curso atualizado com sucesso.');

        } else {
            $this->db->insert('cursos', $arrDados);
            $this->session->set_flashdata('sucesso','Curso cadastrado com sucesso.');
              
        }      
         redirect(base_url('index.php/Cursos/listarCursos'));
                

	}

    public function deleteCurso() {

        $idAluno = $this->input->get("idCurso");

        if($this->db->delete('cursos', array('id_curso' => $idAluno))) {
             $this->session->set_flashdata('sucesso','Curso removido com sucesso.');   
             redirect(base_url('index.php/Cursos/listarCursos'));    
        }

    }

}
