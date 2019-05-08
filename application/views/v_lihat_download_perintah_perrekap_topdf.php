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


        
        <div>
            <div style="text-align: center; padding-top: 100px;">
        <hr>
                <h1>SURAT PERINTAH</h1>

            </div>
        </div>
        <p><br><br>Yang bertanda tangan di bawah ini;
        <br></p>
        <?php foreach ($rekap as $data) 
    {
      ?>
     <table cellspacing="0">
    <tr><td>Nama</td> <td>: <b>Bramantya BP</b></td> </tr>
    <tr><td>Jabatan</td> <td>: <b>Spv & Admin</b></td></tr>
    <tr><td>NIP</td> <td>: <b></b></td></tr>
    </table>
    <br>
    <p>Telah memberi perintah kepada petugas lapangan kami di area PLN Bangkalan, untuk melakukan proses <b><?php echo $data->KATEGORI ?></b> kepada pelanggan dengan rincian sebagai berikut; <br></p>
          <table cellspacing="0">
    <tr><td>ID Pelanggan</td> <td>: <b><?php echo $data->ID ?></b></td> </tr>
    <tr><td>Nama Pemilik</td> <td>: <b><?php echo $data->NAMA ?></b></td></tr>
    <tr><td>Alamat</td> <td>: <b><?php echo $data->ALAMAT ?></b></td></tr>
    <tr><td>Tarif</td> <td>: <b><?php echo $data->TARIF ?></b></td> </tr>
    <tr><td>Daya</td> <td>: <b><?php echo $data->DAYA ?></b></td> </tr>
    <tr><td>Gardu</td> <td>: <b><?php echo $data->GARDU ?></b></td></tr>
    <tr><td>Koduk</td> <td>: <b><?php echo $data->KODUK ?></b></td></tr>
    <tr><td>Tiang</td> <td>: <b><?php echo $data->TIANG ?></b></td></tr>
    
    </table>
    <p>
    <br>
    Hal tersebut perlu dilakukan, kerena pelanggan telah <b><?php echo $data->KETERANGAN?></b>.</p>



    <br>
    <br>
    <br>        

    <br>
    <br>
    <br>        

    

            <div  style="float: right;">
              
                <p><?php echo $data->TANGGAL ?><br/>
                <br><br><br><br>
                <i>Bramantya BP</i>
                </p>
            </div>
    <?php 
 }
  ?>
</div>
    </body>
</html>      