<?php
    require('../config/connectdb.php');
    $id = $_GET['id'];
    echo $id;
	if(isset($_SERVER["REQUEST_METHOD"]) == 'GET'){
        $sqlDelUser = "DELETE FROM user WHERE id = {$id}";
        echo $sqlDelUser;
        if ($conn->query($sqlDelUser) === TRUE) {
            echo "<script>window.location='./index.php?msg=success';</script>";
        } else {
            echo "<script>window.location='./index.php?msg=fail';</script>";
        }
    }
    $conn->close();
?> 