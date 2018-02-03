<?php 
session_start();
include('includes/dbconn.php');
$id = $_GET['id'];
$sql = mysql_query("DELETE from user where id = '$id'") or die (mysql_error());
	if($sql==true){
		header("location:userlistTable.php");}
		else{
			echo'<script>window.alert("Sorry uanble to process your request!");
						window.location.href="userlistTable.php"</script>';}
?>