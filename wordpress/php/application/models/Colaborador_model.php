<?php
/**
* Description of Colaborador_Model
*
* @author StartHelp
*/
class Colaborador_model extends CI_Model {

	/**
	* Grava os dados na tabela.
	* @param $dados. Array que contém os campos a serem inseridos
	* @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	* @return boolean
	*/
	public function store($dados = null, $id = null) { // função para salvar e alterar

		$this->load->database(); // faz o locad do DataBase

		if ($this->db->insert("colaboradores", $dados))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function atualizar($dados, $id)
	{
		$this->load->database(); // faz o load do DataBase
		$this->db->where('cpf',$id);
		// se alterado com sucesso, então
		if ($this->db->update('colaboradores',$dados))
		{
			return true;
		}
		else {
			// erro ao alterar o registro
			return false;
		}

	}

	// função para retornar os países
	public function retornaPaises()
	{
		$this->db->order_by("nomepais","asc");
		$consulta = $this->db->get("paises");
		return $consulta;
	}

	//função para retornar os estados
	public function retornaEstados()
	{
		$this->db->order_by("nomeestado","asc");
		$consulta = $this->db->get("estados");
		return $consulta;
	}

	// retorna os campos raça do select raça e cor
	public function retornaRacaCor()
	{
		$this->db->order_by("descricaoracacor", "asc");
		$consulta = $this->db->get("racacor");
		return $consulta;
	}

	// retorna os camopos do select de escolaridade / grau de instrução
	public function retornaEscolaridade()
	{
		$this->db->order_by("descricaograu", "asc");
		$consulta = $this->db->get("grauinstrucao");
		return $consulta;
	}

	// retorna os países de nascimento
	public function retornaPaisNascimento()
	{
		$this->db->order_by("nomepais", "asc");
		$consulta = $this->db->get("paises");
		return $consulta;
	}

	// retorna o pais de nacionalidade
	public function retornaPaisNacionalidade()
	{
		$this->db->order_by("nomepais", "asc");
		$consulta = $this->db->get("paises");
		return $consulta;
	}

	// retorna logradouro
	public function retornaLogradouro()
	{
		$this->db->order_by("nomelogradouro", "asc");
		$consulta = $this->db->get("tipologradouro");
		return $consulta;
	}

	// retorna a categoria do trabalhador
	public function retornaCategoriaTrabalhador()
	{
		$this->db->order_by("descricaocattrab", "asc");
		$consulta = $this->db->get("categoriatrabalhador");
		return $consulta;
	}

	// retorna tipo de contrato
	public function retornaTipoContrato()
	{
		$this->db->order_by("descricaotipocont", "asc");
		$consulta = $this->db->get("tipocontrato");
		return $consulta;
	}

	// retorna periodicidade de salário
	public function retornaPeridiocidade()
	{
		$this->db->order_by("descricaoper", "desc");
		$consulta = $this->db->get("peridiocidadesalario");
		return $consulta;
	}

	// retorna estado civil
	public function retornaEstadoCivil()
	{
		$this->db->order_by("id", "ASC");
		$consulta = $this->db->get("estadocivil");
		return $consulta;
	}

	// retorna cidades cadastradas
	public function retornaCidadesEstados()
	{
		$idEstado = $this->input->post("idEstados");
		$this->db->where("idEstado", $idEstado);
		$this->db->order_by("nomecidade", "asc");
		$consulta = $this->db->get("cidades");
		return $consulta;
	}

	// retorna cidades cadastradas da nacionalidade
	public function retornaCidadesEstadosNacionalidade()
	{
		$idEstado = $this->input->post("idEstados");
		$this->db->where("idEstado", $idEstado);
		$this->db->order_by("nomecidade", "asc");
		$consulta = $this->db->get("cidades");
		return $consulta;
	}

	/******* retorna todos os cadastros sem consullta utilizado para editar o cadastro de colaboradores */
	/* retorna selects da operacao 1 */
	public function retornaTodosEstadoCivil()
	{
		$this->db->select("*");
		return $this->db->get("estadocivil")->result();
	}
	public function retornaTodosRaca ()
	{
		$this->db->select("*");
		return $this->db->get("racacor")->result();
	}
	public function retornaTodosEscolaridade ()
	{
		$this->db->select("*");
		return $this->db->get("grauinstrucao")->result();
	}
	/* retorna selects da operacao 2 */
	public function retornaTodosTipoLogradouro ()
	{
		$this->db->select("*");
		return $this->db->get("tipologradouro")->result();
	}
	public function retornaTodosUf ()
	{
		$this->db->select("*");
		return $this->db->get("estados")->result();
	}

	public function retornaTodosCidade ()
	{
		$this->db->select("*");
		return $this->db->get("cidades")->result();
	}

	/* retorna selects da opercao 3 */
	public function retornaTodosNascimento ()
	{
		$this->db->select("*");
		return $this->db->get("paises")->result();
	}
	public function retornaTodosNacionalidade ()
	{
		$this->db->select("*");
		return $this->db->get("paises")->result();
	}

	// retorna todos uf de nascimento
	public function retornaTodosUfNascimento ()
	{
		$this->db->select("*");
		return $this->db->get("estados")->result();
	}

	// retorna todos cidade de nascimento
	public function retornaTodosCidadeNascimento ()
	{
		$this->db->select("*");
		return $this->db->get("cidades")->result();
	}

	// retorna dados da operacao 4
	public function retornaTodosEstadosCTPS ()
	{
		$this->db->select("*");
		return $this->db->get("estados")->result();
	}

	/* retorna selects da operacao 5 */
	public function retornaTodosTipoContrato ()
	{
		$this->db->select("*");
		return $this->db->get("tipocontrato")->result();
	}
	public function retornaTodosCargo ()
	{
		$this->db->select("*");
		return $this->db->get("categoriatrabalhador")->result();
	}
	public function retornaTodosPeridiocidade ()
	{
		$this->db->select("*");
		return $this->db->get("peridiocidadesalario")->result();
	}

	// inner join colaboradores com as demais tabelas
	public function geteditarColaboradores ($id)
	{
		$this->db->select('
		colaboradores.cpf,
		colaboradores.idraca,
		colaboradores.idestadocivil,
		colaboradores.idgrauinstrucao,
		colaboradores.idestado,
		colaboradores.idmunicipio,
		colaboradores.idmunicipionascimento,
		colaboradores.idufnascimento,
		colaboradores.idpaisnascimento,
		colaboradores.idpaisnacionalidade,
		colaboradores.idtipocontrato,
		colaboradores.idtipocargo,
		colaboradores.idperidiocidade,
		colaboradores.tipologradouro,
		colaboradores.nomecolaborador,
		colaboradores.nascimentocol,
		colaboradores.email,
		colaboradores.telefone,
		colaboradores.celular,
		colaboradores.sexo,
		colaboradores.logradouro,
		colaboradores.numlogradouro,
		colaboradores.cep,
		colaboradores.complemento,
		colaboradores.bairro,
		colaboradores.ctps,
		colaboradores.seriectps,
		colaboradores.nis,
		colaboradores.pis,
		colaboradores.ufctps,
		colaboradores.primeiroemprego,
		colaboradores.salariobase,
		colaboradores.localtrabalho,
		colaboradores.numerolocaltrabalho,
		colaboradores.dataadmissao,
		racacor.descricaoracacor,
		grauinstrucao.descricaograu,
		cidades.id,
		a1.id as cidades,
		estados.id,
		e1.id as estados,
		e2.id as estados,
		estados.nomeestado as nomestadores,
		e1.nomeestado as nomestadonasc,
		e2.nomeestado as nomestadoctps,
		estadocivil.descricaoestcivil,
		tipologradouro.nomelogradouro,
		cidades.nomecidade as nomecidaderes,
		a1.nomecidade as nomecidadenasc,
		paises.nomepais,
		peridiocidadesalario.descricaoper,
		categoriatrabalhador.descricaocattrab,
		tipocontrato.descricaotipocont
		');
		$this->db->from('colaboradores');
		$this->db->join('estadocivil','colaboradores.idestadocivil = estadocivil.id','inner');
		$this->db->join('racacor','colaboradores.idraca = racacor.id','inner');
		$this->db->join('grauinstrucao','colaboradores.idgrauinstrucao = grauinstrucao.id','inner');
		$this->db->join('estados','colaboradores.idestado = estados.id','inner');
		$this->db->join('estados e1','colaboradores.idufnascimento = e1.id','inner');
		$this->db->join('estados e2','colaboradores.ufctps = e2.id','inner');
		$this->db->join('tipologradouro','colaboradores.tipologradouro = tipologradouro.id','inner');
		$this->db->join('cidades','colaboradores.idmunicipio = cidades.id','inner');
		$this->db->join('cidades a1','colaboradores.idmunicipionascimento = a1.id','inner');
		$this->db->join('paises','colaboradores.idpaisnascimento, colaboradores.idpaisnacionalidade = paises.id','inner');
		$this->db->join('tipocontrato','colaboradores.idtipocontrato = tipocontrato.id','inner');
		$this->db->join('categoriatrabalhador','colaboradores.idtipocargo = categoriatrabalhador.id','inner');
		$this->db->join('peridiocidadesalario','colaboradores.idperidiocidade = peridiocidadesalario.id','inner');
		$this->db->where('cpf',$id);
		$queryColaboradores = $this->db->get();
		return $queryColaboradores->result();
	}

	// desativar o colaborador
	public function desativarColaborador($id, $dados)
	{
		if ($id)
		{
			$this->load->database(); // faz o load do DataBase
			$this->db->where('cpf',$id);
			// se alterado com sucesso, então
			if ($this->db->update('colaboradores',$dados))
			{
				return true;
			}
			else {
				// erro ao alterar o registro
				return false;
			}
		}
	}

	// ativar colaborador
	public function ativarColaborador($id, $dados)
	{
		if ($id)
		{
			$this->load->database(); // faz o load do DataBase
			$this->db->where('cpf',$id);
			// se alterado com sucesso, então
			if ($this->db->update('colaboradores',$dados))
			{
				return true;
			}
			else {
				// erro ao alterar o registro
				return false;
			}
		}
	}

}
