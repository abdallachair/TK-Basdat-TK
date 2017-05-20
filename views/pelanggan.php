<?php	
	//session_start();
    include('membuat_toko.php');
	if(isset($_SESSION['loginError'])){
		session_unset($_SESSION['loginError']);
	}
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
<div class="main">
    <div class="container tim-container" style="max-width:800px; padding-top:100px">
                    <button data-toggle="modal" data-target="#beli_produk" style="width: 100%; text-align: left;" class="btn btn-info">Beli Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>

                    <button data-toggle="modal" data-target="#lihat_transaksi" style="width: 100%; text-align: left;" class="btn btn-info">Lihat Transaksi<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>

                 <button data-toggle="modal" data-target="#lihat_cart" style="width: 100%; text-align: left;" class="btn btn-info">Lihat keranjang belanja<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>

                 <button data-toggle="modal" data-target="#tambah_produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>

                <button data-toggle="modal" data-target="#tambah_produk_toko" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk toko<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>

                   <button data-toggle="modal" data-target="#beli_produk" style="width: 100%; text-align: left;" class="btn btn-info">Beli Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div><button data-toggle="modal" data-target="#lihat_transaksi" style="width: 100%; text-align: left;" class="btn btn-info">Lihat Transaksi<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>

                <button data-toggle="modal" data-target="#lihat_cart" style="width: 100%; text-align: left;" class="btn btn-info">Lihat keranjang belanja<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>

                <button data-toggle="modal" data-target="#buka_toko" style="width: 100%; text-align: left;" class="btn btn-info">Membuka toko<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="buka_toko" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Buka toko</h4>
                      </div>
                      <div class="modal-body">
                          <div class="membuat_toko">
                <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="nama_paket">Nama Toko</label>
                            <input type="text" class="form-control" id="insert-nama_toko" name="nama_toko" placeholder="masukkan nama toko yang kamu inginkan">
                        </div>
                        <div class="form-group">
                            <label for="nama_paket">Deskripsi Toko</label>
                            <input type="text" class="form-control" id="insert-deskripsi" name="deskripsi" placeholder="tuliskan deskripsi toko mu">
                        </div>
                        <div class="form-group">
                            <label for="fitur">Slogan</label>
                            <input type="text" class="form-control" id="insert-slogan" name="slogan" placeholder="masukkan slogan toko mu">
                        </div>
                        <div class="form-group">
                            <label for="harga">Lokasi</label>
                            <input type="text" class="form-control" id="insert-lokasi" name="lokasi" placeholder="masukkan lokasi dari toko mu">
                        </div>
                        <div class="form-group">
                            <label for="harga">Jasa Kirim 1</label><br>
                            <?php   
                                    echo '<select name="jasa_kirim_1" required>';
                                    echo '<option>PILIH JASA ANDA</option>';
                                    $jasa = selectAllFromTable("TOKOKEREN.JASA_KIRIM");
                                    while($row = pg_fetch_row($jasa)){
                                        echo '<option>'.$row[0].'</option>';
                                    }
                                    echo '</select>';
                            
                            ?>
                                    
                                    <div id="jasaKirim">
                                        
                                    </div>
                            <br>
                            
                            <button type="button" class="btn btn-primary" id="addJasaKirim">Tambah Jasa Kirim</button>
                        </div>
                        
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_toko">
                        <input id="loop" type="hidden" name="jml_loop" value="1">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                    </form>
                </div>
                      </div>
                      <div class="modal-footer">
                      
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>

                <button data-toggle="modal" data-target="#tambah_produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
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
                </div>
       
        
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