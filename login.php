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
			top: 15px;
			left: 162px;
			font-size: 12px;
		}
		.login-panel {
			background-color: #F7F7F7;
			height: 430px;
			border-style: none;
			box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
		}
	</style>
</head>
<body>
<div class="container">
    <div class="row">
    	<button id="home-btn" class="btn btn-lg btn-primary">
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
                                <input id="login-btn" class="btn btn-lg btn-primary btn-block" type="submit" value="Login" name="login" href="index.php">
                        </fieldset>
                    </form>
                    <div class="login-footer"><a  id="login-footer-text">Belom gabung TokoKeren?</a></div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>


