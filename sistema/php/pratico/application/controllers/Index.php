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
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Informações do Empregador";
		$dados['rodape'] = "Desenvolvido por StartHelp";
		$this->load->view('empregadores',$dados);
	}
	// chama a página de colaboraores
	public function Colaboradores ()
	{
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Colaboradores";
		$dados['rodape'] = "Desenvolvido por StartHelp";

		$this->load->model('Colaborador_model', '', TRUE);

		// retorna raça e cor
		$racacor = $this->Colaborador_model->retornaRacaCor();
		$option1 = "<option value=''>Selecione...</option>";
		foreach ($racacor-> result() as $linha) {
			$option1 .= "<option value='$linha->id'>$linha->descricao</option>";
		}

		// retorna o grau de instrução
		$grauinstrucao = $this->Colaborador_model->retornaEscolaridade();
		$option2 = "<option value=''>Selecione...</option>";
		foreach ($grauinstrucao-> result() as $linha) {
			$option2 .= "<option value='$linha->id'>$linha->descricao</option>";
		}

		// retorna a Nacionalidade
		$nacionalidade = $this->Colaborador_model->retornaPaisNacionalidade();
		$option3 = "<option value=''>Selecione...</option>";
		foreach ($nacionalidade-> result() as $linha) {
			$option3 .= "<option value='$linha->id'>$linha->nome</option>";
		}

		// retorna o pais de nascimento
		$paisnascimento = $this->Colaborador_model->retornaPaisNascimento();
		$option4 = "<option value=''>Selecione...</option>";
		foreach ($paisnascimento-> result() as $linha) {
			$option4 .= "<option value='$linha->id'>$linha->nome</option>";
		}

		// retorna países
		$paises = $this->Colaborador_model->retornaPaises();
		$option5 = "<option value=''>Selecione...</option>";
		foreach ($paises-> result() as $linha) {
			$option5 .= "<option value='$linha->id'>$linha->nome</option>";
		}

		// retorna estados
		$estados = $this->Colaborador_model->retornaEstados();
		$option6 = "<option value=''>Selecione...</option>";
		foreach ($estados-> result() as $linha) {
			$option6 .= "<option value='$linha->id'>$linha->nome</option>";
		}

		// retorna tipo de logradouro
		$tipologradouro = $this->Colaborador_model->retornaLogradouro();
		$option7 = "<option value=''>Selecione...</option>";
		foreach ($tipologradouro-> result() as $linha) {
			$option7 .= "<option value='$linha->id'>$linha->nome</option>";
		}

		// retorna a categoria do trabalhador
		$categoriatrabalhador = $this->Colaborador_model->retornaCategoriaTrabalhador();
		$option8 = "<option value=''>Selecione...</option>";
		foreach ($categoriatrabalhador-> result() as $linha) {
			$option8 .= "<option value='$linha->id'>$linha->descricao</option>";
		}

		// retorna o tipo de contrato
		$retornaTipoContrato = $this->Colaborador_model->retornaTipoContrato();
		$option9 = "<option value=''>Selecione...</option>";
		foreach ($retornaTipoContrato-> result() as $linha) {
			$option9 .= "<option value='$linha->id'>$linha->descricao</option>";
		}

		// retorna a peridiocidade
		$retornaPeridiocidade = $this->Colaborador_model->retornaPeridiocidade();
		$option10 = "<option value=''>Selecione...</option>";
		foreach ($retornaPeridiocidade-> result() as $linha) {
			$option10 .= "<option value='$linha->id'>$linha->descricao</option>";
		}

		// retorno estado civil
		$retornaEstadoCivil = $this->Colaborador_model->retornaEstadoCivil();
		$option11 = "<option value=''>Selecione...</option>";
		foreach ($retornaEstadoCivil-> result() as $linha) {
			$option11 .= "<option value='$linha->id'>$linha->descricao</option>";
		}


		// retorna os dados do select de todo o cadastro
		$dados['options_racacor'] = $option1;
		$dados['options_escolaridade'] = $option2;
		$dados['options_nacionalidade'] = $option3;
		$dados['options_pais_nascimento'] = $option4;
		$dados['options_paises'] = $option5;
		$dados['options_estados'] = $option6;
		$dados['options_tipo_logradouro'] = $option7;
		$dados['options_categoria_trabalhador'] = $option8;
		$dados['options_tipo_contrato'] = $option9;
	  $dados['options_peridiocidade'] = $option10;
		$dados['options_estado_civil'] = $option11;

		//select para fazer a consulta no cadastro de dependentes
		$this->db->select('*');
		$dados['cadastroColaborador'] = $this->db->get('colaboradores')->result();
		$this->load->view('colaboradores',$dados);
	}
	// chama a página de dependentes
	public function Dependentes ()
	{
		// variáveis como título da página
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Dependentes";
		$dados['rodape'] = "Desenvolvido por StartHelp";

		// dados do model para trazer e fazer os selects
		$this->load->model('Dependente_model', '', TRUE);
		$colaboradores = $this->Dependente_model->retornaColaboradores();
		$option = "<option value=''>Selecione o colaborador</option>";
		foreach ($colaboradores-> result() as $linha) {
			$option .= "<option value='$linha->cpf'>$linha->nome</option>";
		}

		$dados['options_colaboradores'] = $option;
		// select para fazer a consulta para trazer os dependentes
		$this->db->select('*');
		$dados['cadastroDependente'] = $this->db->get('dependentes')->result();
		$this->load->view('dependentes',$dados);
	}

	//criada a view de login do usuário
	public function Login ()
	{
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Login no Sistema";
		$this->load->view('login',$dados);
	}

	public function pagina404 ()
	{
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - 404. Erro do Sistema";
		$dados['rodape'] = "Desenvolvido por StartHelp";
		$this->load->view('404',$dados);
	}
}
