<?php
session_start(); ?>
<?php include 'core/connection.php'; ?>
<html>
<head>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet"> 
 <link href="css/jumbotron.css" rel="stylesheet"> 
      
</head>
<title>Shop Information</title>
<body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top,  #D9E2F7, #D9E2F7);
   background-image: -moz-linear-gradient(top,  #D9E2F7, #D9E2F7);
  background-image: -ms-linear-gradient(top,  #D9E2F7, #D9E2F7);
  background-image: -o-linear-gradient(top,  #D9E2F7, #D9E2F7);
  background-image: linear-gradient(to bottom,  #D9E2F7, #D9E2F7);
  filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li style="text-color:white"><a href="index.php"><h4>Home</h4></a></li>
      <li><a href="aboutus.php"><h4>About Us</h4></a></li>
       <li><a href="products.php"><h4>Products</h4></a></li>
      <li><a href="contactus.php"><h4>Contact Us</h4></a></li>
     
       <?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $find_user = mysql_query("select * from customer where username = '$_SESSION[username]'")or die(mysql_error());
    $user = mysql_fetch_array($find_user);
  ?>
 
    <li><a href="#"><h3 style="margin-top:5px;">Welcome <?php echo $user[1]; ?> ! </h3></a></li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="view_cart.php" style="margin-top:18px;" class="btn btn-info btn-md" name="viewcart">
    <span class="glyphicon glyphicon-shopping-cart"></span> Cart
  </a>
  <a href="logout.php" style="margin-top:18px;" class="btn btn-info btn-md" onclick="return confirm('Are you sure want to logging out?')">
    Log out
  </a>
  <?php
  }
  else{
  ?>
      <li><a href="#"><class="btn btn-success" data-toggle="modal" data-target="#popUpWindow1"><h4>User Log In</h4></a></li>
      

               <div class="modal fade" id="popUpWindow1">
          <div class="modal-dialog">
            <div class="modal-content">

               <!--header -->
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Car Parts Store</h3>
                   </div>

               <!-- body (form) -->
                 <div class="modal-body">
                    <form role="form" method="post" class="login-form">  
                        <?php
                             function login($username, $password){
                                  $find_account = mysql_query("select * from customer where username = '$username' and password = '$password'")or die(mysql_error());
                                  $account = mysql_fetch_array($find_account);
                                  $accounts = mysql_num_rows($find_account);
                             if($accounts == 0){
                                  echo '<div class="alert alert-danger" role="alert">Invalid username and password.</div>';
                             }
                             else{
                                   $_SESSION['loggedin'] = true;
                                   $_SESSION['username'] = $username;
                                   echo "<script>alert('Successfully login.');location.replace('index.php');</script>";
                             }
                            }
                             if(isset($_POST['login'])){
                                   $username = mysql_real_escape_string($_POST['username']);
                                   $password = mysql_real_escape_string($_POST['password']);
                                    login($username, $password);
                            }
    
                             if(isset($_POST['sign'])){
                                   echo "<script>location.replace('registration.php');</script>";
                            }
                        ?>

                          <div class="form-group">  
                              <h3>Username</h3>
                               <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" required="required"autofocus="autofocus">
                          </div>
                          <div class="form-group">
                                 <h3>Password</h3>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" required="required" id="form-password">
                          </div>
                                <button type="submit" class="btn btn-primary" name="login">Sign in</button>
                                <a href="registration.php" class="btn btn-danger" name="sign">Sign up</a>     
                    </form>
                 </div>
                 <?php
                    }
               ?>
            </div>
          </div>
        </div>
    </ul>
  </div>
</nav>
<div class="alert alert-success" role="alert"><h2>Thankyou for ordering! Please use the following information for the payment! Godbless!</h2></div>
    <div class="col-sm-16"> 
  <form class="form-horizontal">
	 <div class="jumbotron">
            <div class="container">
                  <h1 class="intro-text">Shop Information
                  </h1>
            </div> 
  </div>

<div class="container">
    <div class="row">

     <h2>Receiver's Name: <strong>Arjay Manaloto Castro</strong></h2>
     <h2>Complete Address: <strong>Unit E. Miles Comm Bldg. Mt. View, Balibago, Angeles City</strong></h2>
     <h2>Contact Number: <strong>09958138825</strong></h2>
     <h2>Email Address: <strong>Procurement@nightona.com</strong></h2>
	 <?php
  if(!empty($_SESSION["cart"]))
  {
    $total = 0;
    foreach($_SESSION["cart"]as $keys => $values)
    {
      ?>
      <?php
      $total = $total + ($values["item_quantity"] * $values["product_price"]);
    }
    ?>
    
      <h2>Your Bill is: <strong><td align="left" style="border: 2px solid #333;">P <?php echo number_format($total,2); ?></td></strong></h2>
<?php
  }
  ?>
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>