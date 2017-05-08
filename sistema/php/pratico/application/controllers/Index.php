<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // die de saida para diretório principal. Não poderá ser removido

class Index extends CI_Controller {
// classe para chamar todas as libraries. Base para a criação
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	// chama a página index
	public function index ()
	{
		 // colocando o array com as informações de título do projeto
		  $dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online";
			$dados['rodape'] = "Desenvolvido por SuportHelp";
			$this->load->view('index',$dados);
	}
// chama a págian de perfil do empregador
	public function Empregadores ()
	{
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Editar Dados do Empregador";
		$dados['rodape'] = "Desenvolvido por SuportHelp";
		$this->load->view('empregadores',$dados);
	}
 // chama a página de colaboraores
	public function Colaboradores ()
	{
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Colaboradores";
		$dados['rodape'] = "Desenvolvido por SuportHelp";
		$this->load->view('colaboradores',$dados);
	}
// chama a página de dependentes
	public function Dependentes ()
	{
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Dependentes";
		$dados['rodape'] = "Desenvolvido por SuportHelp";
		// select para fazer a consulta para trazer os dependentes
		$this->db->select('*');
		$dados['cadastroDependente'] = $this->db->get('dependentes')->result();
		$this->load->view('dependentes',$dados);
	}
}
