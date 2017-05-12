<?php	
	session_start();
	if(isset($_SESSION['loginError'])){
		session_unset($_SESSION['loginError']);
	}


    include("add_jasa_kirim.php");
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>TokoKeren - Home to Most Keren Tokoes</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet" />
    
	<link href="assets/css/gsdk.css" rel="stylesheet" />   
    <link href="assets/css/demo.css" rel="stylesheet" /> 

    <!--     Font Awesome     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  
</head>

<body>
 <div id="navbar-full">
    <div id="navbar">
    <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
        <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">
          <div class="alert alert-success hidden">
            <div class="container">
                <b>Lorem ipsum</b> dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
            </div>
          </div>
          
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#gsdk">Toko<b>Keren</b></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#gsdk">Link</a></li>
                <li class="dropdown">
                      <a href="#gsdk" class="dropdown-toggle" data-toggle="dropdown">Explore <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="membeli_produk_shipped.php">Beli Produk</a></li>
                        <li><a href="membeli_produk_pulsa.php">Beli Pulsa</a></li>
                        <li><a href="melihat_transaksi.php">Lihat Transaksi</a></li>
                      </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                </li>
              </ul>
               <form class="navbar-form navbar-left navbar-search-form" role="search">                  
                 <div class="form-group">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                 </div> 
              </form>
              <ul class="nav navbar-nav navbar-right">
                    
                    <?php
                    	if(!isset($_SESSION['role'])){
                    		echo '<li><a href="login.php" class="btn btn-round btn-default">Sign in</a></li>';
                    		echo '<li><a href="register.php">Register</a></li>';
                    	} else{
                    		echo $_SESSION['role'];
                    		echo '<li><a href="signout.php" class="btn btn-round btn-default">Sign out</a></li>';
                    	}
                    ?>
                    
               </ul>
              
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <div class="blurred-container">
            <div class="img-src" style="background-color: #99ccff"><h1 class="text-center" style="color: white;"><br><br><br>Toko<b>Keren</b></h1></div>
        </div>
    </div><!--  end navbar -->
</div> <!-- end menu-dropdown -->

<div class="main">
    <div class="container tim-container" style="max-width:800px; padding-top:100px">
       <h1 class="text-center">Providing you the most honest, authentic, quality in every store has to offer</h1>

        
        <?php
            if(isset($_SESSION["role"])){
                if($_SESSION["role"] === 'admin'){
                    echo'<button data-toggle="collapse" data-target="#demo" style="width: 100%; text-align: left;" class="btn btn-info">Buat Kategori<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        
        <div id="demo" class="collapse">
        <div class="">
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
   		<input id="add-kategori-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Tambah Kategori" name="add-kategori">
    </fieldset>
    
</div>
        </div>
        <br>
        <button data-toggle="collapse" data-target="#demo-jasa" style="width: 100%; text-align: left;" class="btn btn-info">Buat Jasa Kirim<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>

        <div id="demo-jasa" class="collapse">
        <div class="container" style="padding-left: 20%; padding-right: 20%">
          <div class="konten-header text-center">
                <span class="header-text"> ADD JASA KIRIM </span>
          </div>
          <div>
            <span class="required" style="color: red">*required</span>
          </div>
          <form action="index.php" method="POST">
            <div class="form-group">
              <label for="namajasakirim">Nama : <span style="color: red">*</span></label>
              <input type="text" class="form-control" id="nama_jasa_kirim" placeholder="Masukkan nama" name="nama_jasa_kirim">
              <span style="color: red">';?><?php echo $echoNamaJasa; echo'</span>
            </div>
            <div class="form-group">
              <label for="lamakirim">Lama Kirim : <span class="required" style="color: red">*</span></label>
              <input type="text" class="form-control" id="lama_kirim" placeholder="Masukkan lama kirim" name="lama_kirim">
              <span style="color: red">';?><?php echo $echoLamaKirim; echo'</span>
            </div>
            <div class="form-group">
              <label for="tarif">Tarif : <span class="required" style="color: red">*</span></label>
              <input type="text" class="form-control" id="tarif_jasa_kirim" placeholder="Masukkan tarif" name="tarif_jasa_kirim">
              <span style="color: red">';?><?php echo $echoTarif; echo'</span>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        </div>
        
        <button data-toggle="collapse" data-target="#demo-promo" style="width: 100%; text-align: left;" class="btn btn-info">Add Promo<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>

        <div id="demo-promo" class="collapse">
        <div class="container">
	  <h2>Add Promo</h2>
	  <div class="konten-isi" style="text-align: justify; text-justify: inter-word;">
						<form action="index.php" method="post">
							<div class="form-group">
								<label for="deskripsi">Deskripsi<span class="required" style="color: red">*</span></label>
								<input type="text" class="form-control" id="deskripsi">
							</div>
							<div class="form-group">
								<label for="periodeAwal">Periode Awal<span class="required" style="color: red">*</span></label>
								<input type="date" class="form-control" id="periodeAwal">
							</div>
							<div class="form-group">
								<label for="periodeAkhir">Periode Akhir<span class="required" style="color: red">*</span></label>
								<input type="date" class="form-control" id="periodeAkhir">
							</div>
							<div class="form-group">
								<label for="kodePromo">Kode Promo<span class="required" style="color: red">*</span></label>
								<input type="text" class="form-control" id="kodePromo">
							</div>
							<div class="form-group">
								<label for="kategori">Pilih Kategori<span class="required" style="color: red">*</span></label>
								<select class="form-control" name="kategoriUtama" onchange="getId(this.value);">
									<option>Select Kategori Utama</option>
									
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="subKategori" id="subKategori">
									<option>Select Sub-Kategori</option>
								</select>
							</div>
						  	<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
	  </form>
	</div>
        </div>
    
    <button data-toggle="collapse" data-target="#demo-produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>

        <div id="demo-produk" class="collapse">
            <button data-toggle="collapse" data-target="#demo-pulsa" style="width: 100%; text-align: left;" class="btn btn-info">Produk Pulsa<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
            <div id="demo-pulsa" class="collapse">
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
                            <label for="harga">Nominal</label>
                            <input type="text" class="form-control" id="insert-nominal" name="nominal" placeholder="masukkan harga dari toko mu" required>
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_pulsa">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>            
            </div>
            </div>
            <button data-toggle="collapse" data-target="#demo-shipped" style="width: 100%; text-align: left;" class="btn btn-info">Produk Shipped<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
            <div id="demo-shipped" class="collapse">
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
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_pulsa">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>  
            </div>
            </div>
        </div>';
                } else{
                    echo'<button data-toggle="collapse" data-target="#demo10" style="width: 100%; text-align: left;" class="btn btn-info">Buat Ulasan<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        
        <div id="demo10" class="collapse">
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
        </div>
        <br>';
                }
            }
        ?>
       
        
           <!--     end extras -->        
    </div>
    <div class="space"></div>
<!-- end container -->
</div>
<!-- end main -->
    

</body>

    <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/gsdk-checkbox.js"></script>
	<script src="assets/js/gsdk-radio.js"></script>
	<script src="assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="assets/js/get-shit-done.js"></script>
	
    <script src="assets/js/custom.js"></script>

</html>