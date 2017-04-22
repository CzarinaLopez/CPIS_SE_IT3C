<?php include 'navbar/navvc.php'; ?>
<?php include 'core/connection.php'; ?>
<!DOCTYPE html>
<title>Cashout</title>
<head>
  <link href="css/bootstrap.css" rel="stylesheet"> 
 <link href="css/jumbotron.css" rel="stylesheet">
</head>
<body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top, #D9E2F7, #D9E2F7);
   background-image: -moz-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -ms-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -o-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: linear-gradient(to bottom, #D9E2F7, #D9E2F7);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">
<div style="clear:both"></div>
  <div class="jumbotron">
            <div class="container">
                  <h1 class="intro-text">Please Choose
                  </h1>
            </div> 
  </div>
  <div class="container">
    <div class="row">
	<form method="POST">
	<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $find_user = mysql_query("select * from customer where username = '$_SESSION[username]'")or die(mysql_error());
    $user = mysql_fetch_array($find_user);
  ?>
	<input type="hidden" id="user" name="user" value="<?php echo $user[1]; ?>">	
      <div class="col-md-4">
                  <button type="submit" name="lbc" id="lbc">
                    <br> <img src="img/lbc.jpg" alt="Pulpit Rock" style="width:350px;height:250px">
                  </button>
      </div>
      <div class="col-md-4">
                  <button type="submit" name="jrs" id="jrs">
                    <br> <img src="img/jrs.jpg" alt="Pulpit Rock" style="width:350px;height:250px">
                  </button>
      </div>
      <div class="col-md-4">
                  <button type="submit" name="mlhuiller" id="mlhuiller">
                    <br> <img src="img/mlhuiller.jpg" alt="Pulpit Rock" style="width:350px;height:250px">
                  </button>
      </div>
      <div class="col-md-4">
                  <button type="submit" name="moneygram" id="moneygram">
                    <br> <img src="img/moneygram.jpg" alt="Pulpit Rock" style="width:350px;height:250px">
                  </button>
      </div>
      <div class="col-md-4">
                  <button type="submit" name="palawan" id="palawan">
                    <br> <img src="img/palawan_express.jpg" alt="Pulpit Rock" style="width:350px;height:250px">
                  </button>
      </div>
      <div class="col-md-4">
                  <button type="submit" name="cebuana" id="cebuana">
                    <br> <img src="img/cebuana.jpg" alt="Pulpit Rock" style="width:350px;height:250px">
                  </button>
      </div>
    </div>
</form>
  </div>	
</div>
  <?php } ?>
<?php
require_once "core/connection.php";
if(isset($_POST['lbc'])){
  $cn = $_POST['user'];
  

  $via = mysql_query("Update orders set  via = 'lbc' where cus_name = '$cn'");
  echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/transaction.php';</script>"; 
}
?>
<?php
require_once "core/connection.php";
if(isset($_POST['jrs'])){
  $cn = $_POST['user'];
  

  $via = mysql_query("Update orders set  via = 'jrs' where cus_name = '$cn'");
  echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/transaction.php';</script>";
}
?>
<?php
require_once "core/connection.php";
if(isset($_POST['mlhuiller'])){
  $cn = $_POST['user'];
  

  $via = mysql_query("Update orders set  via = 'mlhuiller' where cus_name = '$cn'");
  echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/transaction.php';</script>";
}
?>
<?php
require_once "core/connection.php";
if(isset($_POST['moneygram'])){
  $cn = $_POST['user'];
  

  $via = mysql_query("Update orders set  via = 'moneygram' where cus_name = '$cn'");
  echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/transaction.php';</script>";
}
?>
<?php
require_once "core/connection.php";
if(isset($_POST['palawan'])){
  $cn = $_POST['user'];
  

  $via = mysql_query("Update orders set  via = 'palawan express' where cus_name = '$cn'");
  echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/transaction.php';</script>";
}
?>
<?php
require_once "core/connection.php";
if(isset($_POST['cebuana'])){
  $cn = $_POST['user'];
  

  $via = mysql_query("Update orders set  via = 'cebuana' where cus_name = '$cn'");
  echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/transaction.php';</script>";
}
?>

</body>
<?php include 'footer.php'; ?>
</html>
	