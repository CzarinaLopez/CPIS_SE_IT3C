<?php include 'navbar/navvc.php'; ?>
<?php include 'core/connection.php'; ?>
<!DOCTYPE html>
<title>Checkout</title>
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
                  <h1 class="itro-text">Check Out
                  </h1>
            </div> 
</div> 
  		<div class="container">
    		<div class="row">
      			<div class="col-lg-6">
            			<a class="thumbnail" href="#">
              			<h2>Paypal</h2><br> <img src="img/paypal.jpg" alt="Pulpit Rock" style="width:550px;height:250px">
            			</a>
     		    </div>
      			<div class="col-lg-6">
            			<a class="thumbnail" name="cash" href="cashout.php">
              			<h2>Cash Out</h2><br><img src="img/cashout.jpg" alt="Pulpit Rock" style="width:550px;height:250px">
            			</a>
      			</div>
			</div>
		</div>
</div>
						
						
						
</body>
<?php include 'footer.php'; ?>
</html>
	