<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empregador extends CI_Controller {
	// classe para chamar todas as libraries. Base para a criação
	function __construct()
	{
		parent::__construct();
	}

	public function index ()
	{
		// pegar a session do usuário Logado no sistema !-->
		$userLogado = $this->session->userdata("usuario_logado");
		$dados['empregadores'] = $this->Empregador_model->geteditarEmpregador($userLogado['id']);
		$this->load->view('empregadores',$dados);
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
		$this->load->library('form_validation');
		// validação dos campos no formulário
		if ($opcao == 'opcao1') // pega as informações da opção 1 - opções de dados do perfil
		{
			$this->form_validation->set_rules('nomeEmpregador', 'Nome do Empregador', 'required');
			$this->form_validation->set_rules('cpfEmpregador', 'Cpf do Empregador', 'required');
			$this->form_validation->set_rules('nascimentoEmpregador', 'Digite a data de nascimento', 'required');
			$this->form_validation->set_rules('generoEmpregador', 'Gênero', 'required');
			$this->form_validation->set_rules('tituloEmpregador', 'Título de Eleitor', 'required');
			$this->form_validation->set_rules('irrfEmpregador', 'Recibo de imposto de renda', 'required');
			$this->form_validation->set_rules('telefoneEmpregador', 'Telefone do empregador', 'required');
		  $this->form_validation->set_rules('celularEmpregador', 'Celular do empregador', 'required');

			$dados['nomeempregador'] = $this->input->post('nomeEmpregador');
			$dados['cpf'] = $this->input->post('cpfEmpregador');
			$dados['nascimentoemp'] = $this->input->post('nascimentoEmpregador');
			$dados['sexo'] = $this->input->post('generoEmpregador');
			$dados['tituloEleitor'] = $this->input->post('tituloEmpregador');
			$dados['irrfRecibo'] = $this->input->post('irrfEmpregador');
			$dados['telefone'] = $this->input->post('telefoneEmpregador');
			$dados['celular'] = $this->input->post('celularEmpregador');

			if ($this->form_validation->run() == FALSE)
			{

				$variaveis = array('mensagens' => validation_errors());
				$variaveis['rodape'] = "Desenvolvido por StartHelp";
				$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
				$userLogado = $this->session->userdata("usuario_logado");
				$variaveis['empregadores'] = $this->Empregador_model->geteditarEmpregador($userLogado['id']);
				$this->load->view('empregadores',$variaveis);
			}
			else
			{
				if ($this->Empregador_model->atualizar($dados, $id))
				{
					$this->load->view('v_sucesso_alterar_empregador', $variaveis);
				}
				else {
					$this->load->view('errors/html/v_erro', $variaveis);
				}
			}
		} else { // pega as informações da opção 2 - opeções de endereço
			$this->form_validation->set_rules('cepEmpregador', 'Cep do empregador', 'required');
			$this->form_validation->set_rules('logradouroEmpregador', 'Cpf do Empregador', 'required');
			$this->form_validation->set_rules('complementoEmpregador', 'Digite a data de nascimento', 'required');
			$this->form_validation->set_rules('bairroEmpregador', 'Selecione o Gênero', 'required');
			$this->form_validation->set_rules('cidadeEmpregador', 'Digite o título de eleitor', 'required');
			$this->form_validation->set_rules('ufEmpregador', 'Digite o recibo de imposto de renda', 'required');
			$this->form_validation->set_rules('numeroLogradouro', 'Digite o número do logradouro', 'required');

			$dados['cep'] = $this->input->post('cepEmpregador');
			$dados['logradouro'] = $this->input->post('logradouroEmpregador');
			$dados['complemento'] = $this->input->post('complementoEmpregador');
			$dados['bairro'] = $this->input->post('bairroEmpregador');
			$dados['idmunicipio'] = $this->input->post('municipioEmpregador');
			$dados['iduf'] = $this->input->post('ufEmpregador');
			$dados['numlogradouro'] = $this->input->post('numeroLogradouro');

			if ($this->form_validation->run() == FALSE)
			{

				$variaveis = array('mensagens' => validation_errors());
				$variaveis['rodape'] = "Desenvolvido por StartHelp";
				$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
				$this->load->view('empregadores',$variaveis);
			}
			else
			{
				if ($this->Empregador_model->atualizar($dados, $id))
				{
					$this->load->view('v_sucesso_alterar_empregador', $variaveis);
				}
				else {
					$this->load->view('errors/html/v_erro', $variaveis);
				}
			}

		}

	}

	public function EmpregadorEditar ($id = null)
	{
		if ($id) {

			$this->db->where('id',$id);
			$variaveis['empregaddores'] = $this->db->get('empregadores')->result();
			$variaveis['titulo'] = "Prático. Sistema de Gestão Online. Editar Empregador";
			$variaveis['rodape'] = "Desenvolvido por SuportHelp";
			$this->load->view('empregadores', $variaveis);
		}
	}

	// busca cidadade do empregador
	public function buscacidadeEmpregador ()
	{
		$this->load->model("Empregador_model");

		$cidades = $this->Empregador_model->retornaCidadesEstados();

		$option = "<option value=''>Selecione</option>";
		foreach($cidades -> result() as $linha) {
			$option .= "<option value='$linha->id'>$linha->nomecidade</option>";
		}

		echo $option;
	}

}
