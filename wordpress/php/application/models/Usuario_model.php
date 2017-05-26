<?php
/**
* Description of UsuarioModel

* @author StartHelp
*/
class Usuario_model extends CI_Model {

	public function __construct()
	{
		// função construct para carregar as informações do sistema
		parent::__construct();
		$this->load->database();
	}
	// retorna o usuario logado no sistema
	public function retornaUsuarioLogado($login, $email)
	{
		$this->db->where("email", $email);
		$this->db->where("login", $login);
		$usuario = $this->db->get("empregadores")->row_array();
		return $usuario;
	}

	public function destruirSessao ()
	{
			 $this->session->unset_userdata('usuario_logado');
			 return true;
	}

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
