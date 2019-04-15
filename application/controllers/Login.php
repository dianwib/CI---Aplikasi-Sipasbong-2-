<?php
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');	
	}


	
	function index(){
	 if($this->session->userdata('akses')=="admin"){
	 	echo '<script language="javascript">alert("Logout terlebih dahulu"); document.location="'.base_url().'Admin/index";</script>' ;		
		    	}
    else if($this->session->userdata('akses')=="petugas"){
	 		echo '<script language="javascript">alert("Logout terlebih dahulu"); document.location="'.base_url().'Petugas/index";</script>' ;		
		
	 	}
    	
    else{
		$this->load->view('v_login');
		}
}

	function auth(){
		$id=htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
		$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$cek_admin=$this->Login_model->auth_admin($id,$password);
		if ($cek_admin->num_rows() != 0){
			$data=$cek_admin->row_array();
			$this->session->set_userdata('masuk',TRUE);
			if($data['level']=='admin')//admin
			{
				$this->session->set_userdata('akses','admin');	
				$this->session->set_userdata('ses_id',$data['id']);
				$this->session->set_userdata('ses_nama',$data['username']);

				$this->session->set_userdata('ses_jabatan',$data['jabatan']);
				$this->session->set_userdata('ses_nama_lengkap',$data['nama_lengkap']);
				$this->session->set_userdata('ses_level',$data['level']);
				echo '<script language="javascript">alert("Login berhasil"); document.location="'.base_url().'Admin/index";</script>' ;	
			}
			else//petugas
			{
				$cek_user=$this->Login_model->auth_petugas($id,$password);
				if ($cek_user->num_rows() != 0){
					$data=$cek_user->row_array();
					$this->session->set_userdata('masuk',TRUE);
					$this->session->set_userdata('akses','petugas');
					$this->session->set_userdata('ses_jabatan',$data['jabatan']);
					$this->session->set_userdata('ses_id',$data['id']);
					$this->session->set_userdata('ses_nama_lengkap',$data['nama_lengkap']);
					$this->session->set_userdata('ses_level',$data['level']);
					echo '<script language="javascript">alert("Login berhasil"); document.location="'.base_url().'Petugas/index";</script>' ;		
				}
			}
}
		else//jika password dan username tidak sah
		{
				echo '<script language="javascript">alert("Login tidak berhasil, harap daftar terlebih dahulu"); document.location="'.base_url().'login";</script>';		
			}
		}
		


	function logout(){
		$this->session->sess_destroy();
				echo '<script language="javascript">alert("Logout"); document.location="'.base_url().'login";</script>';			
		}	



}
?>
