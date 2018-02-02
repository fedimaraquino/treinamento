<?php 

class MY_Controller extends CI_Controller {

 	public function __construct() {
    	parent::__construct();			
		$strLogado = $this->session->userdata("usuarioLogado");

		if (!$strLogado) 
			redirect(base_url('index.php/Login'));

		$arrDados['arrDadosUsuario'] = $strLogado;
		$this->load->view('header', $arrDados);			
    }
}
