<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {
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

	public function create ()
	{
		$variaveis['titulo'] = 'Novo Cadastro';
		$this->load->view('colaboradores', $variaveis);
	}

	/**
	* Método store para salvar as informações no banco de dados
	* @param $id do registro
	* @return view
	*/

	public function ColaboradorStore ()
	{

		$this->load->model('Colaborador_model', '', TRUE); // faz o load do model para poder inserir no banco de dados
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nomeColaborador', 'Nome do Colaborador', 'required|min_length[5]');
		$this->form_validation->set_rules('cpfColaborador', 'Cpf do Colaborador', 'required|max_length[11]');
		$this->form_validation->set_rules('datanascColaborador', 'Data de Nascimento', 'required|max_length[10]');
		$this->form_validation->set_rules('generoColaborador', 'Gênero Colaborador');
		$this->form_validation->set_rules('emailColaborador', 'Email colaborador', 'required|valid_email');
		$this->form_validation->set_rules('telefoneColaborador', 'Telefone do Colaborador', 'required|max_length[11]');
		$this->form_validation->set_rules('logradouroColaborador', 'Logradouro do Colaborador', 'required');
		$this->form_validation->set_rules('complementoColaborador', 'Complemento ', 'required');
		$this->form_validation->set_rules('bairroColaborador', 'bairroColaborador', 'required');
		$this->form_validation->set_rules('estadoColaborador', 'estadoColaborador', 'required');
		$this->form_validation->set_rules('cidadeColaborador', 'cidadeColaborador', 'required');
		$this->form_validation->set_rules('paisNascColaborador', 'País de Nascimento', 'required');
		$this->form_validation->set_rules('paisNasColaborador', 'País de Nascionalidade', 'required');
		$this->form_validation->set_rules('numeroCarteira', 'Número de Carteira CTPS', 'required');
		$this->form_validation->set_rules('serieCarteira', 'Série da Carteira CTPS', 'required');
		$this->form_validation->set_rules('expedicaoCarteira', 'Expedição da Carteira', 'required');
		$this->form_validation->set_rules('numeroNis', 'Número Nis', 'required');
		$this->form_validation->set_rules('numeroPis', 'Número Pis', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->db->select('*');
			$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
			$variaveis = array('mensagens' => validation_errors());
			$variaveis['rodape'] = "Desenvolvido por StartHelp";
			$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
			$this->load->view('colaboradores',$variaveis);
		} else {

			$dados = array(
				"nome" => $this->input->post('nomeColaborador'),
				"cpf" => $this->input->post('cpfColaborador'),
				"nascimento" => $this->input->post('datanascColaborador'),
				"sexo" => $this->input->post('generoColaborador'),
				"email" => $this->input->post('emailColaborador'),
				"telefone" => $this->input->post('telefoneColaborador'),
				"logradouro" => $this->input->post('logradouroColaborador'),
				"cep" => $this->input->post('cepColaborador'),
				"complemento" => $this->input->post('complementoColaborador'),
				"bairro" => $this->input->post('bairroColaborador'),
				"ufnascimento" => $this->input->post('estadoColaborador'),
				"municipionascimento" => $this->input->post('cidadeColaborador'),
				"paisnascimento" => $this->input->post('paisNascColaborador'),
				"paisnacionalidade" => $this->input->post('paisNasColaborador'),
				"ctps" => $this->input->post('numeroCarteira'),
				"seriectps" => $this->input->post('serieCarteira'),
				"ufctps" => $this->input->post('expedicaoCarteira'),
				"nis" => $this->input->post('numeroNis'),
				"pis" => $this->input->post('numeroPis'),

			);
			if ($this->Colaborador_model->store($dados, null))
			{
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('v_sucesso_inserir_colaborador', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('errors/html/v_erro', $variaveis);
			}
		}
	}
	/**
	* Atualiza o registro a partir do formulário de edição de dados do colaborador
	* @param $id do registro
	* @return view
	*/
	public function ColaboradorAtualizar ()
	{

		$id = $this->input->post('idColaborador'); // pega o id do depedente
		$this->load->model('Colaborador_model', '', TRUE); // faz o load do model para poder inserir no banco de dados
		$operacao = $this->input->post('operacao');

		$variaveis['mensagem'] = "Registro alterado com sucesso!";
		// if com as informações do perfil

		if ($operacao == 'operacao1')
		{
			$dados['nome'] = $this->input->post('nomeColaborador');
			$dados['cpf'] =  $this->input->post('cpfColaborador');
			$dados['nascimento'] = $this->input->post('datanascColaborador');
			$dados['sexo'] = $this->input->post('generoColaborador');
			$dados['email'] = $this->input->post('emailColaborador');
			$dados['telefone'] = $this->input->post('telefoneColaborador');

			if ($this->Colaborador_model->atualizar($dados, $id))
			{
				$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
			}
			else {
				$this->load->view('errors/html/v_erro', $variaveis);
			}
		}
		else if ($operacao == 'operacao2')
		{
			$dados['logradouro'] = $this->input->post('logradouroColaborador');
			$dados['cep'] = $this->input->post('cepColaborador');
			$dados['complemento'] = $this->input->post('complementoColaborador');
			$dados['bairro'] = $this->input->post('bairroColaborador');
			$dados['ufnascimento'] = $this->input->post('estadoColaborador');
			$dados['municipionascimento'] = $this->input->post('cidadeColaborador');

			if ($this->Colaborador_model->atualizar($dados, $id))
			{
				$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
			}
			else {
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		}
		else if ($operacao == 'operacao3')
		{
			$dados['paisnascimento'] = $this->input->post('paisNascColaborador');
			$dados['paisnacionalidade'] = $this->input->post('paisNasColaborador');

			if ($this->Colaborador_model->atualizar($dados, $id))
			{
				$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
			}
			else {
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		}
		else if ($operacao == 'operacao4')
		{
			$dados['ctps'] = $this->input->post('numeroCarteira');
			$dados['seriectps'] = $this->input->post('serieCarteira');
			$dados['ufctps'] = $this->input->post('expedicaoCarteira');
			$dados['nis'] = $this->input->post('numeroNis');
			$dados['pis'] = $this->input->post('numeroPis');

			if ($this->Colaborador_model->atualizar($dados, $id))
			{
				$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
			}
			else {
				$this->load->view('errors/html/v_erro', $variaveis);
			}
		}

	}
	/**
	* Chama o formulário com os campos preenchidos pelo registro selecioando.
	* @param $id do registro
	* @return view
	*/
	public function ColaboradorEditar ($id = null)
	{
		if ($id) {

			$this->db->where('cpf',$id);
			$variaveis['colaboradores'] = $this->db->get('colaboradores')->result();
			// variável de rodape pela passagem do footer
			$variaveis['titulo'] = "Prático. Sistema de Gestão Online. Editar Colaborador";
			$variaveis['rodape'] = "Desenvolvido por SuportHelp";
			$this->load->view('colaboradores_editar', $variaveis);
		}
	}

	/**
	* Função que exclui o registro através do id.
	* @param $id do registro a ser excluído.
	* @return boolean;
	*/
	public function ColaboradorDeletar ($id = null)
	{
		if ($this->Colaborador_model->deletar($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso_deletar_colaborador', $variaveis);
		}
		else {
			$this->load->view('errors/html/v_erro', $variaveis);
		}

	}

}
