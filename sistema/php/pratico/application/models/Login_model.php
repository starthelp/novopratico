<?php
/**
* Description of Login_Model
*
* @author rafael
*/
class Login_model extends CI_Model {

	public function buscaPorEmailSenha($email, $senha) {
			 $this->db->where("email", $email);
			 $this->db->where("senha", $senha);
			 $usuario = $this->db->get("empregadores")->row_array();
			 return $usuario;
	 }

	 public function destruirSessao () {
				$this->session->set_userdata('usuario_logado', FALSE);
				$this->session->session_destroy();
				return true;
	 }
}
