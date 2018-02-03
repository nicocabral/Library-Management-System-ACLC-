<?php session_start();
include('includes/dbconn.php');
if(isset($_POST['saveaccount'])){
	$name = $_POST['name'];
	$sex = $_POST['gender'];
	$dob = $_POST['dob'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$no = $_POST['no'];
	$dep = $_POST['dep'];
	$pos = $_POST['pos'];
	$utype = $_POST['type'];
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$cpword = $_POST['confirmpassword'];
	if(empty($name) || empty($sex) || empty($dob) || empty($age) || empty($address) || empty($no) || empty($dep) || empty($pos) || empty($utype) || empty($uname) || empty($pword) || empty ($cpword)){
		echo '<script>window.alert("Fields must not be empty. Please try again!");
					   window.location.href="addaccountprofile.php";</script>';
		}
		else if ($pword!=$cpword){
			echo '<script>window.alert("Password did not match.Please try again!");
					   window.location.href="addaccountprofile.php";</script>';}
					   else {
						   		$sql = mysql_query("INSERT INTO user VALUES(NULL,'$name','$sex','$dob','$age','$address','$no','$dep','$pos','$utype','$uname','$cpword')") or die (mysql_error());
								if($sql==true){
									echo '<script>window.alert("Accunt save successfully!");
					   window.location.href="addaccountprofile.php";</script>';
						   }else {
							   echo '<script>window.alert("Sorry unable to process your request!");
					   window.location.href="addaccountprofile.php";</script>';}}
	}?>