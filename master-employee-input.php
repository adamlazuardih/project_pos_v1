<?php
require 'src/connection.php';
require 'helper/session-helper.php';

if (isset($_POST['submit'])) {

    $idemployee        = $_POST['idemployee'];
    $lastname          = $_POST['lastname'];
    $firstname         = $_POST['firstname'];
    $title             = $_POST['title'];
    $titleofcourtesy   = $_POST['titleofcourtesy'];
    // $birthdate         = $_POST['birthdate'];
    // $hiredate          = $_POST['hiredate'];
    // $address           = $_POST['address'];
    // $city              = $_POST['city'];
    // $region            = $_POST['region'];
    // $postalcode        = $_POST['postalcode'];
    // $country           = $_POST['country'];
    // $phone             = $_POST['phone'];
    // $photo             = $_POST['photo'];
    // $notes             = $_POST['notes'];
    // $reportsto         = $_POST['reportsto'];
    $password          = $_POST['password'];
    // $pembelian         = $_POST['pembelian'];

    $sql = "INSERT INTO employees (EmployeeID, LastName, FirstName, Title, TitleOfCourtesy, EmployeePassword) 
                                  VALUES ('$idemployee', '$lastname', '$firstname', '$title', '$titleofcourtesy', MD5('$password'))";

    if (mysqli_query($conn, $sql)) { ?>
        <script>
            window.location.href = "master-employee.php";
        </script>
<?php } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} ?>