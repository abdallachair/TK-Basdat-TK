<?php	
	$echoDeskripsi = "";
	$echoPeriodeAwal = "";
	$echoPeriodeAkhir = "";
	$echoKodePromo = "";
	$echoKategoriUtama = "";
	$echoSubkategori = "";
	$echoError = "";
	$validate = true;
	session_start();

	function submitPromo(){
		$db = pg_connect("host=localhost port=5432 dbname=farhanramadhan user=postgres password=gold28197");

		$deskripsi = $_POST['deskripsi'];
		$periodeAwal = $_POST['periodeAwal'];
		$periodeAkhir = $_POST['periodeAwal'];
		$kodePromo = $_POST['kodePromo'];
		$kategoriUtama = $_POST['kategoriUtama'];
		$subKategori = $_POST['subKategori']; 
		$idPromo;
        pg_close(); 

		header("Location: index.php");

		$sql4 = "SELECT id FROM TOKOKEREN.PROMO";

		if(!$result4 = pg_query($db, $sql4)) {
			die("Error: $sql");
		}

		while ($row = pg_fetch_row($result4)) {
			$idPromo = $row[0];
		}

		$newIdPromo = generate($idPromo);

		$sql1 = "INSERT into tokokeren.PROMO (id, deskripsi, periode_awal, periode_akhir, kode) values ('$newIdPromo', '$deskripsi', '$periodeAwal', '$periodeAkhir', '$kodePromo')";

		if(!$result1 = pg_query($db, $sql1)) {
			die("Error: $sql1");
		}

		$sql2 = "SELECT * FROM tokokeren.SHIPPED_PRODUK WHERE kategori = '$subKategori'";

		if(!$result2 = pg_query($db, $sql2)) {
			die("Error: $sql2");
		}

		while ($row = pg_fetch_row($result2)) {
			$kode_produk = $row[0];
			$sql3 = "INSERT INTO tokokeren.PROMO_PRODUK (id_promo, kode_produk) values ('$newIdPromo', '$kode_produk')";

			if(!$result3 = pg_query($db, $sql3)) {
				die("Error: $sql3");
			}
		}
	}

	function generate($idPromo) {
		$length = strlen($idPromo) - 1;
		$idDepan = substr($idPromo, 0, 1);
		$idBelakang = substr($idPromo, 1);

		$idBelakang += 1;
		$panjangNumberExist = strlen($idBelakang);
		$idBaru = $idBelakang;

		for($i = $panjangNumberExist; $i < $length; $i++) {
			$idBaru = "0".$idBaru;
			$panjangNumberExist = strlen($idBaru);
		}

		$idBaru = $idDepan.$idBaru;
		return $idBaru;
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		 if (empty($_POST["deskripsi"])) {
			   $echoDeskripsi = "Deskripsi harus diisi";
			   $validate = false;
		  }

		  if (empty($_POST["periodeAwal"])) {
			   $echoPeriodeAwal = "Periode awal harus diisi";
			   $validate = false;
		  }
		  
		  if (empty($_POST["periodeAkhir"])) {
			   $echoPeriodeAkhir = "Periode akhir harus diisi";
			   $validate = false;
		  } elseif($_POST["periodeAwal"] <= $_POST["periodeAkhir"]) {
				$echoError = "Periode awal harus lebih besar dari periode akhir";
				$validate = false;
		  }
		  
		  if (empty($_POST["kodePromo"])) {
			   $echoKodePromo = "Kode promo harus diisi";
			   $validate = false;
		  } elseif(strlen($_POST["kodePromo"]) > 20) {
		  		$echoKodePromo = "Kode promo tidak boleh lebih dari 20 karakter";
		  		$validate = false;
		  }
		  
		  if($_POST["kategoriUtama"] == "kosong") {
		  		$echoKategoriUtama = "Kategori utama harus diisi";
		  		$validate = false;
		  }

		  if($_POST["subKategori"] == "kosong") {
		  		$echoSubkategori = "Subkategori harus diisi";
		  }

		  if($validate == true){
		   	   submit();
		  }
	}
?>