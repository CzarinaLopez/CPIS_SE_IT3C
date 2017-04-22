
<?php include 'core/connection.php'; ?>
<?php include 'navbar/navregistration.php'; ?><br>
<html>
<head>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet"> 
  <link href="css/jumbotron.css" rel="stylesheet"> 
      
</head>
<title>Registration</title>
<body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top, #B3B3BD, #B3B3BD);
   background-image: -moz-linear-gradient(top, #B3B3BD,#B3B3BD);
  background-image: -ms-linear-gradient(top, #B3B3BD, #B3B3BD);
  background-image: -o-linear-gradient(top, #B3B3BD, #B3B3BD);
  background-image: linear-gradient(to bottom, #B3B3BD, #B3B3BD);
  filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">
<form class="form-horizontal" role="form" id="productForm" data-toggle="validator" method="post">
<div class="jumbotron">
            <div class="container">
                  <h1 class="itro-text">Customer Registration
                  </h1>
            </div> 
</div>
<div class="registration-tabs">
  <ul class="nav nav-tabs" id-"myTab">
      <li><a data-toggle="tab" href="#basicinfo">Basic Information</a></li>
      <li><a data-toggle="tab" href="#address">Address</a></li>
      <li><a data-toggle="tab" href="#userpass">Username and Password</a></li>
  </ul>
</div>
  <div class="tab-content">
    <div id="basicinfo" class="tab-pane fade in active">
      <h2>Basic Information</h2>
              <div class="col-sm-16">
                                  <?php
                                      if(isset($_POST['submit'])){
                                      $find_account = mysql_query("select * from customer where username = '$_POST[username]'")or die(mysql_error());
                                      $acc = mysql_num_rows($find_account);
                                      if($acc >= 1){
                                          echo "<div class='alert alert-danger'>Please Fill Up this Form!</div>";
                                      }
                                      else{
                                            mysql_query("insert into customer(name,age,gender,phone,address,street,barangay,city,email,username,password,status) values('$_POST[fn]','$_POST[age]','$_POST[gender]','$_POST[cn]','$_POST[hn]','$_POST[st]','$_POST[brgy]','$_POST[city]','$_POST[email]','$_POST[username]','$_POST[password]','Active');")or die(mysql_error());
                                                        echo "<div class='alert alert-success'>Successfully registered.</div>";
                                      }
                                      }
                                  ?>
               
                 <form class="form-horizontal" role="form" id="productForm" data-toggle="validator" method="post">
                    <tbody>
                       <tr>
                          <td class="col-sm-9"><br>
                              <div class="form-group">
                                  <label class="control-label col-sm-2" for="fn">Full Name :</label>
                                     <div class="col-sm-4">
                                        <input class="form-control" id="fn" type="text" name="fn" placeholder="Enter your Full Name">
                                     </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-2" for="age">Age :</label>
                                     <div class="col-sm-2">
                                        <input class="form-control " id="age" type="text" name="age" placeholder="Enter your Age">
                                     </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-sm-2" for="gender">Gender :</label>
                                     <div class="col-sm-2">
                                        <select class="form-control" id="gender" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                        </select>
                                     </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-sm-2" for="cn">Contact Number :</label>
                                     <div class="col-sm-3">
                                        <input class="form-control " id="cn" type="text" name="cn" placeholder="Enter your Phone Number">
                                     </div>
                              </div>
                          </td>
                       </tr>
                    </tbody>
            </div>
    </div>
    <div id="address" class="tab-pane fade">
      <h2>Address</h2>
              <div class="col-sm-16">
                  <tbody>
                    <tr>
                        <td class="col-sm-9">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="hn">House Number :</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" id="hn" type="text" name="hn" placeholder="Enter your House Number">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="st">Street :</label>
                                    <div class="col-sm-2">
                                        <input class="form-control " id="st" type="text" name="st" placeholder="Enter your Street">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="brgy">Barangay :</label>
                                    <div class="col-sm-2">
                                        <input class="form-control " id="brgy" type="text" name="brgy" placeholder="Enter your Barangay">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="city">Select City :</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="city" name="city" placeholder="Please Select">
                                                  <option value="Mabalacat City">Mabalacat City</option>
                                                  <option value="Bacolod City">Bacolod City</option>
                                                  <option value="Lipa City">Lipa City</option>
                                                  <option value="Baguio City">Baguio City</option>
                                                  <option value="General Santos City">General Santos City</option>
                                        </select>
                                    </div>
                            </div>
                        </td>
                    </tr>
                  </tbody>
              </div>
    </div>
  
  
  
    <div id="userpass" class="tab-pane fade"> 
      <h2>Username and Password</h2>
        <div class="col-sm-16">
          <tbody>
            <tr>
              <td class="col-sm-9"><br>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email Address :*</label>
                      <div class="col-sm-3">
                          <input class="form-control " id="email" type="email" name="email" placeholder="Enter your Email">
                      </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="username">Username :*</label>
                      <div class="col-sm-4">
                          <input class="form-control " id="username" type="text" name="username" placeholder="Enter your Username">
                      </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="password">Password :*</label>
                      <div class="col-sm-4">
                          <input class="form-control " id="password" type="password" name="password" placeholder="Enter your Password"><br>
                                <button type="submit" class="btn btn-default" name="submit">Submit</button> 
                      </div>
                </div>
              </td>
            </tr>
          </tbody>
        </div>
    </div>
                                 
    
  </div><br><br><br>
 </form>
</body>
<?php include 'footer.php'; ?>
</html>
