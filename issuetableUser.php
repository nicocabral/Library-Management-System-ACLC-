
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
  $name = $_SESSION['name'];
  $sql = mysql_query("SELECT books.*,isb.* FROM isb LEFT JOIN books on isb.bookid = books.id WHERE isb.isbstatus = 'Issued' AND isb.borrower_name = '$name' order by isb.dateborrowed") or die (mysql_error());?>

	<table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
    <thead>
    	<tr class="success">
        <td style="text-align:center;">Book Name</td>
        <td style="text-align:center;">Issued to</td>
        <td style="text-align:center;">Date Borrowed</td>
        <td style="text-align:center;">Qty</td>
        <td style="text-align:center;">Status</td>
        <td style="text-align:center;">Address</td>
        <td style="text-align:center;">Date to Return</td>
        <td style="text-align:center;">Action</td></tr>
    </thead>
   
    <tbody>
     <?php 
	 $stat = '';
	 $class = '';
	 if(mysql_num_rows($sql)>0){
		while($row = mysql_fetch_assoc($sql)){
			if($row['qty']==0){
				$stat='disabled';
				$class = 'danger';
				}else {
					$stat = 'enabled';
					$class = '';}
			?>
    <tr style="cursor:pointer;">
   	<td><center><?php echo $row['title'];?></center></td>
    <td><center><?php echo $row['borrower_name'];?></center></td>
    <td><center><?php 
	$date = new DateTime($row['dateborrowed']);
	echo $date->format('M d, Y')?></center></td>
    <td><center><?php echo $row['qty'];?></center></td>
    <td><center><?php echo $row['borrower_type'];?></center></td>
    <td><center><?php echo $row['address'];?></center></td>
       <td><center><?php 
	   $d = new DateTime($row['datereturn']);echo $d->format('M d, Y');?></center></td>
    <td><center><a href="#confirmModal<?php echo $row['id'];?>" data-toggle="modal" data-target="#confirmModal<?php echo $row['id'];?>" class="btn btn-fill btn-success btn-sm">Return</a></center></td>
    </tr><!-- Modal -->
<div class="modal fade" id="confirmModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure this book has been return?</p>
      </div>
      <div class="modal-footer">
        <div class="left-side">
            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">No</button>
        </div>
        <div class="divider"></div>
        <div class="right-side">
            <a href="returnbookprocessUser.php?id=<?php echo $row['id']?>" type="button" class="btn btn-success btn-simple">Yes</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!--    end modal -->


   
     <?php }}?>
    </tbody>
    <tfoot>
    	<tr class="success">
        <td style="text-align:center;">Book Name</td>
        <td style="text-align:center;">Issued to</td>
        <td style="text-align:center;">Date Borrowed</td>
        <td style="text-align:center;">Qty</td>
        <td style="text-align:center;">Status</td>
        <td style="text-align:center;">Address</td>
        <td style="text-align:center;">Date Return</td>
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