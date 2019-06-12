<?php 
	$conn=mysqli_connect("localhost","root","@Thuhai12","data");
    if($connect->connect_error) {
        exit("Can not connect to your database. Error:" . $connect->connect_error);
    } else {
		mysqli_query($conn,'SET NAME UTF-8');
	}
 ?>