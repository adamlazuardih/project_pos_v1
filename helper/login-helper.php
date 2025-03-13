<?php

    require '../src/connection.php';

    $id = $_POST['id'];
    $password = $_POST['password'];
    $hash_password = md5($password);

    $query = "SELECT * FROM employees WHERE EmployeeID = '$id' AND EmployeePassword = '$hash_password'";
    $result = mysqli_query($conn, $query);
    $row  = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION["id"] = $id;
        $_SESSION["name"] = $row['FirstName'] . $row['LastName'];

        echo "
        <script>
            alert('Login Berhasil');
            location.href = '../lapPembelian.php';
        </script>";
    } else {
        echo "<script>alert('Login Gagal');history.back();</script>";
    }

?>