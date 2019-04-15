<?php
class Admin extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Data_model');
    $this->load->model('Admin_model');
	$this->load->helper('url');	
   //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            redirect('/login');
        }
    if($this->session->userdata('ses_level')!="admin"){
	echo '<script language="javascript">alert("Please Login Admin"); document.location="../Petugas/index";</script>';		
    	//redirect('User/index');
    }


  }
  public function createXLS() {
		// load excel library
        $this->load->library('excel');
        
		// create file name
        $fileName = 'data-'.time().'.xlsx';  
		$empInfo = $this->Data_model->employeeList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'NO REKAP');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'ID PELANGGAN');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'NAMA PELANGGAN');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ALAMAT');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'TARIF');
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'DAYA');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'KODUK');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'GARDU');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'TIANG');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'FOTO_SEBELUM');
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'FOTO_SESUDAH');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'TANGGAL');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'KORDINAT');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'KETERANGAN');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['NO']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['ID_PELANGGAN']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['NAMA']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['ALAMAT']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['TARIF']);

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['DAYA']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['KODUK']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['GARDU']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['TIANG']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['FOTO_SEBELUM']);

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['FOTO_SESUDAH']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['TANGGAL']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['KORDINAT']);

            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['KETERANGAN']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(ROOT_UPLOAD_IMPORT_PATH.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(HTTP_UPLOAD_IMPORT_PATH.$fileName);        
    }
 
  function index(){
    $this->load->view('v_dashboard');
  }

  function ttd(){
  	 $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data | TechArise';
        $data['employeeInfo'] = $this->Data_model->employeeList();
		// load view file for output
    $this->load->view('v_rekapeexcel', $data);
  }



  function tambah_petugas(){
    if($this->session->userdata('akses')=='admin' )
    {

		$this->load->view('v_tambah_petugas');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
   }

   	 function input_aksi_petugas(){
    if($this->session->userdata('akses')=='admin')
    {

		$nama=$this->input->post('username');
		$nama_lengkap=$this->input->post('nama_lengkap');
		$jabatan=$this->input->post('jabatan');
		$password=$this->input->post('password');
		$level=$this->input->post('level');
				
		$table='user';
		$data=array(

			'username' => $nama,
			'password' => $password,
			'level' => $level,
			'nama_lengkap' => $nama_lengkap,
			'jabatan' => $jabatan,
			
			);
		
		$this->Admin_model->input_data($table,$data);
		redirect('Admin/lihat_data_petugas');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }

    
  function lihat_data_petugas(){

    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='admin')
    {
		//$where=array('level'=>'petugas');
		
		$where='';
		$data['user']=$this->Admin_model->lihat_data($where,'user')->result();
		$this->load->view('v_lihat_data_petugas.php',$data);
    }
    else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }

  function edit_petugas($id){
    
    if($this->session->userdata('akses')=='admin') 
    {
  	$where=array('id'=>$id);
  	$table='user';
	$data['user']=$this->Admin_model->edit_data($where,$table)->result();
	$this->load->view('v_edit_petugas',$data);
  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  

  function update_petugas($id){
	
    if($this->session->userdata('akses')=='admin' )
    {
		$nama=$this->input->post('username');
		$nama_lengkap=$this->input->post('nama_lengkap');
		$jabatan=$this->input->post('jabatan');
		$password=$this->input->post('password');
		//$level=$this->input->post('level');
				
		$table='user';
		$data=array(

			'username' => $nama,
			'password' => $password,
			'level' => 'petugas',
			'nama_lengkap' => $nama_lengkap,
			'jabatan' => $jabatan,
			
			);
		$where=array('id'=>$id);
		$this->Admin_model->update_data($where,$data,$table);
		
		redirect('Admin/lihat_data_petugas');	

	}
	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  


	function hapus_petugas($id){
		    if($this->session->userdata('akses')=='admin')
    {

		$where=array('id' => $id);
		$table='user';
		$this->Admin_model->hapus_data($where,$table);
		redirect('Admin/lihat_data_petugas');
	}
	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }




  function tambah_pelanggan(){
    if($this->session->userdata('akses')=='admin' )
    {

		$this->load->view('v_tambah_pelanggan');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
   }

   	 function input_aksi_pelanggan(){
    if($this->session->userdata('akses')=='admin')
    {
    	$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$pekerjaan=$this->input->post('pekerjaan');
		$daya=$this->input->post('daya');
		$kecamatan=$this->input->post('kecamatan');
		$desa=$this->input->post('desa');
		$rt=$this->input->post('rw');
		$rw=$this->input->post('rw');
				
		$table='pelanggan';
		$data=array(

			'id_pelanggan' => $id,
			'nama_pelanggan' => $nama,
			'pekerjaan_pelanggan' => $pekerjaan,
			'no_meteran' => $id,
			'daya' => $daya,
			'kecamatan' => $kecamatan,
			'desa' => $desa,
			'rt' => $rt,
			'rw' => $rw,
			
			);
		
		$this->Admin_model->input_data($table,$data);
		redirect('Admin/lihat_data_pelanggan');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }

    
    function lihat_data_pelanggan(){

    if($this->session->userdata('akses')=='admin' )
    {

      if (isset($_POST['q'])) {
      $data['ringkasan'] = $this->input->post('cari');
      // se session userdata untuk pencarian, untuk paging pencarian
      $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
      }
      else {

      $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
      }
  
    $this->load->model('Data_model');

    $this->db->like('ID', $data['ringkasan']);
        $this->db->from('datapln');

    // pagination limit
    $pagination['base_url'] = base_url().'Petugas/lihat_data_pelanggan/page/';
    $pagination['total_rows'] = $this->db->count_all_results();
    $pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
    $pagination['full_tag_close'] = "</div></p>";
    $pagination['cur_tag_open'] = "<span class=\"current\">";
    $pagination['cur_tag_close'] = "</span>";
    $pagination['num_tag_open'] = "<span class=\"disabled\">";
    $pagination['num_tag_close'] = "</span>";
    $pagination['per_page'] = "100";
    $pagination['uri_segment'] = 4;
    $pagination['num_links'] = 5;

    $this->pagination->initialize($pagination);

    $data['ListBerita'] = $this->Data_model->ambildata($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);

    $this->load->vars($data);  
    $this->load->view('v_lihat_data_pelanggan');
  }
  

  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }

  }
  function edit_pelanggan($id){
    
    if($this->session->userdata('akses')=='admin') 
    {
  	$where=array('ID'=>$id);
  	$table='datapln';
	$data['pelanggan']=$this->Admin_model->edit_data($where,$table)->result();
	$this->load->view('v_edit_pelanggan',$data);
  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  

  function update_pelanggan($id){
	
    if($this->session->userdata('akses')=='admin' )
    {
		$NAMA=$this->input->post('NAMA');
		$ALAMAT=$this->input->post('ALAMAT');
		$TARIF=$this->input->post('TARIF');
		$DAYA=$this->input->post('DAYA');
		$KODUK=$this->input->post('KODUK');
		$GARDU=$this->input->post('GARDU');
		$TIANG=$this->input->post('TIANG');
				
		$table='datapln';
		$data=array(
	
			'NAMA' => $NAMA,
			'ALAMAT' => $ALAMAT,
			'TARIF' => $TARIF,
			'DAYA' => $DAYA,
			'KODUK' => $KODUK,
			'GARDU' => $GARDU,
			'TIANG' => $TIANG,
			
			);
		
		$where=array('ID'=>$id);
		$this->Admin_model->update_data($where,$data,$table);
		
		redirect('Admin/lihat_data_pelanggan');	

	}
	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  


	function hapus_pelanggan($id){
		    if($this->session->userdata('akses')=='admin')
    {

		$where=array('ID' => $id);
		$table='datapln';
		$this->Admin_model->hapus_data($where,$table);
		redirect('Admin/lihat_data_pelanggan');
	}
	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }


   function lihat_data_tunggakan(){

    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='admin')
    {
		$where=array('keterangan_tagihan'=>'menunggak','status_blokir'=>'belum');
		$data['tagihan']=$this->Admin_model->lihat_data($where,'tagihan')->result();
		$this->load->view('v_lihat_data_calon_blokir.php',$data);
    }
    else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }

   function lihat_data_proses_blokir(){

    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='admin')
    {
		$where=array('keterangan_tagihan'=>'menunggak','status_blokir'=>'proses');
		$data['tagihan']=$this->Admin_model->lihat_data($where,'tagihan')->result();
		$this->load->view('v_lihat_data_proses_blokir.php',$data);
    }
    else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }


function hapus_blokir($id){
		    if($this->session->userdata('akses')=='admin')
    if($this->session->userdata('akses')=='admin')
    {

		$where=array('id_pelanggan' => $id);
		
		$data=array(
			'status_blokir' => 'belum',
			'keterangan_tagihan' => 'lunas',
			'total_bulan_tunggakan' => 0
			);

		$this->Admin_model->update_data($where,$data,'tagihan');
		redirect('Admin/lihat_data_proses_blokir');
	}
}


	function batal_blokir($id){
    if($this->session->userdata('akses')=='admin')
    {

		$where=array('id_pelanggan' => $id);
		
		//level diganti ke member
		$data=array(
			'status_blokir' => 'belum'
			);

		$this->Admin_model->update_data($where,$data,'tagihan');
		redirect('Admin/lihat_data_proses_blokir');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  


	function proses_blokir($id){
    if($this->session->userdata('akses')=='admin')
    {

		$where=array('id_pelanggan' => $id);
		
		//level diganti ke member
		$data=array(
			'status_blokir' => 'proses'
			);

		$this->Admin_model->update_data($where,$data,'tagihan');
		redirect('Admin/lihat_data_proses_blokir');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  



	function aktivasi_member($id){
    if($this->session->userdata('akses')=='admin' )
    {

		$where=array('id' => $id);
		
		//level diganti ke member
		$data=array(
			'level' => 'member'
			);

		$this->Admin_model->update_data($where,$data,'user');
		redirect('Admin/lihat_data_member');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  

	function deaktivasi_member($id){
    if($this->session->userdata('akses')=='admin')
    {

		$where=array('id' => $id);
		
		//level diganti ke member
		$data=array(
			'level' => 'publik'
			);

		$this->Admin_model->update_data($where,$data,'user');
		redirect('Admin/lihat_data_non_member');
	}

	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }

  
  function lihat_data_rekap(){
      if($this->session->userdata('akses')=='admin' )
    {

      if (isset($_POST['q'])) {
      $data['ringkasan'] = $this->input->post('cari');
      // se session userdata untuk pencarian, untuk paging pencarian
      $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
      }
      else {

      $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
      }
  
    $this->load->model('Data_model');

    $this->db->like('ID_PELANGGAN', $data['ringkasan']);
        $this->db->from('rekap_blokir');

    // pagination limit
    $pagination['base_url'] = base_url().'Petugas/lihat_rekap_blokir/page/';
    $pagination['total_rows'] = $this->db->count_all_results();
    $pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
    $pagination['full_tag_close'] = "</div></p>";
    $pagination['cur_tag_open'] = "<span class=\"current\">";
    $pagination['cur_tag_close'] = "</span>";
    $pagination['num_tag_open'] = "<span class=\"disabled\">";
    $pagination['num_tag_close'] = "</span>";
    $pagination['per_page'] = "100";
    $pagination['uri_segment'] = 4;
    $pagination['num_links'] = 5;

    $this->pagination->initialize($pagination);

    $data['ListBerita'] = $this->Data_model->ambildata_rekap($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);

    $this->load->vars($data);  
    $this->load->view('v_lihat_rekap_blokir');
  }
  
}

function input_aksi_rekap(){
    if($this->session->userdata('akses')=='admin')
    {
    $ID=$this->input->post('ID');
    $NAMA=$this->input->post('NAMA');
    $ALAMAT=$this->input->post('ALAMAT');
    $TARIF=$this->input->post('TARIF');
    $DAYA=$this->input->post('DAYA');
    $KODUK=$this->input->post('KODUK');
    $GARDU=$this->input->post('GARDU');
    $TIANG=$this->input->post('TIANG');
    $KORDINAT=$this->input->post('KORDINAT');
    $TANGGAL=$this->input->post('TANGGAL');
    $KETERANGAN=$this->input->post('KETERANGAN');

    $table='rekap_blokir';
    $data=array(

      'ID_PELANGGAN' => $ID,
      'NAMA' => $NAMA,
      'ALAMAT' => $ALAMAT,
      'TARIF' => $TARIF,
      'DAYA' => $DAYA,
      'KODUK' => $KODUK,
      'GARDU' => $GARDU,
      'TIANG' => $TIANG,
      'KORDINAT' => $KORDINAT,
      'TANGGAL' => $TANGGAL,
      'KETERANGAN' => $KETERANGAN,
      
      );
    
    $this->Admin_model->input_data($table,$data);
    redirect('Admin/lihat_data_rekap');
  }

  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }

  function edit_rekap($id){
    
    if($this->session->userdata('akses')=='admin') 
    {
    $where=array('ID_REKAP'=>$id);
    $table='rekap_blokir';
  $data['rekap']=$this->Admin_model->edit_data($where,$table)->result();
  $this->load->view('v_edit_rekap',$data);
  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  
  function update_rekap($id){
  
    if($this->session->userdata('akses')=='admin' )
    {
    
    $ID=$this->input->post('ID_PELANGGAN');
    $NAMA=$this->input->post('NAMA');
    $ALAMAT=$this->input->post('ALAMAT');
    $TARIF=$this->input->post('TARIF');
    $DAYA=$this->input->post('DAYA');
    $KODUK=$this->input->post('KODUK');
    $GARDU=$this->input->post('GARDU');
    $TIANG=$this->input->post('TIANG');
    $KORDINAT=$this->input->post('KORDINAT');
    $TANGGAL=$this->input->post('TANGGAL');
    $KETERANGAN=$this->input->post('KETERANGAN');

    $table='rekap_blokir';
    $data=array(

      'ID_PELANGGAN' => $ID,
      'NAMA' => $NAMA,
      'ALAMAT' => $ALAMAT,
      'TARIF' => $TARIF,
      'DAYA' => $DAYA,
      'KODUK' => $KODUK,
      'GARDU' => $GARDU,
      'TIANG' => $TIANG,
      'KORDINAT' => $KORDINAT,
      'TANGGAL' => $TANGGAL,
      'KETERANGAN' => $KETERANGAN,
      
      );
    
    $where=array('ID_REKAP'=>$id);
    $this->Admin_model->update_data($where,$data,$table);
    
    redirect('Admin/lihat_data_rekap'); 

  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  
	function hapus_rekap($id){
		    if($this->session->userdata('akses')=='admin')
    {

		$where=array('ID_REKAP' => $id);
		$table='rekap_blokir';
		$this->Admin_model->hapus_data($where,$table);
		redirect('Admin/lihat_data_rekap');
	}
	else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }

  function export_data_excel(){
      if($this->session->userdata('akses')=='admin' )
    {

      if (isset($_POST['q'])) {
      $data['ringkasan'] = $this->input->post('cari');
      // se session userdata untuk pencarian, untuk paging pencarian
      $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
      }
      else {

      $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
      }
  
    $this->load->model('Data_model');

    $this->db->like('ID_PELANGGAN', $data['ringkasan']);
        $this->db->from('rekap_blokir');

    // pagination limit
    $pagination['base_url'] = base_url().'Petugas/lihat_rekap_blokir/page/';
    $pagination['total_rows'] = $this->db->count_all_results();
    $pagination['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
    $pagination['full_tag_close'] = "</div></p>";
    $pagination['cur_tag_open'] = "<span class=\"current\">";
    $pagination['cur_tag_close'] = "</span>";
    $pagination['num_tag_open'] = "<span class=\"disabled\">";
    $pagination['num_tag_close'] = "</span>";
    $pagination['per_page'] = "100";
    $pagination['uri_segment'] = 4;
    $pagination['num_links'] = 5;

    $this->pagination->initialize($pagination);

    $data['ListBerita'] = $this->Data_model->ambildata_rekap($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);

    $this->load->vars($data);  
    $this->load->view('v_lihat_rekap_blokir_toexcel');
  }
  
}



}
?>