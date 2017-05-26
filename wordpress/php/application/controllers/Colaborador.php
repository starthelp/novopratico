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
		$this->db->select('*');
		$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
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
		$this->form_validation->set_rules('telefoneColaborador', 'Telefone do Colaborador', 'required|max_length[14]');
		$this->form_validation->set_rules('racaColaborador', 'Raça do Colaborador', 'required');
		$this->form_validation->set_rules('escolaridadeColaborador', 'Grau de Instrução', 'required');
		$this->form_validation->set_rules('logradouroColaborador', 'Logradouro do Colaborador', 'required');
		$this->form_validation->set_rules('tipoLogradouro', 'Tipo do Logradouro', 'required');
		$this->form_validation->set_rules('complementoColaborador', 'Complemento ', 'required');
		$this->form_validation->set_rules('numeroLogradouro', 'Número do Logradouro', 'required');
		$this->form_validation->set_rules('cepColaborador', 'Cep do Colaborador', 'required');
		$this->form_validation->set_rules('bairroColaborador', 'Bairro do Colaborador', 'required');
		$this->form_validation->set_rules('estadoColaborador', 'Estado do Colaborador', 'required');
		$this->form_validation->set_rules('cidadeColaborador', 'Cidade do Colaborador', 'required');
		$this->form_validation->set_rules('estadoNascimentoColaborador', 'Estado de Nascimento', 'required');
		$this->form_validation->set_rules('cidadeNascimentoColaborador', 'Cidade de Nascimento', 'required');
		$this->form_validation->set_rules('paisNascColaborador', 'País de Nascimento', 'required');
		$this->form_validation->set_rules('paisNasColaborador', 'País de Nascionalidade', 'required');
		$this->form_validation->set_rules('numeroCarteira', 'Número de Carteira CTPS', 'required');
		$this->form_validation->set_rules('serieCarteira', 'Série da Carteira CTPS', 'required');
		$this->form_validation->set_rules('expedicaoCarteira', 'Expedição da Carteira', 'required');
		$this->form_validation->set_rules('tipoContrato', 'Tipo de contrato pretendido', 'required');
		$this->form_validation->set_rules('cargoPretendido', 'Cargo pretendido', 'required');
		$this->form_validation->set_rules('salarioBase', 'Salário Base', 'required');
		$this->form_validation->set_rules('numeroNis', 'Número Nis', 'required');
		$this->form_validation->set_rules('numeroPis', 'Número Pis', 'required');
		$this->form_validation->set_rules('peridiocidadeColaborador', 'Peridiocidade do Trabalhador', 'required');
		$this->form_validation->set_rules('primeiroEmprego', 'Primeiro Emprego', 'required');
		$this->form_validation->set_rules('localtrabalho', 'Local de trabalho', 'required');
		$this->form_validation->set_rules('numerolocaltrabalho', 'Número do local de trabalho', 'required');
		$this->form_validation->set_rules('estadoCivilColaborador', 'Estado Civil', 'required');
		$this->form_validation->set_rules('dataAdmissao', 'Data de Admissão', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->db->select('*');
			$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
			$variaveis = array('mensagens' => validation_errors());
			$variaveis['rodape'] = "Desenvolvido por StartHelp";
			$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
			$this->load->view('colaboradores',$variaveis);

		} else {
			$dados['nomecolaborador'] = $this->input->post('nomeColaborador');
			$dados['cpf'] = $this->input->post('cpfColaborador');
			$dados['nascimentocol'] = implode('-',array_reverse(explode('/',$this->input->post('datanascColaborador'))));
			$dados['sexo'] = $this->input->post('generoColaborador');
			$dados['email'] = $this->input->post('emailColaborador');
			$dados['telefone'] = $this->input->post('telefoneColaborador');
			$dados['celular'] = $this->input->post('celularColaborador');
			$dados['idraca'] = $this->input->post('racaColaborador');
			$dados['idgrauinstrucao'] = $this->input->post('escolaridadeColaborador');
			$dados['logradouro'] = $this->input->post('logradouroColaborador');
			$dados['tipologradouro'] = $this->input->post('tipoLogradouro');
			$dados['numlogradouro'] = $this->input->post('numeroLogradouro');
			$dados['cep'] = $this->input->post('cepColaborador');
			$dados['complemento'] = $this->input->post('complementoColaborador');
			$dados['bairro'] = $this->input->post('bairroColaborador');
			$dados['idestado'] = $this->input->post('estadoColaborador');
			$dados['idmunicipio'] = $this->input->post('cidadeColaborador');
			$dados['idufnascimento'] = $this->input->post('estadoNascimentoColaborador');
			$dados['idmunicipionascimento'] = $this->input->post('cidadeNascimentoColaborador');
			$dados['idpaisnascimento'] = $this->input->post('paisNasColaborador');
			$dados['idpaisnacionalidade'] = $this->input->post('paisNascColaborador');
			$dados['ctps'] = $this->input->post('numeroCarteira');
			$dados['seriectps'] = $this->input->post('serieCarteira');
			$dados['ufctps'] = $this->input->post('expedicaoCarteira');
			$dados['nis'] = $this->input->post('numeroNis');
			$dados['pis'] = $this->input->post('numeroPis');
			$dados['idtipocontrato'] = $this->input->post('tipoContrato');
			$dados['idtipocargo'] = $this->input->post('cargoPretendido');
			$dados['salariobase'] = str_replace(',','.',str_replace('.','',$this->input->post('salarioBase')));
			$dados['idperidiocidade'] = $this->input->post('peridiocidadeColaborador');
			$dados['primeiroemprego'] = $this->input->post('primeiroEmprego');
			$dados['localtrabalho'] = $this->input->post('localtrabalho');
			$dados['numerolocaltrabalho'] = $this->input->post('numerolocaltrabalho');
			$dados['idestadocivil'] = $this->input->post('estadoCivilColaborador');
			$dados['dataAdmissao'] = implode('-',array_reverse(explode('/',$this->input->post('dataAdmissao'))));
			$dados['ativo'] = $this->input->post('ativoColaborador');

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
		$this->load->library('form_validation');
		$variaveis['mensagem'] = "Registro alterado com sucesso!";
		// if com as informações do perfil

		if ($operacao == 'operacao1')
		{

			$this->form_validation->set_rules('nomeColaborador', 'Nome do Colaborador', 'required|min_length[5]');
			$this->form_validation->set_rules('cpfColaborador', 'Cpf do Colaborador', 'required|max_length[11]');
			$this->form_validation->set_rules('datanascColaborador', 'Data de Nascimento', 'required|max_length[10]');
			$this->form_validation->set_rules('generoColaborador', 'Gênero Colaborador');
			$this->form_validation->set_rules('emailColaborador', 'Email colaborador', 'required|valid_email');
			$this->form_validation->set_rules('telefoneColaborador', 'Telefone do Colaborador', 'required|max_length[11]');
			$this->form_validation->set_rules('racaColaborador', 'Raça do Colaborador', 'required');
			$this->form_validation->set_rules('estadoCivilColaborador', 'Estado Civil', 'required');

			// campos a serem preenchidos
			if ($this->form_validation->run() == FALSE)
			{

				$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
				$variaveis = array('mensagens' => validation_errors());
				$variaveis['rodape'] = "Desenvolvido por StartHelp";
				$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
				$variaveis['colaboradores'] = $this->Colaborador_model->geteditarColaboradores($id);
				$this->load->view('colaboradores_editar', $variaveis);
			}
			else
			{
				$dados['nomecolaborador'] = $this->input->post('nomeColaborador');
				$dados['cpf'] =  $this->input->post('cpfColaborador');
				$dados['nascimentocol'] = implode('-',array_reverse(explode('/',$this->input->post('datanascColaborador'))));
				$dados['sexo'] = $this->input->post('generoColaborador');
				$dados['email'] = $this->input->post('emailColaborador');
				$dados['telefone'] = $this->input->post('telefoneColaborador');
				$dados['celular'] = $this->input->post('celularColaborador');
				$dados['idraca'] = $this->input->post('racaColaborador');
				$dados['idgrauinstrucao'] = $this->input->post('escolaridadeColaborador');
				$dados['idestadocivil'] = $this->input->post('estadoCivilColaborador');

				if ($this->Colaborador_model->atualizar($dados, $id))
				{
					$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
				}
				else {
					$this->load->view('errors/html/v_erro', $variaveis);
				}
			}

		}
		else if ($operacao == 'operacao2')
		{

			$this->form_validation->set_rules('logradouroColaborador', 'Logradouro do Colaborador', 'required');
			$this->form_validation->set_rules('complementoColaborador', 'Complemento ', 'required');
			$this->form_validation->set_rules('bairroColaborador', 'Bairro do Colaborador', 'required');
			$this->form_validation->set_rules('estadoColaborador', 'Estado de Nascimento do Colaborador', 'required');
			$this->form_validation->set_rules('cidadeColaborador', 'Cidade de Nascimento do Colaborador', 'required');
			$this->form_validation->set_rules('cepColaborador', 'Cep do colaborador', 'required');

			// campos a serem preenchidos
			if ($this->form_validation->run() == FALSE)
			{
				$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
				$variaveis = array('mensagens' => validation_errors());
				$variaveis['rodape'] = "Desenvolvido por StartHelp";
				$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
				$variaveis['colaboradores'] = $this->Colaborador_model->geteditarColaboradores($id);
				$this->load->view('colaboradores_editar', $variaveis);

			}
			else
			{
				$dados['logradouro'] = $this->input->post('logradouroColaborador');
				$dados['cep'] = $this->input->post('cepColaborador');
				$dados['complemento'] = $this->input->post('complementoColaborador');
				$dados['bairro'] = $this->input->post('bairroColaborador');
				$dados['idufnascimento'] = $this->input->post('estadoColaborador');
				$dados['idmunicipionascimento'] = $this->input->post('cidadeColaborador');

				if ($this->Colaborador_model->atualizar($dados, $id))
				{
					$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
				}
				else {
					$this->load->view('errors/html/v_erro', $variaveis);
				}
			}

		}
		else if ($operacao == 'operacao3')
		{

			$this->form_validation->set_rules('paisNascColaborador', 'Pais de Nascimento', 'required');
			$this->form_validation->set_rules('paisNasColaborador', 'País de Nacionalidade ', 'required');
			$this->form_validation->set_rules('estadoNascimentoColaborador', 'Estado de Nascimento', 'required');
			$this->form_validation->set_rules('cidadeNascimentoColaborador', 'Cidade de Nascimento', 'required');

			// campos a serem preenchidos
			if ($this->form_validation->run() == FALSE)
			{
				$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
				$variaveis = array('mensagens' => validation_errors());
				$variaveis['rodape'] = "Desenvolvido por StartHelp";
				$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
				$variaveis['colaboradores'] = $this->Colaborador_model->geteditarColaboradores($id);
				$this->load->view('colaboradores_editar', $variaveis);
			}
			else
			{
				$dados['paisnascimento'] = $this->input->post('paisNascColaborador');
				$dados['paisnacionalidade'] = $this->input->post('paisNasColaborador');
				$dados['idufnascimento'] = $this->input->post('estadoNascimentoColaborador');
				$dados['idmunicipionascimento'] = $this->input->post('cidadeNascimentoColaborador');

				if ($this->Colaborador_model->atualizar($dados, $id))
				{
					$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
				}
				else {
					$this->load->view('errors/html/v_erro', $variaveis);
				}
			}
		}
		else if ($operacao == 'operacao4')
		{

			$this->form_validation->set_rules('numeroCarteira', 'Número de CTPS', 'required');
			$this->form_validation->set_rules('seriectps', 'Série de CTPS', 'required');
			$this->form_validation->set_rules('ufctps', 'Expedição de CTPS', 'required');
			$this->form_validation->set_rules('nis', 'Número NIS', 'required');
			$this->form_validation->set_rules('pis', 'Número PIS', 'required');
			// campos a serem preenchidos
			if ($this->form_validation->run() == FALSE)
			{
				$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
				$variaveis = array('mensagens' => validation_errors());
				$variaveis['rodape'] = "Desenvolvido por StartHelp";
				$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
				$variaveis['colaboradores'] = $this->Colaborador_model->geteditarColaboradores($id);
				$this->load->view('colaboradores_editar', $variaveis);

			}
			else
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
		else if ($operacao == 'operacao5')
		{

			$this->form_validation->set_rules('tipoContrato', 'Tipo de contrato', 'required');
			$this->form_validation->set_rules('cargoPretendido', 'Cargo pretendido', 'required');
			$this->form_validation->set_rules('primeiroEmprego', 'Primeiro emprego', 'required');
			$this->form_validation->set_rules('salarioBase', 'Salário Base', 'required');
			$this->form_validation->set_rules('peridiocidadeColaborador', 'Peridiocidade do Colaborador', 'required');
			$this->form_validation->set_rules('localtrabalho', 'Local de Trabalho', 'required');
			$this->form_validation->set_rules('numerolocaltrabalho', 'Número do local de trabalho', 'required');
			$this->form_validation->set_rules('dataAdmissao', 'Data de Admissão', 'required');

			// campos a serem preenchidos
			if ($this->form_validation->run() == FALSE)
			{
				$variaveis['cadastroColaborador'] = $this->db->get('colaboradores')->result();
				$variaveis = array('mensagens' => validation_errors());
				$variaveis['rodape'] = "Desenvolvido por StartHelp";
				$variaveis['titulo'] = "Novo Registro. Campos a serem preenchidos";
				$variaveis['colaboradores'] = $this->Colaborador_model->geteditarColaboradores($id);
				$this->load->view('colaboradores_editar', $variaveis);

			}
			else
			{
				$dados['idtipocontrato'] = $this->input->post('tipoContrato');
				$dados['idtipocargo'] = $this->input->post('cargoPretendido');
				$dados['primeiroemprego'] = $this->input->post('primeiroEmprego');
				$dados['salariobase'] = str_replace(',','.',str_replace('.','',$this->input->post('salarioBase')));
				$dados['idperidiocidade'] = $this->input->post('peridiocidadeColaborador');
				$dados['localtrabalho'] = $this->input->post('localtrabalho');
				$dados['numerolocaltrabalho'] = $this->input->post('numerolocaltrabalho');
				$dados['dataadmissao'] = implode('-',array_reverse(explode('/',$this->input->post('dataAdmissao'))));

				if ($this->Colaborador_model->atualizar($dados, $id))
				{
					$this->load->view('v_sucesso_alterar_colaborador', $variaveis);
				}
				else {
					$this->load->view('errors/html/v_erro', $variaveis);
				}

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

			$this->load->model('Colaborador_model', '', TRUE); // faz o load do model para poder inserir no banco de dados
			// variável de rodape pela passagem do footer
			$variaveis['titulo'] = "Prático. Sistema de Gestão Online. Editar Colaborador";
			$variaveis['rodape'] = "Desenvolvido por SuportHelp";

			// retorna todas as variaveis do select do sistema
			// selects da operacao 1
			$variaveis['colaboradorEstadoCivil'] = $this->Colaborador_model->retornaTodosEstadoCivil();
			$variaveis['colaboradorRaca'] = $this->Colaborador_model->retornaTodosRaca();
			$variaveis['colaboradorEscolaridade'] = $this->Colaborador_model->retornaTodosEscolaridade();

			// selects da operacao 2
			$variaveis['colaboradorTipoLogradouro'] = $this->Colaborador_model->retornaTodosTipoLogradouro();
			$variaveis['colaboradorUfResidencia'] = $this->Colaborador_model->retornaTodosUf();
			$variaveis['colaboradorCidade'] = $this->Colaborador_model->retornaTodosCidade();

			// selects da operacao 3
			$variaveis['colaboradorNascimento'] = $this->Colaborador_model->retornaTodosNascimento();
			$variaveis['colaboradorNacionalidade'] = $this->Colaborador_model->retornaTodosNacionalidade();
			$variaveis['colaboradorUfNascimento'] = $this->Colaborador_model->retornaTodosUfNascimento();
			$variaveis['colaboradorCidadeNascimento'] = $this->Colaborador_model->retornaTodosCidadeNascimento();

			// selects da operacao 4
			$variaveis['colaboradorUfExpedicaoCTPS'] = $this->Colaborador_model->retornaTodosEstadosCTPS();

			// selects da operacao 5
			$variaveis['colaboradorTipoContrato'] = $this->Colaborador_model->retornaTodosTipoContrato();
			$variaveis['colaboradorCargo'] = $this->Colaborador_model->retornaTodosCargo();
			$variaveis['colaboradorPeridiocidade'] = $this->Colaborador_model->retornaTodosPeridiocidade();

			// função para trazer a consulta com o inner join na tabela
			$variaveis['colaboradores'] = $this->Colaborador_model->geteditarColaboradores($id);
			$this->load->view('colaboradores_editar', $variaveis);

		}
	}

	// busca cidades cadastradas
	public function buscaCidadesEstados()
	{
		$this->load->model("Colaborador_model");

		$cidades = $this->Colaborador_model->retornaCidadesEstados();

		$option = "<option value=''>Selecione</option>";
		foreach($cidades -> result() as $linha) {
			$option .= "<option value='$linha->id'>$linha->nomecidade</option>";
		}

		echo $option;
	}

	// busca cidades da nacinalidade
	public function buscaCidadesEstadosNacionalidade()
	{
		$this->load->model("Colaborador_model");

		$cidades = $this->Colaborador_model->retornaCidadesEstadosNacionalidade();

		$option = "<option value=''>Selecione</option>";
		foreach($cidades -> result() as $linha) {
			$option .= "<option value='$linha->id'>$linha->nomecidade</option>";
		}

		echo $option;
	}

	// colaborador desativar
	public function colaboradorDesativar ($id)
	{
			$this->load->model("Colaborador_model");
			$dados['ativo'] = 0;
			if ($this->Colaborador_model->desativarColaborador($id, $dados))
			{
				$variaveis['mensagem'] = "Dados alterados com sucesso!";
				$this->load->view('v_sucesso_alterar_empregador', $variaveis);

			}
			else
			{
				$variaveis['mensagem'] = "Erro. Não foi possível alterar o registro";
				$this->load->view('errors/html/v_erro', $variaveis);
			}
	}

	// colaborador ativar
	public function colaboradorAtivar ($id)
	{
		$this->load->model("Colaborador_model");
		$dados['ativo'] = 1;
		if ($this->Colaborador_model->ativarColaborador($id, $dados))
		{
			$variaveis['mensagem'] = "Dados alterados com sucesso!";
			$this->load->view('v_sucesso_alterar_empregador', $variaveis);

		}
		else
		{
			$variaveis['mensagem'] = "Erro. Não foi possível alterar o registro";
			$this->load->view('errors/html/v_erro', $variaveis);
		}
	}
}
