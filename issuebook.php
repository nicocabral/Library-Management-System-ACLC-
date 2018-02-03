
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
<div class="panel panel-success">
 <div class="panel-heading"><center><i class="glyphicon glyphicon-send"></i> Issue Book</center> </div>
  <div class="panel-body">
  
   <script>
  function saveConfirm(){
	  var a = confirm("Are you sure you want to Issue this book?");
	  if(a==true){
		  
	return;}
		  else {
			  return false;}
	  }
	  
	  function sum(){
		  var x = document.getElementById('qty').value;
		  var y = document.getElementById('bqty').value;
		  var result = parseInt(x)-parseInt(y);
		  if(!isNaN(result)){
			  document.getElementById('balqty').value = result;
			  }
		  }
  </script>
<form onSubmit="return saveConfirm();" method="post" action="issuebook.php">


<center><p>Fill up needed information.Fields with (*) are required.</p></center>
<hr />
<?php include('includes/dbconn.php');
	$id = @$_GET['id'];
	$sql = @mysql_query("SELECT * FROM books WHERE id ='$id'") or die (mysql_error());
	if(@mysql_num_rows($sql)>0){
		while($row = @mysql_fetch_assoc($sql)){?>
        <input type="hidden" name="bookid" id="bookid" value="<?php echo $row['id'];?>" />
<div class="row">
  <div class="col-xs-6">
  <table>
   <tr style=" margin-bottom:10px; margin-top:10px;">
  	<td style="text-align:center;" colspan="2">Books Information<hr /></td>
    
  </tr>
  <tr style="">
  	<td style="text-align:right;">Title&emsp;<br /><p></p></td>
    <td style=" text-align:left;">:&emsp;<?php echo $row['title'];?><br /><p></p></td>
  </tr>
  <tr style=" margin-bottom:10px; margin-top:10px;">
  	<td style="text-align:right;">Author&emsp;<br /><p></p></td>
    <td style=" text-align:left;">:&emsp;<?php echo $row['author'];?><br /><p></p></td>
  </tr>
  <tr style=" margin-bottom:10px; margin-top:10px;">
  	<td style="text-align:right;">Date Established&emsp;<br /><p></p></td>
    <td style=" text-align:left;">:&emsp;<?php
	$date = new Datetime($row['dateestab']); echo $date->format('M d, Y');?><br /><p></p></td>
  </tr>
  <tr style=" margin-bottom:10px; margin-top:10px;">
  	<td style="text-align:center;"><br /><p></p></td>
    <td style=" text-align:center;"><br /><p></p></td>
  </tr>
 
    <tr style=" margin-bottom:10px; margin-top:10px;">
  	<td style="text-align:center;" colspan="2"><hr><p></p>
    <input type="hidden" name="bookid" value="<?php echo $row['id'];?>"/></td>
   <input type="hidden" id="qty" value="<?php echo $row['qty']?>" />
   <input type="hidden" id="balqty" name="balqty" />
   
  </tr>
   <tr style=" margin-bottom:10px; margin-top:10px;">
  	<td style="text-align:center;"><a href="isbTable.php" class="btn btn-fill btn-default">Cancel</a></td>
    <td style=" text-align:center;"><button type="submit" name="saveissued" class="btn btn-fill btn-primary">Issue Book</button></td>
  </tr>
  </table>
  </div>
  <div class="col-xs-6">
  <table>
  <tr>
  <td style="text-align:right;">Issued to*&emsp;</td>
  <td style="text-align:right;"> &emsp;
  <?php include('includes/dbconn.php');
  	$q = mysql_query("SELECT * FROM user WHERE usertype = 'user' order by name") or die (mysql_error());
		
	?>
    <select name="issuedto" required style="width:100%">
    	<option>Select</option>
        <option></option>
        <?php if(mysql_num_rows($q)>0){
				while($row = mysql_fetch_assoc($q)){ ?>
         <option value="<?php echo $row['name']?>"> <?php echo $row['name']?></option>
         <?php }}?>
         </select>
  </td>
  </tr>
   <tr>
  <td style="text-align:right;">Identification ID*&emsp;</td>
  <td style="text-align:right;"> &emsp;<input type="text" name="iid" required style="width:100%"></td>
  </tr>
   <tr>
  <td style="text-align:right;">Borrower Type*&emsp;</td>
  <td style="text-align:right;"> &emsp;<select name="btype" style="width:100%">
  											<option>Select</option>
                                            <option value="Student">Student</option>
                                            <option value="Teacher">Teacher</option></select></td>
  </tr>
   <tr>
  <td style="text-align:right;">Borrowed Qty*&emsp;</td>
  <td style="text-align:right;"> &emsp;<input type="number" name="qty" id="bqty" onkeyup="sum();" style="width:100%" /></td>
  </tr>
   <tr>
  <td style="text-align:right;">Borrower Address*&emsp;</td>
  <td style="text-align:right;"> &emsp;<textarea name="address" required style="width:100%"></textarea></td>
  </tr>
  <tr>
  <td style="text-align:right;">Date Return*&emsp;</td>
  <td style="text-align:right;"> &emsp;<input type="date" name="date" style="width:100%" /></td>
  </tr>
  </table>
  </div>
 
</div>
<?php }}?>
</form>
<?php include('includes/dbconn.php');
if(isset($_POST['saveissued'])){
	$bookid =$_POST['bookid'];
	$bname = $_POST['issuedto'];
	$b_id = $_POST['iid'];
	$btype = $_POST['btype'];
	$qty = $_POST['qty'];
	$add = $_POST['address'];
	$dater = $_POST['date'];
	$balqty = $_POST['balqty'];
	if(empty($bookid) || empty($bname) || empty($b_id) || empty($btype) || empty($qty) || empty($add) || empty($dater)){
		echo'<script>window.alert("Fields must not be empty!");
						window.location.href="isbTable.php";</script>';
		}
		else {
			$query = mysql_query("INSERT INTO isb VALUES (NULL,'$bookid','$bname','$b_id',now(),'$btype','$qty','$add','$dater','Issued')") or die (mysql_error());
			if($query==true){
				$sql = mysql_query("UPDATE books set qty = '$balqty' WHERE id = '$bookid'") or die (mysql_error());
				if($sql){
				echo'<script>window.alert("Save successfully!");
						window.location.href="isbTable.php";</script>';}
						else
						{
							echo'<script>window.alert("Sorry unable to process your request!");
						window.location.href="isbTable.php";</script>';}}}
	}
?>
</div></div>
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