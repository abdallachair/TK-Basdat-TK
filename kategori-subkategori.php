<?php
	session_start();

	$ErrMsg = "";

		

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!preg_match("/^(K)\d{2}$/", $_POST['id-kategori'])){
			echo "<span class='error'>*Id Kategori Utama harus diawali K diikuti 2 Angka</span>";
		}
		else if (!preg_match("/^.{1,100}$/", $_POST['name-kategori'])){
			echo "<span class='error'>*Nama kategori maksimal terdiri 100 karakter</span>";
		}
		else{
			tambahKategori($_POST['id-kategori'], $_POST['name-kategori']);
		}
		
	}

	function tambahKategori($id_kat, $nama_kat){
		$conn = pg_connect("host=localhost port=5432 dbname=farhanramadhan user=postgres password=gold28197");
		$valid = true;

		$q_ada_kat = "SELECT * FROM TOKOKEREN.KATEGORI_UTAMA WHERE kode = '".$id_kat."'";
		$result = pg_query($conn, $q_ada_kat);
		$count = pg_num_rows($result);
		if($count > 0){
			echo "<span class='error'>* Kode kategori utama sudah ada!</span>";
		}
		else{
			//VALIDASI

			$i = 1;
			while(isset($_POST['id'.$i.'']) && isset($_POST['nm'.$i.''])){
				$q_ada_sub = "SELECT * FROM TOKOKEREN.SUB_KATEGORI WHERE kode = '".$_POST['id'.$i.'']."'";
				$result_sub = pg_query($conn, $q_ada_sub);
				$count_sub = pg_num_rows($result_sub);
				if($count_sub > 0){
					echo "<span class='error'>* Kode subkategori sudah ada!</span>";
					$valid = false;
					break;
				} 
				else{
					if(!preg_match("/^(SK)\d{3}$/", $_POST['id'.$i.''])){
						echo "<span class='error'>* Subkategori harus terdiri dari SK diikuti 3 angka!</span>";
						$valid = false;
						break;
					}
					else if (!preg_match("/^.{1,100}$/", $_POST['nm'.$i.''])){
						echo "<span class='error'>* Nama kategori maksimal terdiri 100 karakter </span>";
						$valid = false;
						break;
					}
				}
				$i++;		
			}
			if($valid){
				//MEMASUKKAN KATEGORI UTAMA DAN SUBKATEGORI
				$ii = 1;
				$q_tambahkat = "INSERT INTO TOKOKEREN.KATEGORI_UTAMA VALUES('".$id_kat."','".$nama_kat."')";
				pg_query($conn, $q_tambahkat);
				while(isset($_POST['id'.$ii.'']) && isset($_POST['nm'.$ii.''])){
					$ii;
					$q_tambahsub = "INSERT INTO TOKOKEREN.SUB_KATEGORI VALUES
					('".$_POST['id'.$ii.'']."','".$id_kat."','".$_POST['nm'.$ii.'']."')";
					pg_query($conn, $q_tambahsub);
					$ii++;
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Menambah Kategori dan Subkategori</title>
</head>
<body>
<div class="container">
	<h1>Menambahkan Kategori dan Subkategori</h1>

	<fieldset>
		<form role="form" method="post" action="kategori-subkategori.php">
			<span class="error"><?php echo $ErrMsg;?></span>
		    <div class="form-group">
		    	<input id="kode-kategori" class="form-control" placeholder="Kode Kategori" name="id-kategori" type="text" autofocus required>
		    </div>
		    <div class="form-group">
		    	<input id="nama-kategori" class="form-control" placeholder="Nama Kategori" name="name-kategori" type="text" autofocus>
		    </div>
		    <label>Subkategori</label>
		    <ul>
		    	<div class="form-group">
			    	<input id="kode-subkategori" class="form-control" placeholder="Kode Subkategori" name="id1" type="text" autofocus required>
			    </div>
			    <div class="form-group">
			    	<input id="nama-subkategori" class="form-control" placeholder="Nama Subkategori" name="nm1" type="text" autofocus required>
			    </div>
		    </ul>
		    <div id="subkategori_tambahan">
	                                        
	         </div>
		    
		    <button id="add-subkategori-btn" class="btn btn-lg btn-primary btn-block">Tambah subkategori</button>
		    <script>
		    	$(document).ready(function(){
	                var i = 1;
	                $('#add-subkategori-btn').click(function(){
	                    i++;
	                    $('#subkategori_tambahan').append('<label for="harga">Subkategori '+i+'</label><br>');
	                    $('#subkategori_tambahan').append('<ul><div class="form-group"><input id="kode-subkategori" class="form-control" placeholder="Kode Subkategori" name="id'+i+'" type="text" autofocus required></div><div class="form-group"><input id="nama-subkategori" class="form-control" placeholder="Nama Subkategori" name="nm'+i+'" type="text" autofocus required></div></ul>');
	            	});
	         	});
		    </script>
		    <input type="hidden" name="command" value="tambahKategori">
	   		<input id="add-kategori-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Tambah Kategori" name="add-kategori">

	    </form>
    </fieldset>
    
</div>
</body>
</html>


