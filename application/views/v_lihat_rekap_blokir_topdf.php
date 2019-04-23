<html>
<head>
<title>Download Sipasbong</title>
</head>
<body>
<h3 style="text-align: center;">Rekap Sipasbong</h3>
    <table style="text-align: center;"  border="1">
<thead>
<tr>
	
    <th> ID PELANGGAN </th>
    <th> NAMA PELANGGAN </th>
    <th> ALAMAT </th>
    <th> TARIF </th>  
    <th> DAYA </th>
    <th> FOTO SEBELUM </th>
    <th> FOTO SESUDAH </th>
    <th> TANGGAL </th>
    <th> KORDINAT </th>
    <th> KETERANGAN </th>
    </tr>
</thead>
<tbody>
<?php 
          foreach($ListBerita as $data)
          {
    
    
    echo "<tr>";
      echo "<td>". $data['ID_PELANGGAN'] ."</td>"; 
      echo "<td>". $data['NAMA']."</td>";
      echo "<td>". $data['ALAMAT']."</td>";
      echo "<td>". $data['TARIF'] ."</td>";
      echo "<td>". $data['DAYA'] ."</td>";?>
      <td><img src="./assets/uploads/0b56d0f3cfb0ef91ed4e3c92f8cf2c16.png" width="100"></td>
      
      <td> <img src="<?php echo './assets/uploads/'.$data['FOTO_SESUDAH'];?>" width="100"></td>
      
      <!--echo "<td>". $data['FOTO_SESUDAH'] ."</td>";-->
      
      <?php
      echo "<td>". $data['TANGGAL']."</td>";
      echo "<td>". $data['KORDINAT'] ."</td>";
      echo "<td>". $data['KETERANGAN'] ."</td>";
                  

        }
?>
</tbody>
    </table>
</body>
</html>