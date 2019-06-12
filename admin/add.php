<?php
	require('../config/connectdb.php'); 
	$sqlUser = "SELECT id, username, email FROM user WHERE id = 1";
	$result = $conn->query($sqlUser);
	$row = mysqli_fetch_assoc($result);
	echo $row['username'];
?>