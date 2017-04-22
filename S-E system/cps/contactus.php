 <?php include 'navbar/navindex.php'; ?>
<!DOCTYPE html>
<title>Contact Us</title>
<head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/bootstrap.css" rel="stylesheet">
     <link href="css/jumbotron.css" rel="stylesheet"> 
    
     
</head>

  <body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top, #D9E2F7, #D9E2F7);
   background-image: -moz-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -ms-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -o-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: linear-gradient(to bottom, #D9E2F7, #D9E2F7;filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">
  <div class="jumbotron">
            <div class="container">
                  <h1 class="itro-text">Contact
                    <strong>Car Parts Store</strong>
                    <p>If you have any questions or comments, please don’t hesitate to contact us.</p>
                  </h1>
            </div> 
        </div> 
<div class="container">
    <div class="box">
      <div class="row">
        <div class="col-lg-12">
          
    </div> 

        <div class="col-md-8">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d962.7059331624159!2d120.59041410984041!3d15.16802201969056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe24a391921da967a!2shostel!5e0!3m2!1sen!2sph!4v1488388656479" width="730" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-md-400">
          Contact Number:
            <strong>TM 09054177931 / SMART 09174653374</strong><br>
          
          Email:
            <strong>procurement@nightona.com</strong><br>
          
          Address:
            <strong>Unit E Miles Commercial Bldg. Batangas St. Mt. View Balibago, Angeles strong</strong>
          
        </div>
      </div>
    </div>
  </div>
  
<div class="container">
    <div class="box">
      <div class="row">
       <div class="col-lg-12">
          <hr>
          <h2 class="itro-text text-center">Contact
          <strong>Form</strong>
          </h2>
          <hr>
        </div> 
         
            <form method="get">   
              <div class="box">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required="required">
                     </div>

                    <div class="form-group col-md-4">
                       <label>Email</label>
                       <input type="email" name="email" class="form-control" required="required">
                    </div>

                    <div class="form-group col-md-4">
                       <label>Phone Number</label>
                       <input type="text" name="phone" class="form-control" required="required">
                    </div>

                    <div class="form-group col-md-12">
                       <label>Message/Comment</label>
                       <textarea name="msg" class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                      <input type="hidden" name="save" value="contact">
                      <button type="submit" name="com" id="com" class="btn btn-default" onclick="return confirm('Thankyou for your comment!')">Submit</button>
                    </div>
                </div>
				<?php
			require_once 'core/connection.php';
if(isset($_GET['com'])){
  $name = $_GET['name'];
  $email = $_GET['email'];
  $phone = $_GET['phone'];
  $msg = $_GET['msg'];
  $sql = mysql_query("INSERT INTO comments (Name, Email, PN, Msg, DnT) VALUES ('$name', '$email', '$phone', '$msg', now())");
  
	echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/contactus.php';</script>";
	
	
} ?>
            </form>

        </div>
      </div>
    </div>
</div>
</body>
 <?php include 'footer.php'; ?> 
</html>
