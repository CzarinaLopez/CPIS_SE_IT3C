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
                    <li class="active" id="navBrand" style="border: 2px solid white;">
                        <a href="products.php" style="background-color:white;"><i class="fa fa-fw fa-edit" style="color:black;"></i><span style="color:black;"> Manage Products</span></a>
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

        <div id="page-wrapper" style="border: 3px solid black;">

            <div class="container-fluid">
			
<?php	
require_once 'php_action/core.php';


if(isset($_POST['submit'])){
		if($_FILES['file']['tmp_name'] == ""){
			echo "<div class='alert alert-danger'>No selected image file.</div>";
		}
		else{
			foreach($_FILES['file']['tmp_name'] as $key => $name){
				$target_file = basename($_FILES["file"]["name"][$key]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$check = getimagesize($_FILES["file"]["tmp_name"][$key]);
				if($check !== false) {
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
					}
					else{
						$ran = rand () ;
						$temp = explode(".", $_FILES["file"]["name"][$key]);
						$extension = end($temp);
						
						$file = "img/img/";
						$file = $file . $ran.".".$extension;
						move_uploaded_file($name, $file);
						
					
					}
				} else {
					echo "<div class='alert alert-danger'>File is not an image.</div>";
				}
			}
		}
	}
												
		
		
if($_POST) {
	$brandName = $_POST['brandName'];
	$category = $_POST['category'];
	$brandPrice = $_POST['brandPrice'];
	$des = $_POST['des'];
	$brandStock = $_POST['brandStock'];



	
	$sql = "INSERT INTO product (product_name, category, product_image, product_price,des, quantity) VALUES ('$brandName', '$category', '$file', '$brandPrice','$des', '$brandStock')";
	
	if($connect->query($sql) === TRUE){
		echo "<div class='alert alert-success'> Successfully Added!</div>";
	}else{

		echo "<div class='alert alert-danger'> Error!</div>";
	}
	
	$connect->close();
	
	
	
}?>

