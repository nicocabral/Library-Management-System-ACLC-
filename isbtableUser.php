
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
    	<tr class="success">
        <td style="text-align:center;">Book Name</td>
        <td style="text-align:center;">Author</td>
        <td style="text-align:center;">Date Established</td>
        <td style="text-align:center;">Qty</td>
        <td style="text-align:center;">Status</td>
        </tr>
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
    <tr style="cursor:pointer;" class="<?php echo $class;?>">
   	<td><center><?php echo $row['title'];?></center></td>
    <td><center><?php echo $row['author'];?></center></td>
    <td><center><?php 
	$date = new DateTime($row['dateestab']);
	echo $date->format('M d, Y')?></center></td>
    <td><center><?php echo $row['qty'];?></center></td>
    <td><center><?php echo $row['status'];?></center></td>
    
    </tr>
   
     <?php }}?>
    </tbody>
    <tfoot>
    	<tr class="success">
        <td style="text-align:center;">Book Name</td>
        <td style="text-align:center;">Author</td>
        <td style="text-align:center;">Date Established</td>
        <td style="text-align:center;">Qty</td>
        <td style="text-align:center;">Status</td>
        </tr>
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