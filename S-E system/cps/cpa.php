  <?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "stock_se");
?>
<html>
<title>Car Parts and Scanner</title>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
     <link href="css/bootstrap.css" rel="stylesheet"> 
     <link href="css/jumbotron.css" rel="stylesheet">   
</head>
  <body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top, #D9E2F7, #D9E2F7);
   background-image: -moz-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -ms-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -o-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: linear-gradient(to bottom, #D9E2F7, #D9E2F7);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">

   <?php include 'core/connection.php'; ?>
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
 
    <li><a href="#"><h3 style="margin-top:5px;">Welcome <b name="name"><?php echo $user[1]; ?></b> ! </h3></a></li>
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
      <li><a href="#"><class="btn btn-success" data-toggle="modal" data-target="#popUpWindow"><h4>User Log In</h4></a></li>
      

               <div class="modal fade" id="popUpWindow">
          <div class="modal-dialog">
            <div class="modal-content">

               <!--header -->
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" href="cpa.php">&times;</button>
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
   

<div class="jumbotron">
            <div class="container">
                  <h1 class="itro-text">Car Parts and Accessories
                  </h1>
            </div> 
</div> 

<div class="container">
  <div class="row">
     
        <?php
          $query = "SELECT * FROM product where category='Car Parts and Accessories' ORDER BY product_id ASC";
          $result = mysqli_query($connect,$query);
            if(mysqli_num_rows($result) > 0)
          {
            while($row = mysqli_fetch_array($result))
          {
        ?>
            <div class="col-md-4">
              <form method="post" action="cpa.php?action=add&id=<?php echo $row["product_id"]; ?>">
                <div style="border: 4px solid #333; margin: -1px 19px 3px -1px; box-shadow 0 1px 2px rgba(0,0,0,0.05); padding:10px"; align="center">
                  <img src="xyz/<?php echo $row["product_image"]; ?>" class="img-rounded" width="300" height="270"><br>
                  <h5 class="text-info"><?php echo $row["product_name"]; ?></h5>
                  <h5 class="text-danger">$ <?php echo $row["product_price"]; ?></h5>
                  <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
                  <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
                                        <a href="#" name="viewcart" style="margin-top:5px;" class="btn btn-primary"  data-toggle="modal" data-target="#popUpWindow<?php echo $row["product_id"]; ?>" >View Product</a>

                                              <div class="modal fade" id="popUpWindow<?php echo $row["product_id"]; ?>">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                              <!--header -->
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                  <h3 class="modal-title"><?php echo $row["product_name"]; ?></h3>
                                                                  <h4 class="modal-title text-danger"> $ <?php echo $row["product_price"]; ?></h4>
                                                              </div>
                                                              <!-- body -->
                                                              <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                             <div class="col-lg-6">
                                                                                               <form method="post" action="cpa.php?action=add&id=<?php echo $row["product_id"]; ?>">
                                                                                                 <div style="border: 4px solid #333; margin: -1px 19px 3px -1px; box-shadow 0 1px 2px rgba(0,0,0,0.05); padding:10px"; align="center">
                                                                                                     <img src="xyz/<?php echo $row["product_image"]; ?>" class="img-rounded" width="300" height="270"><br>
                                                                      
                                                                                                      <h5 class="text-danger"></h5>
                                                                                                      <h3 class="itro-text text-left"><p><?php echo $row["des"]; ?></p></h3>
                                                                                                      <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
                                                                                                      <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
                                                                                                        <?php
                                                                                                           if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                                                                                                           $find_user = mysql_query("select * from customer where username = '$_SESSION[username]'")or die(mysql_error());
                                                                                                           $user = mysql_fetch_array($find_user);
                                                                                                        ?>

                                                                                                        <?php
                                                                                                            $qry = "SELECT * FROM customer where username='$_SESSION[username]'";
                                                                                                            $res = mysqli_query($connect,$qry);
                                                                                                              if(mysqli_num_rows($res) > 0)
                                                                                                            {
                                                                                                              while($p = mysqli_fetch_array($res))
                                                                                                            {
                                                                                                          ?>
                                                                                                              <input type="text" name="quantity" class="form-control" value="1">
                                                                                                              <input type="Submit" name="add" style="margin-top:5px;" class="btn btn-primary" value="Add to Bag"  onclick="return confirm('Are you sure want to Add to your cart this Product?')">
                                                                                                               <input type="hidden" name="hidden_user" value="<?php echo $p["name"]; ?>">
                                                                                                            <?php } }?>  
                                                                                                        <?php
                                                                                                            }
                                                                                                            else{}
                                                                                                        ?>
                                                                                                 </div>
																								  <div class="form-group col-md-12">
					
                       <label class="pull pull-left">Comment :</label><br>
					   <?php
					$id = $row["product_id"];
					$qxx = "SELECT * FROM comments where pro_id = '$id'";
					$rss = mysqli_query($connect,$qxx);
					  if(mysqli_num_rows($rss) > 0)
					{
					  while($q = mysqli_fetch_array($rss))
					{ ?>
				<div class="media">
					  <div class="media-left">
						<a href="#">
						  <img class="media-object" src="<?php echo $q["img"]; ?>" width="50px" height="50px"" alt="...">
						</a>
					  </div>
					  <div class="media-body" style="text-align:left">
						<h4 class="media-heading"><?php echo $q["Name"]; ?> &nbsp;&nbsp; <strong style="color:blue;font-size:15px;"><?php echo $q["Email"]; ?></strong></h4>
						<strong style="font-size:15px;"><?php echo $q["Msg"]; ?></strong><br><b style="font-size:10px"><?php echo $q["DnT"]; ?> </b>
					  </div>
					</div>
					<p>___________________________________</p>
					<?php }} ?>
					<br><br>
						<?php
							  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
								$find_user = mysql_query("select * from customer where username = '$_SESSION[username]'")or die(mysql_error());
								$user = mysql_fetch_array($find_user);
								
								$qry = "SELECT * FROM customer where username='$_SESSION[username]'";
												$res = mysqli_query($connect,$qry);
												  if(mysqli_num_rows($res) > 0)
												{
												  while($p = mysqli_fetch_array($res))
												{
							  ?>
                       <textarea name="msg" class="form-control" rows="3"></textarea>
					    <input type="hidden" name="name-com" value="<?php echo $p["name"]; ?>">
						<input type="hidden" name="email-com" value="<?php echo $p["email"]; ?>">
						<input type="hidden" name="pro-com" value="<?php echo $row["product_id"]; ?>">
                    </div> <?php } }?>
                    <div class="pull pull-right" style="padding-right:20px;">
                      <input type="hidden" name="save" value="contact">
					  <?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $find_user = mysql_query("select * from customer where username = '$_SESSION[username]'")or die(mysql_error());
    $user = mysql_fetch_array($find_user);
  ?>
                      <button type="submit" name="com" id="com" class="btn btn-default" onclick="return confirm('Thankyou for your comment!')">Submit</button>
					  <?php
  } }
						?>
                    </div>
                                                                                              </form>                                                           
                                                                                            </div>     
                                                                            </div>
                                                                        </div>

                                                              </div>   
                                                  </div>
                                                </div>
                                              </div>
                </div>
              </form>
            </div>

                      <?php
                        }

                        }
                        
                      ?>

  </div>
