<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tambah Perintah Pelanggan</title>
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
  <div class="slide story" id="intro" data-slide="1" style="height: 680px;">
    <div class="container">
      <div id="home-row-1" class="row clearfix">
        <div class="col-12">
       

        <h2>TAMBAH PERINTAH</h2>
  <?php foreach ($pelanggan as $data) 
    {
      ?>
           
    <div class="container" style="background-color: rgba(50,50,50,0); ">
        <div class="col-md-4 col-md-offset-4" style="background-color: rgba(50,50,50,0.5); width: 400px; ">

          <?php if($this->session->userdata('akses')=='admin')://jika dari admin maka ke kontroller admin?>
          <form style="font-size: 20px; padding-top: 50px; padding-left: 10px;padding-bottom: 50px;padding-right: 10px;" class="form-signin" action="<?php echo base_url().'Admin/input_aksi_perintah/'.$data->ID ?>" method="post">
             <?php endif;?>
           
            


            <table>

            <tr>
            <td><b>ID </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="ID" class="form-control" value="<?php echo $data->ID ?>" required ></td></tr>  
            
            <tr>
            <td><b>NAMA PELANGGAN </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="NAMA" class="form-control" value="<?php echo $data->NAMA ?>" required ></td></tr>
          
             <tr>
            <td><b>KATEGORI </b></td>
            <td> 
            <input style="height: 30px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="radio" id="id" name="KATEGORI" class="form-control" checked required <?php if (isset($KATEGORI) && $KATEGORI=="BONGKAR RAMPUNG") echo "checked";?>
value="BONGKAR RAMPUNG">BONGKAR RAMPUNG

<input style="height: 30px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="radio" id="id" name="KATEGORI" class="form-control"  required <?php if (isset($KATEGORI) && $KATEGORI=="PASANG KEMBALI") echo "checked";?>
value="PASANG KEMBALI">PASANG KEMBALI</td></tr>

<tr>
            <td><b>KETERANGAN </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KETERANGAN" class="form-control" required  ></td></tr>

          </table>
            <br>
        <input style="font-size: 25px; background-color:rgba(50,50,255,0.9); color: white " type="submit" class="btn btn-primary" value=" &nbsp Tambah &nbsp">
          </form>
        </div>
        </div> <!-- /container -->
 
 <?php 
 }
  ?>
</form>

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
