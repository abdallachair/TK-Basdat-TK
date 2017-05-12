<?php
    if(isset($_POST['shipped_dibeli'])) {
        $_SESSION['no_invoice'] = $_POST['shipped_dibeli'];
        if(isset($_SESSION['no_invoice'])) {
            $_SESSION['liat_product'] = $_SESSION['no_invoice'];
            header('location: melihat_transaksi_shipped.php');
        }

    }
?>
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
        <div class="melihat_pulsa">
            <div class="container">
                <h2>Lihat Transaksi Pulsa</h2>
                <div class="row">
                <div class="table-responsive">
                 <table class='table table-hover'>
                    <thead>
                        <tr>
                             <th>No Invoice</th>
                             <th>Nama Produk</th>
                             <th>Tanggal</th>
                             <th>Status</th>
                             <th>Total Bayar</th>
                             <th>Nominal</th>
                             <th>Nomor</th>
                             <th>Ulasan</th>
                        </tr>
                     </thead>
                     <?php
                        $db = pg_connect('host=localhost dbname=contacts user=contacts password=firstphp'); 
                        $user_email = $_SESSION['email'];

                        $query = "SELECT TP.no_invoice, P.nama, TP.tanggal, TP.status, TP.total_bayar, TP.nominal, TP.nomor, TP.email_pembeli
                                FROM TOKOKEREN.TRANSAKSI_PULSA TP, TOKOKEREN.PRODUK P, TOKOKEREN.PELANGGAN PL
                                WHERE TP.kode_produk = P.kode_produk AND TP.email_pembeli = '".$user_email."';";
                        $result = pg_query($query); 
                        if (!$result) { 
                            $errormessage = pg_last_error(); 
                            echo "Error with query: " . $errormessage; 
                            exit(); 
                        } else {
                            $row = pg_fetch_all($result)
                            foreach($row as $q) {
                                echo '<tr>
                                <td> '.$q['no_invoice'].' </td>
                                <td> '.$q['nama'].' </td>
                                <td> '.$q['tanggal'].' </td>
                                <td> '.$q['status'].' </td>
                                <td> '.$q['total_bayar'].' </td>
                                <td> '.$q['nominal'].' </td>
                                <td> '.$q['nomor'].' </td>
                                <td> <form method="get" action="ulasan.php"><button type="submit" name="shipped_dibeli" value='.$q['no_invoice'].'> ULAS </button></form> </td>
                                </tr>';
                            }
                        }
                    ?>
                  </table>
                </div>
            </div>
        </div>
                </div>
            
             <div class="melihat_shipped">
            <div class="container">
                <h2>Lihat Transaksi Shipped</h2>
                <div class="row">
                <div class="table-responsive">
                 <table class='table table-hover'>
                       <thead>
                              <tr>
                                 <th>No Invoice</th>
                                 <th>Nama Toko</th>
                                 <th>Tanggal</th>
                                 <th>Status</th>
                                 <th>Total Bayar</th>
                                 <th>Alamat Kirim</th>
                                 <th>Biaya Kirim</th>
                                 <th>Nomor Resi</th>
                                 <th>Jasa Kirim</th>
                                 <th>Ulasan</th>
                              </tr>
                       </thead>
                       <?php
                        $db = pg_connect('host=localhost dbname=contacts user=contacts password=firstphp'); 
                        $user_email = $_SESSION['email'];

                        $query = "SELECT TS.no_invoice, TS.nama_toko, TS.tanggal, TS.status, TS.total_bayar, TS.alamat_kirim, TS.biaya_kirim, TS.no_resi, TS.nama_jasa_kirim, TS.email_pembeli
                                FROM TOKOKEREN.TRANSAKSI_SHIPPED TS, TOKOKEREN.TOKO T, TOKOKEREN.PELANGGAN PL, TOKOKEREN.TOKO_JASA_KIRIM TJK
                                WHERE TS.kode_produk = P.kode_produk AND TS.nama_jasa_kirim = TJK.nama_jasa_kirim AND TS.nama_toko = T.nama AND TS.email_pembeli = '".$user_email."';";
                        $result = pg_query($query); 
                        if (!$result) { 
                            $errormessage = pg_last_error(); 
                            echo "Error with query: " . $errormessage; 
                            exit(); 
                        } else {
                            $row = pg_fetch_all($result)
                            foreach($row as $q) {
                                echo '<tr>
                                <td> '.$q['no_invoice'].' </td>
                                <td> '.$q['nama'].' </td>
                                <td> '.$q['tanggal'].' </td>
                                <td> '.$q['status'].' </td>
                                <td> '.$q['total_bayar'].' </td>
                                <td> '.$q['alamat_kirim'].' </td>
                                <td> '.$q['biaya_kirim'].' </td>
                                <td> '.$q['no_resi'].' </td>
                                <td> '.$q['nama_jasa_kirim'].' </td>
                                <td> <form method="post" action="melihat_transaksi.php"><button type="submit" name="shipped_dibeli"> DAFTAR PRODUK </button></form> </td>
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
