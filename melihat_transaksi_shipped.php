<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MEMBUAT TOKO</title>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" href = "bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="rating/js/star-rating.js" type="text/javascript"></script>
       </head>
    <body>    
             <div class="melihat_product">
            <div class="container">
                <h2>Lihat Product</h2>
                <?php
                    echo '<h3>Nomor Invoice = '.$_SESSION['liat_product'].'';
                ?>
                <div class="row">
                <div class="table-responsive">
                 <table class='table table-hover'>
                       <thead>
                              <tr>
                                 <th>Nama</th>
                                 <th>Berat</th>
                                 <th>Kuantitas</th>
                                 <th>Harga</th>
                                 <th>Sub Total</th>
                                 <th>Ulasan</th>
                              </tr>
                       </thead>
                       <?php
                        $db = pg_connect('host=localhost dbname=contacts user=contacts password=firstphp'); 
                        $user_email = $_SESSION['email'];

                        $query = "SELECT P.nama, LI.berat, LI.kuantitas, LI.sub_total
                            FROM TOKOKEREN.PRODUK P, TOKOKEREN.LIST_ITEM LI
                            WHERE LI.kode_produk = P.kode_produk AND LI.no_invoice = '".$_SESSION['liat_product']."';";
                        $result = pg_query($query); 
                        if (!$result) { 
                            $errormessage = pg_last_error(); 
                            echo "Error with query: " . $errormessage; 
                            exit(); 
                        } else {
                            $row = pg_fetch_all($result)
                            foreach($row as $q) {
                                echo '<tr>
                                <td> '.$q['nama'].' </td>
                                <td> '.$q['berat'].' </td>
                                <td> '.$q['kuantitas'].' </td>
                                <td> '.$q['harga'].' </td>
                                <td> '.$q['sub_total'].' </td>
                                <td> <form method="post" action="ulasan.php"><button type="submit" name="shipped_dibeli"> ULAS </button></form> </td>
                                </tr>';
                            }
                        }
                    ?>
                    </table>
                </div>
            </div>
        </div>
                </div>
            </div>
    </body>
</html>