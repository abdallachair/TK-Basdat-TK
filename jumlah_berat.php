<?php
	session_start();
	if (!isset($_SESSION['role'])) {
		header('location: login.php');
	}
	$nama_toko = $_SESSION['toko'];
	if(isset($_POST['beli_shipped'])) {
		$_SESSION['kode_produk_shipped'] = $_POST['beli_shipped'];
		if(isset($_SESSION['kode_produk_shipped'])) {
			$db = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016"); 
			$user_email = $_SESSION['email'];
			$kode_produk = $_SESSION['kode_produk'];
			$berat = $_POST['berat'];
			$harga = $_SESSION['harga'];
			$kuantitas = $_POST['kuantitas'];
			$sub_total = $kuantitas * $harga;
			$query = "INSERT INTO TOKOKEREN.KERANJANG_BELANJA (pembeli, kode_produk, berat, kuantitas, harga, sub_total) 
					  values('$user_email', '$kode_produk', $berat, $kuantitas, '$harga', '$sub_total');";
			$result = pg_query($db, $query);
			if (!$result) { 
				$kuantitas_query = "SELECT kuantitas FROM TOKOKEREN.KERANJANG_BELANJA WHERE kode_produk = '$kode_produk' LIMIT 1;";
				$kuantitas_result = pg_query($db, $kuantitas_query);
				$old_kuantitas = pg_fetch_row($kuantitas_result)[0];
				$new_kuantitas = $kuantitas + $old_kuantitas;

				$berat_query = "SELECT berat FROM TOKOKEREN.KERANJANG_BELANJA WHERE kode_produk = '$kode_produk';";
				$berat_result = pg_query($db, $berat_query);
				$berat_old = pg_fetch_row($berat_result)[0];
				$new_berat = $berat + $berat_old;

				pg_query($db, "DELETE FROM TOKOKEREN.KERANJANG_BELANJA WHERE kode_produk = '$kode_produk';");
				pg_query($db, "INSERT INTO TOKOKEREN.KERANJANG_BELANJA (pembeli, kode_produk, berat, kuantitas, harga, sub_total) 
					  values('$user_email', '$kode_produk', '$new_berat', '$new_kuantitas', '$harga', '$sub_total');");
				
				header('location: cart.php');
			} else {
				header('location: cart.php');
			}
		}
	}

	if(isset($_POST['jumlah_berat'])) {
		$kode_produk = $_POST['jumlah_berat'];
		$db = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016"); 
		$query = "SELECT P.harga FROM TOKOKEREN.PRODUK P WHERE P.kode_produk='$kode_produk' LIMIT 1;";
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
					
		<!-- Modal content-->
		<form method="post" action="jumlah_berat.php">
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
				<?php echo '<button type="submit" name="beli_shipped" value='.$kode_produk.'> BELI </button>'; ?>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
	<script>
		function getCategory(id) {
		    $.ajax({
		        type: "GET",
		        url: "dummy.php",
		        data: "mainid =" + id,
		        success: function(result) {
		            $("#somewhere").html(result);
		        }
		    });
		};
	</script>
	</body>
</html>
