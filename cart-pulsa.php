<?php
	session_start();
	if(isset($_POST['submit_pulsa'])) {
		
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
            <form action="index.php" method="POST">
	            <div class="form-group">
	              <label for="nomor_token">Nomor / Token Listrik : <span style="color: red">*</span></label>
	              <input type="text" class="form-control" id="nomor_token" placeholder="Masukkan Nomor / Token Listrik" name="nomor_token" required>
	            </div>
	        	<?php echo '<button type="submit" class="btn btn-default" name="submit_pulsa" value='.$q['no_invoice'].'>Submit</button>'; ?>
	        </form>
	    </div>
    </body>
</html>
