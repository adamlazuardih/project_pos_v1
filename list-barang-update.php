<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['simpan'])) {

    $kode_edit       = $_REQUEST['kode_edit'];

    $nama_edit       = $_POST['nama_edit'];
    $keterangan_edit = $_POST['keterangan_edit'];
    $kategori_edit   = $_POST['kategori_edit'];
    $satuan_edit     = $_POST['satuan_edit'];
    $hargabeli_edit  = $_POST['hargabeli_edit'];
    $hargajual_edit  = $_POST['hargajual_edit'];
    $stokjumlah_edit = $_POST['stokjumlah_edit'];
    $supplier_edit   = $_POST['supplier_edit'];
    $stokmin_edit    = $_POST['stokmin_edit'];
    $expired_edit    = $_POST['expired_edit'];
    $diskon_edit     = $_POST['diskon_edit'];
    $diskontinu_edit = $_POST['diskontinu_edit'];
    $satuanterkecil = $_POST['satuanterkecil_edit'];
    if($satuanterkecil != "y"){
        $satuanterkecil = "n";
    }
    // $diskontinu_edit = $_POST['diskontinu_edit'];
    $sql_update_barang = "SET foreign_key_checks = 0;
                          UPDATE products p 
                          JOIN categories c ON(p.CategoryID=c.CategoryID) 
                          JOIN suppliers s ON(p.SupplierID=s.SupplierID)

                          SET p.ProductName='$nama_edit', 
                              p.RemarkProduct='$keterangan_edit', 
                              p.CategoryID=$kategori_edit,
                              p.QuantityPerUnit='$satuan_edit',
                              p.UnitPrice='$hargabeli_edit',
                              p.SalePrice='$hargajual_edit',
                              p.UnitsInStock= $stokjumlah_edit,
                              p.SupplierID=$supplier_edit,
                              p.MinStock=$stokmin_edit,
                              p.ExpiredDate='$expired_edit',
                              p.Discon='$diskon_edit',
                              p.SatuanTerkecil='$satuanterkecil',
                              p.Discontinued='$diskontinu_edit'
                          WHERE p.ProductID = '$kode_edit';
                          SET foreign_key_checks = 1;";
                          

    $query_run = mysqli_multi_query($conn, $sql_update_barang);

    if ($query_run) {
        echo '<script>  location.href = "list-barang.php" </script>';
    } else {
        echo '<script> alert("Data Not Updated") </script>' . mysqli_error($conn);
    }
}

?>