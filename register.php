<?php
	// define variables and set to empty values
	session_start();
	if(isset($_SESSION['loginError'])){
		session_unset($_SESSION['loginError']);
	}

	$ErrMsg = "";
	$email = $pass = $repass = $nama = $sex = $notelp = $alamat = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["email"]) || empty($_POST["uname"]) || empty($_POST["pass"]) || empty($_POST["repass"]) || empty($_POST["sex"]) || empty($_POST["notelp"]) || empty($_POST["pass"])) {
	    $ErrMsg = "Semua data harus diisi"; 
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
                                <input id="email-input" class="form-control" placeholder="Email" name="email" type="text" autofocus>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                             <div class="form-group">
                                <input id="name-input" class="form-control" placeholder="Nama kamu" name="uname" type="text" 
                                value="">
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                                <input id="pass-input" class="form-control" placeholder="Password" name="pass" type="password" value="">
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                                <input id="pass-input-repeat" class="form-control" placeholder="Konfirmasi Password" name="repass" type="password" autofocus>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                               <select id="sex-input" class="selectpicker form-control">
								  <option>Laki-laki</option>
								  <option>Perempuan</option>
								</select>
								<span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                                <input id="notelp-input" class="form-control" placeholder="Nomor Telfon" name="notelp" type="text" value="">
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div>
                            <div class="form-group">
                                <input id="alamat-input" class="form-control" placeholder="Alamat" name="alamat" type="text" autofocus>
                                <span class="error">* <?php echo $ErrMsg;?></span>
                            </div class="form-group">
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


