<?php session_start();
include('includes/dbconn.php');
$id = intval($_GET['id']);
$sql = mysql_query("Delete FROM books WHERE id = '$id'") or die (mysql_error());
if($sql==true){
	header("location:rTable.php");
	}
?>