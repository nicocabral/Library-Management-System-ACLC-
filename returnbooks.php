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
           
                                        <li ><a href="issueandsearchbooks.php" style="color:#000;"><i class="glyphicon glyphicon-search"></i> Issue/Search Books</a></li>
                                        <li class="active"><a href="returnbooks.php" style="color:#000;"><i class="glyphicon glyphicon-repeat"></i> Return Books</a></li>
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
<div class="alert alert-danger" role="alert" style="color:#FFF;"><span class="glyphicon glyphicon-cog"></span> Manage / Issue and or Search books 
<div class="pull-right">
	<p style="color:#FFF;">Welcome, <?php echo $_SESSION['name'];?></p>
</div>
</div>
<div class="container" style="height:400px;">
	
<iframe src="issuetable.php" height="400px;" width="100%" style="border:none;"></iframe>
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