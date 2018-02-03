<?php session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['user_type']=='admin'){?>
<!doctype html>
<html lang="en">
<?php include('head.php')?>
<body style="background-image:assets/paper_img/boxed_bg.jpg; background-repeat:no-repeat; width:100%;">
    <!-- Brand and toggle get grouped for better mobile display -->  
<!--                     danger navbar -->
 <div id="navbar-full">
        <div id="navbar">
            <div class="navigation-example">
                <nav class="navbar navbar-ct-danger navbar-static-top" role="navigation-demo">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="dashboard.php">
           <div class="logo-container">
                <div class="logo">
                    <img src="assets/paper_img/icons/Librarylogo.png" alt="Creative Tim Logo">
                </div>
                <div class="brand">
                   LIBRO LMS
                </div>
      </div>
      </a>
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="dashboard.php" class="btn btn-danger btn-fill" ><span class="glyphicon glyphicon-home"></span> Home</a>
          </li>
         <li class="dropdown">
          <button href="#" class="dropdown-toggle btn btn-danger btn-simple" data-toggle="dropdown">
                                      <span class="glyphicon glyphicon-cog"></span> Manage Books</button>
<!--                                  You can add classes for different colours on the next element -->
                                      <ul class="dropdown-menu dropdown-danger dropdown-menu-right">
           
                                        <li><a href="issueandsearchbooks.php" style="color:#000;"><i class="glyphicon glyphicon-search"></i> Issue/Search Books</a></li>
                                        <li><a href="returnbooks.php" style="color:#000;"><i class="glyphicon glyphicon-repeat"></i> Return Books</a></li>
                                        <li><a href="addbooks.php" style="color:#000;"><i class="glyphicon glyphicon-plus-sign"></i> Add Books</a></li>
                                        <li class="divider"  style="border: 1px dashed #222 ;
    "></li>
                                        <li><a href="removebooks.php" style="color:#000;"><i class="glyphicon glyphicon-remove-sign"></i> Remove Books</a></li>
                                      
                                       
                                      </ul>
                                    </li>
           <li class="dropdown">
          <button href="#" class="dropdown-toggle btn btn-danger btn-simple" data-toggle="dropdown">
                                      <span class="glyphicon glyphicon-user"></span> Account</button>
<!--                                  You can add classes for different colours on the next element -->
                                      <ul class="dropdown-menu dropdown-danger dropdown-menu-right">
           
                                        <li class="active"><a href="account_profile.php" style="color:#000;"><i class="glyphicon glyphicon-cog"></i> Profile</a></li>
                                        <li><a href="#changepasswordModal" style="color:#000;" data-toggle="modal" data-target="#changepasswordModal"><i class="glyphicon glyphicon-edit"></i> Change Password</a></li>
                                        <li><a href="logout_process.php?logout=1" style="color:#000;"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                                        <li class="divider" style="border: 1px dashed #222 ;
    "></li>
                                        <li><a href="addaccountprofile.php" style="color:#000;"><i class="glyphicon glyphicon-plus-sign"></i> Add Account</a></li>
                                      <li><a href="userlist.php" style="color:#000;"><i class="glyphicon glyphicon-user"></i> User</a></li>
                                       
                                      </ul>
                                    </li>
      </ul>
    </div><!-- /.navbar-collapse -->

                  </div><!-- /.container-->
                </nav>         



            </div><!--  navigation example -->
        </div> <!-- end #navbar -->
    </div> <!-- end navbar-full -->
<!--------------------------------------------end of navbar------------------------------------->
<img src="assets/paper_img/footer.png" class="img-responsive" width="100%">
<div class="alert alert-danger" role="alert" style="color:#FFF;"><span class="glyphicon glyphicon-user"></span> Accounts / Account Profile
<div class="pull-right">
	<p style="color:#FFF;">Welcome, <?php echo $_SESSION['name'];?></p>
</div>
</div>
<div class="container" style="height:400px;">
	<div class="row">
    <div class="col-lg-12">
<div class="panel panel-success">
 <div class="panel-heading"><center><i class="glyphicon glyphicon-cog"></i> ADMIN PROFILE</center> </div>
  <div class="panel-body">
	
<div class="row">
  <div class="col-xs-6 col-sm-4">
  <?php include('includes/dbconn.php');
  $uid = $_SESSION['id'];
  $sqlquery = mysql_query("SELECT * FROM userimg WHERE userid = '$uid'") or die (mysql_error());
  if(mysql_num_rows($sqlquery)==0){
	  
	  echo '<img src="assets/paper_img/admin.png" class="img-responsive" width="150px;">';}
	  else{
  while($row = mysql_fetch_assoc($sqlquery)){?>
  <img src="<?php echo $row['img']?>" class="img-responsive" width="150px;">
  <?php }}?>
  <form style="margin-top:5px;" action="updateavatar.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
   <input type="file" name="image" required> 	<br>
 <center> <button type="submit" name="updateavatar"> Update Avatar</button></center>
  </form>

  </div>
  <div class="col-xs-6 col-sm-4"><i class="glyphicon glyphicon-list-alt"></i> Profile Information
  <hr>
  <?php include('includes/dbconn.php');
  $id = $_SESSION['id'];
  $query = mysql_query("SELECT * FROM user  WHERE id = '$id'") or die (mysql_error());
  if(mysql_num_rows($query)>0){
	  	while($row = mysql_fetch_array($query)){?>
  <form class="form-horizontal">
  <div class="form-group">
    <p class="col-sm-2 control-label">Name</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['name'];?></label>
    </div>
  </div>
  
  <div class="form-group">
   <p class="col-sm-2 control-label">Gender</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['gender'];?></label>
    </div>
  </div>
  <div class="form-group">
 <p class="col-sm-2 control-label">Age</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['age'];?></label>
    </div>
  </div>
  <div class="form-group">
   <p class="col-sm-2 control-label">DOB</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php
	  $date = $row['dob'];
	  $isdate = new DateTime($date);
	   echo $isdate->format('M d, Y');?></label>
    </div>
  </div>

<div class="form-group">
    <p class="col-sm-2 control-label">Address</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['address'];?></label>
    </div>
  </div>
  
</form>
  </div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-6 col-sm-4"> 
  <i class="glyphicon glyphicon-cog"></i> Account System Information
  <hr>
  <form class="form-horizontal">
  <div class="form-group">
   <p class="col-sm-2 control-label">Dep</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['dep'];?></label>
    </div>
  </div>
  
  <div class="form-group">
  <p class="col-sm-2 control-label">Position</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['pos'];?></label>
    </div>
  </div>
  <div class="form-group">
    <p class="col-sm-2 control-label">Type</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['usertype'];?></label>
    </div>
  </div>
  <div class="form-group">
    <p class="col-sm-2 control-label">Contact</p>
    <div class="col-sm-10">
      <label for="name" class=" control-label">&nbsp;: <?php echo $row['contact'];}}?></label>
    </div>
  </div>
  <button type="button" data-toggle="modal" data-target="#updateModal">Update Information</button>
  
</form></div>
</div>
   
 
  </div>
</div>
</div></div>
</div>

 <?php include('footer.php')?>
 <!--update Modal -->
<div class="modal fade bs-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close btn-simple btn-tooltip" data-toggle="tooltip" title="Close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Update Information</h4>
      </div>
    
      <div class="modal-body">
      <div class="row">
      	<div class="col-lg-12">
        <div class="panel panel-default">
      <div class="panel-body">
    <?php include('includes/dbconn.php');
		 $id = $_SESSION['id'];
  $query = mysql_query("SELECT * FROM user  WHERE id = '$id'") or die (mysql_error()); ?>
      <form class="form-horizontal" action="account_profile.php" method="post">
   	   <?php if(mysql_num_rows($query)>0){
	  	while($row = mysql_fetch_array($query)){?>
      <p>Please Enter the Details Below..</p>
      <hr>
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <div class="col-lg-6">
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name*:</label>
    <div class="col-sm-10 has-warning">
      <input type="text"  name="name"  value="<?php echo $row['name'];?>" required autofucos>
    </div>
</div>
       </div>
      <div class="col-lg-6">  
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Sex*:</label>
    <div class="col-sm-10 has-warning">
      <select name="sex" style="width:67%">
      <option value="<?php echo $row['gender']?>"><?php echo $row['gender'];?></option>
      <option></option>
      <option value="Male">Male</option>
      <option value="Female">Female</option></select>
    </div>
  </div>
      </div>
      <div class="col-lg-6">
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Age*:</label>
    <div class="col-sm-10 has-warning">
      <input type="number"  name="age" value="<?php echo $row['age'];?>" required autofucos>
    </div>
  </div>
       </div>
       <div class="col-lg-6">
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Add*:</label>
    <div class="col-sm-10 has-warning">
      <textarea name="address" style="width:67%;"><?php echo $row['address']?></textarea>
    </div>
  </div>
       </div>
       <div class="col-lg-6">
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Dep*:</label>
    <div class="col-sm-10 has-warning">
      <input type="text"  name="dep" value="<?php echo $row['dep'];?>" required autofucos>
    </div>
  </div>	
       </div>
  <div class="col-lg-6">
   <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Pos*:</label>
    <div class="col-sm-10 has-warning">
      <input type="text"  name="pos"  value="<?php echo $row['pos'];?>" required autofucos>
    </div>
  </div>
  </div>
  <div class="col-lg-6">
       
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Type*:</label>
    <div class="col-sm-10 has-warning">
       <select name="type" style="width:67%">
      <option value="<?php echo $row['usertype']?>"><?php echo $row['usertype'];?></option>
     
      <option></option>
      
      <option value="admin">Admin</option>
      <option value="user">User/Student</option></select>
    </div>
    
  </div>
       </div>
       <div class="col-lg-6">
       
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">No*:</label>
    <div class="col-sm-10 has-warning">
       <input type="number" name="contact" value="<?php echo $row['contact'];?>" required autofucos>
    </div>
    </div></div>
       <div class="col-lg-6">
       		 <div class="form-group">
    <label for="name" class="col-sm-2 control-label">DOB*:</label>
    <div class="col-sm-10 has-warning">
      <input type="date" name="dob"  value="<?php echo $row['dob'];}}?>" required>
    </div>
  </div>
  </div>
     <hr>
      <div class="pull-right">
    
    	<button type="submit" class="btn btn-primary btn-fill" name="updatedetails">Update</button>
    </div>
      </form>
      </div>
      </div></div></div>
       </div><!---modal body--->
 <!------------update process--------->
 <?php include('includes/dbconn.php');
 if(isset($_POST['updatedetails'])){
	 $id = $_POST['id'];
	 $name = $_POST['name'];
	 $gender = $_POST['sex'];
	 $age = $_POST['age'];
	 $address = $_POST['address'];
	 $no = $_POST['contact'];
	 $dob = $_POST['dob'];
	 $utype = $_POST['type'];
	 $dep = $_POST['dep'];
	 $pos = $_POST['pos'];
	 if(empty($name) || empty($gender) || empty($age) || empty($address)|| empty($no) || empty($no) || empty($dob) || empty($utype) || empty($pos)){
		 echo '<script>window.alert("Fields must not be empty! Please try again.");
		 			 window.location.href="account_profile.php";</script>';
		 }
		 else {
			 $sql = mysql_query("UPDATE user set name='$name',
			 									 gender = '$gender',
												 age = '$age',
												 contact = '$no',
												 dob = '$dob',
												 usertype = '$utype',
												 dep = '$dep',
												 pos = '$pos',
												 address = '$address' WHERE id = '$id'") or die (mysql_error());
			 if($sql==true){
				 echo '<script>window.alert("Updated successfully!");
				 			  window.location.href="account_profile.php";</script>';
				 }else {
					 echo'<script> window.alert("Sorry unable to process your request.");
					 			   window.location.href="index.php";</script>';}
			 }
	 }
?>
    

    </div>
  </div>
</div>
 <?php include('changepasword.php')?>
</body>

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	
	<!--  Plugins -->
	<script src="assets/js/ct-paper-checkbox.js"></script>
	<script src="assets/js/ct-paper-radio.js"></script>
	<script src="assets/js/bootstrap-select.js"></script>
	<script src="assets/js/bootstrap-datepicker.js"></script>
	
	<script src="assets/js/ct-paper.js"></script>    
</html>
<?php } else if ($_SESSION['user_type']=='user'){
	header('location:dashboard-User.php');}
	else{
		header('location:index.php');}?>