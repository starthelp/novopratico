<?php
/**
* Description of Dependente_Model
*
* @author rafael
*/
class Dependente_model extends CI_Model {

	/**
	* Grava os dados na tabela.
	* @param $dados. Array que contém os campos a serem inseridos
	* @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	* @return boolean
	*/
	public function store($dados = null, $id = null) { // função para salvar e alterar

		$this->load->database(); // faz o locad do DataBase

		if ($this->db->insert("dependentes", $dados))
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
		$this->load->database(); // faz o locad do DataBase
		$this->db->where('id',$id);
		// se alterado com sucesso, então
		if ($this->db->update('dependentes',$dados))
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
			return $this->db->where('id', $id)->delete('dependentes');
		}
	}

	public function retornaColaboradores()
	{
		$this->db->order_by("nome", "asc");
		$consulta = $this->db->get("colaboradores");
		return $consulta;
	}

}
