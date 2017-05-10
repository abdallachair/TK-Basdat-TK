<?php	
	session_start();
	function connectDB() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tokokeren";
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " + mysqli_connect_error());
		}
		return $conn;
	}

	function submitPromo(){
		$conn = connectDB();

		$deskripsi = $_POST['isiDeskripsi'];
		$periodeAwal = $_POST['periodeAwal'];
		$periodeAkhir = $_POST['periodeAwal'];
		$kodePromo = $_POST['kodePromo'];
		$kategoriUtama = $_POST['kategoriUtama'];
		$subKategori = $_POST['subKategori']; 
		$idPromo;

		$sql4 = "SELECT id FROM PROMO";

		if(!$result4 = mysqli_query($conn, $sql4)) {
			die("Error: $sql");
		}

		while ($row = mysqli_fetch_row($result4)) {
			$idPromo = $row[0];
		}

		echo $idPromo;

		$idPromo += 1;

		echo $idPromo;

		$sql = "INSERT into PROMO (id, deskripsi, periode_awal, periode_akhir, kode) values ('$idPromo','$deskripsi', '$periodeAwal', '$periodeAkhir', '$kodePromo')";

		if(!$result1 = mysqli_query($conn, $sql1)) {
			die("Error: $sql");
		}

		$sql2 = "SELECT * FROM SHIPPED_PRODUK WHERE kategori = $subKategori";

		if(!$result2 = mysqli_query($conn, $sql2)) {
			die("Error: $sql");
		}

		while ($row = mysqli_fetch_row($result2)) {
			$kode_produk = $row[0];
			$sql3 = "INSERT INTO PROMO_PRODUK (id_promo, kode_produk) values ('$idPromo', '$kode_produk')";

			if(!$result3 = mysqli_query($conn, $sql3)) {
				die("Error: $sql3");
			}
		}

		header("Location: index.php");

	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['command'] === 'submit') {
			submitPromo();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
		<title>Promo</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "bootstrap-3.3.7-dist/css/bootstrap.min.css">
	</head>
	<body>
		<div class="navbar-default text-center">
			<span class="lead big-text">Toko<b>Keren</b></span>
			<span>Admin</span>
		</div>
	
		<div class="content">
			<div class="container" style="padding-left: 20%; padding-right: 20%">
				<div class="konten-border">
					<div class="konten-header text-center">
						<span class="header-text"> FORM PROMO </span>
					</div>
					<div>
						<span class="required" style="color: red">*required</span>
					</div>
					<div class="konten-isi" style="text-align: justify; text-justify: inter-word;">
						<form action="index.php" method="post">
							<div class="form-group">
								<label for="deskripsi">Deskripsi<span class="required" style="color: red">*</span></label>
								<input type="text" class="form-control" id="deskripsi">
							</div>
							<div class="form-group">
								<label for="periodeAwal">Periode Awal<span class="required" style="color: red">*</span></label>
								<input type="date" class="form-control" id="periodeAwal">
							</div>
							<div class="form-group">
								<label for="periodeAkhir">Periode Akhir<span class="required" style="color: red">*</span></label>
								<input type="date" class="form-control" id="periodeAkhir">
							</div>
							<div class="form-group">
								<label for="kodePromo">Kode Promo<span class="required" style="color: red">*</span></label>
								<input type="text" class="form-control" id="kodePromo">
							</div>
							<div class="form-group">
								<label for="kategori">Pilih Kategori<span class="required" style="color: red">*</span></label>
								<select class="form-control" name="kategoriUtama" onchange="getId(this.value);">
									<option>Select Kategori Utama</option>
									<?php
										$conn = connectDB();
										$sql = "SELECT * FROM KATEGORI_UTAMA";

										if(!$result = mysqli_query($conn, $sql)) {
											die("Error: $sql");
										}

										while ($row = mysqli_fetch_row($result)) {
											$noKategori = $row[0];
											$namaKategori = $row[1];
											echo '<option value='.$noKategori.'>'. $namaKategori.'</option>';
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="subKategori" id="subKategori">
									<option>Select Sub-Kategori</option>
								</select>
							</div>
						  	<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="container" style="padding-left: 20%; padding-right: 20%">
		  <div class="konten-header text-center">
				<span class="header-text"> ADD JASA KIRIM </span>
		  </div>
		  <div>
			<span class="required" style="color: red">*required</span>
		  </div>
		  <form action="jasa_kirim.php">
		    <div class="form-group">
		      <label for="namajasakirim">Nama : <span class="required" style="color: red">*</span></label>
		      <input type="text" class="form-control" id="nama_jasa_kirim" placeholder="Masukkan nama" name="nama_jasa_kirim" required>
		    </div>
		    <div class="form-group">
		      <label for="lamakirim">Lama Kirim : <span class="required" style="color: red">*</span></label>
		      <input type="text" class="form-control" id="lama_kirim" placeholder="Masukkan lama kirim" name="lama_kirim" required>
		    </div>
		    <div class="form-group">
		      <label for="tarif">Tarif : <span class="required" style="color: red">*</span></label>
		      <input type="number" class="form-control" id="tarif_jasa_kirim" placeholder="Masukkan tarif" name="tarif_jasa_kirim" required>
		    </div>
		    <button type="submit" class="btn btn-default">Submit</button>
		  </form>
		</div>
		
		<script src="libs/jquery/dist/jquery.min.js"></script>
		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function getId(val){
				$.ajax({
					type: "POST",
					url: "getdata.php",
					data: "cid="+val,
					success: function(data){
						$("#subKategori").html(data);
					}
				});
			}
		</script>
	</body>
</html>