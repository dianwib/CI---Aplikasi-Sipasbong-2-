<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tambah Rekap Blokir</title>
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




 <!-- jQuery Version 1.11.0 -->
 <script src="<?php echo base_url() ?>assets/jquery-1.11.0.js"></script>


<!--file include Bootstrap js dan datepickerbootstrap.js-->

<script src="<?php echo base_url(); ?>assets/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>





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
  <div class="slide story" id="intro" data-slide="1">
    <div class="container">
      <div id="home-row-1" class="row clearfix">
        <div class="col-12">
       

        <h2>TAMBAH REKAP SIPASBONG</h2>
  <?php foreach ($datapln as $data) 
    {
      ?>
           
    <div class="container" style="background-color: rgba(50,50,50,0); ">
        <div class="col-md-4 col-md-offset-4" style="background-color: rgba(50,50,50,0.5);  width: : 680px;">

          <?php if($this->session->userdata('akses')=='admin')://jika dari admin maka ke kontroller admin?>
          <form style="font-size: 20px; padding-top: 50px; padding-left: 10px;padding-bottom: 50px;padding-right: 10px;" class="form-signin" action="<?php echo base_url().'Admin/input_aksi_rekap/' ?>" method="post" enctype="multipart/form-data">
             <?php endif;?>
           
            <?php if($this->session->userdata('akses')=='petugas'):?>
                        <form class="form-signin" action="<?php echo base_url().'Petugas/input_aksi_rekap/' ?>" method="post" enctype="multipart/form-data">
             <?php endif;?>


            <table>
            
            <tr>
            <td><b>ID </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="ID_PELANGGAN" class="form-control" value="<?php echo $data->ID ?>" required ></td></tr>


            <tr>
            <td><b>NAMA PELANGGAN </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="NAMA" class="form-control" value="<?php echo $data->NAMA ?>" required ></td></tr>

            <tr>
            <td><b>ALAMAT </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="ALAMAT" class="form-control" value="<?php echo $data->ALAMAT ?>" required ></td></tr>

            <tr>
            <td><b>TARIF</b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="TARIF" class="form-control" value="<?php echo $data->TARIF ?>" required ></td></tr>

            <tr>
            <td><b>DAYA</b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="DAYA" class="form-control" value="<?php echo $data->DAYA ?>" required ></td></tr>

            <tr>
            <td><b>KODUK</b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KODUK" class="form-control" value="<?php echo $data->KODUK ?>" required ></td></tr>

            <tr>
            <td><b>GARDU </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="GARDU" class="form-control" value="<?php echo $data->GARDU ?>" required ></td></tr>

            <tr>
            <td><b>TIANG</b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="TIANG" class="form-control" value="<?php echo $data->TIANG ?>" required ></td></tr>

            <tr>
            <td><b>KORDINAT </b></td>
            <td> 
           
              <button onclick="getLocation()">Cek Kordinat</button>



<p id="demo"></p>


            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KORDINAT" class="form-control" value="0" required >
           <script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  document.pr
}
</script>
           
           </td></tr>

            <tr>
            <td><b>FOTO SEBELUM </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="file" id="id" name="FOTO_SEBELUM" class="form-control" required="" ></td></tr>


            <tr>
            <td><b>FOTO SESUDAH </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="file" id="id" name="FOTO_SESUDAH" class="form-control" required="" ></td></tr>

             <tr>
            <td><b>TANGGAL </b></td>
            <td> 
          <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="TANGGAL" class="TANGGAL" autocomplete="off" data-date-format="yyyy-mm-dd" required ></td></tr>





<!-- Fungsi datepickier yang digunakan -->
<!-- Fungsi datepickier yang digunakan -->
<script type="text/javascript">
 $('.TANGGAL').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  5,
  autoclose: 1,
  todayHighlight: 2,
  startView: 2,
  minView: 2,
  forceParse: 0
    });
  </script> 


            <tr>
            <td><b>KETERANGAN </b></td>
            <td> 
            <input style="height: 30px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="radio" id="id" name="KETERANGAN" class="form-control" checked required <?php if (isset($KETERANGAN) && $KETERANGAN=="BONGKAR RAMPUNG") echo "checked";?>
value="BONGKAR RAMPUNG">BONGKAR RAMPUNG

<input style="height: 30px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="radio" id="id" name="KETERANGAN" class="form-control"  required <?php if (isset($KETERANGAN) && $KETERANGAN=="PASANG KEMBALI") echo "checked";?>
value="PASANG KEMBALI">PASANG KEMBALI</td></tr>

          </table>
            <br>
        <input style="font-size: 25px; background-color:rgba(50,50,255,0.9); color: white " type="submit" class="btn btn-primary" value=" &nbsp Ubah &nbsp">
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
