<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['submit'])) {

    if (!isset($_POST['satuanterkecil'])) {
        $satuanterkecil = $_POST['satuanterkecil'];
    } else $satuanterkecil = 'n';

    $kode           = $_POST['kode'];
    $nama           = $_POST['nama'];
    $keterangan     = $_POST['keterangan'];
    $kategori       = $_POST['kategori'];
    $satuan         = $_POST['satuan'];
    $hargabeli      = $_POST['hargabeli'];
    $hargajual      = $_POST['hargajual'];
    $stokjumlah     = $_POST['stokjumlah'];
    $supplier       = $_POST['supplier'];
    $stokmin        = $_POST['stokmin'];
    $expired        = $_POST['expired'];
    $diskon         = $_POST['diskon'];
    $diskontinu     = $_POST['diskontinu'];

    $sql = "INSERT INTO products VALUES ('$kode', '$nama', '$keterangan', '$supplier', '$kategori',
                                        '$satuan', '$hargajual', '$hargabeli', '$diskon', '$stokjumlah',
                                        '0', '$stokmin', '0', '$expired', '$diskontinu', '$satuanterkecil')";

    if (mysqli_query($conn, $sql)) { ?>
        <script>
            window.location.href = "list-barang.php";
        </script>
<?php } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} ?>