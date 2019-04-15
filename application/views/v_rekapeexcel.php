<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
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
  
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($employeeInfo) && !empty($employeeInfo)) {
                foreach ($employeeInfo as $key => $element) {
                    ?>
                    <tr>
                        <td><?php echo $element['ID_REKAP']; ?></td>   
                        <td><?php echo $element['ID_PELANGGAN']; ?></td> 
                        <td><?php echo $element['NAMA']; ?></td>                       
                        <td><?php echo $element['ALAMAT']; ?></td>
                        <td><?php echo $element['TARIF']; ?></td>

                        <td><?php echo $element['DAYA']; ?></td>   
                        <td><?php echo $element['KODUK']; ?></td> 
                        <td><?php echo $element['GARDU']; ?></td>                       
                        <td><?php echo $element['TIANG']; ?></td>                       
                     
                        <td><?php echo $element['FOTO_SEBELUM']; ?></td>
                        <td><?php echo $element['FOTO_SESUDAH']; ?></td>

                        <td><?php echo $element['TANGGAL']; ?></td>   
                        <td><?php echo $element['KORDINAT']; ?></td> 
                        <td><?php echo $element['KETERANGAN']; ?></td>                       
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">There is no employee.</td>    
                </tr>
            <?php } ?>

        </tbody>
    </table>
    <a class="pull-right btn btn-primary btn-xs" href="<?php echo site_url()?>Admin/createxls"><i class="fa fa-file-excel-o"></i> Export Data</a>
</div> 
