<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['simpan'])) {

    $idsupplier_edit     = $_REQUEST['idsupplier_edit'];

    $namasupplier_edit   = $_POST['namasupplier_edit'];
    $namakontak_edit     = $_POST['namakontak_edit'];
    $titelkontak_edit    = $_POST['titelkontak_edit'];
    $alamat_edit         = $_POST['alamat_edit'];
    $kota_edit           = $_POST['kota_edit'];
    $wilayah_edit        = $_POST['wilayah_edit'];
    $kodepos_edit        = $_POST['kodepos_edit'];
    $negara_edit         = $_POST['negara_edit'];
    $nomortelp_edit      = $_POST['nomortelp_edit'];
    $fax_edit            = $_POST['fax_edit'];
    $homepage_edit       = $_POST['homepage_edit'];

    // $diskontinu_edit = $_POST['diskontinu_edit'];
    $sql_update_supplier = "SET foreign_key_checks = 0;
                            UPDATE suppliers

                            SET CompanyName = '$namasupplier_edit',
                                ContactName = '$namakontak_edit',
                                ContactTitle = '$titelkontak_edit',
                                Address = '$alamat_edit',
                                City = '$kota_edit',
                                Region = '$wilayah_edit',
                                PostalCode = '$kodepos_edit',
                                Country = '$negara_edit',
                                Phone = '$nomortelp_edit',
                                Fax = '$fax_edit',
                                HomePage = '$homepage_edit'
                            
                            WHERE SupplierID = '$idsupplier_edit' ;
                            SET foreign_key_checks = 1;";


    $query_run = mysqli_multi_query($conn, $sql_update_supplier);

    if ($query_run) {
        echo '<script>  location.href = "master-supplier.php" </script>';
    } else {
        echo '<script> alert("Data Not Updated") </script>' . mysqli_error($conn);
    }
}
