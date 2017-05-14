<?php	
	session_start();
	if(isset($_SESSION['loginError'])){
		session_unset($_SESSION['loginError']);
	}

    include("add_jasa_kirim.php");
    include("promo.php");
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
                    echo'<button data-toggle="modal" data-target="#kategori" style="width: 100%; text-align: left;" class="btn btn-info">Buat Kategori<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        <div id="kategori" class="modal fade" role="dialog">
            <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buat Kategori</h4>
      </div>
      <div class="modal-body">
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
	    
	    
    
    
</div>
      </div>
      <div class="modal-footer">
        <button id="add-subkategori-btn" class="btn btn-lg btn-primary btn-block">Tambah subkategori</button>
   		<input id="add-kategori-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Tambah Kategori" name="add-kategori">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </fieldset>
    </div>

  </div>
</div>
        <br>
        <button data-toggle="modal" data-target="#jasa" style="width: 100%; text-align: left;" class="btn btn-info">Buat Jasa Kirim<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        
        <div id="jasa" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buat Jasa Kirim</h4>
      </div>
      <div class="modal-body">
          <div class="text-center">
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
              <span style="color: red">';?><?php echo $echoBerhasil; echo'</span>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Submit</button>
          </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
        <button data-toggle="modal" data-target="#promo" style="width: 100%; text-align: left;" class="btn btn-info">Add Promo<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        
        <div id="promo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Promo</h4>
      </div>
      <div class="modal-body">
        <h2>Add Promo</h2>
        <div>
            <span class="required" style="color: red">*required</span>
        </div>
	      <div class="konten-isi" style="text-align: justify; text-justify: inter-word;">
						<form action="index.php" method="post">
							<div class="form-group">
                <label for="deskripsi">Deskripsi<span class="required" style="color: red">*</span></label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                <span style="color: red"><?php echo $echoDeskripsi; ?></span>
              </div>
              <div class="form-group">
                <label for="periodeAwal">Periode Awal<span class="required" style="color: red">*</span></label>
                <input type="date" class="form-control" id="periodeAwal" name="periodeAwal">
                <span style="color: red"><?php echo $echoPeriodeAwal; ?></span>
              </div>
              <div class="form-group">
                <label for="periodeAkhir">Periode Akhir<span class="required" style="color: red">*</span></label>
                <input type="date" class="form-control" id="periodeAkhir" name="periodeAkhir">
                <span style="color: red"><?php echo $echoPeriodeAkhir; ?></span>
                <span style="color: red"><?php echo $echoError; ?></span>
              </div>
              <div class="form-group">
                <label for="kodePromo">Kode Promo<span class="required" style="color: red">*</span></label>
                <input type="text" class="form-control" id="kodePromo" name="kodePromo">
                <span style="color: red"><?php echo $echoKodePromo; ?></span>
              </div>
							<div class="form-group">
                <label for="kategori">Pilih Kategori<span class="required" style="color: red">*</span></label>
                <select class="form-control" name="kategoriUtama" onchange="getId(this.value);">
                <span style="color: red"><?php echo $echoKategoriUtama; ?></span>
									<option value="kosong">Select Kategori Utama</option>';?>
                  <?php
                    $conn = connectDB();
                    $sql = "SELECT * FROM tokokeren.KATEGORI_UTAMA";

                    if(!$result = pg_query($conn, $sql)) {
                      die("Error: $sql");
                    }

                    while ($row = pg_fetch_row($result)) {
                      $noKategori = $row[0];
                      $namaKategori = $row[1];
                      echo '<option value='.$noKategori.'>'. $namaKategori.'</option>';
                    }
                echo'
								</select>
							</div>
							<div class="form-group">
                <select class="form-control" name="subKategori" id="subKategori">
                  <option value="kosong">Select Sub-Kategori</option>
                </select>
                <span style="color: red"><?php echo $echoSubkategori; ?></span>
              </div>
					</div>
	</div>
    <div class="modal-footer">
    <button type="submit" name="command" id="command" class="btn btn-default">Submit</button>
						</form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      
      
    </div>

  </div>
    
    <button data-toggle="modal" data-target="#produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
    <div id="produk" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Produk</h4>
      </div>
      <div class="modal-body">
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
                        
      </div>
      <div class="modal-footer">
      <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_pulsa">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            
            
            <button data-toggle="modal" data-target="#shipped" style="width: 100%; text-align: left;" class="btn btn-info">Produk Shipped<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
            
            <div id="shipped" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambahkan Produk Shipped</h4>
      </div>
      <div class="modal-body">
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
                        
      </div>
      <div class="modal-footer">
      <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_pulsa">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>
        </div>';
                } else if ($_SESSION['role'] == 'penjual') {
                    echo '<button data-toggle="modal" data-target="#beli_produk" style="width: 100%; text-align: left;" class="btn btn-info">Beli Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="beli_produk" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Membeli produk</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';
                
                    echo '<a href="membuat_toko.php"><button style="width: 100%; text-align: left;" class="btn btn-info">Buka Toko<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button></a>';

                    echo '<button data-toggle="modal" data-target="#lihat_transaksi" style="width: 100%; text-align: left;" class="btn btn-info">Lihat Transaksi<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="lihat_transaksi" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lihat transaksi</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';

                 echo '<button data-toggle="modal" data-target="#lihat_cart" style="width: 100%; text-align: left;" class="btn btn-info">Lihat keranjang belanja<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="lihat_cart" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lihat Cart</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';

                 echo '<button data-toggle="modal" data-target="#tambah_produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="tambah_produk" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah produkk</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';

                echo '<button data-toggle="modal" data-target="#tambah_produk_toko" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk toko<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="tambah_produk_toko" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah produk toko</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';


                }
                else {
                   echo '<button data-toggle="modal" data-target="#beli_produk" style="width: 100%; text-align: left;" class="btn btn-info">Beli Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="beli_produk" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Membeli produk</h4>
                      </div>
                      <div class="modal-body">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Pulsa</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Barang</button>

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';
                
                    
                    echo '<button data-toggle="modal" data-target="#lihat_transaksi" style="width: 100%; text-align: left;" class="btn btn-info">Lihat Transaksi<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="lihat_transaksi" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lihat transaksi</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';

                 echo '<button data-toggle="modal" data-target="#lihat_cart" style="width: 100%; text-align: left;" class="btn btn-info">Lihat keranjang belanja<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="lihat_cart" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Lihat Cart</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';

                 echo '<button data-toggle="modal" data-target="#buka_toko" style="width: 100%; text-align: left;" class="btn btn-info">Membuka toko<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="buka_toko" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Buka toko</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';

                 echo '<button data-toggle="modal" data-target="#tambah_produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="tambah_produk" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah produkk</h4>
                      </div>
                      <div class="modal-body">
                        

                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>';

                
                }

            }
        ?>
       
        
           <!--     end extras -->        
    </div>
    <div class="space"></div>
<!-- end container -->
</div>
<!-- end main -->
<style>
    /* The side navigation menu */
.sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0;
    left: 0;
    background-color: #111; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s;
    padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
    
<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
    
</script>

<script type="text/javascript">
      function getId(val){
        $.ajax({
          type: "POST",
          url: "getdata.php",
          data: "cid="+val,
          success: function(data){
            $("#subKategori").html(data);
          }
        });
      }
</script>

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