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

}
