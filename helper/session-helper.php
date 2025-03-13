<?php

if(empty($_SESSION['id'])){
    echo"
    <script>
        alert('Login Dahulu');
        location.href='~/../index.php';
    </script>";
}

?>