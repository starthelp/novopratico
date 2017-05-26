<?php
/**
* Description of Empregadores_model
*
* @author StartHelp
*/
class Empregador_model extends CI_Model {

	/**
	* Grava os dados na tabela.
	* @param $dados. Array que contém os campos a serem inseridos
	* @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	* @return boolean
	*/
	public function store($dados = null, $id = null) { // função para salvar e alterar

		$this->load->database(); // faz o locad do DataBase

		if ($this->db->insert("empregadores", $dados))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function atualizar($dados, $emailEmpregador)
	{
		$this->load->database(); // faz o locad do DataBase
		$this->db->where('empregadores.email',$emailEmpregador);
		// se alterado com sucesso, então
		if ($this->db->update('empregadores',$dados))
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
			return $this->db->where('id', $id)->delete('empregadores');
		}
	}

	// função para retornar os colaboradres
	public function retornaColaboradores()
	{
		$this->db->order_by("nome", "asc");
		$consulta = $this->db->get("colaboradores");
		return $consulta;
	}

	// função para atualizar senha
	public function atualizarSenha ($password_hash, $id)
	{
		$wp_wordpress = $this->load->database('wordpress', TRUE);
		$wp_wordpress->where('ID',$id);
		// se alterado com sucesso, então
		if ($wp_wordpress->update('wp_users',array('user_pass' => $password_hash)))
		{
			return true;
		}
		else {
			// erro ao alterar o registro
			return false;
		}
		$wp_wordpress->close();
	}

	// retorna estados
	public function retornaEstado ()
	{
		$this->db->order_by("nomeestado", "asc");
		$consulta = $this->db->get("estados");
		return $consulta;
	}

	// retorna cidades do empregador
	public function retornaCidadesEstados ()
	{
		$idEstado = $this->input->post("idEstados");
		$this->db->where("idEstado", $idEstado);
		$this->db->order_by("nomecidade", "asc");
		$consulta = $this->db->get("cidades");
		return $consulta;
	}


	public function geteditarEmpregador($emailEmpregador)
	{
		$this->db->select('
		empregadores.id,
		empregadores.nomeempregador,
		empregadores.nascimentoemp,
		empregadores.login,
		empregadores.sexo,
		empregadores.cpf,
		empregadores.tituloeleitor,
		empregadores.irrfreciboemp,
		empregadores.senha,
		empregadores.telefone,
		empregadores.celular,
		empregadores.email,
		empregadores.logradouro,
		empregadores.tipologradouro,
		empregadores.cep,
		empregadores.numlogradouro,
		empregadores.complemento,
		empregadores.bairro,
		empregadores.idmunicipio,
		empregadores.iduf,
		tipologradouro.nomelogradouro,
		estados.nomeestado,
		cidades.nomecidade
		');
		$this->db->from('empregadores');
		$this->db->join('tipologradouro','empregadores.tipologradouro = tipologradouro.id','inner');
		$this->db->join('estados','empregadores.iduf = estados.id','inner');
		$this->db->join('cidades','empregadores.idmunicipio = cidades.id','inner');
		$this->db->where('email',$emailEmpregador);
		$queryEmpregadores = $this->db->get();
		return $queryEmpregadores->result();
	}

	public function retornaEmpregadorBase ($emailEmpregador)
	{
		$this->db->select('*');
		$this->db->from('empregadores');
		$this->db->where('email',$emailEmpregador);
		$queryEmpregadores = $this->db->get();
		return $queryEmpregadores->result();
	}

	public function retornaEmpregadorAtivo ($emailEmpregador)
	{
		$this->db->select('ativo');
		$this->db->from('empregadores');
		$this->db->where('email',$emailEmpregador);
		$queryEmpregadores = $this->db->get();
		return $queryEmpregadores->result();
	}

	// retorna todas os estados cadastrados
	public function retornatodosEstados ()
	{
		$this->db->select("*");
		$this->db->order_by("nomeestado", "asc");
		return $this->db->get("estados")->result();
	}

	// retorna todos os tipos de logradouro

	public function retornatodosLogradouro ()
	{
		$this->db->select("*");
		$this->db->order_by("nomelogradouro", "asc");
		return $this->db->get("tipologradouro")->result();
	}

}
