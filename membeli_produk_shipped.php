<?php
    session_start();
    if(isset($_POST['beli_shipped'])) {
        $_SESSION['kode_produk_shipped'] = $_POST['beli_shipped'];
        if(isset($_SESSION['kode_produk_shipped'])) {
            header('location: cart.php');
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
               <?php
                    //if-else dia ada sub-kategori ato engga
                        $db = pg_connect('host=localhost dbname=farhanramadhan user=postgres password=gold28197'); 
                        $user_email = $_SESSION['email'];

                        $query = "SELECT DISTINCT P.kode_produk, P.nama, P.harga, P.deskripsi, SP.is_asuransi, SP.stok, SP.is_baru, SP.harga_grosir
                                FROM TOKOKEREN.PRODUK P, TOKOKEREN.SHIPPED_PRODUK SP
                                WHERE SP.kode_produk = P.kode_produk
                                ORDER BY P.kode_produk";
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
                                <td> '.$q['is_asuransi'].' </td>
                                <td> '.$q['stok'].' </td>
                                <td> '.$q['is_baru'].' </td>
                                <td> '.$q['harga_grosir'].' </td>
                                <td> <form method="get" action="cart.php"><button type="submit" name="beli_shipped" value='.$q['kode_produk'].'> BELI </button></form> </td>
                                </tr>';
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
    </body>
</html>
