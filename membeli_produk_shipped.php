<?php
    session_start();
    $nama_toko = $_SESSION['toko'];
    if(isset($_POST['beli_shipped'])) {
        $_SESSION['kode_produk_shipped'] = $_POST['beli_shipped'];
        if(isset($_SESSION['kode_produk_shipped'])) {
            $db = pg_connect('host=localhost dbname=farhanramadhan user=postgres password=gold28197'); 
            $user_email = $_SESSION['email'];
            $kode_produk = $_POST['beli_shipped'];
            $berat = $_POST['berat'];
            $kuantitas = $_POST['kuantitas'];
            $sub_total = $kuantitas * $harga;
            $query = "INSERT INTO TOKOKEREN.KERANJANG_BELANJA (pembeli, kode_produk, berat, kuantitas, harga, sub_total) 
                      values('$user_email', '$kode_produk', '$berat', '$kuantitas', '$harga', '$sub_total')";
            $result = pg_query($db, $query);
            if (!$result) { 
                $errormessage = pg_last_error(); 
                echo "Error with query: " . $errormessage; 
                exit(); 
            } else {
                header('location: cart.php');
            }
        }
    }

    if(isset($_POST['jumlah_berat'])) {
        $kode_produk = $_POST['jumlah_berat'];
        $db = pg_connect('host=localhost dbname=farhanramadhan user=postgres password=gold28197'); 
        $query = "SELECT P.harga FROM TOKOKEREN.PRODUK P WHERE P.kode_produk='$kode_produk' LIMIT 1";
        $result = pg_query($db, $query);
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } else {
            $row = pg_fetch_assoc($result);
            $harga = $row['harga'];
        }
    }

    if (isset($_POST['kategori_utama'])) {
        $_SESSION['main_category'] = $_POST['kategori_utama'];
        if (isset($_SESSION['main_category'])) {
            header('location: membeli_produk_shipped.php');
        }
    }

    if (isset($_POST['sub_kategori'])) {
        $_SESSION['sub_category'] = $_POST['sub_kategori'];
        if (isset($_SESSION['sub_category'])) {
            header('location: membeli_produk_shipped.php');
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
					$db = pg_dbect('host=localhost dbname=farhanramadhan user=postgres password=gold28197');
					$sql = "SELECT * FROM KATEGORI_UTAMA";
					if(!$result = pg_query($db, $sql)) {
						die("Error: $sql");
					}

					while ($row = pg_fetch_array($result)) {
						$namaKategori = $row[1];
						echo '<option name="kategori_utama" value='.$namaKategori.'>'. $namaKategori.'</option>';
					}
				?>
			</select>
		</div>
			<div class="form-group">
				<select class="form-control" name="subKategori" id="subKategori">
					<option>Select Sub-Kategori</option>
                    <?php
                        $db = pg_dbect('host=localhost dbname=farhanramadhan user=postgres password=gold28197');
                        $sql = "SELECT * FROM SUB_KATEGORI";
                        if(!$result = pg_query($db, $sql)) {
                            die("Error: $sql");
                        }

                        while ($row = pg_fetch_array($result)) {
                            $namaKategori = $row[1];
                            echo '<option name="sub_kategori" value='.$namaKategori.'>'. $namaKategori.'</option>';
                        }
                    ?>
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
                    $db = pg_connect('host=localhost dbname=farhanramadhan user=postgres password=gold28197'); 
                    $query = "";
                    if (isset($_SESSION['main_category'])) {
                        if (isset($_SESSION['sub_category'])) {
                            $query = "SELECT DISTINCT P.kode_produk, P.nama, P.harga, P.deskripsi, SP.is_asuransi, SP.stok, SP.is_baru, SP.harga_grosir
                                FROM TOKOKEREN.PRODUK P, TOKOKEREN.SHIPPED_PRODUK SP, TOKOKEREN.KATEGORI_UTAMA KU, TOKOKEREN.SUB_KATEGORI SK
                                WHERE SP.kode_produk = P.kode_produk AND SP.kategori = '$_SESSION['sub_category']' AND KU.kode = SK.kode_kategori AND SP.nama_toko = '$nama_toko'
                                ORDER BY P.kode_produk";
                        }
                    } else {
                        $query = "SELECT DISTINCT P.kode_produk, P.nama, P.harga, P.deskripsi, SP.is_asuransi, SP.stok, SP.is_baru, SP.harga_grosir
                                FROM TOKOKEREN.PRODUK P, TOKOKEREN.SHIPPED_PRODUK SP
                                WHERE SP.kode_produk = P.kode_produk AND SP.nama_toko = '$nama_toko'
                                ORDER BY P.kode_produk";
                    }
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
                                <td> <form method="get" action="cart.php"><button type="submit" name="jumlah_berat" value='.$q['kode_produk'].'> BELI </button></form> </td>
                                </tr>';
                            }
                        }
                    ?>
                    <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Tentukan Jumlah dan Harga Barang!</h4>
                            </div>
                            <div class="modal-body">
                                <form action="membeli_produk_shipped.php" method="post">
                                    <div class="form-group">
                                        <label for="kuantitas">Kuantitas</label>
                                        <input type="number" min="0" class="form-control" id="insert-kuantitas" name="kuantitas" placeholder="Tentukan Jumlah Produk yang Ingin Dibeli" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="berat">Berat</label>
                                        <input type="number" min="0" class="form-control" id="insert-berat" name="berat" placeholder="Tentukan Berat Produk yang Ingin Dibeli" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <?php echo '<button type="submit" name="beli_shipped" value='.$kode_produk.'> BELI </button></form>'; ?>
                                </form>  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                      </div>
            </div>
        </div>
    </div>
    </body>
</html>
