<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stock Management System</title>

    <!-- Bootstrap Core CSS -->
    
    <link href="css/bootstrap.css" rel="stylesheet"> 
 <link href="css/jumbotron.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php" style="color:#497BEE; font-size:30px;"> Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">

                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">

                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">

                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
					<li style="color:white; font-size:32px;"> | </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active" style="border: 2px solid black;border-right: white;">
                        <a href="dashboard.php" style="background-color:white;"><i class="fa fa-fw fa-dashboard" style="color:black;"></i><span style="color:black;"> Dashboard</span></a>
                    </li>
                    <li style="border: 2px solid black;" id="navBrand">
                        <a href="products.php"><i class="fa fa-fw fa-edit"></i> Manage Products</a>
                    </li>
                    <li style="border: 2px solid black;">
                        <a href="user.php"><i class="fa fa-user"></i> Manage Customers</a>
                    </li>
					<li style="border: 2px solid black;">
                        <a href="manage_order.php"><i class="glyphicon glyphicon-shopping-cart"></i> Manage Orders</a>
                    </li>
					<li style="border: 2px solid black;">
						<a onClick="clicked()" .addEventListener="clicked()"><i class="glyphicon glyphicon-globe"></i> Visit My Website</a>
                    </li>
					<script>function clicked() {
			window.open("http://localhost:90/cps/index.php");
					}</script>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="border: 3px solid black">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb" style="border: 1px solid black;">
                            <li class="active" style="color:black; font-size:15px;">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->

                <div class="row">
				<?php 
$result = mysql_query('SELECT count(Msg) AS value FROM comments'); 
$row = mysql_fetch_assoc($result); 
$cnt = $row['value'];
 ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $cnt ?></div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">0</div>
                                        <div>New Tasks!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
									<?php 
									$rst = mysql_query("SELECT count(id) AS num FROM orders where act = 'Pending'"); 
									$rw = mysql_fetch_assoc($rst); 
									$tnt = $rw['num'];
									 ?>
                                        <div class="huge"><?php echo $tnt ?></div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage_order.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Lifetime Sales</h3>
  </div>
  <?php 
$result = mysql_query("SELECT SUM(order_total) AS value_sum FROM orders where act = 'Completed'"); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
 ?>
  <div class="panel-body"><h2>$<?php echo $sum ?></h2>
  </div>
</div>
                </div>
                <!-- /.row -->


                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="manageBrandTable">
					  <thead>
						<tr style="font-size:15px;">
						  <th class="col-sm-1">Order ID</th>
						  <th class="col-sm-1">Orders</th>
						  <th class="col-sm-1">Product Price</th>
						  <th class="col-sm-1">Quantity</th>
                          <th class="col-sm-1">Total Amount</th>
						</tr>
					  </thead>
                      <tbody>
                                                    <?php
                                                    
                                                    $conn = new mysqli($localhost, $username, $password, $dbname);
                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    } 

                                                        $conn = "SELECT * FROM orders where act = 'Completed' ORDER BY id DESC";  
                                                            $rs_result = mysql_query($conn);
                                                              while($p = mysql_fetch_array($rs_result)){
                                                            ?>
                                                            
                                                            <tr>
                                                              <th style="vertical-align:middle;"><?php echo $p['id']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['item_name']; ?></th>
                                                              <th style="vertical-align:middle;">$<?php echo $p['item_quantity']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['product_price']; ?></th>
                                                              <th style="vertical-align:middle;">$<?php echo $p['order_total']; ?></th>
                                                              
                                                            </tr>
                                                            <?php
                                                              }
                                                            ?>
                                                                  </tbody>

					</table>	
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>


