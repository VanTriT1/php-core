<?php
    require('../config/connectdb.php');
	if(isset($_SERVER["REQUEST_METHOD"]) == 'GET' && !empty($_GET['id'])){
        $sqlDelUser = "DELETE FROM user WHERE id = {$_GET['id']}";
        echo $sqlDelUser;
        if ($conn->query($sqlDelUser) === TRUE) {
            header("Location: index.php");
            // echo "<script>window.location='./index.php?msg=success';</script>";
        } else {
            header("Location: index.php");
            // echo "<script>window.location='./index.php?msg=fail';</script>";
        }
    }
    $conn->close();
?> 