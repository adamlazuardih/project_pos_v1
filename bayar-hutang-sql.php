<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['simpan'])) {

    $orderid   = $_REQUEST['orderid'];
    $nonota    = $_REQUEST['nonota'];

    $hutangtunai  = $_POST['hutangtunai'];

    $sql_update_hutang = "UPDATE orders
                          SET Tunai = (Tunai  + '$hutangtunai')                        
                          WHERE OrderID = '$orderid' AND No_Nota = '$nonota'" ;
                          

    $query_run = mysqli_multi_query($conn, $sql_update_hutang);

    if ($query_run) {
        echo '<script>  location.href = "daftar-hutang.php" </script>';
    } else {
        echo '<script> alert("Data Not Updated") </script>' . mysqli_error($conn);
    }
}
