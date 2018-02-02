<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {

	public function getTable() {
		return 'tblusuarios';
	}

	public function listDataUsers() {
		$strSQL = 'SELECT 
						U.ID,
						U.LOGIN,
						U.NOME,
						U.STATUS,
						P.NOM_PERFIL
					FROM '.$this->getTable().' U
					INNER JOIN tblperfil P ON P.ID_PERFIL = U.ID_PERFIL';

		$objResult = $this->db->query($strSQL);

		return $objResult->result();
	}

	public function getUsers($strEmail, $strSenha) {

		$this->db->where('login', ''.$strEmail.'');
		$this->db->where('senha', ''.($strSenha).'');
		$this->db->where('status', 1);
		
		$objResult = $this->db->get($this->getTable())->row_array();

		return $objResult;
	}


}