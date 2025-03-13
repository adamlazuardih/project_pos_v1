<?php
require 'src/connection.php';


function buatRupiah($angka)
{
    $hasil = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil;
}

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
                <center>Laporan Pembelian</center>
            </h3>

            <br>

            <div class="card">
                <div class="card-body">
                    <?php

                    // $sql_order_date = "SELECT MONTHNAME(OrderDate), SUM(GrandTotalOrder) FROM orders GROUP BY MONTH(OrderDate)";
                    $sql_order_date = "SELECT DATE_FORMAT(OrderDate, '%Y - %M') as year , SUM(GrandTotalOrder) FROM orders GROUP BY DATE_FORMAT(OrderDate, '%Y - %M')";
                    $result_order_date = mysqli_query($conn, $sql_order_date);

                    if (mysqli_num_rows($result_order_date) > 0) {
                        foreach ($result_order_date as $data) {
                            $month[] = $data['year'];
                            $amount[] = $data['SUM(GrandTotalOrder)'];
                        }
                    }

                    ?>

                    <div>
                        <canvas id="myChart"></canvas>
                    </div>

                </div>
            </div>

        </div>

    </main>

    <?php
    require 'src/script.html';
    ?>

</body>

<script>
    // const labels = ;
    const data = {
        labels: <?php echo json_encode($month); ?>,
        datasets: 
        [{
            label: '2020',
            axis: 'y',
            data: <?php echo json_encode($amount); ?>,
            fill: false,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            indexAxis: 'y',
        },
    };


    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

</html>