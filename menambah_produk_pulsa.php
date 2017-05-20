<?php
    session_start();
    //echo "oi"
    $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
    function insertProdukPulsa(){
        //echo('WOY COKS');
        $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $nominal = $_POST['nominal'];
        
        $result1=is_numeric($harga);
        $result2=is_numeric($nominal);
        //echo "samimawon";
        if ($result2 === FALSE && $nominal <= 0) {
            //echo '1';
            $_SESSION['errorMSG'] = "Nominal harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else if($result1 === FALSE  && $harga <= 0) {
            //echo '2';
            $_SESSION['errorMSG'] = "Harga harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else {
            // echo '3';
            $sql = "SELECT * FROM TOKOKEREN.PRODUK_PULSA PP, TOKOKEREN.PRODUK P WHERE PP.kode_produk = '$kode_produk' AND P.kode_produk = PP.kode_produk";
            $result = pg_query($DBConnection, $sql);
            
            if(pg_fetch_row($result) >= 1){
                $_SESSION['errorMSG'] = "Kode Produk sudah ada.";
            } else{
                $sql2 = "INSERT INTO TOKOKEREN.PRODUK (kode_produk, nama, harga, deskripsi) VALUES ('$kode_produk', '$nama_produk', '$harga', '$deskripsi')";
                $result2 = pg_query($DBConnection, $sql2);
            
                $sql2 = "INSERT INTO TOKOKEREN.PRODUK_PULSA (kode_produk, nominal) VALUES ('$kode_produk', '$nominal')";
                $result2 = pg_query($DBConnection, $sql2);
            
                $_SESSION['successMSG'] = "Berhasil membuat Produk Pulsa!";
            }
           // header("Location: menambah_produk_pulsa.php");
            
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //var_dump($_POST);
        if($_POST['command'] === 'membuat_produk_pulsa'){
           // echo 'HIHIH';
            insertProdukPulsa();
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MEMBUAT TOKO</title>
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
			<span class="lead big-text">Toko<b>Keren</b>
		</div>
        <div class="membuat_toko">
            <div class="container">
                <h2>FORM MEMBUAT PRODUK PULSA</h2>
                <form action="menambah_produk_pulsa.php" method="post">
                        <div class="form-group">
                            <label for="nama_paket">Kode_produk</label>
                            <input type="text" class="form-control" id="insert-kode_produk" name="kode_produk" placeholder="masukkan kode produk"  maxlength="8" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_paket">Nama produk</label>
                            <input type="text" class="form-control" id="insert-nama_produk" name="nama_produk" placeholder="tuliskan nama produk mu" required>
                        </div>
                        <div class="form-group">
                            <label for="fitur">Harga</label>
                            <input type="text" class="form-control" id="insert-harga" name="harga" placeholder="masukkan harga dari produk mu" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Deskripsi</label>
                            <input type="text" class="form-control" id="insert-deskripsi" name="deskripsi" placeholder="tuliskan deskripsi dari produk mu" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Nominal</label>
                            <input type="text" class="form-control" id="insert-nominal" name="nominal" placeholder="masukkan harga dari toko mu" required>
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_pulsa">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                </form>
            </div>
            <span style="color: red"><?php if(isset($_SESSION['errorMSG'])){echo $_SESSION['errorMSG']; unset($_SESSION['errorMSG']);} ?></span>
            <span style="color: red"><?php if(isset($_SESSION['successMSG'])){echo $_SESSION['successMSG']; unset($_SESSION['successMSG']);} ?></span>
	</body>
</html>
