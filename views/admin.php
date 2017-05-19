<?php 

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
        <button data-toggle="modal" data-target="#kategori" style="width: 100%; text-align: left;" class="btn btn-info">Buat Kategori<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        <br>
        <button data-toggle="modal" data-target="#jasa" style="width: 100%; text-align: left;" class="btn btn-info">Buat Jasa Kirim<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        <br>  
        <button data-toggle="modal" data-target="#promo" style="width: 100%; text-align: left;" class="btn btn-info">Add Promo<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        <br>
        <button data-toggle="modal" data-target="#produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        <br>
        <button data-toggle="modal" data-target="#shipped" style="width: 100%; text-align: left;" class="btn btn-info">Produk Shipped<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        <br>
    
    
<!-- modal kategori -->
<div id="kategori" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Buat Kategori</h4>
          </div>
          <div class="modal-body">
             <h1>Menambahkan Kategori dan Subkategori</h1>
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
          <div class="modal-footer">
            <button id="add-subkategori-btn" class="btn btn-lg btn-primary btn-block">Tambah subkategori</button>
            <input id="add-kategori-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Tambah Kategori" name="add-kategori">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>

<!-- end modal kategori-->

<!-- modal jasa -->
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
              <span style="color: red"><?php echo $echoNamaJasa;?></span>
            </div>
            <div class="form-group">
              <label for="lamakirim">Lama Kirim : <span class="required" style="color: red">*</span></label>
              <input type="text" class="form-control" id="lama_kirim" placeholder="Masukkan lama kirim" name="lama_kirim">
              <span style="color: red">';?><?php echo $echoLamaKirim;?></span>
            </div>
            <div class="form-group">
              <label for="tarif">Tarif : <span class="required" style="color: red">*</span></label>
              <input type="text" class="form-control" id="tarif_jasa_kirim" placeholder="Masukkan tarif" name="tarif_jasa_kirim">
              <span style="color: red">';?><?php echo $echoTarif?></span>
              <span style="color: red">';?><?php echo $echoBerhasil;?></span>
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
<!-- end modal jasa-->

<!-- modal promo-->

<!-- end modal promo-->

<!-- modal produk-->
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
<!-- end modal produk-->

<!-- modal shipped-->
<div id="shipped" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambahkan Produk Shipped</h4>
      </div>
      <div class="modal-body">
        <h2>FORM MENAMBAH PRODUK SHIPPED</h2>
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
<!-- end modal shipped-->

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
<script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  <script src="assets/js/gsdk-checkbox.js"></script>
  <script src="assets/js/gsdk-radio.js"></script>
  <script src="assets/js/gsdk-bootstrapswitch.js"></script>
  <script src="assets/js/get-shit-done.js"></script>
  
  <script src="assets/js/custom.js"></script>
</body>

  

</html>