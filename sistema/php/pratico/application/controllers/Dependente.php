<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependente extends CI_Controller {

	/**
	* Carrega o formulário para novo cadastro e cria novas funções
	* @param nenhum
	* @return view
	*/
	function index()
	{
		$variaveis['titulo'] = 'Novo Cadastro';
		$this->load->view('dependentes', $variaveis);
	}
	/**
	* Salva o registro no banco de dados.
	* Caso venha o valor id, indica uma edição, caso contrário, um insert.
	* @param campos do formulário
	* @return view
	*/
	public function DependenteStore()
	{
		$this->load->model('Dependente_model', '', TRUE); // faz o load do model para poder inserir no banco de dados
		$this->load->library('form_validation');
		// validação dos campos no formulário
		$this->form_validation->set_rules('nomeDependente', 'Nome do Dependente', 'required');
		$this->form_validation->set_rules('cpfDependente', 'Cpf Dependente', 'required');
		$this->form_validation->set_rules('colaboradorDependente', 'Nome do Colaborador', 'required');
		$this->form_validation->set_rules('irrfDependente', 'Dedução de Irrf', 'required');
		$this->form_validation->set_rules('salfamiliaDependente', 'Salário Família', 'required');
		$this->form_validation->set_rules('dataNascDependente', 'Data de Nascimento do Dependente', 'required');

		if ($this->form_validation->run() == FALSE) {

			$variaveis = array('mensagens' => validation_errors());
			$variaveis['rodape'] = "Desenvolvido por StartHelp";
			$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
			$this->load->view('dependentes',$variaveis);

		} else {

			$id = $this->input->post('id'); // id do dependente

			$dados['nome'] = $this->input->post('nomeDependente');
			$dados['cpf'] = $this->input->post('cpfDependente');
			$dados['cpfcolaborador'] = $this->input->post('colaboradorDependente');
			$dados['nascimento'] = $this->input->post('dataNascDependente');
			$dados['deducaoirrf'] = $this->input->post('irrfDependente');
			$dados['salfamilia'] = $this->input->post('salfamiliaDependente');
			$dados['nascimento'] = implode('-',array_reverse(explode('/',$this->input->post('dataNascDependente'))));

			// pegar o cpf do colaborador
			//$this->db->select('cpfcolaborador',$dados)->join('colaboradores','dependentes.cpf_colaborador = colaboradores.cpf')->get("dependentes")->result();
			//$data['cpfcolaborador'] = $this->db->get('dependentes')->result();

				if ($this->Dependente_model->store($dados, $id))
				{
					$variaveis['mensagem'] = "Dados gravados com sucesso!";
					$this->load->view('v_sucesso_inserir_dependente', $variaveis);
				} else {
					$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
					$this->load->view('errors/html/v_erro', $variaveis);
				}

		}
	}

	/**
	* Chama o formulário para atualizar o dependente
	* @param $id do registro
	* @return view
	*/

	public function DependenteAtualizar()
	{
		$id = $this->input->post('idDependente'); // pega o id do depedente
		$this->load->model('Dependente_model', '', TRUE); // faz o load do model para poder inserir no banco de dados

		$variaveis['mensagem'] = "Registro alterado com sucesso!";
		$dados['nome'] = $this->input->post('nomeDependente');
		$dados['cpf'] = $this->input->post('cpfDependente');
		$dados['nascimento'] = $this->input->post('dataNascDependente');
		$dados['deducaoirrf'] = $this->input->post('irrfDependente');
		$dados['salfamilia'] = $this->input->post('salfamiliaDependente');

		if ($this->Dependente_model->atualizar($dados, $id))
		{
			$this->load->view('v_sucesso_alterar_dependente', $variaveis);
		}
		else {
			$this->load->view('errors/html/v_erro', $variaveis);
		}
	}

	/**
	* Chama o formulário com os campos preenchidos pelo registro selecioando.
	* @param $id do registro
	* @return view
	*/
	public function DependenteEditar($id = null) {

		if ($id) {

			$this->db->where('id',$id);
			$variaveis['dependentes'] = $this->db->get('dependentes')->result();
			// variável de rodape pela passagem do footer
			$variaveis['titulo'] = "Prático. Sistema de Gestão Online. Editar Dependente";
			$variaveis['rodape'] = "Desenvolvido por SuportHelp";
			$this->load->view('dependentes_editar', $variaveis);
		}

	}
	/**
	* Função que exclui o registro através do id.
	* @param $id do registro a ser excluído.
	* @return boolean;
	*/
	public function DependenteDeletar($id = null) {
		if ($this->Dependente_model->deletar($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso_deletar_dependente', $variaveis);
		}
		else {
			$this->load->view('errors/html/v_erro', $variaveis);
		}
	}
}
