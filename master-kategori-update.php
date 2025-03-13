<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['simpan'])) {

    $idkategori_edit     = $_REQUEST['idkategori_edit'];

    $namakategori_edit   = $_POST['namakategori_edit'];
    $keterangan_edit     = $_POST['keterangan_edit'];
    
    // $diskontinu_edit = $_POST['diskontinu_edit'];
    $sql_update_kategori = "SET foreign_key_checks = 0;
                            UPDATE categories

                            SET CategoryName = '$namakategori_edit',
                                Description = '$keterangan_edit'
                            
                            WHERE CategoryID = '$idkategori_edit' ;
                            SET foreign_key_checks = 1;";

                          
    $query_run = mysqli_multi_query($conn, $sql_update_kategori);

    if ($query_run) {
        echo '<script>  location.href = "master-kategori.php" </script>';
    } else {
        echo '<script> alert("Data Not Updated") </script>' . mysqli_error($conn);
    }
}
