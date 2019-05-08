<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>LIHAT REKAP (BERHASIL)</title>
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
  <div class="slide story" id="intro" data-slide="1" >
    <div class="container">
      <div id="home-row-1" class="row clearfix">
        <div class="col-12">
       

        <h2>LIHAT REKAP BERHASIL</h2>
           
    <div class="container" style="background-color: rgba(50,50,50,0); ">
        <div class="col-md-4 col-md-offset-4">
        </div>
          <?php if($this->session->userdata('akses')=='admin'):
            //jika dari admin maka ke kontroller admin?>
<form style="padding-left: auto; font-size: 15px; padding-right: auto;" class="form-signin" action="<?php echo base_url().'Admin/lihat_data_rekap'?>" method="post">

<?php elseif($this->session->userdata('akses')=='petugas'):
            //jika dari admin maka ke kontroller admin?>
<form style="padding-left: auto; font-size: 15px; padding-right: auto;" class="form-signin" action="<?php echo base_url().'Petugas/lihat_data_rekap'?>" method="post">

       
          <?php endif;?>
          <input type="search" name="cari" placeholder="Cari ID Pelanggan" style="color: rgba(0,0,0,1);"> <input style=" background-color:rgba(50,50,255,0.9); color: white" type="submit" name="q" value="Search">
           
       <table border="10px" style="background-color:rgba(50,50,50,0.7);">
    <th style="text-align: center;"> NO </th>
    <th style="text-align: center;"> ID PELANGGAN </th>
    <th style="text-align: center;"> NAMA PELANGGAN </th>
    
    <th style="text-align: center;"> KATEGORI </th>
    <th style="text-align: center;"> KETERANGAN </th>
    <th style="text-align: center;"> TANGGAL PERINTAH </th>
    <th style="text-align: center;"> TANGGAL DIKERJAKAN </th>
    <th style="text-align: center;"> ALAMAT </th>
    <th style="text-align: center;"> TARIF </th>  
    <th style="text-align: center;"> DAYA </th>
    <th style="text-align: center;"> KODUK </th>
    <th style="text-align: center;"> GARDU </th>
    <th style="text-align: center;"> TIANG </th>
    <th style="text-align: center;"> FOTO SEBELUM </th>
    <th style="text-align: center;"> FOTO SESUDAH </th>
    <th style="text-align: center;"> KORDINAT </th>
    <th style="text-align: center;"> PETUGAS </th>
      
    
    
    
    <!--ketika non admin maka no fasilitas lihat password edit/hapus-->
    <?php if($this->session->userdata('masuk')==TRUE):?>
    <th style="text-align: center;"> ACTION </th>
    <?php endif;?>
  
  
<?php 
$temp=0;

if (count($ListBerita) > 0) {
          foreach($ListBerita as $data)
          {
    $temp+=1;
    
    echo "<tr>";
      echo "<td>". $temp ."</td>"; 
      echo "<td>". $data['ID'] ."</td>";
      echo "<td>". $data['NAMA']."</td>";
      echo "<td>". $data['KATEGORI'] ."</td>";
      echo "<td>". $data['KETERANGAN']."</td>";
      echo "<td>". $data['TANGGAL'] ."</td>";
      echo "<td>". $data['TANGGAL_DIKERJAKAN']."</td>";
      echo "<td>". $data['ALAMAT'] ."</td>";
      echo "<td>". $data['TARIF'] ."</td>";
      echo "<td>". $data['DAYA'] ."</td>";
      echo "<td>". $data['KODUK'] ."</td>";
      echo "<td>". $data['GARDU']."</td>";
      echo "<td>". $data['TIANG'] ."</td>";?>
      <td><a href="<?=base_url().'/assets/uploads/'.$data['FOTO_SEBELUM'];?>" target="_blank"><img src="<?=base_url().'/assets/uploads/'.$data['FOTO_SEBELUM'];?>" width="100"></a></td>
      
      <td> <a href="<?=base_url().'/assets/uploads/'.$data['FOTO_SESUDAH'];?>" target="_blank"><img src="<?=base_url().'/assets/uploads/'.$data['FOTO_SESUDAH'];?>" width="100"></a></td>
      
      <!--echo "<td>". $data['FOTO_SESUDAH'] ."</td>";-->
      
      <?php
      echo "<td>". $data['KORDINAT']."</td>";
      echo "<td>". $data['nama_lengkap'] ."</td>";
                  

      //ketika non admin maka no fasilitas lihat password edit/hapus
      if($this->session->userdata('akses')=='admin'){
        echo "<td>".anchor('Admin/edit_rekap/'.$data['ID_REKAP'],'Edit')."||".anchor('Admin/hapus_rekap/'.$data['ID_REKAP'],'Hapus')."||".anchor('Admin/cetak_rekap/'.$data['ID_REKAP'],'Cetak')."</td>";
        echo "</tr>";  
      }
      if($this->session->userdata('akses')=='petugas'){
        echo "<td>".anchor('Petugas/edit_rekap/'.$data['ID_REKAP'],'Edit')."</td>";
        echo "</tr>";  
      }
      
}echo "<tr><td colspan='9'><div style='background:000; float:right;'>".$this->pagination->create_links()."</div></td></tr>";
        } else {
          echo "<tbody><tr><td colspan='9' style='padding:10px; background:#F00; border:none; color:#FFF;'>Hasil pencarian tidak ditemukan.</td></tr></tbody>";
        }
?>
</table>
</form>

        <!--<input style="font-size: 25px; background-color:rgba(50,50,255,0.9); color: white " type="submit" class="btn btn-primary" value=" &nbsp Tambah &nbsp">-->
          </form>
        </div>
        </div> <!-- /container -->
 
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
