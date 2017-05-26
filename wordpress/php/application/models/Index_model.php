<?php
/**
* Description of UsuarioModel

* @author StartHelp
*/
class Index_model extends CI_Model {

	public function __construct()
	{
		// função construct para carregar as informações do sistema
		parent::__construct();
		$this->load->database();
	}
	// retorna o usuario logado no sistema
	public function retornaUsuarioLogado($login, $email)
	{
		$this->db->select("*");
		$this->db->where("email", $email);
		$this->db->where("login", $login);
		$usuario = $this->db->get("empregadores");

		if ($usuario->num_rows() < 1)
		{
			return false;
		}
		else
		{
			return $usuario = $this->db->get("empregadores")->row_array();
		}
	}

	public function dadosusuarioLogado($userLogado)
	{
		$this->db->select('
		id,
		tituloeleitor,
		irrfreciboemp
		');
		$this->db->from('empregadores');
		$this->db->where('id',$userLogado);
		$queryEmpregadores = $this->db->get();
		return $queryEmpregadores->result();
	}

	public function insertUsuarioLogado($dados)
	{
		if ($this->db->insert("empregadores", $dados))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
