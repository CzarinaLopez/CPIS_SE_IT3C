<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body align="center">

<?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysql_query("select * from product where product_id=$update", $connection);
while ($row1 = mysql_fetch_array($query1)) {
echo "<form class='form' method='post'>";
echo "<h2>Update Product</h2>";
echo "<hr/>";
echo "<input class='input' type='hidden' name='did' value='{$row1['product_id']}' />";
echo "<br />";
echo "<img src='{$row1['product_image']}' class='img-rounded' width='300' height='270' /><br />";
echo "<br />";
echo "<br />";
echo "<label>Profile Image:</label> <input type='file' name='image' value='' /><br />";
echo "<br />";
echo "<br />";
echo "<input type='submit' name='back' value='        Back       ' style='background-color:lightblue;padding:5px;font-size:20px;' />";
echo "&nbsp&nbsp&nbsp&nbsp";
echo "<input class='submit' type='submit' name='submit' id='submit' onclick='return confirm('Product Updated!')' value='       Update       ' style='background-color:lightgreen;padding:5px;font-size:20px;' />";
echo "</form>";

}
}
if(isset($_POST['submit'])) {
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

$id = $_POST['did'];
$query = mysql_query("update product set product_image='$file' where product_id='$id'");
header('location:products.php');}
if(isset($_POST['back'])) {
header('location:products.php');
}

?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysql_close($connection);
?>
</body>
</html>