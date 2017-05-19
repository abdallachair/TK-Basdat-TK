<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Menambah Kategori dan Subkategori</title>
</head>
<body>
<div class="container">
	<h1>Menambahkan Kategori dan Subkategori</h1>
	<fieldset>
	    <div class="form-group">
	    	<input id="kode-kategori" class="form-control" placeholder="Kode Kategori" name="id-kategori" type="text" autofocus>
	    </div>
	    <div class="form-group">
	    	<input id="nama-kategori" class="form-control" placeholder="Nama Kategori" name="name-kategori" type="text" autofocus>
	    </div>
	    <label>Subkategori</label>
	    <ul>
	    	<div class="form-group">
	    	<input id="kode-subkategori" class="form-control" placeholder="Kode Subkategori" name="id-subkategori" type="text" autofocus>
	    </div>
	    <div class="form-group">
	    	<input id="nama-subkategori" class="form-control" placeholder="Nama Subkategori" name="name-subkategori" type="text" autofocus>
	    </div>
	    </ul>
	    
	    <button id="add-subkategori-btn" class="btn btn-lg btn-primary btn-block">Tambah subkategori</button>
	    <script>
	    	$("#add-subkategori-btn").onclick()
	    </script>
   		<input id="add-kategori-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Tambah Kategori" name="add-kategori">
    </fieldset>
    
</div>
</body>
</html>


