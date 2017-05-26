<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// classe para chamar todas as libraries. Base para a criação
	function __construct()
	{
		parent::__construct();
	}
	/**
	* Método create para criar o cadastro
	* @param $id do registro
	* @return view
	*/

	public function LoginAutenticar ()
	{
		$this->load->model("Login_model");// chama o modelo login_model no index para pegar todas as informações do usuário dentro de um array
		$email = $this->input->post("emailLogin");// pega via post o email que venho do formulario
		$senha = $this->input->post("senhaLogin"); // pega via post a senha que venho do formulario
		$usuario = $this->Login_model->buscaPorEmailSenha($email,$senha); // acessa a função buscaPorEmailSenha do modelo

		if($usuario)
		{
			// inicial o model com as informações do usuário logado no Sistema
			$this->load->model('Inicial_model', '', TRUE);
			$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online";
			$dados['rodape'] = "Desenvolvido por StartHelp";
			$this->session->set_userdata("usuario_logado", $usuario);
			$userLogado = $this->session->userdata("usuario_logado");
			$dados['empregadores'] = $this->Inicial_model->dadosusuarioLogado($userLogado['id']);
			$this->load->view("Index", $dados);
		//	$this->load->view("header", $dados);
		}
		else
		{
			$dados = array("mensagem" => "Não foi possível fazer o Login!");
			$this->load->view("v_sucesso_erro", $dados);
		}

	}

	// tela de redirecionamento para Logout
	public function Logout ()
	{
		$this->load->model("Index_model");
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online. Login no Sistema";
	  $usuario = $this->Index_model->destruirSessao();
		redirect('../wordpress');
	}


}
