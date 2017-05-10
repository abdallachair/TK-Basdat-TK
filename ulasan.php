<!DOCTYPE html>
<html lang="en">
<head>
	<title>ULASAN</title>
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
	  <h2>Buat Ulasan</h2>
	  <form action="add_ulasan.php">
	    <div class="form-group">
	      <label for="namajasakirim">Kode Produk : </label>
	    </div>
	    <div class="form-group">
	      <label for="lamakirim">Rating : </label>
	      <input type="text" data-min=0 data-max=5 data-step=0.2 class="rating" id="rating-input" name="rating" data-size="xs" required>
	    </div>
	    <div class="form-group">
	      <label for="tarif">Komentar : </label>
	      <input type="number" class="form-control" id="komentar" placeholder="Masukkan komentar anda" name="komentar" required>
	    </div>
	    <button type="submit" class="btn btn-default">Submit</button>
	  </form>
	</div>
</body>
</html>