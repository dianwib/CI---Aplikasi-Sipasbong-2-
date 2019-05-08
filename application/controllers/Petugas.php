<?php
class Petugas extends CI_Controller{
 function __construct(){
    parent::__construct();
    $this->load->model('Petugas_model');
    $this->load->model('Data_model');
    $this->load->model('Gambar_model');
    $this->load->library('upload');
        
    $this->load->helper('url'); 
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            redirect('/login');
        }
    if($this->session->userdata('ses_level')!="petugas"){
  echo '<script language="javascript">alert("Please Login User"); document.location="../Admin/index";</script>';    
    }

  }

function cetak_perintah($id){
    if($this->session->userdata('akses')=='petugas')
    {
 
    $where=array('ID_PERINTAH'=>$id);
    $table='data_perintah';
    $this->db->join('datapln','data_perintah.ID_PELANGGAN=datapln.ID'); 
  
    $data['rekap']=$this->Petugas_model->edit_data($where,$table)->result();
    $this->load->view('v_lihat_download_perintah_perrekap_topdf',$data);
    
$html = $this->output->get_output();
$this->load->library('pdf');
$this->dompdf->loadHtml($html);
$this->dompdf->setPaper('A4', 'potrait');
$this->dompdf->render();
$this->dompdf->stream("hasilRekap.pdf", array("Attachment"=>0));


  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }




  function tambah_rekap_blokir($id){
    
    if($this->session->userdata('akses')=='petugas') 
    {
    $where=array('ID'=>$id);
    $table='data_perintah';
    $this->db->join('datapln','datapln.ID=data_perintah.ID_PELANGGAN');    
  $data['datapln']=$this->Petugas_model->edit_data($where,$table)->result();
  $this->load->view('v_tambah_rekap_blokir',$data);
  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  

function lihat_data_rekap_gagal(){
      if($this->session->userdata('akses')=='petugas' )
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
    //$this->db->like('ID_PELANGGAN', $data['ringkasan']);



    
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
    $this->db->like('ID_PELANGGAN', $data['ringkasan']);
    $this->db->join('data_perintah','REKAP_GAGAL.ID_PERINTAH=data_perintah.ID_PERINTAH'); 
    $this->db->join('datapln','data_perintah.ID_PELANGGAN=datapln.ID'); 
    $this->db->join('user','REKAP_GAGAL.ID_PETUGAS=user.id');


    $data['ListBerita'] = $this->Data_model->ambildata_gagal($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);

    $this->load->vars($data);  
    
    $this->load->view('v_lihat_rekap_gagal');
  }
  
}



  function lihat_data_rekap(){
      if($this->session->userdata('akses')=='petugas' )
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
    //$this->db->like('ID_PELANGGAN', $data['ringkasan']);



    
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
    $this->db->like('ID_PELANGGAN', $data['ringkasan']);
    $this->db->join('data_perintah','REKAP_BERHASIL.ID_PERINTAH=data_perintah.ID_PERINTAH'); 
    $this->db->join('datapln','data_perintah.ID_PELANGGAN=datapln.ID'); 
    $this->db->join('user','REKAP_BERHASIL.ID_PETUGAS=user.id');


    $data['ListBerita'] = $this->Data_model->ambildata_rekap($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);

    $this->load->vars($data);  
    
    $this->load->view('v_lihat_rekap_blokir');
  }
  
}


  function lihat_data_perintah(){
      if($this->session->userdata('akses')=='petugas' )
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

    $this->db->like('KATEGORI', $data['ringkasan']);
        $this->db->from('data_perintah');

    // pagination limit
    $pagination['base_url'] = base_url().'Petugas/lihat_data_perintah/page/';
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

    $data['ListBerita'] = $this->Data_model->ambildata_perintah($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);

    $this->load->vars($data);  
    $this->load->view('v_lihat_data_perintah');
  }
  
}




 
  function index(){
    $this->load->view('v_dashboard');
  }
 
  function lihat_data_pelanggan(){
    

    if($this->session->userdata('akses')=='petugas' )
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
function input_aksi_rekap(){
    if($this->session->userdata('akses')=='petugas')
    {
    
    $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; 
   $this->upload->initialize($config);
//        if(!empty($_FILES['FOTO_SEBELUM']['name'])){
 
            if ($this->upload->do_upload('FOTO_SEBELUM')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/uploads/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['new_image']= './assets/uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar1=$gbr['file_name'];
                }

            if ($this->upload->do_upload('FOTO_SESUDAH')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/uploads/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['new_image']= './assets/uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar2=$gbr['file_name'];
              }
                

                  $tgl=$this->input->post('tgl');
                  $bln=$this->input->post('bln');
                  $thn=$this->input->post('thn');
                  $TANGGAL=$tgl." ".$bln." ".$thn;
                  

                  $data['ID_PERINTAH']=$this->input->post('ID_PERINTAH');
                  $data['KORDINAT']=$this->input->post('KORDINAT');
                  $data['TANGGAL_DIKERJAKAN']=$TANGGAL;
                  $data['FOTO_SEBELUM']=$gambar1;
                  $data['FOTO_SESUDAH']=$gambar2;
                  $data['ID_PETUGAS']=$this->session->userdata('ses_id');
                  //$data['STATUS']='SUDAH DIKERJAKAN';
                  
                                               
   
  
                //$this->m_upload->simpan_upload($judul,$gambar);
                 $this->Gambar_model->insert_berhasil($data);
                 $where=array('ID_PERINTAH' => $data['ID_PERINTAH']);
                 $data_perintah=array('STATUS'=>'SUDAH DIKERJAKAN');
                 
                  $table='data_perintah';
                $this->Petugas_model->update_data($where,$data_perintah,$table);
    

   
            

                      
  //      }  


    
    echo '<script language="javascript">alert("upload Berhasil"); document.location="'.base_url().'Petugas/lihat_data_rekap";</script>' ;
    
}
else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }


function input_aksi_gagal(){
    if($this->session->userdata('akses')=='petugas')
    {

//rekap gagal
    $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; 
   $this->upload->initialize($config);
//        if(!empty($_FILES['FOTO_SEBELUM']['name'])){
 
            if ($this->upload->do_upload('FOTO')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/uploads/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['new_image']= './assets/uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar1=$gbr['file_name'];
                }

                  $tgl=$this->input->post('tgl');
                  $bln=$this->input->post('bln');
                  $thn=$this->input->post('thn');
                  $TANGGAL=$tgl." ".$bln." ".$thn;
                  

                  $data['ID_PERINTAH']=$this->input->post('ID_PERINTAH');
                  $data['KORDINAT']=$this->input->post('KORDINAT');
                  $data['KETERANGAN_GAGAL']=$this->input->post('KETERANGAN');
                 
                  $data['TANGGAL_DIKERJAKAN']=$TANGGAL;
                  $data['FOTO']=$gambar1;
                  $data['ID_PETUGAS']=$this->session->userdata('ses_id');
                  
                                               
   
  
                //$this->m_upload->simpan_upload($judul,$gambar);
                 $this->Gambar_model->insert_gagal($data);
   
            

                      
  //      }  


    
    echo '<script language="javascript">alert("upload Berhasil"); document.location="'.base_url().'Petugas/lihat_data_rekap_gagal";</script>' ;
    
}

  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }


  function edit_rekap($id){
    
    if($this->session->userdata('akses')=='petugas') 
    {
    $where=array('ID_REKAP'=>$id);
    $table='rekap_blokir';
  $data['rekap']=$this->Petugas_model->edit_data($where,$table)->result();
  $this->load->view('v_edit_rekap',$data);
  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  
  function update_rekap($id){
  
    if($this->session->userdata('akses')=='petugas' )
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
    $this->Petugas_model->update_data($where,$data,$table);
    
    redirect('Petugas/lihat_data_rekap'); 

  }
  else
    {
      echo "Anda tidak berhak mengakses halaman ini";
    }
 
  }  



}
?>