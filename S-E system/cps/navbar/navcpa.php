 <?php include 'core/connection.php'; ?>
  <?php
session_start(); ?>
<html>
<head>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/custom.css" rel="stylesheet">  
</head>


  
  <body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top, #B3B3BD, #31317C);
   background-image: -moz-linear-gradient(top, #B3B3BD,#B3B3BD);
  background-image: -ms-linear-gradient(top, #B3B3BD, #B3B3BD);
  background-image: -o-linear-gradient(top, #B3B3BD, #B3B3BD);
  background-image: linear-gradient(to bottom, #B3B3BD, #B3B3BD);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">
  
   

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li style="text-color:white"><a href="index.php"><h4>Home</h4></a></li>
      <li><a href="aboutus.php"><h4>About Us</h4></a></li>
       <li><a href="products.php"><h4>Products</h4></a></li>
      <li><a href="contactus.php"><h4>Contact Us</h4></a></li>
     
       <?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $find_user = mysql_query("select * from tbl_user where username = '$_SESSION[username]'")or die(mysql_error());
    $user = mysql_fetch_array($find_user);
  ?>
 
    <li><a href="#"><h4>Welcome <?php echo $user[1]; ?> ! </h4></a></li>
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
    <a href="view_cart.php" class="btn btn-info btn-md" name="viewcart">
    <span class="glyphicon glyphicon-shopping-cart"></span> Cart
  </a> 
  <a href="logout.php" class="btn btn-info btn-md" onclick="return confirm('Are you sure want to logging out?')">
    Log out
  </a> 
  <a href="Products.php" class="btn btn-info btn-md">
    Products
  </a>    
  <?php
  }
  else{
  ?>
      <li><a href="#"><class="btn btn-success" data-toggle="modal" data-target="#popUpWindow"><h4>User Log In</h4></a></li>
      

               <div class="modal fade" id="popUpWindow">
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
                                  $find_account = mysql_query("select * from tbl_user where username = '$username' and password = '$password'")or die(mysql_error());
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

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>