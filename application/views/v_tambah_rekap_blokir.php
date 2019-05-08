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
       

        <h2></h2>
  <?php foreach ($datapln as $data) 
    {
      ?>
           
    <div class="container" style="background-color: rgba(50,50,50,0); ">
        <div class="col-md-4 col-md-offset-4" style="background-color: rgba(50,50,50,0.5); width: auto; ">

          <?php if($this->session->userdata('akses')=='admin')://jika dari admin maka ke kontroller admin?>
          <form style="font-size: 20px; padding-top: 50px; padding-left: 10px;padding-bottom: 50px;padding-right: 10px;" class="form-signin" action="<?php echo base_url().'Admin/input_aksi_rekap/' ?>" method="post" enctype="multipart/form-data">
             <?php endif;?>
           
            <?php if($this->session->userdata('akses')=='petugas'):?>
<table>
            <tr>
              <td>
                     <u><b style="font-size: 40px;">BERHASIL</b></u>
              </td>
              <td>
                
 <input style="height: 50px; width: 100px;background-color:rgba(0,0,100,0.2); color: white" type="checkbox" id="trigger" name="berhasil">
            
              </td>
            </tr>
</table>


             <?php endif;?>

  <form style="float: left; background-color:rgba(50,255,50,0.1);" id="berhasil" class="form-signin" action="<?php echo base_url().'Petugas/input_aksi_rekap/' ?>" method="post" enctype="multipart/form-data">

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
            <td><b>KATEGORI </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KATEGORI" class="form-control" value="<?php echo $data->KATEGORI ?>" required ></td></tr>

            </td></tr>
               <tr>
            <td><b>KOORDINAT </b></td>
            <td> 



<?php
//localhost
if($_SERVER['REMOTE_ADDR']=='::1'){
  $lokasi= "11 || 00";
  }
  else{

$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
#echo "Latitude:".$new_arr[0]['geoplugin_latitude']." and Longitude:".$new_arr[0]['geoplugin_longitude'];
$lokasi=$new_arr[0]['geoplugin_latitude']." || ".$new_arr[0]['geoplugin_longitude'];

  }
?>
                      
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KORDINAT" class="form-control" value="<?php echo $lokasi ?>" required >
           </td></tr>
  

             <tr>
            <td><b>TANGGAL DIKERJAKAN</b></td>
            <td> 
    
    <span>
      <select name="tgl"  style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" >
        <?php 
          $start_date = 1;
          $end_date   = 31;
          for( $j=$start_date; $j<=$end_date; $j++ ) {
            echo '<option value='.$j.'>'.$j.'</option>';
          }
        ?>
      </select>
    </span>
              <span>
      <select name="bln"  style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" >

        <option value="Januari">Januari</option>
        <option value="Februari">Februari</option>
        <option value="Maret">Maret</option>
        <option value="April">April</option>
        <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September">September</option>
        <option value="Oktober">Oktober</option>
        <option value="November">November</option>
        <option value="Desember">Desember</option>
        <select> 
    </span>

    <span>
      <select name="thn" style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white">
        <?php 
          $year = date('Y');
          $min = $year - 10;
          $max = $year;
          for( $i=$max; $i>=$min; $i-- ) {
            echo '<option value='.$i.'>'.$i.'</option>';
          }
        ?>
      </select>
    </span>

     <!--     <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="TANGGAL" class="TANGGAL" autocomplete="off" data-date-format="yyyy-mm-dd" required ></td></tr> -->





<!-- Fungsi datepickier yang digunakan -->
<!-- Fungsi datepickier yang digunakan -->
<!--
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
-->


            <!--id rekap-->
             <tr>
            <td><b> </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="hidden" id="id" name="ID_PERINTAH" class="form-control" value="<?php echo $data->ID_PERINTAH ?>" required ></td></tr>
            <tr>
            <td><b>FOTO SEBELUM </b></td>
            <td> 
            <input  style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="file" id="id" name="FOTO_SEBELUM" class="form-control" required="" accept="image/*" ></td></tr>


            <tr>
            <td><b>FOTO SESUDAH </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="file" id="id" name="FOTO_SESUDAH" class="form-control" required="" accept="image/*" ></td></tr>
      
          </table>

            <br>
            <input style="font-size: 25px; background-color:rgba(50,255,50,0.9); color: white " type="submit" class="btn btn-primary" value=" &nbsp Berhasil Eksekusi &nbsp">
          </form>
  

  

  <form style="float: left; background-color:rgba(255,50,50,0.1);" id="gagal" class="form-signin" action="<?php echo base_url().'Petugas/input_aksi_gagal/' ?>" method="post" enctype="multipart/form-data">

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
            <td><b>KATEGORI </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KATEGORI" class="form-control" value="<?php echo $data->KATEGORI ?>" required ></td></tr>

            </td></tr>
               <tr>
            <td><b>KOORDINAT </b></td>
            <td> 



<?php
//localhost
if($_SERVER['REMOTE_ADDR']=='::1'){
  $lokasi= "11 || 00";
  }
  else{

$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
#echo "Latitude:".$new_arr[0]['geoplugin_latitude']." and Longitude:".$new_arr[0]['geoplugin_longitude'];
$lokasi=$new_arr[0]['geoplugin_latitude']." || ".$new_arr[0]['geoplugin_longitude'];

  }
?>
                      
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KORDINAT" class="form-control" value="<?php echo $lokasi ?>" required >
           </td></tr>
  

             <tr>
            <td><b>TANGGAL DIKERJAKAN</b></td>
            <td> 
    
    <span>
      <select name="tgl"  style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" >
        <?php 
          $start_date = 1;
          $end_date   = 31;
          for( $j=$start_date; $j<=$end_date; $j++ ) {
            echo '<option value='.$j.'>'.$j.'</option>';
          }
        ?>
      </select>
    </span>
              <span>
      <select name="bln"  style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" >

        <option value="Januari">Januari</option>
        <option value="Februari">Februari</option>
        <option value="Maret">Maret</option>
        <option value="April">April</option>
        <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September">September</option>
        <option value="Oktober">Oktober</option>
        <option value="November">November</option>
        <option value="Desember">Desember</option>
        <select> 
    </span>

    <span>
      <select name="thn" style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white">
        <?php 
          $year = date('Y');
          $min = $year - 10;
          $max = $year;
          for( $i=$max; $i>=$min; $i-- ) {
            echo '<option value='.$i.'>'.$i.'</option>';
          }
        ?>
      </select>
    </span>

     <!--     <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="TANGGAL" class="TANGGAL" autocomplete="off" data-date-format="yyyy-mm-dd" required ></td></tr> -->





<!-- Fungsi datepickier yang digunakan -->
<!-- Fungsi datepickier yang digunakan -->
<!--
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
-->


            <!--id rekap-->
             <tr>
            <td><b> </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="hidden" id="id" name="ID_PERINTAH" class="form-control" value="<?php echo $data->ID_PERINTAH ?>" required ></td></tr>
              <tr>
            <td><b>FOTO</b></td>
            <td> 
            <input  style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="file" id="id" name="FOTO" class="form-control" accept="image/*" required></td></tr>
            <tr>
            <td><b>KETERANGAN </b></td>
            <td> 
            <input style="height: 50px; font-size: 25px; background-color:rgba(0,0,100,0.2); color: white" type="text" id="id" name="KETERANGAN" class="form-control"  required ></td></tr>

</table>

            <br>
            <input style="font-size: 25px; background-color:rgba(255,50,50,0.9); color: white " type="submit" class="btn btn-primary" value=" &nbsp Gagal Eksekusi &nbsp">
</div>




        </div>
        </div> <!-- /container -->
 
 <?php 
 }
  ?>
</form>
<script type="text/javascript">
$(function() {
  
  // Get the form fields and hidden div
  var checkbox = $("#trigger");
  var berhasil = $("#berhasil");
  var gagal = $("#gagal");
  
  berhasil.hide();
  
  checkbox.change(function() {
    if (checkbox.is(':checked')) {
      berhasil.show();
      gagal.hide();
    }
    else{
     berhasil.hide();
      gagal.show(); 
    }
  });
});
</script>


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
