<?php include('includes/dbconn.php');
$id = intval($_GET['id']);
$tqty = 0;
$query = mysql_query("SELECT * FROM isb WHERE id = '$id'") or die (mysql_error());
	if(mysql_num_rows($query)>0){
		while($row=mysql_fetch_assoc($query)){
				$bookid = $row['bookid'];
				$qty = $row['qty'];
				$sql = mysql_query("SELECT * FROM books WHERE id = '$bookid'") or die (mysql_error());
				if($rows = mysql_fetch_assoc($sql)){
					$tqty = $rows['qty'] + $qty;
						$s = mysql_query("UPDATE books set qty = '$tqty' WHERE id = '$bookid'") or die (mysql_query());
						$q = mysql_query("UPDATE isb set isbstatus = 'Return' WHERE id = '$id'") or die (mysql_error());
						if($s&&$q==true){
							header("location:issuetable.php");}
							else {
								echo '<script>window.alert("Sorry unable to process your request!");
											   window.location.href="issuetable.php"</script>';}
					}
			}}
?>