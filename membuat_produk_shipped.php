<?php

    function selectAllFromTable($table) {
        $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
        $query = "SELECT * FROM $table";
        $result = pg_query($DBConnection, $query);
        return $result;   
    }
    
    function insertProdukShipped(){
        $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $toko = $_SESSION['toko'];
       // echo $toko;
        $nama_toko =  str_replace("'", "''", $toko);
       // echo $nama_toko;
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $nominal = $_POST['nominal'];
        $foto = basename($_FILES['file']['name']);
        
       // echo $foto;
        
        if($_POST['asuransi'] === 'Ya'){
            $asuransi = TRUE;
        } else{
            $asuransi = FALSE;
        }
                            
        if($_POST['barang_baru'] === 'Ya'){
            $barang_baru = TRUE;
        } else{
            $barang_baru = FALSE;
            }
                            
        $min_order = $_POST['minimal_order'];
        $min_grosir = $_POST['minimal_grosir'];
        $max_grosir = $_POST['maksimal_grosir'];
        $harga_grosir = $_POST['harga_grosir'];
        $kategori = $_POST['kategori'];
        
        $query = "SELECT kode from TOKOKEREN.SUB_KATEGORI WHERE nama = '$kategori'";
        
        $result = pg_query($DBConnection, $query);
        $kategori = pg_fetch_row($result);
        $kategori = $kategori[0];
        
        $result1=is_numeri
            c($harga);
        $result2=is_numeric($nominal);
        //echo "samimawon";
        if ($result2 === FALSE && $nominal <= 0) {
            //echo '1';
            $_SESSION['errorMSG'] = "Nominal stok harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else if($result1 === FALSE  && $harga <= 0) {
            //echo '2';
            $_SESSION['errorMSG'] = "Harga harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else if(!is_numeric($min_order) && !is_numeric($min_grosir) && !is_numeric($max_grosir) && !is_numeric($harga_grosir) && ($harga_grosir||$min_order||$min_grosir||$maks_grosir) <= 0){
            $_SESSION['errorMSG'] = "minimal order, minimal grosir, maksimal grosir, dan harga grosir harus berupa angka dan diatas nilai 0!";
        } else {
            // echo '3';
            $sql = "SELECT * FROM TOKOKEREN.SHIPPED_PRODUK SP, TOKOKEREN.PRODUK P WHERE SP.kode_produk = '$kode_produk' AND P.kode_produk = SP.kode_produk";
            $result = pg_query($DBConnection, $sql);
            
            if(pg_fetch_row($result) >= 1){
                $_SESSION['errorMSG'] = "Kode Produk sudah ada.";
            } else{
                $sql2 = "INSERT INTO TOKOKEREN.PRODUK (kode_produk, nama, harga, deskripsi) VALUES ('$kode_produk', '$nama_produk', '$harga', '$deskripsi')";
                $result2 = pg_query($DBConnection, $sql2);
            
                $sql2 = "INSERT INTO TOKOKEREN.SHIPPED_PRODUK (kode_produk, kategori, nama_toko, is_asuransi, stok, is_baru, min_order, min_grosir, max_grosir, harga_grosir, foto) VALUES ('$kode_produk', '$kategori', '$nama_toko', '$asuransi', '$nominal', '$barang_baru', '$min_order', '$min_grosir', '$max_grosir', '$harga_grosir', '$foto')";
                $result2 = pg_query($DBConnection, $sql2);
                
                $file_tmp = $_FILES['file']['tmp_name'];
                
                move_uploaded_file($file_tmp, ("./src/img/".$foto));
            
                $_SESSION['successMSG'] = "Berhasil membuat Produk!";
            }
           // header("Location: menambah_produk_pulsa.php");
            
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['command'] === 'membuat_produk_shipped'){
            if($_POST['minimal_grosir'] > $_POST['maksimal_grosir']){
                $_SESSION['errorMSG'] = "Minimal Grosir tidak boleh lebih besar dari Maksimal Grosir!";
            } else if($_POST['kategori'] === 'PILIH SUB KATEGORI'){
                $_SESSION['errorMSG'] = "Kategori tidak boleh kosong!";
            } else {
                insertProdukShipped();
            } 
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
                <form action="membuat_produk_shipped.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_paket">Kode_produk</label>
                            <input type="text" class="form-control" id="insert-kode_produk" maxlength="8" name="kode_produk" placeholder="masukkan kode produk" required>
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
                            <label for="harga">Sub Kategori</label>
                            <br>
                            <select name="kategori">
                                <?php
                                    echo '<option>PILIH SUB KATEGORI</option>';
                                    $sub = selectAllFromTable("TOKOKEREN.SUB_KATEGORI");
                                    while($row = pg_fetch_row($sub)){
                                        echo '<option>'.$row[2].'</option>';
                                    }
                                    echo '</select>';
                                ?>
                            </select><br>
                        </div>
                        <div class="form-group">
                            <label for="harga">Barang Asuransi</label><span class="required" style="color: red">*</span></label>
                            <br><input type="radio" name="asuransi" value="Ya" checked> Ya<br>
                            <input type="radio" name="asuransi" value="Tidak"> Tidak<br>
                        </div>
                        <div class="form-group">
                            <label for="harga">Stok</label><span class="required" style="color: red">*</span></label>
                            <input type="text" class="form-control" id="insert-nominal" name="nominal" placeholder="masukkan jumlah stok produk mu" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Barang Baru</label><span class="required" style="color: red">*</span></label>
                            <br><input type="radio" name="barang_baru" value="Ya" checked> Ya<br>
                            <input type="radio" name="barang_baru" value="Tidak"> Tidak<br>
                        </div>
                        <div class="form-group">
                            <label for="harga">Minimal Order</label><span class="required" style="color: red">*</span></label>
                            <input type="text" class="form-control" id="insert-minimal_order" name="minimal_order" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Minimal Grosir</label><span class="required" style="color: red">*</span></label>
                            <input type="text" class="form-control" id="insert-minimal_grosir" name="minimal_grosir" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Maksimal Grosir</label><span class="required" style="color: red">*</span></label>
                            <input type="text" class="form-control" id="insert-maksimal_grosir" name="maksimal_grosir" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Grosir</label><span class="required" style="color: red">*</span></label>
                            <input type="text" class="form-control" id="insert-harga_grosir" name="harga_grosir" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Foto</label><span class="required" style="color: red">*</span></label>
                                <input type="file" name="file" required>
                            <span name="error"></span>
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_shipped">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                </form>
            </div>
            <span style="color: red"><?php if(isset($_SESSION['errorMSG'])){echo $_SESSION['errorMSG']; unset($_SESSION['errorMSG']);} ?></span>
            <span style="color: red"><?php if(isset($_SESSION['successMSG'])){echo $_SESSION['successMSG']; unset($_SESSION['successMSG']);} ?></span>
	</body>
</html>
