
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
  
  <?php include('includes/dbconn.php');
  $sql = mysql_query("SELECT * FROM books order by dateestab") or die (mysql_error());?>
	<table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
    <thead>
    	<tr class="danger">
        <td style="text-align:center;">Book Name</td>
        <td style="text-align:center;">Author</td>
        <td style="text-align:center;">Date Established</td>
        <td style="text-align:center;">Qty</td>
        <td style="text-align:center;">Status</td>
        <td style="text-align:center;">Action</td></tr>
    </thead>
   
    <tbody>
     <?php if(mysql_num_rows($sql)>0){
		while($row = mysql_fetch_assoc($sql)){?>
    <tr style="cursor:pointer;">
   	<td><center><?php echo $row['title'];?></center></td>
    <td><center><?php echo $row['author'];?></center></td>
    <td><center><?php 
	$date = new DateTime($row['dateestab']);
	echo $date->format('M d, Y')?></center></td>
    <td><center><?php echo $row['qty'];?></center></td>
    <td><center><?php echo $row['status'];?></center></td>
    <td><center><a href="editbookTable.php?id=<?php echo $row['id'];?>"class="btn btn-fill btn-info btn-sm">Edit</a> | <a href="#deletetModal<?php echo $row['id'];?>" data-toggle="modal" data-target="#deleteModal<?php echo $row['id'];?>" class="btn btn-fill btn-success btn-sm">Delete</a></center></td>
    </tr>
    <!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-remove"></i> Delete Book</h4>
      </div>
      
      <div class="modal-body">
    	<p>Are you sure you want to delete <strong style="color:red;"><?php echo $row['title'];?></strong></p>
      </div>
      <div class="modal-footer">
        <div class="left-side">
            <a href="deletebookprocess.php?id=<?php echo $row['id'];?>" type="button" class="btn btn-success btn-simple">YES</a>
        </div>
        <div class="divider"></div>
        <div class="right-side">
            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">NO</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--    end modal -->
     <?php }}?>
    </tbody>
    <tfoot>
    	<tr class="danger">
        <td style="text-align:center;">Book Name</td>
        <td style="text-align:center;">Author</td>
        <td style="text-align:center;">Date Established</td>
        <td style="text-align:center;">Qty</td>
        <td style="text-align:center;">Status</td>
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