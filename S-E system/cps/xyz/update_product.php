
<?php
require_once 'php_action/core.php';


if(isset($_POST['update'])){
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
						
						$file = "img/";
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
	$brandStock = $_POST['brandStock'];



	
	$sql = ("Update product set product_name = '$brandName',product_price = '$brandPrice',category = '$category',quantity = '$brandStock',product_image = '$file' where product_id = '$product_id'");
	
	if($connect->query($sql) === TRUE){
		header('location: products.php');
	}else{

		echo "<div class='alert alert-danger'> Error!</div>";
	}
	
	$connect->close();
	
	
	
}?>
