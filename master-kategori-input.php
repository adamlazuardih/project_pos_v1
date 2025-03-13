<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['submit'])) {

    $idkategori     = $_POST['idkategori'];
    $namakategori   = $_POST['namakategori'];
    $keterangan     = $_POST['keterangan'];
    $gambar         = $_POST['gambar'];

    $sql = "INSERT INTO categories VALUES ('$idkategori', '$namakategori', '$keterangan', '$gambar')";

    if (mysqli_query($conn, $sql)) { ?>
        <script>
            window.location.href = "master-kategori.php";
        </script>
<?php } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} ?>