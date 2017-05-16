<?php
/**
* Description of Colaborador_Model
*
* @author rafael
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

	/**
	* Deleta um registro.
	* @param $id do registro a ser deletado
	* @return boolean;
	*/
	public function deletar($id = null) {
		if ($id) {
			$this->db->where('cpfColaborador', $id)->delete('dependentes');
			return $this->db->where('cpf', $id)->delete('colaboradores');
		}
	}


	// função para retornar os países
  public function retornaPaises()
	{
		$this->db->order_by("nome","asc");
		$consulta = $this->db->get("paises");
		return $consulta;
	}

	//função para retornar os estados
	public function retornaEstados()
	{
		$this->db->order_by("nome","asc");
		$consulta = $this->db->get("estados");
		return $consulta;
	}

	// retorna os campos raça do select raça e cor
	public function retornaRacaCor()
	{
		$this->db->order_by("descricao", "asc");
		$consulta = $this->db->get("racacor");
		return $consulta;
	}

	// retorna os camopos do select de escolaridade / grau de instrução
	public function retornaEscolaridade()
	{
		$this->db->order_by("descricao", "asc");
		$consulta = $this->db->get("grauinstrucao");
		return $consulta;
	}

	// retorna os países de nascimento
	public function retornaPaisNascimento()
	{
		$this->db->order_by("nome", "asc");
		$consulta = $this->db->get("paises");
		return $consulta;
	}

	// retorna o pais de nacionalidade
	public function retornaPaisNacionalidade()
	{
		$this->db->order_by("nome", "asc");
		$consulta = $this->db->get("paises");
		return $consulta;
	}

	// retorna logradouro
	public function retornaLogradouro()
	{
		$this->db->order_by("nome", "asc");
		$consulta = $this->db->get("tipologradouro");
		return $consulta;
	}

	// retorna a categoria do trabalhador
	public function retornaCategoriaTrabalhador()
	{
		$this->db->order_by("descricao", "asc");
		$consulta = $this->db->get("categoriatrabalhador");
		return $consulta;
	}

	// retorna tipo de contrato
	public function retornaTipoContrato()
	{
		$this->db->order_by("descricao", "asc");
		$consulta = $this->db->get("tipocontrato");
		return $consulta;
	}

	// retorna periodicidade de salário
	public function retornaPeridiocidade()
	{
		$this->db->order_by("descricao", "desc");
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
		$this->db->order_by("nome", "asc");
		$consulta = $this->db->get("cidades");
		return $consulta;
	}

	// retorna cidades cadastradas da nacionalidade
	public function retornaCidadesEstadosNacionalidade()
	{
		$idEstado = $this->input->post("idEstados");
		$this->db->where("idEstado", $idEstado);
		$this->db->order_by("nome", "asc");
		$consulta = $this->db->get("cidades");
		return $consulta;
	}



}
