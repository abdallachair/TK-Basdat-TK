<!DOCTYPE html>
<html lang="en">
<head>
	<title>TOKOKEREN</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	  <h2>Add Jasa Kirim</h2>
	  <form action="jasa_kirim.php">
	    <div class="form-group">
	      <label for="namajasakirim">Nama : </label>
	      <input type="text" class="form-control" id="nama_jasa_kirim" placeholder="Masukkan nama" name="nama_jasa_kirim" required>
	    </div>
	    <div class="form-group">
	      <label for="lamakirim">Lama Kirim : </label>
	      <input type="text" class="form-control" id="lama_kirim" placeholder="Masukkan lama kirim" name="lama_kirim" required>
	    </div>
	    <div class="form-group">
	      <label for="tarif">Tarif : </label>
	      <input type="number" class="form-control" id="tarif_jasa_kirim" placeholder="Masukkan tarif" name="tarif_jasa_kirim" required>
	    </div>
	    <button type="submit" class="btn btn-default">Submit</button>
	  </form>
	</div>
</body>
</html>

