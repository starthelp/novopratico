<?php
/**
* Description of Login_Model
*
* @author starthelp
*/
class Login_model extends CI_Model {

	public function buscaPorEmailSenha($email, $senha) {
			 $this->db->where("email", $email);
			 $this->db->where("senha", $senha);
			 $usuario = $this->db->get("empregadores")->row_array();
			 return $usuario;
	 }

	 public function destruirSessao ()
	 {
				$this->session->unset_userdata('usuairo_logado');
				return true;
	 }
}
