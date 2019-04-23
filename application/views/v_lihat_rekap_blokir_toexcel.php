<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">

        <h2><center>REKAP SIPASBONG</center></h2>
           
          <?php if($this->session->userdata('akses')=='admin'):?>
            
<form style="padding-left: auto; font-size: 15px; padding-right: auto;" class="form-signin" action="<?php echo base_url().'Admin/lihat_data_rekap'?>" method="post">

<?php elseif($this->session->userdata('akses')=='petugas'):
            //jika dari admin maka ke kontroller admin?>
<form style="padding-left: auto; font-size: 15px; padding-right: auto;" class="form-signin" action="<?php echo base_url().'Petugas/lihat_data_rekap'?>" method="post">

       
          <?php endif;?>
             <a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url().'Admin/createXLS'?>"><i class="fa fa-file-excel-o"></i> Download (.xlsx)</a>

             <a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url().'Admin/createPDF'?>"><i class="fa fa-file-excel-o"></i> Download (.pdf)</a><br>
           
       <table border="10px">
    <th style="text-align: center;"> NO REKAP </th>
    <th style="text-align: center;"> ID PELANGGAN </th>
    <th style="text-align: center;"> NAMA PELANGGAN </th>
    <th style="text-align: center;"> ALAMAT </th>
    <th style="text-align: center;"> TARIF </th>  
    <th style="text-align: center;"> DAYA </th>
    <th style="text-align: center;"> KODUK </th>
    <th style="text-align: center;"> GARDU </th>
    <th style="text-align: center;"> TIANG </th>
    <th style="text-align: center;"> FOTO SEBELUM </th>
    <th style="text-align: center;"> FOTO SESUDAH </th>
    <th style="text-align: center;"> TANGGAL </th>
    <th style="text-align: center;"> KORDINAT </th>
    <th style="text-align: center;"> KETERANGAN </th>
      
    
    <!--ketika non admin maka no fasilitas lihat password edit/hapus-->
    <?php if($this->session->userdata('masuk')==TRUE):?>
    <?php endif;?>
  
  
<?php 
if (count($ListBerita) > 0) {
          foreach($ListBerita as $data)
          {
    
    
    echo "<tr>";
      echo "<td>". $data['ID_REKAP'] ."</td>";
      echo "<td>". $data['ID_PELANGGAN'] ."</td>"; 
      echo "<td>". $data['NAMA']."</td>";
      echo "<td>". $data['ALAMAT']."</td>";
      echo "<td>". $data['TARIF'] ."</td>";
      echo "<td>". $data['DAYA'] ."</td>";
      echo "<td>". $data['KODUK'] ."</td>";
      echo "<td>". $data['GARDU']."</td>";
      echo "<td>". $data['TIANG'] ."</td>";?>
      <td><a href="<?=base_url().'/assets/uploads/'.$data['FOTO_SEBELUM'];?>" target="_blank"><img src="<?=base_url().'/assets/uploads/'.$data['FOTO_SEBELUM'];?>" width="100"></a></td>
      
      <td> <a href="<?=base_url().'/assets/uploads/'.$data['FOTO_SESUDAH'];?>" target="_blank"><img src="<?=base_url().'/assets/uploads/'.$data['FOTO_SESUDAH'];?>" width="100"></a></td>
      
      <!--echo "<td>". $data['FOTO_SESUDAH'] ."</td>";-->
      
      <?php
      echo "<td>". $data['TANGGAL']."</td>";
      echo "<td>". $data['KORDINAT'] ."</td>";
      echo "<td>". $data['KETERANGAN'] ."</td>";
                  

      
}echo "<tr><td colspan='9'><div style='background:000; float:right;'>".$this->pagination->create_links()."</div></td></tr>";
        } else {
          echo "<tbody><tr><td colspan='9' style='padding:10px; background:#F00; border:none; color:#FFF;'>Hasil pencarian tidak ditemukan.</td></tr></tbody>";
        }
?>
</table>
</form>

</body>
</html>
