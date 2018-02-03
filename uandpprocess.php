<?php 
session_start();
include('includes/dbconn.php');
if(isset($_POST['savechanges'])){
	$username = $_POST['username'];
	$pword = $_POST['password'];
	$cpword = $_POST['cpassword'];
	$id = $_POST['id'];
	if(empty($username)||empty($pword) || empty ($cpword)){
		echo '<script>window.alert("Fields must not be empty!");
					   window.location.href="userlistTable.php";</script>';}
					   else if($pword!=$cpword){
						   echo '<script>window.alert("Password did not match try again!");
					   window.location.href="userlistTable.php";</script>';
						   }
					   else {
						   $sql = mysql_query("UPDATE user set username = '$username',
						   									   password = '$cpword' WHERE id = '$id' ") or die (mysql_error());}
															   
															  if($sql==true){
																  echo '<script>window.alert("Updated successfully!");
																  				window.location.href="userlistTable.php";</script>';}
																				else{
																					echo '<script>window.alert("Sorry unable to process your request!");
					   window.location.href="userlistTable.php";</script>';}}	
?>