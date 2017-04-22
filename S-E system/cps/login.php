<?php
?>
<!DOCTYPE html>
<title>User Log-in | CPS</title>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/custom.css" rel="stylesheet">  
</head>
<body>

<div class="container">

	<h3>Log In</h3>

	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpWindow">Open Log In Window</button>

	<div class="modal fade" id="popUpWindow">
		<div class="modal-dialog">
			<div class="modal-content">

				<!--header -->
				<div class="modal-header">
				 	<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- body (form) -->
			<div class="modal-body">
				<form role="form">
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Enter Password">
					</div>
				</form>
			</div>

			<!-- button -->
			<div class="modal-footer">
				<button class="btn btn-primary btn-block">Log In</button>
			</div>
		</div>
	</div>
</div>
</div>


</body>
</html