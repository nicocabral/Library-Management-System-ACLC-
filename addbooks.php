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
                                        <li class="active"><a href="addbooks.php" style="color:#000;"><i class="glyphicon glyphicon-plus-sign"></i> Add Books</a></li>
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
<div class="alert alert-danger" role="alert" style="color:#FFF;"><span class="glyphicon glyphicon-cog"></span> Manage / Add Books
<div class="pull-right">
	<p style="color:#FFF;">Welcome, <?php echo $_SESSION['name'];?></p>
</div>
</div>
<div class="container" style="height:400px;">
	<div class="row">
    <div class="col-lg-12">
<div class="panel panel-success">
 <div class="panel-heading"><center><i class="glyphicon glyphicon-book"></i> ADD BOOKS</center> </div>
  <div class="panel-body">
	
<div class="row">
  <script>
  function saveConfirm(){
	  var a = confirm("Are you sure you want to save this book?");
	  if(x==true){
		  return;}
		  else {
			  return false;}
	  }
  </script>
<form onSubmit="return saveConfirm();" method="post" action="addbooks.php">
<center>
<p>Fields with (*) are required.</p>
<table>
<tr>
	<td style="text-align:right; width:auto;">Title*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <textarea name="title" required style="width:100%;"></textarea><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Author*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <input type="text" name="author" required style="width:100%"><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Date Established*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <input type="date" name="de" required style="width:100%"><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Books Qty*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <input type="number" name="qty" required style="width:100%"><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Status*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <select name="stat" style="width:100%">
    											<option>Select</option>
                                                <option value="Available">Available</option>
                                                <option value="Out of Stock">Out of Stock</option></select><br><p></p>
    </td>
</tr>
<tr>
	<td style="text-align:right;"ccolspan="2">
    <button type="reset" class="btn btn-fill btn-default">Clear</button>
    <button type="submit" class="btn btn-fill btn-success" name="savebook">Save book</button>
    </td>
    
</tr>

</table></center>
</form>
<?php include('includes/dbconn.php');
if(isset($_POST['savebook'])){
	$title = $_POST['title'];
	$author = $_POST['author'];
	$de = $_POST['de'];
	$qty = $_POST['qty'];
	$stat = $_POST['stat'];
	if(empty($title) || empty($author) || empty($de) || empty($qty) || empty($stat)){
		echo '<script>window.alert("Fields must not be empty!");
					  window.location.href="addbooks.php";</script>';}
	else {
		$sql = mysql_query("INSERT INTO books VALUES (NULL,'$title','$author','$de','$qty','$stat')") or die (mysql_error());
		if($sql==true){
		echo '<script>window.alert("Book save successfully!");
					  window.location.href="addbooks.php";</script>';}
		else{
			echo '<script>window.alert("Sorry unable to process your request!");
					  window.location.href="addbooks.php";</script>';}
		}
	
	}?>
</div>
</div></div></div>
</div>
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