<div class="container-fluid" >
<ul class="nav navbar-nav" >
  
<!--Akses Menu Untuk Admin-->
  <?php if($this->session->userdata('akses')=='admin'):?>


      <li class="nav-item" ><a href="<?php echo base_url().'Admin/index'?>">HOME</a></li>
      
      <li class="nav-item"><a href="<?php echo base_url().'Admin/lihat_data_petugas'?>">DAFTAR PETUGAS</a></li>


      <li class="nav-item"><a href="<?php echo base_url().'Admin/lihat_data_pelanggan'?>">DAFTAR PELANGGAN</a></li>

      <li class="nav-item"><a href="<?php echo base_url().'Admin/lihat_data_rekap'?>">REKAP DAFTAR BLOKIR</a></li>

    <li class="nav-item"><a href="<?php echo base_url().'Admin/export_data_excel'?>">DOWNLOAD SIPASBONG (.xlsx)</a></li>


    <!--TAB SIGOUT-->
    <li ><a href="<?php echo base_url().'/login/logout'?>">LOG OUT</a></li>
  </ul>

      <!--Akses Menu Untuk panitia-->
  <?php elseif($this->session->userdata('akses')=='petugas'):?>
  <li class="nav-item"><a href="<?php echo base_url().'Petugas/index'?>">HOME</a></li>
      
    <li class="nav-item"><a href="<?php echo base_url().'Petugas/lihat_data_pelanggan'?>">DAFTAR PELANGGAN</a></li>


      <li class="nav-item"><a href="<?php echo base_url().'Petugas/lihat_data_rekap'?>">LIHAT REKAP</a></li>

  <li ><a href="<?php echo base_url().'/login/logout'?>">LOG OUT</a></li>
  </ul>
  <?php endif;?>
</div>