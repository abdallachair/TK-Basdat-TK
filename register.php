<?php
	// define variables and set to empty values
	session_start();

	if(isset($_SESSION['loginError'])){
		session_unset($_SESSION['loginError']);
	}

	if(isset($_SESSION['role'])){
		header("Location: index.php");
	}

	$ErrMsg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	  	//validasi data
	  	if (!preg_match("/^([\w\-]+\@[\w\-]+\.[\w\-]+){1,50}$/", $_POST['email'])){
			$ErrMsg = "Email tidak sesuai! (maksimal 50 karakter)";
	  	}
	  	else if (!preg_match("/^[a-zA-Z ]{1,100}$/", $_POST['uname'])){
			$ErrMsg = "Nama tidak sesuai (maksimal 100 karakter)";
	  	}
		else if($_POST['sex'] == "kosong"){
			$ErrMsg = "Isi jenis kelamin!";
		}
		else if(!preg_match("/^[\w\-]{6,20}$/", $_POST['pass'])){
			$ErrMsg = "Password minimal terdiri dari 6 karakter dan maksimal 20 karakter!";
		}
		else if($_POST['pass'] != $_POST['repass']){
			$ErrMsg = "Password dan konfirmasi password harus sama!";
		}
		else if(!preg_match("/^(?:08)(?:\d(?:-)?){8,20}$/", $_POST['notelp'])){
			$ErrMsg = "Nomor telfon harus berupa angka! (minimal 8 digit maksimal 20 digit)";
		}
		else if(preg_match("/\d/", $_POST['alamat'])){
			$ErrMsg = "Alamat tidak boleh terdiri dari angka saja!";
		}
		//kondisi data yang dimasukkan sudah sesuai format
		else{
			registerUser($_POST['email']);
		}	
	}	
function registerUser($email){
	//mengecek apakaah email sudah ada di dalam database
	$conn = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016");

	$query_email_pengguna = "SELECT * FROM TOKOKEREN.PENGGUNA where email = '".$email."'";
	$query_email_pelanggan = "SELECT * FROM TOKOKEREN.PELANGGAN where email = '".$email."'";

	$result_email_pengguna = pg_query($conn, $query_email_pengguna);
	$result_email_pelanggan = pg_query($conn, $query_email_pelanggan);
	$count = pg_num_rows($result_email_pengguna);
	$count_admin = pg_num_rows($result_email_pelanggan);

	//kondisi email sudah ada
	if($count > 0 || $count_admin > 0){
		$ErrMsg = "Email sudah tergabung sebelumnya";
		header("Location: register.php");
	}
	//kondisi email belom ada di dalam database
	else{
		$uname = $_POST['uname'];
		$tgllahir = $_POST['tgllahir'];
		$sex = $_POST['sex'];
		$pass = $_POST['pass'];
		$notelp = $_POST['notelp'];
		$alamat = $_POST['alamat'];	

		$query_register_pengguna = "INSERT INTO TOKOKEREN.PENGGUNA VALUES('".$email."', '".$pass."', '".$uname."', '".$sex."', '".$tgllahir."', '".$notelp."', '".$alamat."')";
		$query_register_pelanggan = "INSERT INTO TOKOKEREN.PELANGGAN VALUES('".$email."')";
		pg_query($conn, $query_register_pengguna);
		pg_query($conn, $query_register_pelanggan);

		$_SESSION['role'] = 'pengguna';
		$_SESSION['email'] = $email;
		$_SESSION['baru'] = TRUE;
		header("Location: index.php");
	}
	
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href='//fonts.googleapis.com/css?family=Patua One' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>register</title>
	<style>
		.register-panel {
			position: relative;
            margin-top: 20%;
            left: -50%;
            background-color: #F7F7F7;
            width: 720px;
			height: 610px;
			border-style: none;
			box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
		body {	
		    font-family: 'Raleway';
		}
		#home-btn{
			position: relative;
			border-style: none;
			border-radius: 5px;
			right:605px;
			top:30px;
			background-color: #8AA9B3;
		}
		#register-header-img{
			position: relative;
			top: -15px;
			left:-14px;
		}
		.form-group{
			position: relative;
			margin-top: -8px; 
			top: 5px;
			left: 90px;
			height: 30px;
			width: 500px;
			border-style: none;
		}
		#register-btn {
			position: relative;
			top: 20px;
			left: 90px;
			width: 500px;
			margin-bottom: 10px;
			background-color: #4A545C;
		}
		#register-footer-text {
			position: relative;
			top: 9px;
			left: 425px;
			font-size: 12px;
		}
		.error{
			color: red;
		}
	</style>
</head>
<body>
<div class="container">
    <div class="row">
    	<button id="home-btn" class="btn btn-lg btn-primary"  onclick="location.href='index.php';">
			<span class="glyphicon glyphicon-home"></span>
		</button>
        <div class="col-md-4 col-md-offset-4">
            <div class="register-panel panel panel-primary">
                <div class="panel-body">
                	<div class="register-header">
                		<img id="register-header-img" src="src/img/register-header1.gif" alt="register-header">
                	</div>
                    <form role="form" method="post" action="register.php">
                        <fieldset>
                            <div class="form-group ">
                                <input id="email-input" class="form-control" placeholder="Email" name="email" type="text" required>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                             <div class="form-group">
                                <input id="name-input" class="form-control" placeholder="Nama kamu" name="uname" type="text" 
                                value="" required>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
							<div class="form-group">
							      <input type="date" class="form-control" name="tgllahir" value="" placeholder="Date of Birth" required>
							</div>
                            <div class="form-group">
                                <input id="pass-input" class="form-control" placeholder="Password" name="pass" type="password" value="" required>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                                <input id="pass-input-repeat" class="form-control" placeholder="Konfirmasi Password" name="repass" type="password" required>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                               <select id="sex-input" name="sex" class="selectpicker form-control" required>
                               	  <option value="kosong">Jenis Kelamin</option>
								  <option value="L">Laki-laki</option>
								  <option value="P">Perempuan</option>
								</select>
								<span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                                <input id="notelp-input" class="form-control" placeholder="Nomor Telfon" name="notelp" type="text" value="" required>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                                <input id="alamat-input" class="form-control" placeholder="Alamat" name="alamat" type="text" autofocus required>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div class="form-group">
                            <input type="hidden" name="command" value="register">
                            <input id="register-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="register" name="register">
                        </fieldset>
                    </form>
                    <div class="register-footer"><a id="register-footer-text" href="login.php">Sudah gabung TokoKeren?</a></div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>


