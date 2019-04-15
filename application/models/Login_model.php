<?php

class Login_model extends CI_Model
{
	
	public function auth_admin($id,$password){
		$query=$this->db->query("SELECT * FROM user where id='$id' AND password='$password' or username='$id' AND password='$password' Limit 1 ");
		return $query;
	}
	

	public function auth_petugas($id,$password){
		$query=$this->db->query("SELECT * FROM user where id='$id' AND password='$password' or username='$id' AND password='$password' Limit 1 ");
		return $query;
	}
}
?>
