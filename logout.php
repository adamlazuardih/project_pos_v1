<?php
    require 'src/connection.php';
    session_destroy();
    echo"
    <script>
        alert('Berhasil Logout');
       location.href='index.php';
    </script>";
?>