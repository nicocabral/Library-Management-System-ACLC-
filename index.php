<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	
?>
<!doctype html>
<html lang="en">
<?php include('head.php')?>

<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php">
           <div class="logo-container">
                <div class="logo">
                    <img src="assets/paper_img/new_logo.png" alt="Creative Tim Logo">
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
            <a href="index.php" class="btn btn-danger btn-fill" ><span class="glyphicon glyphicon-home"></span> Home</a>
          </li>
          <li class="btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="User or Student Login">
            <a href="#userLoginModal" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#userLoginModal"><span class="glyphicon glyphicon-user"></span> User</a>
          </li>
          <li class="btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="System Admin Login only">
            <a href="#adminLoginModal" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#adminLoginModal"><span class="glyphicon glyphicon-cog"></span> Admin</a>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>         


<div class="wrapper">
    <div class="demo-header demo-header-image">
            <div class="motto" style="color: #FFF;">
             <br><p></p>
       <div class="col-lg-4"></div>
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4"></div>
                <h1 class="title-uppercase" style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;">LIBRO</h1>
                <h3 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;"> A Student Library Information System</h3>
                <h4 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;"> of</h4>
                <h3 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;"> 
San Jose National High School
</h3>
            </div>
    </div>
   <?php include('footer.php');?>
</div>
<!--user/student Modal -->
<div class="modal fade" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn-simple btn-tooltip" data-toggle="tooltip" title="Close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> User or Student Login</h4>
      </div>
      
      <div class="modal-body">
      <form class="form-horizontal" action="login_process.php" method="post">
        <p>Please Enter the Details Below..</p>
       <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username:</label>
    <div class="col-sm-10 has-warning">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofucos>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10 has-warning">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autofucos>
    </div>
  </div>
       
       
      <div class="modal-footer">
        <div class="left-side">
            <button type="reset" class="btn btn-default btn-simple">CLEAR</button>
        </div>
        <div class="divider"></div>
        <div class="right-side">
            <button type="submit" class="btn btn-danger btn-simple" id="submit">LOGIN</button>
        </div>
      </div>
      </form>
      </div><!---modal body--->
      <!--    end modal -->

    </div>
  </div>
</div>

<!--    end modal -->
<!--admin Modal -->
<div class="modal fade" id="adminLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close btn-simple btn-tooltip" data-toggle="tooltip" title="Close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-cog"></i> Admin Login</h4>
      </div>
      <form class="form-horizontal" action="adminlogin_process.php" method="post">
      <div class="modal-body">
     
        <p>Please Enter the Details Below..</p>
       <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username:</label>
    <div class="col-sm-10 has-warning">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofucos>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10 has-warning">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autofucos>
    </div>
  </div>
       
       </div><!---modal body--->
      <div class="modal-footer">
        <div class="left-side">
            <button type="reset" class="btn btn-default btn-simple">CLEAR</button>
        </div>
        <div class="divider"></div>
        <div class="right-side">
            <button type="submit" class="btn btn-danger btn-simple">LOGIN</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>




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
<?php }else {
	header('location:dashboard.php');
	
	}?>