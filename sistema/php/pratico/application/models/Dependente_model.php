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

		if ($dados) {
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("dependentes", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("dependentes", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}

	}
	/**
	* Recupera o registro do banco de dados
	* @param $id - Se indicado, retorna somente um registro, caso contário, todos os registros.
	* @return objeto da banco de dados da tabela cadastros
	*/
	public function get($id = null){

		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'nome');
		return $this->db->get('dependentes');
	}
	/**
	* Deleta um registro.
	* @param $id do registro a ser deletado
	* @return boolean;
	*/
	public function delete($id = null){
		if ($id) {
			return $this->db->where('id', $id)->delete('dependentes');
		}
	}
	
}
