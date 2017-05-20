<?php
	session_start();
	function tambahKategori(){
		$i = 1;
		while($i == )
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
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
   		<input id="add-kategori-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Tambah Kategori" name="add-kategori">
    </fieldset>
    
</div>
</body>
</html>


