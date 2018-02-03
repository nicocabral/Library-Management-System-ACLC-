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
           
                                        <li><a href="account_profile.php" style="color:#000;"><i class="glyphicon glyphicon-cog"></i> Profile</a></li>
                                        <li><a href="#changepasswordModal" style="color:#000;" data-toggle="modal" data-target="#changepasswordModal"><i class="glyphicon glyphicon-edit"></i> Change Password</a></li>
                                        <li><a href="logout_process.php?logout=1" style="color:#000;"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                                        <li class="divider" style="border: 1px dashed #222 ;
    "></li>
                                        <li class="active"><a href="addaccountprofile.php" style="color:#000;"><i class="glyphicon glyphicon-plus-sign"></i> Add Account</a></li>
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
<div class="alert alert-danger" role="alert" style="color:#FFF;"><span class="glyphicon glyphicon-user"></span> Accounts / Add Account
<div class="pull-right">
	<p style="color:#FFF;">Welcome, <?php echo $_SESSION['name'];?></p>
</div>
</div>
<div class="container" style="height:400px;">
	<div class="row">
    <div class="col-lg-12">
<div class="panel panel-success">
 <div class="panel-heading"><center><i class="glyphicon glyphicon-plus-sign"></i> ADD SYSTEM USER</center> </div>
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
 <center> <button type="submit" name="updateavatar"> Save Avatar</button></center>
  </form>

  </div>
  <script>
  function saveConfirm(){
	  var a = confirm("Are you sure you want to save this account?");
	  if(x==true){
		  return;}
		  else {
			  return false;}
	  }
  </script>
  <form class="form-horizontal" onSubmit="return saveConfirm();" action="addaccountprocess.php" method="post">
  <div class="col-xs-6 col-sm-4"><i class="glyphicon glyphicon-list-alt"></i> Profile Information
  <hr>
  <p>Fields with (*) are required</p>
  <div class="form-group">
    <p class="col-sm-2 control-label">Name*</p>
    <div class="col-sm-10">
      : <input type="text" name="name" required>
    </div>
  </div>
  
  <div class="form-group">
   <p class="col-sm-2 control-label">Sex*</p>
    <div class="col-sm-10">
     : <select name="gender" style="width:67%">
     	<option>Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
     </select>
    </div>
  </div>
  <div class="form-group">
 <p class="col-sm-2 control-label">Age*</p>
    <div class="col-sm-10">
      : <input type="number" name="age" required>
    </div>
  </div>
  <div class="form-group">
   <p class="col-sm-2 control-label btn-tooltip" data-toggle="tooltip" title="Date of Birth" data-placement="left">DOB*</p>
    <div class="col-sm-10">
      : <input type="date" name="dob" required>
    </div>
  </div>

<div class="form-group">
    <p class="col-sm-2 control-label">Address*</p>
    <div class="col-sm-10">
       &nbsp; <textarea name="address" style="width:67%" required></textarea>
    </div>
  </div>
  
  </div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-6 col-sm-4"> 
  <i class="glyphicon glyphicon-cog"></i> Account System Information
  <hr><br><p></p>
  <div class="form-group">
   <p class="col-sm-2 control-label btn-tooltip" data-toggle="tooltip" title="Department">Dep*</p>
    <div class="col-sm-10">
      : <input type="text" name="dep" required>
    </div>
  </div>
  
  <div class="form-group">
  <p class="col-sm-2 control-label btn-tooltip" data-toggle="tooltip" title="Position" data-placement="left">Pos*</p>
    <div class="col-sm-10">
     : <input type="text" name="pos" required>
    </div>
  </div>
  <div class="form-group">
    <p class="col-sm-2 control-label">Type*</p>
    <div class="col-sm-10">
      : <select name="type" style="width:67%">
     	<option>Select</option>
        <option value="admin">Admin</option>
        <option value="user">User/Student</option>
     </select>
    </div>
  </div>
  <div class="form-group">
    <p class="col-sm-2 control-label">TellNo.</p>
    <div class="col-sm-10">
      : <input type="number" name="no" required>
    </div>
  </div>
  <button type="reset">Clear</button>
  <button type="button" data-toggle="modal" data-target="#addaccountModal">Save Account</button>
  
</div>
<!-- ddaccountModal -->
<div class="modal fade" id="addaccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-cog"></i> Account Username and Password</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-body">
   
   <p>Fields with (*) are required</p>
 <table width="100%">
 <tr style="margin-bottom:10px;">
 <td style="width:auto; text-align:right;">
    <label for="Username">Username *: </label>
    </td>
   <td style="width:auto; text-align:center;">
    <input type="text" name="username" placeholder="Username" required><br><p></p>
    </td>
 </tr>
 <tr style="margin-bottom:10px;">
 <td style="width:auto; text-align:right;">
    <label for="exampleInputPassword1">Password *: </label>
    </td>
    <td style="width:auto; text-align:center;">
    <input type="password" name="password" placeholder="**********" required><br><p></p></td>
 </tr>
 <tr style="margin-bottom:10px;">
 <td style="width:auto; text-align:right;">
    <label for="exampleInputPassword1"> Confirm Password *:</label>
    </td>
   <td style="width:auto; text-align:center;"><input type="password" name="confirmpassword" placeholder="**********"required><br><p></p></td>
 </tr >
  <tr style="margin-bottom:10px;">
  <td colspan="2" style="width:auto; text-align:right;">
  <button type="reset">Clear</button>
  <button type="submit" name="saveaccount">Save Account</button>
</td>
</tr>
</table>

</div></div></div>
      </div></div>
      
      </div>
    </div>
  </div>


<!--    end modal -->

</form>

</div>
   
 
  </div>
</div>
</div></div>
</div>

 <?php include('footer.php')?>
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