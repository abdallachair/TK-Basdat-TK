<?php
	session_start();
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
	        <?php
	       /** if($admin){
	            include_once './admin.php';
	        } **/
	        ?>

	        <div class="row">
	            <div class="table-responsive">
		             <table class='table table-hover'>
		               <thead>
		                  <tr>
		                     <th>Kode Produk</th>
		                     <th>Nama Produk</th>
		                     <th>Berat</th>
		                     <th>Kuantitas</th>
		                     <th>Harga</th>
		                     <th>Subtotal</th>
		                  </tr>
		               </thead>
		            <?php
		                // while ($row = mysqli_fetch_row($result)) {
		                //     echo"<tr>";
		                //     $i = 0;
		                //     foreach($row as $key => $value) {
		                //         if($i == 1){
		                //             echo '
		                //              <form action="view.php" method="post">
		                //              <input type="hidden" id="review-buku" name="review-buku" value="'.$row[0].'">
		                //              <input id="buku-'.$row[0].'" type="submit" class="hidden">

		                //              </form>
		                //             ';
		                //             echo '<button class="hidden" id="bukubuku-'.$row[0].'" data-toggle="modal" data-target="#myModal"></button>';
		                //         echo "<td class='img-review' val='".$row[0]."'><img href='#' class='img-thumbnail' src='$value'/></td>";
		                //         } elseif($i > 1){
		                //         echo "<td><p>$value</p></td>";
		                //         } else {

		                //         }
		                //         $i++;

		                //     }
		                // }
		            ?>
		            </table>
	            </div>
	        </div>

	        <label for="alamat-kirim">Alamat Kirim:</label>
            <input type="text" class="form-control" id="alamat-kirim" name="alamat-kirim" placeholder="Masukkan Alamatmu" required>
            <div class="form-group">
				<label for="kategori">Pilih Jasa Kirim</label>
				<select class="form-control" name="jasa-kirim" onchange="getId(this.value);" required="">
					<option>Select Jasa Kirim</option>
					<?php
						// $conn = connectDB();
						// $sql = "SELECT * FROM TOKO_JASA_KIRIM";
						// if(!$result = mysqli_query($conn, $sql)) {
						// die("Error: $sql");
						// }	

						// while ($row = mysqli_fetch_row($result)) {
						// 	$noKategori = $row[0];
						// 	$namaKategori = $row[1];
						// 	echo '<option value='.$noKategori.'>'. $namaKategori.'</option>';
						// }
					?>
				</select>
				<button type="checkout" class="btn btn-default">Checkout</button>
		</div>
	    </div>
    </body>
</html>