<!-- edit -->



                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            PRODUCTS <small>Inventory </small>
                        </h1>
                        <ol class="breadcrumb" style="border: 1px solid black;">
                            <li class="active" style="color:black; font-size:15px;">
                                <i class="fa fa-edit"></i> Manage Products
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
 
			
						<!--- ADD PRODUCTS -->
					<div class="div-action pull pull-right" style="padding-bottom:20px;">
						<button class="btn btn-default" data-toggle="modal" data-target="#addBrandModal"> <i class="glyphicon glyphicon-plus-sign"></i> ADD PRODUCT </button>
					</div>
					<div class="col-sm-3 pull-left">
						<form class="navbar-form" role="search" method="get" action="product_search.php">
							<div class="input-group">
								<input type="search" class="form-control" placeholder="Product name/no." name="search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
					</div>
					
					<table class="table table-hover table-bordered" id="manageBrandTable">
					  <thead>
						<tr>
						  <th>Product ID</th>
						  <th>Image</th>
						  <th>Product Name</th>
						  <th>Category</th>
						  <th class="col-lg-2"> Price</th>
						  <th class="col-lg-2">Description</th>
						  <th>Stock</th>
						  <th class="col-lg-3">Action</th>
						</tr>
					  </thead>
					  
						
										<tbody>
													<?php
													
													$conn = new mysqli($localhost, $username, $password, $dbname);
													// Check connection
													if ($conn->connect_error) {
														die("Connection failed: " . $conn->connect_error);
													} 
													$limit = 5;
												if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
												$start_from = ($page-1) * $limit;
												
														$conn = "SELECT * FROM product ORDER BY product_id DESC LIMIT $start_from, $limit";  
															$rs_result = mysql_query($conn);
															  while($p = mysql_fetch_array($rs_result)){
															?>
															
															<tr>
															  <th style="vertical-align:middle;"><?php echo $p['product_id']; ?></th>
															  <th><img src="<?php echo $p['product_image']; ?>" class="img-rounded" width="100" height="90"></th>
															  <th style="vertical-align:middle;"><?php echo $p['product_name']; ?></th>
															  <th style="vertical-align:middle;"><?php echo $p['category']; ?></th>
															  <th style="vertical-align:middle;">$<?php echo $p['product_price']; ?></th>
															  <th style="vertical-align:middle;"><?php echo $p['des']; ?></th>
															  <th style="vertical-align:middle;"><?php echo $p['quantity']; ?></th>
															  <th style="vertical-align:middle; text-align:center;">
															   <a href="#" class="btn btn-success" data-toggle="modal" data-target="#delete<?php echo $p['product_id']; ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Update</a>
															   <a href="remove_product.php?product_id=<?php echo $p['product_id']; ?>" onclick="return confirm('Are you sure want to remove it?')" class="btn btn-danger" role="button" id="rev" name="rev"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></th>
															</tr>
<div id="delete<?php echo $p['product_id']; ?>" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" style="text-align:center;"><i class="fa fa-pencil">&nbsp</i>Edit Product Image</h4>
</div>
 <div class="modal-body">
 <center>
<img src="<?php echo $p["product_image"]; ?>" class="" width="200" height="180"><br>
<a style="color:black;font-size:20px;">Product Number: <?php echo $p['product_id']; ?></a>
<input class="input" type="hidden" name="did" value="<?php echo $p['product_id']; ?>" />
</center>
<form action="edit_PDO.php<?php echo '?product_id='.$p['product_id']; ?>" method="post" enctype="multipart/form-data">
<div style="color:blue; margin-left:50px; font-size:20px;">
	<input type="file" name="image">
</div>
<br><br>
<div class="form-group">
<label for="brandName" class="col-sm-3 control-label">Product Name : </label>
<div class="col-sm-9">
  <input type="text" class="form-control" id="dname" name="dname" placeholder="Product Name" autocomplete="off" required="required" value="<?php echo $p['product_name']; ?>">
</div>
</div><br><br>
<div class="form-group">
<label for="brandPrice" class="col-sm-3 control-label">Product Price : </label>
<div class="col-sm-9">
  <input type="int" class="form-control" id="dprice" name="dprice" placeholder="Price" required="required" value="<?php echo $p['product_price']; ?>">
</div>
</div><br><br>
<div class="form-group">
	<label for="des" class="col-sm-3 control-label">Description</label>
	<div class="col-sm-9">
	<textarea class="form-control" rows="3" id="ddes" name="ddes"required="required" ><?php echo $p['des']; ?></textarea>
</div></div><br><br><br><br>
<div class="form-group">
<label for="category_id" class="col-sm-3 control-label">Category : </label>
<div class="col-sm-9">
  <select class="form-control" id="dcat" name="dcat">
  <option value="<?php echo $p['category']; ?>"><?php echo $p['category']; ?></option>
  <option value="Diagnostic and Test"> Diagnostic and Test </option>
  <option value="Car Parts and Accessories"> Car Parts and Accessories </option>
  <option value="Tools"> Tools </option>
  <option value="Light and Bulbs"> Light and Bulbs </option>
  </select>
</div>
</div><br><br>
<div class="form-group">
<label for="brandStock" class="col-sm-3 control-label">Stock : </label>
<div class="col-sm-9">
  <input type="int" class="form-control" id="dstock" name="dstock" placeholder="Stock" required="required" value="<?php echo $p['quantity']; ?>">
</div>
</div><br><br>
<div class="modal-footer">
<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Cancel</button>
<button type="submit" name="submit" class="btn btn-success">Update</button>
</form>
</div>
</div>
															  																
															  
															<?php
															  }
															?>
																  </tbody>
						
					</table>	
					
			
			<?php  
												$rs_result = mysql_query("SELECT COUNT(product_id) FROM product")or die(mysql_error());  
												$c = mysql_fetch_row($rs_result);  
												$total_records = $c[0];
												$total_pages = ceil($total_records / $limit);  
												$pagLink = "<nav><ul class='pagination'>";  
												for ($i=1; $i<=$total_pages; $i++) {  
															 $pagLink .= "<li><a href='products.php?page=".$i."'>".$i."</a></li>";  
												};  
												echo $pagLink . "</ul></nav>";  
											?>
											</div>
											<script type="text/javascript">
												$(document).ready(function(){
												$('.pagination').pagination({
														items: <?php echo $total_records;?>,
														itemsOnPage: <?php echo $limit;?>,
														cssStyle: 'light-theme',
														currentPage : <?php echo $page;?>,
														hrefTextPrefix : 'products.php?page='
													});
													});
											</script>
						<!--- /.ADD PRODUCTS -->
			
                 </div> <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

																	<!-- modal -->
													<div class="modal fade" tabindex="-1" role="dialog" id="addBrandModal">
												  <div class="modal-dialog" role="document">
													<div class="modal-content">
													  <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title"><i class="fa fa-plus"></i>Add Product</h4>
													  </div>
													  
													  <form class="form-horizontal" id="submitBrandForm" method="POST" enctype="multipart/form-data">
													  <div class="modal-body">
													  
																		
																			  <div class="form-group">
																				<label for="brandName" class="col-sm-3 control-label">Product Name : </label>
																				<div class="col-sm-9">
																				  <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Product Name" autocomplete="off" required="required">
																				</div>
																			  </div>
																			  <div class="form-group">
																				<label for="brandPrice" class="col-sm-3 control-label">Product Price : </label>
																				<div class="col-sm-9">
																				  <input type="int" class="form-control" id="brandPrice" name="brandPrice" placeholder="Price" required="required">
																				</div>
																			  </div>
																			  <div class="form-group">
																					<label for="des" class="col-sm-3 control-label">Description</label>
																					<div class="col-sm-9">
																					<textarea class="form-control" rows="3" id="des" name="des"required="required"></textarea>
																				</div></div>
																			  <div class="form-group">
																				<label for="category_id" class="col-sm-3 control-label">Category : </label>
																				<div class="col-sm-9">
																				  <select class="form-control" id="category" name="category">
																				  <option value=""> ~~Select~~ </option>
																				  <option value="Diagnostic and Test"> Diagnostic and Test </option>
																				  <option value="Car Parts and Accessories"> Car Parts and Accessories </option>
																				  <option value="Tools"> Tools </option>
																				  <option value="Light and Bulbs"> Light and Bulbs </option>
																				  </select>
																				</div>
																			  </div>
																			  <div class="form-group">
																				<label for="brandStock" class="col-sm-3 control-label">Stock : </label>
																				<div class="col-sm-9">
																				  <input type="int" class="form-control" id="brandStock" name="brandStock" placeholder="Stock" required="required">
																				</div>
																			  </div>
																			  <input type="file" name="file[]" id="file">
																				</div>
													  
													  <div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" id="submit" data-loading-text="Loading..." name="submit">Add Product</button>
													  </div>
													  </form>
													</div><!-- /.modal-content -->
												  </div><!-- /.modal-dialog -->
												</div><!-- /.modal -->
												
												
												


																	
																	
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