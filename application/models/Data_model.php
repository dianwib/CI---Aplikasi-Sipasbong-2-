<?php 
 
class Data_model extends CI_Model{


function ambildata_perintah_all($perPage, $uri, $ringkasan) {

			$this->db->select('*');
			
			
			$this->db->from('data_perintah');
			$this->db->join('datapln','datapln.ID=data_perintah.ID_PELANGGAN');
			
		if (!empty($ringkasan)) {
				$this->db->like('KATEGORI', $ringkasan);
		}
			$this->db->order_by('TANGGAL','asc');
			$getData = $this->db->get('', $perPage, $uri);
		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}


	function ambildata_perintah($perPage, $uri, $ringkasan) {

			$this->db->select('*');
			$this->db->WHERE('STATUS','BELUM DIKERJAKAN');
			
			$this->db->from('data_perintah');
			$this->db->join('datapln','datapln.ID=data_perintah.ID_PELANGGAN');
			
		if (!empty($ringkasan)) {
				$this->db->like('KATEGORI', $ringkasan);
		}
			$this->db->order_by('TANGGAL','asc');
			$getData = $this->db->get('', $perPage, $uri);
		if ($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	

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
			$this->db->from('REKAP_BERHASIL');
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

function ambildata_gagal($perPage, $uri, $ringkasan) {

			$this->db->select('*');
			$this->db->from('REKAP_GAGAL');
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

