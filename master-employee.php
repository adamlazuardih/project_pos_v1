<?php
require 'src/connection.php';
require 'helper/session-helper.php';

$sql_employee = "SELECT * FROM employees
                          ORDER BY EmployeeID";
$result_employee = mysqli_query($conn, $sql_employee);

?>

<html>

<head>
    <?php require 'src/head.html'; ?>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php require 'src/side.html'; ?>

    <main class="main-content border-radius-lg ">

        <?php require 'src/nav.html'; ?>

        <div class="container-fluid">

            <h3>
                <center>Master Supplier</center>
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <table id="tabelEmployee" class="table table-bordered table-striped" width="100%">
                        <thead class="table-light">
                            <tr>
                                <th>ID Employee</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Title</th>
                                <th>Title of Courtesy</th>
                                <th>Password</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (mysqli_num_rows($result_employee) > 0) {
                                while ($row_employee = mysqli_fetch_assoc($result_employee)) { ?>
                                    <tr>
                                        <td><?= $row_employee['EmployeeID']; ?></td>
                                        <td><?= $row_employee['LastName']; ?></td>
                                        <td><?= $row_employee['FirstName']; ?></td>
                                        <td><?= $row_employee['Title']; ?></td>
                                        <td><?= $row_employee['TitleOfCourtesy']; ?></td>
                                        <td><?= $row_employee['EmployeePassword']; ?></td>
                                    </tr>

                            <?php }
                            } else {
                                echo "0 results";
                            } ?>
                        </tbody>
                    </table>

                    <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalInputEmployee">
                        Input Employee
                    </button>

                    <?php require 'master-employee-inputModal.php'; ?>

                </div>

            </div>
        </div>
    </main>

    <?php
    require 'src/script.html';
    ?>

    <script>

    </script>

</body>

</html>