<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetCursos_Model extends CI_Model {

	public function getTable() {
		return 'cursos';
	}

	public function getListCursos(array $arrWhere = array()) {

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
	
}