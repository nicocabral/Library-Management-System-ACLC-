<?php 
session_start();
include('includes/dbconn.php');
if(isset($_POST['updateavatar'])){
	$id = intval($_POST['id']);
	//image
                                   $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
//
                                move_uploaded_file($_FILES["image"]["tmp_name"], "avatar/" . $_FILES["image"]["name"]);
                                $location = "avatar/" . $_FILES["image"]["name"];
								$query = mysql_query("SELECT * FROM userimg WHERE userid = '$id'") or die (mysql_error());
								if(mysql_num_rows($query)==0){
									$sql = mysql_query("INSERT INTO userimg VALUES(NULL,'$id','$location')") or die (mysql_error());
									if($sql==true){
										echo'<script>window.alert("Avatar Updated successfully!");
													 window.location.href="account_profileUser.php";</script>';}
													 else {
														 echo'<script>window.alert("Sorry unable to process your request.");
													 window.location.href="account_profileUser.php";</script>';
														 }
										
									}
									else{
											$updatesql = mysql_query("UPDATE userimg set img = '$location' WHERE userid = '$id'") or die (mysql_error());
											if($updatesql==true){
										echo'<script>window.alert("Avatar Updated successfully!");
													 window.location.href="account_profileUser.php";</script>';}
													 else {
														 echo'<script>window.alert("Sorry unable to process your request.");
													 window.location.href="account_profileUser.php";</script>';
														 }
											}
								}
								
	
?>