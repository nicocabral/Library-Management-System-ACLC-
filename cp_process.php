<?php 
session_start();
include('includes/dbconn.php');
$id = intval($_POST['id']);
$uname = $_POST['username'];
$pword = $_POST['password'];
$cpword = $_POST['confirmpassword'];

if(empty($uname) || empty ($pword) || empty($cpword)){
	echo '<script>window.alert("Fields must not be empty!");
					window.location.href="account_profile.php"</script>';
	}
else if (
	$pword!=$cpword
){echo '<script>window.alert("Password did not match try again!");
					window.location.href="account_profile.php"</script>';
	}else {
		$sql = mysql_query("UPDATE user set username = '$uname',
											password = '$cpword' WHERE id = '$id'") or die (mysql_error());
										if($sql == true){
											echo '<script>window.alert("Username and Password change successfully!");
					window.location.href="account_profile.php"</script>';}
					else {
						echo '<script>window.alert("Sorry unable to process your request!");
					window.location.href="account_profile.php"</script>';}}
	?>