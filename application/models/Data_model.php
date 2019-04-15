<?php 
 
class Data_model extends CI_Model{

		function ambildata($perPage, $uri, $ringkasan) {

			$this->db->select('*');
			$this->db->from('datapln');
		if (!empty($ringkasan)) {
				$this->db->like('ID', $ringkasan);
		}
			$this->db->order_by('ID','asc');
			$getData = $this->db->get('', $perPage, $uri);

		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	function ambildata_rekap($perPage, $uri, $ringkasan) {

			$this->db->select('*');
			$this->db->from('rekap_blokir');
		if (!empty($ringkasan)) {
				$this->db->like('ID_PELANGGAN', $ringkasan);
		}
			$this->db->order_by('ID_REKAP','asc');
			$getData = $this->db->get('', $perPage, $uri);
		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}

	public function employeeList() {
        $this->db->select(array('e.ID_REKAP', 'e.ID_PELANGGAN', 'e.NAMA', 'e.ALAMAT', 'e.TARIF', 'e.DAYA', 'e.KODUK', 'e.GARDU', 'e.TIANG', 'e.FOTO_SEBELUM', 'e.FOTO_SESUDAH', 'e.TANGGAL', 'e.KORDINAT', 'e.KETERANGAN'));
        $this->db->from('rekap_blokir as e');
        $query = $this->db->get();
        return $query->result_array();
    }

}

