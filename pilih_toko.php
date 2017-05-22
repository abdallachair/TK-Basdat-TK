<?php
    session_start();

    if (isset($_GET['kategoriUtama'])) {
        $_SESSION['toko'] = $_GET['kategoriUtama'];
        if (isset($_SESSION['toko'])) {
            header('location: membeli_produk_shipped.php');
        }
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
        <div class="container">
            <div class="navbar-default text-center">
                <span class="lead big-text">Toko<b>Keren</b></span>
            </div>
            <h2>Pilih Toko</h2>
            <div class="form-group">
    			<label for="kategori">Pilih Kategori<span class="required" style="color: red">*</span></label>
                <form method="GET" action="pilih_toko.php">
    	        <select class="form-control" name="kategoriUtama">
    				
                        <option>Select Toko</option>
                        <?php
                            $db = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016");
                            $sql = "SELECT * FROM TOKOKEREN.TOKO;";
                            if(!$result = pg_query($db, $sql)) {
                                die("Error: $sql");
                            }

                            while ($row = pg_fetch_array($result)) {
                                $namaToko = $row[0];
                                echo '<option name="nama_toko" value='.$namaToko.'>'. $namaToko.'</option>';
                            }
                        ?>         
    			</select>
                <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
