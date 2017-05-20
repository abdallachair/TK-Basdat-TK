<?php
    session_start();
    if(isset($_POST['beli_pulsa'])) {
        $_SESSION['kode_produk_pulsa'] = $_POST['beli_pulsa'];
        if(isset($_SESSION['kode_produk_pulsa'])) {
            header('location: cart-pulsa.php');
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MEMBELI PRODUK</title>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" href = "bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="rating/js/star-rating.js" type="text/javascript"></script>
       </head>
    <body>
        <div class="navbar-default text-center">
            <span class="lead big-text">Toko<b>Keren</b></span>
        </div>
        <div class="container">
            <h2>Daftar Produk Pulsa</h2>
            <div class="row">
                <div class="table-responsive">
                 <table class='table table-hover'>
                   <thead>
                      <tr>
                         <th>Kode Produk</th>
                         <th>Nama Produk</th>
                         <th>Harga</th>
                         <th>Deskripsi</th>
                         <th>Nominal</th>
                         <th>Beli</th>
                      </tr>
                   </thead>
                    <?php
                        $db = pg_connect('host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016'); 
                        $user_email = $_SESSION['email'];

                        $query = "SELECT DISTINCT P.kode_produk, P.nama, P.harga, P.deskripsi, PP.nominal
                                FROM TOKOKEREN.PRODUK P, TOKOKEREN.PRODUK_PULSA PP
                                WHERE PP.kode_produk = P.kode_produk
                                ORDER BY P.kode_produk;";
                        $result = pg_query($db, $query); 
                        if (!$result) { 
                            $errormessage = pg_last_error(); 
                            echo "Error with query: " . $errormessage; 
                            exit(); 
                        } else {
                            while($q = pg_fetch_array($result)) {
                                echo '<tr>
                                <td> '.$q['kode_produk'].' </td>
                                <td> '.$q['nama'].' </td>
                                <td> '.$q['harga'].' </td>
                                <td> '.$q['deskripsi'].' </td>
                                <td> '.$q['nominal'].' </td>
                                <td> <form method="get" action="cart.php"><button type="submit" name="beli_pulsa" value='.$q['kode_produk'].'> ULAS </button></form> </td>
                                </tr>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
