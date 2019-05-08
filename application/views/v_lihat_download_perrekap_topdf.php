<!DOCTYPE html>
<html lang="en">
<title>Download</title>
    <head>
        <meta charset="utf-8">
    </head>
    <style>
        td {
            border-bottom: 1px solid #ddd;
            margin: 5px;
        }
    </style>
    <body>
        <div>
            <div style="float: left;">
                <img style="width: 77px" src="./assets/img/logo-pt-pln.jpg">
            </div>
            <div style="float: left;">
                <p><b>PT PLN (PERSERO) BANGKALAN</b><br/>
                Jl. Letnan Mestu No.4, RW. 01, Kraton, <br>Kec. Bangkalan, Kabupaten Bangkalan, <br>Jawa Timur 69112, Indonesia.<br/>
                </p>
            </div>
            
        </div>


        <?php foreach ($rekap as $data) 
    {
      ?>
        <div>
            <div style="text-align: center; padding-top: 100px;">
        <hr>
                <h1>BUKTI CETAK</h1>

            </div>
        </div>
          <table cellspacing="0">
    <tr><td>    ID Pelanggan</td> <td>: <b><?php echo $data->ID_PELANGGAN ?></b></td> </tr>
    <tr><td>Keterangan</td> <td>: <b><?php echo $data->KETERANGAN ?></b></td></tr>
    <tr><td>Tanggal</td> <td>: <b><?php echo $data->TANGGAL ?></b></td></tr>
    </table>
        <div >
            <table cellspacing="0" style=" text-align: center;">
                <thead style="background-color: #eeeeee; border: none;">
                    <tr>
                        <th width="160px" height="15px">Nama</th>
                        <th width="200px">Alamat</th>
                        <th width="200px">Kordinat</th>
                        <th width="88px">Tarif</th>
                        <th width="118px">Daya</th>
                        <th width="88px">Koduk</th>
                        <th width="88px">Tiang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td height="15px"><?php echo $data->NAMA ?></td>
                        <td><?php echo $data->ALAMAT ?></td>
                        <td><?php echo $data->KORDINAT ?></td>
                        <td><?php echo $data->TARIF ?></td>
                        <td><?php echo $data->DAYA ?></td>
                        <td><?php echo $data->KODUK ?></td>
                        <td><?php echo $data->TIANG ?></td>
                    </tr>
                </tbody>
            
            </table>
    
        <div>
            <table cellspacing="0" style=" text-align: center;">
                <thead style="background-color: #eeeeee; border: none;">
                    <tr>
                        <th width="500px" height="15px">Foto Sebelum</th>
                        <th width="500px">Foto Sesudah</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img style="height: 230px;" src ="./assets/uploads/<?php echo $data->FOTO_SEBELUM ?>"></td>
                        <td><img style="height: 230px;" src ="./assets/uploads/<?php echo $data->FOTO_SESUDAH ?>"></td>
                        
                    </tr>
                </tbody>
            
            </table>
    

    

            <div  style="float: right;">
              
                <p><?php echo $data->TANGGAL ?><br/>
                <br><br>
                <i>Petugas</i>
                </p>
            </div>
    <?php 
 }
  ?>
</div>
    </body>
</html>      