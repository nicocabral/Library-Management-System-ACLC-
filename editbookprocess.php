<?php include('includes/dbconn.php');
if(isset($_POST['savebook'])){
	$title = $_POST['title'];
	$author = $_POST['author'];
	$de = $_POST['de'];
	$qty = $_POST['qty'];
	$stat = $_POST['stat'];
	$bookid = $_POST['bookid'];
	if(empty($title) || empty($author) || empty($de) || empty($stat)){
		echo '<script>window.alert("Fields must not be empty!");
					  window.location.href="editbookTable.php?id=$bookid";</script>';}
	else {
		$sql = mysql_query("UPDATE books set title='$title',
											 author = '$author',
											 dateestab = '$de',
											 qty = '$qty',
											 status = '$stat' WHERE id = '$bookid'") or die (mysql_error());
		if($sql==true){
		echo '<script>window.alert("Book updated successfully!");
					  window.location.href="rTable.php";</script>';}
		else{
			echo '<script>window.alert("Sorry unable to process your request!");
					  window.location.href="editbookTable.php?id=$bookid";</script>';}
		}
	
	}?>