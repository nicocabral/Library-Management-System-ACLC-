
<?php session_start();?>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="assets/paper_img/icons/Librarylogo.png" rel="shortcut icon" type="image/png">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
   <link href="assets/css/datatables.min" rel="stylesheet">
   <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    
    <!--     Fonts and icons     -->
    <link href="assets/css/font_awesome.css" rel="stylesheet">
    <link href='assets/css/fonts_googleapis.css' rel='stylesheet' type='text/css'>
    <link href='assets/css/googleapis.css' rel='stylesheet' type='text/css'>

  <div class="panel-body">
  <script>
  function confirmSubmit(){
	  var x = confirm("Are you sure you want to save changes?");
	  if(x==true){
		  return;}
		  else {
			  return false;}
	  }</script>
  
  <?php include('includes/dbconn.php');
  $sql = mysql_query("SELECT * from user WHERE usertype = 'user'") or die (mysql_error());?>

	<table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
    <thead>
    	<tr class="success">
        <td style="text-align:center;">Name</td>
        <td style="text-align:center;">DOB</td>
        <td style="text-align:center;">User Type</td>
        <td style="text-align:center;">Username</td>
        <td style="text-align:center;">Password</td>
        <td style="text-align:center;">Action</td></tr>
    </thead>
   
    <tbody>
     <?php 
	
	 if(mysql_num_rows($sql)>0){
		while($row = mysql_fetch_assoc($sql)){
			
			?>
    <tr style="cursor:pointer;">
   	<td><center><?php echo $row['name'];?></center></td>
    <td><center><?php
	$date = new Datetime($row['dob']); echo $date->format('M d, Y') ;?></center></td>
    <td><center><?php echo $row['pos']?></center></td>
    <td><center><?php echo $row['username'];?></center></td>
    <td><center>**********</center></td>
    <td><center><a href="#editModal<?php echo $row['id'];?>" data-toggle="modal" data-target="#editModal<?php echo $row['id'];?>" class="btn btn-success btn-fill btn-sm">Edit</a> | <a href="#confirmModal<?php echo $row['id'];?>" data-toggle="modal" data-target="#confirmModal<?php echo $row['id'];?>" class="btn btn-fill btn-danger btn-sm">Delete</a></center></td>
    </tr><!-- Modal -->
<div class="modal fade" id="confirmModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete <strong style="color:red;"><?php echo $row['name']?></strong>?</p>
      </div>
      <div class="modal-footer">
        <div class="left-side">
            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">No</button>
        </div>
        <div class="divider"></div>
        <div class="right-side">
            <a href="deleteprocess.php?id=<?php echo $row['id']?>" type="button" class="btn btn-success btn-simple">Yes</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!--    end modal -->
<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Update Username and Password</h4>
      </div>
      <div class="modal-body">
        <p><form onsubmit="return confirmSubmit();" method="post" action="uandpprocess.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" placeholder="Password">
  </div>
   <button type="submit" class="btn btn-success btn-fill" name="savechanges">Save changes</button>
    <button type="reset" class="btn btn-default btn-fill">Clear</button>
  </form></p>
      </div>
     
    </div>
  </div>
</div>

<!--    end modal -->

   
     <?php }}?>
    </tbody>
   <tfoot>
    	<tr class="success">
        <td style="text-align:center;">Name</td>
        <td style="text-align:center;">DOB</td>
        <td style="text-align:center;">User Type</td>
        <td style="text-align:center;">Username</td>
        <td style="text-align:center;">Password</td>
        <td style="text-align:center;">Action</td></tr>
    </tfoot>
    </table>
</div>
 <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/ct-paper.js"></script>   
	<script src="assets/js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>	  