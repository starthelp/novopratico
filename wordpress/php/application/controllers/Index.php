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
	public function Index ()
	{
		// colocando o array com as informações de título do projeto
		$variaveis['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online";
		$variaveis['rodape'] = "Desenvolvido por SuportHelp";

		// retorna o model inicial do sistema
		$this->load->model('Index_model', '', TRUE);
		// variáveis para poder entrar no sistema
		$variaveis['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online";
		$variaveis['rodape'] = "Desenvolvido por StartHelp";

		// pegar as variáveis do WordPress e verificar se o usuário está logado
		if ( is_user_logged_in() )
		{

			global $current_user;
			$current_user = wp_get_current_user();
			$user_info = get_userdata($current_user->ID);
			$login = $user_info->user_login;
			$email = $user_info->user_email;
			$usuario = $this->Index_model->retornaUsuarioLogado($login, $email);

			// pega as variáveis do sistema e verifica se é o wordpress ou se é do sistema (Caso o usuário já esteja no sistema)
			if ($usuario)
			{
				$variaveis['empregadores'] = $this->Index_model->dadosusuarioLogado($usuario['id']);
				$this->load->view('Index', $variaveis);
			}
			else
			{
				// caso o usuário não exista no sistema ele pegará as informações do usuário do wordpress e vai fazer o insert na tabela de empregadores
				$dados['login'] = $user_info->user_login;
				$dados['email'] = $user_info->user_email;
				$dados['senha'] = $user_info->user_pass;
				$dados['nascimentoemp'] = implode('-',array_reverse(explode('/',$user_registered)));
				$dados['ativo'] = 0;

				if ($this->Index_model->insertUsuarioLogado($dados))
				{
							// return verificando o insert realizado na tabela com as informações do empregador
							$this->load->view('Index', $variaveis);
				}
				else {
					echo "<script>alert('Erro ao entrar no sistema');</script>";
					echo "<script>history.back();</script>";
					exit();
				}
			}
		}
		else
		{
			echo "<script>alert('Faça o login para entrar no sistema');</script>";
			echo "<script>history.back();</script>";
			exit();
		}

	}
	// chama a págian de perfil do empregador
	public function Empregadores ()
	{

		global $current_user;
		$current_user = wp_get_current_user();
		$user_info = get_userdata($current_user->ID);
		$emailEmpregador = $user_info->user_email;

		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Informações do Empregador";
		$dados['rodape'] = "Desenvolvido por StartHelp";

		$this->load->model('Empregador_model', '', TRUE);

		// retorna o estado
		$retornaEstado = $this->Empregador_model->retornaEstado();
		$option = "<option value=''>Selecione...</option>";
		foreach ($retornaEstado-> result() as $linha) {
			$option .= "<option value='$linha->id'>$linha->nomeestado</option>";
		}

		// retorna todos os options
		$dados['options_estados'] = $option;

		// select para trazer os colaboradores
		$this->db->select('*');
		$this->db->join('cidades','idmunicipio = id','inner');
		$this->db->join('estados','estados.id = colaboradores.idestado','inner');
		$dados['mostraColaborador'] = $this->db->get('colaboradores')->result();

		// verifica se está ativo ou não
		$dados['empAtivo'] = $this->Empregador_model->retornaEmpregadorAtivo($emailEmpregador);

		if ($dados['empAtivo'][0]->ativo == 1)
		{
			$dados['empregadores'] = $this->Empregador_model->geteditarEmpregador($emailEmpregador);
			$dados['empregadorUF'] = $this->Empregador_model->retornatodosEstados();
			$dados['retornatipoLogradouro'] = $this->Empregador_model->retornatodosLogradouro();
			$this->load->view('empregadores',$dados);
		}
		else
		{
			$dados['empregadores'] = $this->Empregador_model->retornaEmpregadorBase($emailEmpregador);
			$this->load->view('empregadores',$dados);
		}

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
			$option1 .= "<option value='$linha->id'>$linha->descricaoracacor</option>";
		}

		// retorna o grau de instrução
		$grauinstrucao = $this->Colaborador_model->retornaEscolaridade();
		$option2 = "<option value=''>Selecione...</option>";
		foreach ($grauinstrucao-> result() as $linha) {
			$option2 .= "<option value='$linha->id'>$linha->descricaograu</option>";
		}

		// retorna a Nacionalidade
		$nacionalidade = $this->Colaborador_model->retornaPaisNacionalidade();
		$option3 = "<option value=''>Selecione...</option>";
		foreach ($nacionalidade-> result() as $linha) {
			$option3 .= "<option value='$linha->id'>$linha->nomepais</option>";
		}

		// retorna o pais de nascimento
		$paisnascimento = $this->Colaborador_model->retornaPaisNascimento();
		$option4 = "<option value=''>Selecione...</option>";
		foreach ($paisnascimento-> result() as $linha) {
			$option4 .= "<option value='$linha->id'>$linha->nomepais</option>";
		}

		// retorna países
		$paises = $this->Colaborador_model->retornaPaises();
		$option5 = "<option value=''>Selecione...</option>";
		foreach ($paises-> result() as $linha) {
			$option5 .= "<option value='$linha->id'>$linha->nomepais</option>";
		}

		// retorna estados
		$estados = $this->Colaborador_model->retornaEstados();
		$option6 = "<option value=''>Selecione...</option>";
		foreach ($estados-> result() as $linha) {
			$option6 .= "<option value='$linha->id'>$linha->nomeestado</option>";
		}

		// retorna tipo de logradouro
		$tipologradouro = $this->Colaborador_model->retornaLogradouro();
		$option7 = "<option value=''>Selecione...</option>";
		foreach ($tipologradouro-> result() as $linha) {
			$option7 .= "<option value='$linha->id'>$linha->nomelogradouro</option>";
		}

		// retorna a categoria do trabalhador
		$categoriatrabalhador = $this->Colaborador_model->retornaCategoriaTrabalhador();
		$option8 = "<option value=''>Selecione...</option>";
		foreach ($categoriatrabalhador-> result() as $linha) {
			$option8 .= "<option value='$linha->id'>$linha->descricaocattrab</option>";
		}

		// retorna o tipo de contrato
		$retornaTipoContrato = $this->Colaborador_model->retornaTipoContrato();
		$option9 = "<option value=''>Selecione...</option>";
		foreach ($retornaTipoContrato-> result() as $linha) {
			$option9 .= "<option value='$linha->id'>$linha->descricaotipocont</option>";
		}

		// retorna a peridiocidade
		$retornaPeridiocidade = $this->Colaborador_model->retornaPeridiocidade();
		$option10 = "<option value=''>Selecione...</option>";
		foreach ($retornaPeridiocidade-> result() as $linha) {
			$option10 .= "<option value='$linha->id'>$linha->descricaoper</option>";
		}

		// retorno estado civil
		$retornaEstadoCivil = $this->Colaborador_model->retornaEstadoCivil();
		$option11 = "<option value=''>Selecione...</option>";
		foreach ($retornaEstadoCivil-> result() as $linha) {
			$option11 .= "<option value='$linha->id'>$linha->descricaoestcivil</option>";
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

		//select para fazer a consulta no cadastro de colaboradores
		$this->db->select('*');
		$this->db->join('cidades','idmunicipio = id','inner');
		$this->db->join('estados','estados.id = colaboradores.idestado','inner');

		$dados['cadastroColaborador'] = $this->db->get('colaboradores')->result();
		$this->load->view('colaboradores',$dados);
	}
	// chama a página de dependentes
	public function Dependentes ()
	{
		// variáveis como título da página
		$dados['titulo'] = "Prático. Sistema de Contabilidade e Gestão Online - Dependentes";
		$dados['rodape'] = "Desenvolvido por StartHelp";
		$this->load->model('Dependente_model', '', TRUE);

		$colaborador = $this->Dependente_model->retornaColaboradores();
		$option = "<option value=''>Selecione...</option>";
		foreach ($colaborador-> result() as $linha) {
			$option .= "<option value='$linha->cpf'>$linha->nomecolaborador</option>";
		}
		$dados['options_colaboradores'] = $option;
		$dados['cadastroDependente'] = $this->Dependente_model->selecionarDependentes();
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
