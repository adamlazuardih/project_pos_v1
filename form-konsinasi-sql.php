<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['simpan'])) {
    var_dump($_POST);
    // if (!isset($_POST['satuanterkecil'])) {
    //     $satuanterkecil = $_POST['satuanterkecil'];
    // } else $satuanterkecil = 'n';
    $date = date('Y-m-d h:m:s');
    $supplier = $_POST['supplierForm'];
    $nota = $_POST['notaForm'];
    $subTotal = $_POST['subTotalForm'];
    $diskon = $_POST['diskonForm'];
    $grandTotal = $_POST['grandTotalForm'];
    $tunai = $_POST['tunaiForm'];
    $kembalian = $_POST['kembaliForm'];

    $_SESSION['invoice'] = $date;

    $sql_purchase = "INSERT INTO konsinasi VALUES ( '$date',$supplier, $_SESSION[id], '$date',$subTotal, $diskon, 0,$grandTotal, $tunai, '$nota'  )";
    $query_run = mysqli_query($conn, $sql_purchase);

    $items = json_decode($_POST['items']);

    foreach ($items as $item) {
        mysqli_query($conn, "INSERT INTO konsinasi_details VALUES (null, '$date',$item->kodeBarang, $item->hargaBarang, $item->jumlahBarang,0, 0)");
        echo mysqli_error($conn);

        $sqlupdate = "UPDATE products SET UnitsInStock = (UnitsInStock + $item->jumlahBarang) WHERE ProductID = $item->kodeBarang";
        mysqli_query($conn, $sqlupdate);
    }

    if ($query_run) {
        echo '<script>  window.location.href = "nota-konsinasi.php" </script>';
    } else {
        echo '<script> alert("Data Not Updated") </script>' . mysqli_error($conn);
    }
} else mysqli_close($conn);
?>