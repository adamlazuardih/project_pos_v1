<?php

require 'src/connection.php';
require 'helper/session-helper.php';

$id = $_SESSION['invoice'];

$query = "SELECT * FROM `konsinasi` LEFT JOIN konsinasi_details USING(KonsinasiID) LEFT JOIN products ON(products.ProductID = konsinasi_details.ProductID) WHERE KonsinasiID = '$id';";
$sql = mysqli_query($conn, $query);

$data = mysqli_fetch_array($sql);

$query2 = "SELECT * FROM `konsinasi` LEFT JOIN konsinasi_details USING(KonsinasiID) LEFT JOIN products ON(products.ProductID = konsinasi_details.ProductID) WHERE KonsinasiID = '$id';";
$sql2 = mysqli_query($conn, $query2);


?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <title>Invoice</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<link rel="stylesheet" type="text/css" href="assets/css/invoice.css">
<!-- <button onclick="print()">Print</button> -->

<body onload="print()">
     <div id="page-wrap">
          <p id="header">NOTA KONSINASI</p>
          <div id="identity">
               <div id="logo">
                    <h1>No.Nota : <?= $data['No_Nota'] ?></h1>
               </div>
          </div>
          <div style="clear:both"></div>
          <div id="customer">

               <table id="meta">


                    <td class="meta-head">Date & Time</td>
                    <td>
                         <p id="date" disabled><?= $data['KonsinasiID'] ?></p>
                    </td>
                    </tr>

               </table>
          </div>
          <table id="items">
               <thead>
                    <tr>
                         <th>Item</th>
                         <th>Description</th>
                         <th>Unit Price</th>
                         <th>Quantity</th>
                         <th>Order Price</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $i = 1;
                    if (mysqli_num_rows($sql2)) {
                         while ($result = mysqli_fetch_assoc($sql2)) { ?>
                              <tr class="item-row">
                                   <td class="item-name">
                                        <p><?= $result['ProductName'] ?></p>
                                   </td>
                                   <td class="description">
                                        <p><?= $result['RemarkProduct'] ?></p>
                                   </td>
                                   <td>
                                        <p class="cost">Rp.<?= number_format($result['UnitPrice']) ?></p>
                                   </td>
                                   <td>
                                        <p class="qty"><?= $result['Quantity'] ?></p>
                                   </td>
                                   <td><span class="price">Rp.<?= number_format($result['OrderPrice'] * $result['Quantity']) ?></span></td>
                              </tr>
                    <?php $i++;
                         }
                    } else {
                         echo "0 results";
                    } ?>
               </tbody>

               <!-- <tr>
     <td colspan="2" class="blank"> </td>
     <td colspan="2" class="total-line">Diskon</td>
     <td class="total-value"><p id="paid">
     	
     		
     	</p></td>
    </tr> -->

               <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line">Grand Total</td>
                    <td class="total-value">
                         <div id="subtotal">Rp.<?= number_format($data['GrandTotalOrder']) ?></div>
                    </td>
               </tr>

               <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line">Diskon</td>
                    <td class="total-value">
                         <div id="subtotal"><?= $data['DiskonTransaksi'] ?></div>
                    </td>
               </tr>

               <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line balance">Tunai</td>
                    <td class="total-value balance">
                         <div class="due">Rp.<?= number_format($data['Tunai']) ?></div>
                    </td>
               </tr>


          </table>

          <br><br><br><br>
          <div id="terms">
               <h5>Terima kasih</h5>
               <p>GudangKKMS.com</p>
          </div>
     </div>
     <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
     <script src="js/index.js"></script>
</body>

</html>