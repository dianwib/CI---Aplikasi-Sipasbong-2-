<?php

class Upload extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('pic_model');
    $this->load->library('form_validation');
    
  }
    
  public function file_data(){
    //validate the form data 
      
      //get the form values
      $data['pic_title'] = $this->input->post('id_pelanggan');
      $data['pic_desc'] = $this->input->post('keterangan');
 
      //file upload code 
      //set file upload settings 
      $config['upload_path']          = APPPATH. '../gambar/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 100;
 
      $this->load->library('upload', $config);
 
        //file is uploaded successfully
        //now get the file uploaded data 
        $upload_data = $this->upload->data();
 
        //get the uploaded file name
        $data['pic_file'] = $upload_data['file_name'];
 
        //store pic data to the db
        $this->pic_model->store_pic_data($data);
 
      $this->load->view('v_lihat_rekap_blokir');
    
  }
}
?>