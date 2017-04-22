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
	
		<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/datatables/datatables.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php" style="color:#497BEE; font-size:30px;">Admin Panel</a>
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
                    <li style="border: 2px solid black;">
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li id="navBrand" style="border: 2px solid black;">
                        <a href="products.php"><i class="fa fa-fw fa-edit"></i> Manage Products</a>
                    </li>
                    <li class="active" style="border: 2px solid white;">
                        <a href="user.php" style="background-color:white;"><i class="fa fa-user" style="color:black;"></i><span style="color:black;"> Manage Customers</span></a>
                    </li>
						<li id="navBrand" style="border: 2px solid black;">
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

        <div id="page-wrapper" style="border: 3px solid black;">

            <div class="container-fluid">


<!-- edit -->



                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Customer's <small> Order</small>
                        </h1>
                        <ol class="breadcrumb" style="border: 1px solid black;">
                            <li class="active" style="color:black; font-size:15px;">
                                <i class="fa fa-edit"></i> Manage Orders
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
 
			
						<!--- ADD PRODUCTS -->
	                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="manageBrandTable">

						<ul class="nav nav-tabs">
					  <li role="presentation"><a href="user.php">Active Customers</a></li>
					  <li role="presentation"><a href="user_not_active.php">Not Active Customers</a></li>
                      <li role="presentation" class="active"><a href="#">Customers Info</a></li>
					 
					</ul><br>

					  <thead>
						<tr style="font-size:15px;">
						  <th class="col-sm-1">ID</th>
						  <th class="col-sm-1">Customers Name</th>
                          <th class="col-sm-1">Age</th>
                          <th class="col-sm-1">Gender</th>
						  <th class="col-sm-1">Contact</th>
                        <th class="col-sm-1">Address</th>
                        <th class="col-sm-1">Street</th>
                        <th class="col-sm-1">Barangay</th>
                        <th class="col-sm-1">City</th>
						  <th class="col-sm-1">Email</th>
						</tr>
					  </thead>
                      <tbody>
                                                    <?php
                                                    
                                                    $conn = new mysqli($localhost, $username, $password, $dbname);
                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    } 

                                                        $conn = "SELECT * FROM customer ORDER BY id DESC"; 
                                                            $rs_result = mysql_query($conn);
                                                              while($p = mysql_fetch_array($rs_result)){
                                                            ?>
                                                            
                                                            <tr>
                                                              <th style="vertical-align:middle;"><?php echo $p['id']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['name']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['age']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['gender']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['phone']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['address']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['street']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['barangay']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['city']; ?></th>
                                                              <th style="vertical-align:middle;"><?php echo $p['email']; ?></th>

                                                            </tr>
                                                            <?php
                                                              }
                                                            ?>
                                                                  </tbody>

					</table>
		
												
												


																	
																	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>




</div>
<!-- /container -->

<!-- file input -->
<script type="text/javascript" src="assets/plugins/fileinput/js/plugins/canvas-to-blob.min.js"></script>
<script type="text/javascript" src="assets/plugins/fileinput/js/plugins/sortable.min.js"></script>
<script type="text/javascript" src="assets/plugins/fileinput/js/plugins/purify.min.js"></script>
<script type="text/javascript" src="assets/plugins/fileinput/js/fileinput.min.js"></script>
<!-- datatables js -->
<script type="text/javascript" src="assets/plugins/datatables/datatables.min.js"></script>
<script type="text/javascript" src="custom/js/brand.js"></script>
</body>
</html>