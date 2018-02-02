<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/* Tela de login Inicial */
	public function index() {
		$this->load->view('login');
	}

	/* Verifica Dados do login */
	public function getAutentication() {

		$this->load->model('Usuarios_Model');
		$strEmail = $this->input->post('EMAIL');
		$strSenha = $this->input->post('SENHA');
		
		$objUsuario = $this->Usuarios_Model->getUsers($strEmail,$strSenha);

		if($objUsuario) {
			$this->session->set_userdata('usuarioLogado',array('email' => $objUsuario['email'], 'nome' => $objUsuario['nome'], 'perfil' => $objUsuario['id_perfil']));
			redirect(base_url());
		} else {
			$this->session->sess_destroy();
			$arrDados['error'] = 'Usuário/Login Inválido(s)';
			$this->load->view('login', $arrDados);
		}
	}

	/* Sair da sessão */
	public function logout() {
		$this->session->unset_userdata("usuarioLogado");
		redirect(base_url());	
	}
}