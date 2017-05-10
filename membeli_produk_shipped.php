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
        <div class="container">
        <div class="navbar-default text-center">
            <span class="lead big-text">Toko<b>Keren</b></span>
        </div>
        <h2>Beli Shipped Produk</h2>

        <div class="form-group">
			<label for="kategori">Pilih Kategori<span class="required" style="color: red">*</span></label>
	        <select class="form-control" name="kategoriUtama" onchange="getId(this.value);">
				<option>Select Kategori Utama</option>
				<?php
					// $conn = connectDB();
					// $sql = "SELECT * FROM KATEGORI_UTAMA";
					// if(!$result = mysqli_query($conn, $sql)) {
					// 	die("Error: $sql");
					// }

					// while ($row = mysqli_fetch_row($result)) {
					// 	$noKategori = $row[0];
					// 	$namaKategori = $row[1];
					// 	echo '<option value='.$noKategori.'>'. $namaKategori.'</option>';
					// }
				?>
			</select>
		</div>
			<div class="form-group">
				<select class="form-control" name="subKategori" id="subKategori">
					<option>Select Sub-Kategori</option>
				</select>
			</div>
        <div class="row">
            <div class="table-responsive">
             <table class='table table-hover'>
               <thead>
                  <tr>
                     <th>Kode Produk</th>
                     <th>Nama Produk</th>
                     <th>Harga</th>
                     <th>Deskripsi</th>
                     <th>Asuransi?</th>
                     <th>Stok</th>
                     <th>Baru</th>
                     <th>Harga Grosir</th>
                     <th></th>
                  </tr>
               </thead>
            </div>
        </div>
    </div>
    </body>
</html>
