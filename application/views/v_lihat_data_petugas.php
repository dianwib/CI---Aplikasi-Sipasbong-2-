<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lihat Petugas</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url().'assets/img/favicon.png'?>" rel="icon">
  <link href="<?php echo base_url().'assets/img/apple-touch-icon.png'?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url().'assets/lib/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url().'assets/lib/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/lib/fancybox/fancybox.css'?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">

  <link rel="prefetch" href="<?php echo base_url().'assets/img/zoom.png'?>">

  <!-- =======================================================
    Template Name: Munter
    Template URL: https://templatemag.com/munter-bootstrap-one-page-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-offset="58" data-target="#navigation" >

  <!-- Fixed navbar -->
  <div id="navigation" class="navbar navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav" style="background-color: rgb(0,0,0,0.2);">
          
            <?php $this->load->view('menu');?> <!--Include menu-->
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <!-- === MAIN Background === -->
  <div class="slide story" id="intro" data-slide="1" style="height: auto;">
    <div class="container">
      <div id="home-row-1" class="row clearfix">
        <div class="col-12">
       

                      <h2>DATA PETUGAS</h2>

<form style="padding-left: 200px; padding-right: 200px;">
  <table border="18px" style=" font-size: 18px; background-color:rgba(0,0,0,0.8); ">
    
    <th> ID </th>
    <th> USERNAME </th>
    <th> NAMA LENGKAP </th>
    <th> JABATAN </th>  
    <th> LEVEL </th>
    
    
    
    <!--ketika non admin maka no fasilitas lihat password edit/hapus-->
    <?php if($this->session->userdata('akses')=='admin'):?>
    <th> PASSWORD </th>
    <th> ACTION </th>
    <?php endif;?>
  
  
<?php $total=0;
 foreach($user as $data){ 
    
    $total+=1;
    
    echo "<tr>";
      echo "<td>". $data->id ."</td>";
      echo "<td>". $data->username ."</td>";
      echo "<td>". $data->nama_lengkap ."</td>";
      echo "<td>". $data->jabatan ."</td>";
      echo "<td>". $data->level ."</td>";
      

      //ketika non admin maka no fasilitas lihat password edit/hapus
      if($this->session->userdata('akses')=='admin'){
      echo "<td>". $data->password ."</td>";
        echo "<td>".anchor('Admin/edit_petugas/'.$data->id,'Edit')."||".anchor('Admin/hapus_petugas/'.$data->id,'Hapus')."</td>";
        echo "</tr>";  
      }
      
}
?>
</table>
</form>
<br>

        <?php echo "Total petugas: <b>".$total." Orang.</b>"?>;


<a href="tambah_petugas"  ><button style="font-size: 15px; background-color:rgba(50,50,255,0.9); color: white;" >Tambah Petugas</button></a>
        </div>


        <!-- /col-12 -->
      </div>
      
    </div>
    <!-- /container -->
  </div>
  <!-- /slide1 -->




  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>Munter</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/munter-bootstrap-one-page-template/
          Licensing information: https://templatemag.com/license/
        -->
        Created with Munter template by <a href="https://templatemag.com/">TemplateMag</a>
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url().'assets/lib/jquery/jquery.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/lib/bootstrap/js/bootstrap.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/lib/easing/easing.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/lib/php-mail-form/validate.js'?>"></script>
  <script src="<?php echo base_url().'assets/lib/fancybox/fancybox.js'?>"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url().'assets/js/main.js'?>"></script>

</body>
</html>
