<?php


require_once 'php_action/db_connect.php';

 session_start();
 
if(isset($_SESSION['userId'])){
header('location: http://localhost:90/cps/xyz/dashboard.php');
}

$errors = array();

if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) || empty($password)){
		if($username == ""){
			$errors[] = "Username is required";
		}
		if($password == ""){
			$errors[] = "Password is required";
		}
	}else{
		$sql = "SELECT * FROM user WHERE username = '$username'";
		$result = $connect->query($sql);
		
		if($result->num_rows == 1){
			$password = md5($password);
		
		//exists
		$mainSql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$mainResult = $connect->query($mainSql);
		
		if($mainResult->num_rows == 1){
			$value = $mainResult->fetch_assoc();
			$user_id = $value['user_id'];
			
			//set session
			$_SESSION['userId'] = $user_id;
			
			header('location: http://localhost:90/cps/xyz/dashboard.php');
		}else{
			$errors[] = "Incorrect username/password combination";
		}
	}else{$errors[] = "Username doesn't exists";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Stock Management System</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="login/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="login/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="login/assets/css/form-elements.css">
        <link rel="stylesheet" href="login/assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="login/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="login/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="login/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body background="22.jpg">

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg" style="padding-bottom:100px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Welcome</strong> Admin</h1>
                            <div class="description">
                            	<p>
	                            	Unauthorized person is not allowed!
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our Dashboard</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="login-form">
								<div class = "messages">
			<?php if($errors){
				foreach ($errors as $key => $value) {
					echo '<div class="alert alert-warning" role="alert">
				<i class="glyphicon glyphicon-exclamation-sign"></i>
					'.$value.'</div>';
				}
			}
?>			
			</div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                                    </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="login/assets/js/jquery-1.11.1.min.js"></script>
        <script src="login/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="login/assets/js/jquery.backstretch.min.js"></script>
        <script src="login/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>