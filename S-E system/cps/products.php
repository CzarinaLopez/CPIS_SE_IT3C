<?php include 'navbar/navproducts.php'; ?>
<!DOCTYPE html>
<title>Categories</title>
<head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link href="css/bootstrap.css" rel="stylesheet">  
    <link href="css/jumbotron.css" rel="stylesheet">  
</head>

  <body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top,  #D9E2F7, #D9E2F7);
   background-image: -moz-linear-gradient(top,  #D9E2F7, #D9E2F7);
  background-image: -ms-linear-gradient(top,  #D9E2F7, #D9E2F7);
  background-image: -o-linear-gradient(top,  #D9E2F7, #D9E2F7);
  background-image: linear-gradient(to bottom,  #D9E2F7, #D9E2F7);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">
  
    <?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $find_user = mysql_query("select * from customer where username = '$_SESSION[username]'")or die(mysql_error());
    $user = mysql_fetch_array($find_user);
  ?>
 
    
  <?php
  }
  else{}
  ?>
 

<div class="jumbotron">
            <div class="container">
                  <h1 class="itro-text">Categories
                    <p>We are dedicated to give you the best yet affordable products and a customer service.</p>
                  </h1>
            </div> 
        </div> 
<div class="container">
    <div class="row">
      <div class="col-lg-6">
            <a class="thumbnail" href="cpa.php">
              <h2>Car Parts and Accessories</h2><br> <img src="img/categories/cpa.jpg" alt="Pulpit Rock" style="width:550px;height:250px">
            </a>
      </div>
      <div class="col-lg-6">
            <a class="thumbnail" href="dat.php">
              <h2>Diagnostic and Scanner</h2><br><img src="img/categories/dat.jpg" alt="Pulpit Rock" style="width:550px;height:250px">
            </a>
      </div>
       <div class="col-lg-6">
            <a class="thumbnail" href="lab.php">
              <h2>Lights and Bulbs<br><br></h2><br> <img src="img/categories/lab.jpg" alt="Pulpit Rock" style="width:550px;height:250px">
            </a>
       </div>
       <div class="col-lg-6">
            <a class="thumbnail" href="tools.php">
              <h2>Tools<br><br></h2><br>  <img src="img/categories/tools.jpg" alt="Pulpit Rock" style="width:550px;height:250px">
            </a>
       </div>    
      </div>
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
      echo '<script>window.location="view_cart.php"</script>';
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
        echo '<script>alert("Product has been removed")</script>';
        echo '<script>window.location="view_cart.php"</script>';
      }
    }
  }
}
?>




            

    

 <?php include 'footer.php'; ?>
</body>
</html>
