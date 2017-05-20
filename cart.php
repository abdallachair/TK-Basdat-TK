<?php
	session_start();
    $nama_toko = $_SESSION['toko'];
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
			<div class="row">
				<div class="table-responsive">
					 <table class='table table-hover'>
					   <thead>
						  <tr>
							 <th>Kode Produk</th>
							 <th>Nama Produk</th>
							 <th>Berat</th>
							 <th>Kuantitas</th>
							 <th>Harga</th>
							 <th>Subtotal</th>
						  </tr>
					   </thead>
					<?php
						$db = pg_connect('host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016'); 
						$user_email = $_SESSION['email'];
						$sql = "SELECT DISTINCT KB.kode_produk, P.nama, KB.berat, KB.kuantitas, KB.harga, KB.sub_total FROM TOKOKEREN.KERANJANG_BELANJA KB, TOKOKEREN.PRODUK P WHERE KB.pembeli = '$user_email' AND P.kode_produk = KB.kode_produk;";
						$result = pg_query($db, $sql);

						if(!$result) {
							die("Error: $sql");
						}	

						while ($q = pg_fetch_array($result)) {
							echo '<tr>
                                <td> '.$q['kode_produk'].' </td>
                                <td> '.$q['nama'].' </td>
                                <td> '.$q['berat'].' </td>
                                <td> '.$q['kuantitas'].' </td>
                                <td> '.$q['harga'].' </td>
                                <td> '.$q['sub_total'].' </td>
                                </tr>';
						}
					?>
					</table>
				</div>
			</div>

			<label for="alamat-kirim">Alamat Kirim:</label>
			<input type="text" class="form-control" id="alamat-kirim" name="alamat-kirim" placeholder="Masukkan Alamatmu" required>
			<div class="form-group">
				<label for="kategori">Pilih Jasa Kirim</label>
				<select class="form-control" name="jasa-kirim" onchange="getId(this.value);" required="">
					<option>Select Jasa Kirim</option>
					<?php
						$db = pg_connect('host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016'); 
						$sql = "SELECT DISTINCT TJK.nama_toko, TJK.jasa_kirim FROM TOKOKEREN.TOKO_JASA_KIRIM TJK, TOKOKEREN.TOKO T WHERE TJK.nama_toko = '
    							$nama_toko';";
						$result = pg_query($db, $sql);
						if(!$result) {
							die("Error: $sql");
						}	

						while ($row = pg_fetch_array($result)) {
							$jasa_kirim = $row['jasa_kirim'];
							echo '<option nama="jasa_kirim" value='.$jasa_kirim.'>'. $jasa_kirim.'</option>';
						}
					?>
				</select>
				<button name="checkout" type="checkout" class="btn btn-default">Checkout</button>
				<?php 
					if (isset($_POST['checkout'])) {
						$db = pg_connect('host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016');
						$alamat = $_POST['alamat_kirim'];
						$jasa_kirim = $_POST['jasa_kirim'];
						$nama_toko = $_SESSION['toko'];
						$user_email = $_SESSION['email'];
						$curr_date = date("d/m/Y");
						$curr_time = date("h:i:sa");
						$status = rand(1, 3);
						$no_resi = 'IDN' . rand(8000000000000, 9999999999999);

						$sub_total_query = "SELECT SUM(sub_total) AS sum_sub_total FROM TOKOKEREN.KERANJANG_BELANJA WHERE KB.pembeli = '$user_email';";
						$result = pg_query($db, $sub_total_query);
						$sub_total = pg_query_row($result)[0];

						$berat_query = "SELECT SUM(berat) AS sum_berat FROM TOKOKEREN.KERANJANG_BELANJA WHERE KB.pembeli = '$user_email';";
						$result1 = pg_query($db, $berat_query);
						$berat = pg_query_row($result1)[0];

						$tarif_query = "SELECT tarif AS sum_tarif FROM TOKOKEREN.JASA_KIRIM WHERE nama = '$jasa_kirim';";
						$result2 = pg_query($db, $tarif_query);
						$tarif = pg_query_row($result2)[0];

						$count_rows_query = "SELECT COUNT(*) AS count_rows FROM TOKOKEREN.TRANSAKSI_SHIPPED;";
						$result3 = pg_query($db, $count_rows_query);
						$count_rows = pg_query_row($result3)[0];

						$no_invoice = "V";

						if ($count_rows < 10) {
							$no_invoice = "V00000000" . ($count_rows + 1);
						} else if ($count_rows >= 10 && $count_rows < 100) {
							$no_invoice = "V0000000" . ($count_rows + 1);
						} else if ($count_rows >= 100) {
							$no_invoice = "V000000" . ($count_rows + 1);
						}

						$harga_kirim = $berat * $tarif;
						$harga_total = $harga_kirim + $sub_total

						$query_insert_TS = "INSERT INTO TOKOKEREN.TRANSAKSI_SHIPPED (no_invoice, tanggal, waktu_bayar, status, total_bayar, email_pembeli, nama_toko, alamat_kirim, biaya_kirim, no_resi, nama_jasa_kirim) values ('$no_invoice', '$curr_date', '$curr_time', '$status', '$harga_total', '$user_email', '$nama_toko', '$harga_kirim', '$tarif', '$no_resi', '$jasa_kirim')"; 
						$result_insert = pg_query($db, $query_insert_TS);

						$keranjang_belanja = "SELECT DISTINCT KB.kode_produk, KB.berat, KB.kuantitas, KB.harga, KB.sub_total FROM TOKOKEREN.KERANJANG_BELANJA KB WHERE KB.pembeli = '$user_email';";
						$result4 = pg_query($db, $keranjang_belanja);

						if (!result4) {
							die("Error: $keranjang_belanja");
						} else {
							while ($q = pg_fetch_array($result4)) {
								$kode_list = $q['kode_produk'];
								$berat_list = $q['berat'];
								$kuantitas_list = $q['kuantitas'];
								$harga_list = $q['harga'];
								$sub_total_list = $q['sub_total'];
								$query_insert_LI = "INSERT INTO LIST_ITEM (no_invoice, kode_produk, berat, kuantitas, harga, sub_total) values ('$no_invoice', '$kode_list', '$berat_list', '$kuantitas_list', '$harga_list', '$sub_total_list');"; 
								$result_insert = pg_query($db, $query_insert_LI);
							}
						}


						if (!$result_insert) {
							die("Error: $query_insert");
						} else {
							echo '<script language="javascript">';
							echo 'alert("Barang Berhasil dibeli!")';
							echo '</script>';
							$delete_rows_query = "DELETE FROM TOKOKEREN.KERANJANG_BELANJA KB WHERE KB.pembeli = '$user_email';";
							$result_delete = pg_query($delete_rows_query);

							header('location: index.php');
						}
					}
				?>
				<button name="kembali" class="btn btn-default">Kembali Belanja</button>
				<?php 
					if (isset($_POST['kembali'])) {
						header('location: pilih_toko.php');
					}
				?>
			</div>
		</div>
	</body>
</html>