</div>
<?php
if(isset($_POST["add"]))
{
    if(isset($_SESSION["cart"]))
  {
    $item_array_id = array_column($_SESSION["cart"], "product_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["cart"]);
      $item_array = array(
      'product_id' => $_GET["id"],
      'item_name' => $_POST["hidden_name"],
      'product_price' => $_POST["hidden_price"],
      'item_quantity' => $_POST["quantity"]
      );
      $_SESSION["cart"][$count] = $item_array;
      echo '<script>window.location="cpa.php"</script>'; 
    }
    else
    {
      echo '<script>alert("Products already added to cart")</script>';
      echo '<script>window.location="cpa.php"</script>';
    }
  }
  else
  {
    $item_array = array(
    'product_id' => $_GET["id"],
    'item_name' => $_POST["hidden_name"],
    'product_price' => $_POST["hidden_price"],
    'item_quantity' => $_POST["quantity"]
    );
    $_SESSION["cart"][0] = $item_array;
  }   
}
if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["cart"] as $keys => $values)
    {
      if($values["product_id"] == $_GET["id"])
      {
        unset($_SESSION["cart"][$keys]);
        echo '<script>window.location="view_cart.php"</script>';
      }
    }
  }
}
?>

<?php
				if(isset($_POST['com'])){
					$name = $_POST['name-com'];
					$email = $_POST['email-com'];
					$msg = $_POST['msg'];
					$id = $_POST['pro-com'];
					$com = mysql_query("INSERT INTO comments (Name, Email, Msg, DnT, pro_id, img) VALUES ('$name', '$email', '$msg', now(), '$id', 'img/user.png')");
					echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/cpa.php';</script>";
				}
			
					?>
   
   

<?php include 'footer.php'; ?>

</body>
</html>
