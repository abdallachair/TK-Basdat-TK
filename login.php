<?php 
//isi host, dbname, user, pass fbsql_database(link_identifier)
session_start();


function loginUser($email, $pass){
	if(empty($_POST['email']) || empty($_POST['pass'])){
		//echo("<p class='loginErr'>Email dan Password harus diisi!</p>");
		$_SESSION['loginError'] = "Email dan Password harus diisi!";
	}
	else{
		$conn = pg_connect("host=localhost port=5432 dbname=farhanramadhan user=postgres password=gold28197");
		//disesuaikan querynya
		$query_email = "SELECT email FROM TOKOKEREN.PENGGUNA WHERE email='".$email."' and password='".$pass."' ";
		$result_email = pg_query($conn, $query_email); 
		$count = pg_num_rows($result_email);
		if($count > 0){
			$query_is_admin = "SELECT * FROM TOKOKEREN.PENGGUNA WHERE email NOT IN (SELECT email FROM TOKOKEREN.PELANGGAN);";
			$result_is_admin = pg_query($conn, $query_is_admin);
			$row_admin = pg_fetch_assoc($result_is_admin);
			$count_row_admin = pg_num_rows($result_is_admin);
			$isAdmin = false;

			while($count_row_admin > 0){
				if($row_admin['email'] == $email){
					$_SESSION['role'] = 'admin';
					$isAdmin = true;

					break;
				}
				$count_row_admin -= 1;
			}

			if(!$isAdmin){
				$query_is_penjual = "SELECT is_penjual FROM TOKOKEREN.PELANGGAN WHERE email='".$email."' ";
				$result_is_penjual = pg_query($conn, $query_is_penjual);
				$row_penjual = pg_fetch_assoc($result_is_penjual);

				if($row_penjual['is_penjual'] === true){
					$_SESSION['role'] = 'penjual';
					//header("Location: index.php");
				}
				else{
					$_SESSION['role'] = 'pembeli';
					//header("Location: index.php");
				}
			}
			
			header("Location: index.php");
			
		}
		else{
			$_SESSION['loginError'] = "Email atau password salah!";
		}
	}
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if($_POST['command'] === 'login') {
		loginUser($_POST['email'], $_POST['pass']);
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
    <title>Login</title>
	<style>
		.login-panel {
            margin-top: 25%;
        }
		body {
		    font-family: 'Raleway';
		}
		#home-btn{
			position: relative;
			border-style: none;
			border-radius: 5px;
			right:425px;
			top:45px;
			background-color: #8AA9B3;
		}
		#login-header-img{
			position: relative;
			left:-14.5px;
		}
		#pass-input, #email-input, #login-btn {
			position: relative;
			top: 15px;
			left: 15px;
			margin-top: -3%;
			height: 50px;
			width: 300px;
			border-style: none;
		}
		#login-btn {
			background-color: #4A545C;
		}
		#login-footer-text {
			position: relative;
			top: 2px;
			left: 162px;
			font-size: 12px;
		}
		.login-panel {
			background-color: #F7F7F7;
			height: 450px;
			border-style: none;
			box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
		}
		.loginErr{
			position: relative;
			color: red;
			top: 14px;
			left: 20%;
		}
	</style>
</head>
<body>
<div class="container">
    <div class="row">
    	<button id="home-btn" class="btn btn-lg btn-primary" onclick="location.href='index.php';">
			<span class="glyphicon glyphicon-home"></span>
		</button>
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-body">
                	<div class="login-header">
                		<img id="login-header-img" src="src/img/login-header.gif" alt="login-header">
                	</div>
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group">
                                <input id="email-input" class="form-control" placeholder="Email" name="email" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input id="pass-input" class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>
                            	<input type="hidden" name="command" value="login">
                                <input id="login-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Login" name="login">
                            <p class="loginErr">
                            <?php 
                            if(isset($_SESSION['loginError']))
                            	echo $_SESSION['loginError']; 
                        	?></p>
                        </fieldset>
                    </form>
                    <div class="login-footer"><a href='register.php' id="login-footer-text">Belom gabung TokoKeren?</a></div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>


