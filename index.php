<?php
    
	session_start();
	if(isset($_SESSION['loginError'])){
		session_unset($_SESSION['loginError']);
	}
  $_SESSION['kode_produk'] = array();
   // include("add_jasa_kirim.php");
    //include("promo.php");
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
            <?php
               $_SESSION['role'] = 'admin';
              //unset($_SESSION['role']);
                  if(isset($_SESSION['baru'])){
                     echo '<div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Selamat!</strong> Kamu sudah tergabung dalam TokoKeren!
                          </div>';
                  }
            ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#gsdk">Link</a></li>
                <li class="dropdown">
                      <a href="#gsdk" class="dropdown-toggle" data-toggle="dropdown">Explore <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="pilih_toko.php">Beli Produk</a></li>
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
                        if($_SESSION['role'] == 'admin'){
                          echo '<li><p id="email-user">admin</p></li>';
                        }
                        else{
                    		  echo '<li><p id="email-user">'.$_SESSION['email'].' </p></li>';
                        }
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
                  include 'views/admin.php';
                } else if ($_SESSION['role'] === 'penjual') {
                    include_once 'views/pelanggan.php';
                }
              }
        ?> <!--     end extras -->  
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

#email-user{
  color: white;
  margin-top: 20pt;
  margin-left: 10px;
  margin-right: 10px;
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