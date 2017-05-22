<?php
	session_start();
	$email = $_SESSION['email'];


	if(isset($_POST['submit_pulsa'])) {
		$db = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016");
		$kode_produk = $_SESSION['kode_produk_pulsa'];
		$curr_date = date("d/m/Y");
		$curr_time = date("d/m/Y h:i:sa");
		$status = rand(1, 3);
		$nominal = 1;
		$nomor = $_POST['nomor_token'];

		$harga_pulsa_query = "SELECT DISTINCT nominal FROM TOKOKEREN.PRODUK_PULSA WHERE kode_produk = '$kode_produk';";
		$result = pg_query($db, $harga_pulsa_query);
		$nominal = pg_fetch_row($result)[0];
		$bayar = $nominal + 2000;

		$count_rows_query = "SELECT COUNT(*) AS count_rows FROM TOKOKEREN.TRANSAKSI_PULSA;";
		$result1 = pg_query($db, $count_rows_query);
		$count_rows = pg_fetch_row($result1)[0];


		$no_invoice = "V";
		if ($count_rows < 10) {
			$no_invoice = "V00000000" . ($count_rows + 1);
		} else if ($count_rows >= 10 && $count_rows < 100) {
			$no_invoice = "V0000000" . ($count_rows + 1);
		} else if ($count_rows >= 100 && $count_rows < 1000) {
			$no_invoice = "V000000" . ($count_rows + 1);
		} else if ($count_rows >= 1000 && $count_rows < 10000) {
			$no_invoice = "V00000" . ($count_rows + 1);
		} else if ($count_rows >= 10000 && $count_rows < 100000) {
			$no_invoice = "V0000" . ($count_rows + 1);
		} else if ($count_rows >= 100000 && $count_rows < 1000000) {
			$no_invoice = "V000" . ($count_rows + 1);
		}

		$query_insert_TP = "INSERT INTO TOKOKEREN.TRANSAKSI_PULSA (no_invoice, tanggal, waktu_bayar, status, total_bayar, email_pembeli, nominal, nomor, kode_produk) values ('$no_invoice', '$curr_date', '$curr_time', '$status', '$bayar', '$email', $nominal, '$nomor', '$kode_produk');
"; 
		$result_insert = pg_query($db, $query_insert_TP);
        echo '<script language="javascript">';
        echo 'alert("Barang Berhasil dibeli!")';
        echo '</script>';
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
			<h2>Lihat Product</h2>
			<?php
				echo '<h3>Kode Produk = '.$_SESSION['kode_produk_pulsa'].'</h3>';
			?>
			<form action="cart-pulsa.php" method="POST">
				<div class="form-group">
				  <label for="nomor_token">Nomor / Token Listrik : <span style="color: red">*</span></label>
				  <input type="text" class="form-control" id="nomor_token" placeholder="Masukkan Nomor / Token Listrik" name="nomor_token" required>
				</div>
				<?php echo '<button type="submit" class="btn btn-default" name="submit_pulsa">Submit</button>'; ?>
			</form>
		</div>
	</body>
</html>
