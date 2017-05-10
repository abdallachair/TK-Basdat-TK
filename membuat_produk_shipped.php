<?php
/**
    function selectAllFromTable($table) {

        $query = "SELECT * FROM $table";

        return $result;   
    }
    
    function insertProdukPulsa(){

        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $nominal = $_POST['nominal'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['command'] === 'membuat_produk_pulsa'){
            insertProdukPulsa();
        } 
    } **/
?>
<?php session_start(); ?>
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
                <form action="page.php" method="post">
                        <div class="form-group">
                            <label for="nama_paket">Kode_produk</label>
                            <input type="text" class="form-control" id="insert-kode_produk" name="kode_produk" placeholder="masukkan kode produk" required>
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
                            <?php
                           //     $noJasaKirim = 1;
                           //     echo'<label for="harga">Jasa Kirim '.$noJasaKirim.'</label>
                           // <select>
                           //     <option>-------</option>';

                            //    $jasa = selectAllFromTable("JASA_KIRIM");
                             //   $value = 1;
                             //   while ($row = mysqli_fetch_row($jasa)){
                             //       echo'<option value="'.$value.'"></option>';
                             //       $value = value + 1;
                             //   }
                          
                           // echo'</select>
                          //  <input type="submit" value="Tambah Jasa">';
                          //  ?> 
                            <select>
                                <option>-----------------</option>
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
                            <input class="lagi " type="file" name="image_produk" id="image"/>
                            <span name="error">
                <?php  
                    if(isset($_SESSION['errorSize'])){
                        echo $_SESSION['errorSize'];
                    } else if(isset($_SESSION['errorType'])){
                        echo $_SESSION['errorType'];
                    } else{
                      //  print_r($_SESSION);
                        unset($_SESSION['errorSize']);
                        unset($_SESSION['errorType']);
                    }
                    
                ?>          </span>
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_pulsa">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>  
            </div>
	</body>
</html>
