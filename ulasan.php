<?php
	date_default_timezone_set('Asia/Jakarta');
	$echoKomentar = "";
	$echoRating = "";
	$validate = true;

	session_start();
	function submit(){
		$db = pg_connect("host=localhost port=5432 dbname=farhanramadhan user=postgres password=gold28197");

        $kodeProduk = $_POST['kodeProduk']; 
        $komentar = $_POST['komentar']; 
        $rating = $_POST['rating'];
        $date = date('m-d-Y');
        $email_pembeli = $_SESSION['email']; 

        $query = "INSERT into TOKOKEREN.ulasan (email_pembeli, kode_produk, tanggal, rating, komentar) values ('$email_pembeli', $kodeProduk', '$date', '$rating', '$komentar')";
        $result = pg_query($db, $query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        pg_close(); 

		header("Location: index.php");
	 }

	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		  if (empty($_POST["komentar"])) {
			   $echoKomentar = "Komentar harus diisi";
			   $validate = false;
		  }

		  if (empty($_POST["rating"])) {
			   $echoRating = "Rating harus diisi";
			   $validate = false;
		  }

		  if($validate == true){
		   submit();
		  }
	 }
?>

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
	  <form action="ulasan.php" method="POST">
	    <div class="form-group">
	      <label for="namajasakirim">Kode Produk : </label>
	      	<?php
				$kodeProduk = $_GET["kode_produk"];
				echo '<input type="text" class="form-control" id="kodeProduk" name="kodeProduk" readonly="readonly" ';
				echo 'value='.$kodeProduk;
				echo '>';
			?>
	    </div>
	    <div class="form-group">
	      <label for="lamakirim">Rating : </label>
	      <input type="text" data-min=0 data-max=5 data-step=0.2 class="rating" id="rating-input" name="rating" data-size="xs">
	      <span style="color: red"><?php echo $echoRating; ?></span>
	    </div>
	    <div class="form-group">
	      <label for="tarif">Komentar : </label>
	      <input type="text" class="form-control" id="komentar" placeholder="Masukkan komentar anda" name="komentar">
	      <span style="color: red"><?php echo $echoKomentar; ?></span>
	    </div>
	    <button type="submit" class="btn btn-default">Submit</button>
	  </form>
	</div>
</body>
</html>