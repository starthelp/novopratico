<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependente extends CI_Controller {

	/**
	 * Carrega o formulário para novo cadastro
	 * @param nenhum
	 * @return view
	 */
	public function create()
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

		$regras = array(

		        array(
		                'field' => 'nomeDependente',
		                'label' => 'nomeDependente',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'cpfDependente',
		                'label' => 'cpfDependente',
		                'rules' => 'required'
		        ),
						array(
										'field' => 'dataNascDependente',
										'label' => 'dataNascDependente',
										'rules' => 'required'
						),
						array(
										'field' => 'iffrDependente',
										'label' => 'iffrDependente',
										'rules' => 'required'
						),
						array(
										'field' => 'salfamiliaDependente',
										'label' => 'salfamiliaDependente',
										'rules' => 'required'
						)
		);

		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$variaveis['titulo'] = 'Novo Registro';
			$this->load->view('dependentes', $variaveis);
		} else {

			$id = $this->input->post('id');

			$dados = array(

				"nome" => $this->input->post('nomeDependente'),
				"cpf" => $this->input->post('cpfDependente'),
				"nascimento" => $this->input->post('dataNascDependente'),
				"iffr" => $this->input->post('iffrDependente'),
				"salfamilia" => $this->input->post('salfamiliaDependente'),
			);

			if ($this->Dependente_model->store($dados, $id))
			{
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('v_sucesso_inserir', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		}
	}
	/**
	 * Chama o formulário com os campos preenchidos pelo registro selecioando.
	 * @param $id do registro
	 * @return view
	 */
	public function DependenteEditar($id = null){

		if ($id) {

			$cadastroDependente = $this->Dependente_model->get($id);

			if ($cadastroDependente->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $cadastroDependente->row()->id;
				$variaveis['nome'] = $cadastroDependente>row()->nomeDependente;
				$variaveis['cpf'] = $cadastroDependente->row()->cpfDependente;
				$this->load->view('v_cadastro', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		}

	}
	/**
	 * Função que exclui o registro através do id.
	 * @param $id do registro a ser excluído.
	 * @return boolean;
	 */
	public function DependenteDeletar($id = null) {
		if ($this->Dependente_model->delete($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso_deletar', $variaveis);
		}
		else {
			$this->load->view('errors/html/v_erro', $variaveis);
		}
	}
}
