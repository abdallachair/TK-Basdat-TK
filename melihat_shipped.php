<?php

    function selectAllFromTable($table) {

        $query = "SELECT * FROM $table";

        return $result;   
    }
    
    function insertToko(){

        $nama_toko = $_POST['nama_toko'];
        $deskripsi = $_POST['deskripsi'];
        $slogan = $_POST['slogan'];
        $lokasi = $_POST['lokasi'];
        $email = $_SESSION['email_pengguna'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['command'] === 'membuat_toko'){
            insertToko();
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
                </div>
            </div>
        </div>
                </div>
            </div>
    </body>
</html>
