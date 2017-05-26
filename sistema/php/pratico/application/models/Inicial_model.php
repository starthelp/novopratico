<?php
/**
* Description of Index_Model
*
* @author starthelp
*/
class Inicial_model extends CI_Model {


	public function dadosusuarioLogado($userLogado)
	{
		$this->db->select('
		id,
		tituloeleitor,
		irrfrecibo
		');
		$this->db->from('empregadores');
		$this->db->where('id',$userLogado);
		$queryEmpregadores = $this->db->get();
		return $queryEmpregadores->result();
	}

}
