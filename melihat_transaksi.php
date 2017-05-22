<?php
    session_start();
    if (!isset($_SESSION['role'])) {
        header('location: login.php');
    }
    if(isset($_POST['shipped_dibeli'])) {
        $_SESSION['no_invoice'] = $_POST['shipped_dibeli'];
        if(isset($_SESSION['no_invoice'])) {
            $_SESSION['liat_product'] = $_SESSION['no_invoice'];
            header('location: melihat_transaksi_shipped.php');
        }
    }

    if(isset($_POST['pulsa_dibeli'])) {
        $_SESSION['kode_produk'] = $_POST['pulsa_dibeli'];
        if(isset($_SESSION['kode_produk'])) {
            header('location: ulasan.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MELIHAT TRANSAKSI</title>
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
                        $db = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016");
                        $user_email = $_SESSION['email'];

                        $query = "SELECT DISTINCT TP.no_invoice, P.nama, TP.tanggal, TP.status, TP.total_bayar, TP.nominal, TP.nomor, TP.email_pembeli, TP.kode_produk
                                FROM TOKOKEREN.TRANSAKSI_PULSA TP, TOKOKEREN.PRODUK P, TOKOKEREN.PELANGGAN PL
                                WHERE TP.kode_produk = P.kode_produk AND TP.email_pembeli = '".$user_email."';";
                        $result = pg_query($db, $query); 
                        if (!$result) { 
                            $errormessage = pg_last_error(); 
                            echo "Error with query: " . $errormessage; 
                            exit(); 
                        } else {
                            while($q = pg_fetch_array($result)) {
                                echo '<tr>
                                <td> '.$q['no_invoice'].' </td>
                                <td> '.$q['nama'].' </td>
                                <td> '.$q['tanggal'].' </td>
                                <td> '.$q['status'].' </td>
                                <td> '.$q['total_bayar'].' </td>
                                <td> '.$q['nominal'].' </td>
                                <td> '.$q['nomor'].' </td>
                                <td> <form method="get" action="ulasan.php"><button type="submit" name="pulsa_dibeli" value='.$q['kode_produk'].'> ULAS </button></form> </td>
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
                        $db = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016"); 
                        $user_email = $_SESSION['email'];

                        $query = "SELECT DISTINCT TS.no_invoice, TS.nama_toko, TS.tanggal, TS.status, TS.total_bayar, TS.alamat_kirim, TS.biaya_kirim, TS.no_resi, TS.nama_jasa_kirim, TS.email_pembeli FROM TOKOKEREN.TRANSAKSI_SHIPPED TS, TOKOKEREN.TOKO T, TOKOKEREN.LIST_ITEM LI, TOKOKEREN.TOKO_JASA_KIRIM TJK WHERE LI.no_invoice = TS.no_invoice AND TS.email_pembeli = '".$user_email."';";
                        $result = pg_query($db, $query); 
                        if (!$result) { 
                            $errormessage = pg_last_error(); 
                            echo "Error with query: " . $errormessage; 
                            exit(); 
                        } else {
                            while($q = pg_fetch_array($result)) {
                                echo '<tr>
                                <td> '.$q['no_invoice'].' </td>
                                <td> '.$q['nama_toko'].' </td>
                                <td> '.$q['tanggal'].' </td>
                                <td> '.$q['status'].' </td>
                                <td> '.$q['total_bayar'].' </td>
                                <td> '.$q['alamat_kirim'].' </td>
                                <td> '.$q['biaya_kirim'].' </td>
                                <td> '.$q['no_resi'].' </td>
                                <td> '.$q['nama_jasa_kirim'].' </td>
                                <td> <form method="post" action="melihat_transaksi.php"><button type="submit" name="shipped_dibeli" value='.$q['no_invoice'].'> DAFTAR PRODUK </button></form> </td>
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
