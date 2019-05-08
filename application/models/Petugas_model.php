<?php

class Petugas_model extends CI_Model
{

	
	public function lihat_data($where,$table){
		if ($where == '') {//dari kontrolerr admin method lihat_data event
		//mengurutkan jam
		//$this->db->order_by('id','ASC');		
		return $this->db->get($table);
		}
		else{
		return $this->db->get_where($table,$where);	
		}
		
	}
	
	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}


	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
			
	}
	public function input_data($table,$data){
		$this->db->insert($table,$data);
	}
	

}
?>