<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empregador extends CI_Controller {
	// classe para chamar todas as libraries. Base para a criação
	function __construct()
	{
		parent::__construct();
	}

	// função criada para atualizar a senha, chamando a model
	public function EmpregadorAtualizarSenha ($id = null)
	{
		$this->load->model('Empregador_model', '', TRUE);
		$id = $this->input->post('idsenhaAtualizar');
		$senhaNova['senha'] = $this->input->post('senhaAtualizarEmpregador');
		$senhaAntiga = $this->input->post('senhaAntigaEmpregador');
		$variaveis['mensagem'] = "Dados alterados com sucesso";

		$this->db->select('senha');
		$this->db->where('id',$id);
		$data['senha'] = $this->db->get('empregadores')->result();

		if ($data['senha'][0]->senha == $senhaAntiga)
		{
			if ($this->Empregador_model->atualizarSenha($senhaNova, $id))
			{
				$this->load->view('v_sucesso_alterar_empregador', $variaveis);
			}
			else {
				$this->load->view('errors/html/v_erro', $variaveis);
			}
		}
		else
		{
			echo "<script>alert('A Senha Antiga não está correta. Favor verificar');</script>";
			echo "<script>history.back();</script>";
			exit();
		}


	}

	// função para atualizar as informações do perfil do empregador
	public function EmpregadorAtualizar ()
	{
		$id = $this->input->post('idEmpregador'); // pega o id do depedente
		$opcao =  $this->input->post('opcao');
		$variaveis['mensagem'] = "Registro alterado com sucesso!";
		$this->load->model('Empregador_model', '', TRUE); // faz o load do model para poder inserir no banco de dados

		if ($opcao == 'opcao1') // pega as informações da opção 1 - opções de dados do perfil
		{

			$dados['nome'] = $this->input->post('nomeEmpregador');
			$dados['cpf'] = $this->input->post('cpfEmpregador');
			$dados['nascimento'] = $this->input->post('nascimentoEmpregador');
			//$dados['genero'] = $this->input->post('generoEmpregador');
			$dados['tituloEleitor'] = $this->input->post('tituloEmpregador');
			$dados['irrfRecibo'] = $this->input->post('irrfEmpregador');

			if ($this->Empregador_model->atualizar($dados, $id))
			{
				$this->load->view('v_sucesso_alterar_empregador', $variaveis);
			}
			else {
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		} else { // pega as informações da opção 2 - opeções de endereço

			$dados['cep'] = $this->input->post('cepEmpregador');
			$dados['logradouro'] = $this->input->post('logradouroEmpregador');
			$dados['complemento'] = $this->input->post('complementoEmpregador');
			$dados['bairro'] = $this->input->post('bairroEmpregador');
			$dados['idmunicipio'] = $this->input->post('municipioEmpregador');
			$dados['uf'] = $this->input->post('ufEmpregador');

			if ($this->Empregador_model->atualizar($dados, $id))
			{
				$this->load->view('v_sucesso_alterar_empregador', $variaveis);
			}
			else {
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		}

	}

	public function EmpregadorEditar ($id = null)
	{
		if ($id) {

			$this->db->where('id',$id);
			$variaveis['empregaddores'] = $this->db->get('empregadores')->result();
			// variável de rodape pela passagem do footer
			$variaveis['titulo'] = "Prático. Sistema de Gestão Online. Editar Empregador";
			$variaveis['rodape'] = "Desenvolvido por SuportHelp";
			$this->load->view('empregadores', $variaveis);
		}
	}

}
