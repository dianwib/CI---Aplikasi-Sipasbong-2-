<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gambar_model extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  //fetch all pictures from db
  public function get_all()
  {
    return $this->db->get('rekap_blokir')->result();
  }
 
  public function insert_berhasil($data)
  {

    $this->db->insert('REKAP_BERHASIL', $data);
  }

  public function insert_gagal($data)
  {
    
    $this->db->insert('REKAP_GAGAL', $data);
  }
}

?>