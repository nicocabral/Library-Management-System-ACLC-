
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
 <div class="panel-heading"><center><i class="glyphicon glyphicon-edit"></i> Edit Book</center> </div>
  <div class="panel-body">
  
   <script>
  function saveConfirm(){
	  var a = confirm("Are you sure you want to save changes?");
	  if(x==true){
		  
	return;}
		  else {
			  return false;}
	  }
  </script>
<form onSubmit="return saveConfirm();" method="post" action="editbookprocess.php">
<center>

<p>Fields with (*) are required.</p>
<?php include('includes/dbconn.php');
	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM books WHERE id ='$id'") or die (mysql_error());
	if(mysql_num_rows($sql)>0){
		while($row = mysql_fetch_assoc($sql)){?>
        <input type="hidden" name="bookid" id="bookid" value="<?php echo $row['id'];?>" />
<table>
<tr>
	<td style="text-align:right; width:auto;">Title*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <textarea name="title" id="title" required style="width:100%;"><?php echo $row['title']?></textarea><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Author*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <input type="text" name="author" id="author" required style="width:100%" value="<?php echo $row['author']?>"><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Date Established*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <input type="date" name="de" id="de" required style="width:100%" value="<?php echo $row['dateestab']?>"><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Books Qty*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <input type="number" name="qty" id="qty" required style="width:100%" value="<?php echo $row['qty']?>"><br><p></p></td>
</tr>
<tr>
	<td style="text-align:right; width:auto;">Status*&nbsp;</td>
    <td style="text-align:left; width:auto;"> <select name="stat" id="stat" style="width:100%">
    											
                                                <option value="<?php echo $row['status']?>"><?php echo $row['status']?></option>
                                                <option></option>
                                                <option value="Available">Available</option>
                                                <option value="Out of Stock">Out of Stock</option></select><br><p></p>
    </td>
</tr>
<tr>
	<td style="text-align:right;"ccolspan="2">
    <a href="rTable.php"  class="btn btn-fill btn-default">Back</a>
    <button type="submit" class="btn btn-fill btn-success" name="savebook" id="savebook">Save changes</button>
    </td>
    
</tr>

</table>
<?php }}?></center>
</form>

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