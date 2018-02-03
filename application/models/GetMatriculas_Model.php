<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetMatriculas_Model extends CI_Model {

	public function getTable() {
		return 'matriculas';
	}

	public function getMatriculas(array $arrWhere = array()) {

		if($arrWhere) {
			$arrWhereAux = array();
			foreach($arrWhere as $intKey => $strValue) {
				$arrWhereAux[$intKey] = array($intKey => $strValue);
				$this->db->where($arrWhereAux[$intKey]);
			}
		}

		$strSQL = $this->db->get($this->getTable());

		return $strSQL->result(); 
	}

	public function getListAllMatriculas( array $arrWhere = array()) {
		$this->db->select('m.id_matricula, a.nome as aluno, c.nome as curso, c.vlr_matricula as vlr_matricula, m.periodo as periodo, m.ano_letivo as ano_letivo, m.status ');    
		$this->db->from($this->getTable() . ' m');
		$this->db->join('cursos c', 'm.id_curso = c.id_curso');
		$this->db->join('alunos a', 'm.id_aluno = a.id_aluno');
		if($arrWhere) {
			$arrWhereAux = array();
			foreach($arrWhere as $intKey => $strValue) {
				$arrWhereAux[$intKey] = array($intKey => $strValue);
				$this->db->like($arrWhereAux[$intKey]);
			}
		}
		
		$strSQL = $this->db->get();

		return $strSQL->result();
	}
	
}