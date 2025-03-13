<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['submit'])) {

    $idsupplier     = $_POST['idsupplier'];
    $namasupplier   = $_POST['namasupplier'];
    $namakontak     = $_POST['namakontak'];
    $titelkontak    = $_POST['titelkontak'];
    $alamat         = $_POST['alamat'];
    $kota           = $_POST['kota'];
    $wilayah        = $_POST['wilayah'];
    $kodepos        = $_POST['kodepos'];
    $negara         = $_POST['negara'];
    $nomortelp      = $_POST['nomortelp'];
    $fax            = $_POST['fax'];
    $homepage       = $_POST['homepage'];

    $sql = "INSERT INTO suppliers VALUES ('$idsupplier', '$namasupplier', '$namakontak', '$titelkontak', 
                                          '$alamat', '$kota', '$wilayah', '$kodepos',
                                          '$negara', '$nomortelp', '$fax', '$homepage')";

    if (mysqli_query($conn, $sql)) { ?>
        <script>
            window.location.href = "master-supplier.php";
        </script>
<?php } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} ?>