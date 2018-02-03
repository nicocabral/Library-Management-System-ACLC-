<?php
	session_start();

    include('includes/dbconn.php');

       	$user =mysql_real_escape_string( $_POST['username']);
		$password =mysql_real_escape_string( $_POST['password']);
        
			$sql = "SELECT * FROM user WHERE username='$user' AND password='$password'";
		
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result)==0) {
				echo'<script>window.alert("Invalid username and/or password");
							 window.location.href="index.php";</script>';
			

			} else {
					while($row=mysql_fetch_array($result))
					{
						$_SESSION['id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['user_type'] = $row['usertype'];
						$_SESSION['position'] =  $row['pos'];
						$_SESSION['office'] =	$row['dep'];
					}
					if($_SESSION['user_type']=='admin'){
						echo'<script>
						window.location.href="dashboard.php"</script>';}
						else {
					echo '<script>
						window.alert("Sorry unable to process your request.");
						window.location.href="logout_process.php?logout=1.php";
					</script>';}
			}
		
	mysql_close($con);

?>