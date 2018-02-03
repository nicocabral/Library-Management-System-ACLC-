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
                                        <li><a href="logout_process.php?logout=1" style="color:#000;" ><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
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
<div class="alert alert-danger" role="alert" style="color:#FFF;">Heads Up! Welcome to San Jose National High School Library
<div class="pull-right">
	<p style="color:#FFF;">Welcome, <?php echo $_SESSION['name'];?></p>
</div>
</div>
<div class="container">
	<div class="row">
    <div class="col-lg-12">
<div class="panel panel-info">
 <div class="panel-heading">
 <div class="row">
 	<div class="col-lg-12">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
 <center>LIBRARY HOURS</center>
 </div>
 <div class="col-lg-4"> <span class="pull-right">
								<i class="glyphicon glyphicon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
							</span></div>
                            </div></div>
                             </div>
  <div class="panel-body">
  <center>
  <table style="border: 0.5px dashed #222;">
  <tr>
  <td>Monday and Tuesday&emsp;&emsp;</td>
  	<td>NO NOON&emsp;</td>
    <td>8:00 a.m. to 7:00 p.m.</td></tr>
  <tr style="border: 0.5px dashed #222;"><td>Wednesday to Friday&emsp;&emsp;</td>
  <td>BREAK&emsp;</td>
  <td>8:00 a.m. to 6:30 p.m</td></tr>
  </table></center>
  <h3>Vission</h3>
  <hr style="border: 0.5px dashed #222;">
    We, an educational institution envision ourselves to prepare academically qualified graduates with desirable values and attitudes equipped with knowledge and enhanced skills, abilities and potentials needed for global competitive.
  <h3>Mission</h3>
  <hr style="border: 0.5px dashed #222 ;">
  We are therefore committed promoting quality education through a comprehensive curriculum in the pursuit of academic excellence, providing learning experiences needed to increase students' awareness to society and encourage him for constructive and effective involvement. Promoting science for development analytic, logical and creative minds and producing students who are ecologically responsible, productive and useful citizen.
  </div>
</div>
</div></div>
</div>
 <?php include('footer.php')?>
 <script>
function confirmSubmit(){
		 var x = confirm("Are you sure you want to update your username and password");
		if(x==true){
			return;
			}
		else{
			return false;}
	}
</script>
 <!-- Modal -->
<div class="modal fade" id="changepasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-cog"></i> CHANGE PASSWORD</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-body">
   <form onSubmit="return confirmSubmit();" method="post" action="dashboard.php">
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
  <button type="submit" name="updatepword">Save changes</button>
</td>
</tr>
</table>
</form>
<?php 

include('includes/dbconn.php');
if(isset($_POST['updatepword'])){
$id = intval($_POST['id']);
$uname = $_POST['username'];
$pword = $_POST['password'];
$cpword = $_POST['confirmpassword'];
 if(empty($uname) || empty ($pword) || empty($cpword)){
	echo '<script>window.alert("Fields must not be empty!");
					window.location.href="dashboard.php"</script>';
	}
else if (
	$pword!=$cpword
){echo '<script>window.alert("Password did not match try again!");
					window.location.href="dashboard.php"</script>';
	}else {
		$sql = mysql_query("UPDATE user set username = '$uname',
											password = '$cpword' WHERE id = '$id'") or die (mysql_error());
										if($sql == true){
											echo '<script>window.alert("Username and Password change successfully!");
					window.location.href="dashboard.php"</script>';}
					else {
						echo '<script>window.alert("Sorry unable to process your request!");
					window.location.href="dashboard.php"</script>';}}}
	?>
</div></div></div>
      </div></div>
      
      </div>
    </div>
  </div>
</div>

<!--    end modal -->
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