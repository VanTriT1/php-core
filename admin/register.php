<!DOCTYPE html>
<html>
<head>
<title>SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
	<div class="main-w3layouts wrapper">
		<h1>SignUp Form</h1>
        <?php
            require('../config/connectdb.php');
            $usernameErr = $emailErr = $passwordErr = "";
            $username = $email = $password = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["username"])) {
                    $usernameErr = "Username is required";
                } else {
                    $username = test_input($_POST["username"]);
                    if (!preg_match("/^[A-Za-z0-9_\.]{6,32}$/",$username)) {
                        $usernameErr = "Only letters and white space allowed"; 
                    }
                }
                
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format"; 
                    }
                }
                    
                if (empty($_POST["password"])) {
                    $passwordErr = "Password is required";
                } else {
                    $password = test_input($_POST["password"]);
                    if (!preg_match("/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/",$password)) {
                        $passwordErr = "Invalid password";
                    }
                }
            }
                
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                $sqlCheckUsername = "SELECT * FROM `user` WHERE username = '{$username}' OR email = '{$email}'";
                $result = $conn->query($sqlCheckUsername);
                $row = mysqli_fetch_assoc($result);
                if($row === NULL) {
                    $sql = "INSERT INTO user (username, password, email)
                    VALUES ('{$username}', '{$password}', '{$email}')";
                    if ($conn->query($sql) === TRUE) {
                        header('Location: index.php');
                    } else {
                        header('Location: register.php?message=error');
                    }
                } else {
                    header('Location: register.php?message=exist');
                }
            }
            $conn->close();
        ?>
        
		<div class="main-agileinfo">
			<div class="agileits-top">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <input class="text" type="text" name="username" placeholder="Username" required="">
                    <span class="error">* <?php echo $usernameErr;?></span>
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <span class="error">* <?php echo $emailErr;?></span>
                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <span class="error">* <?php echo $passwordErr;?></span>
                    <input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="">
                    <input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>Don't have an Account? <a href="#"> Login Now!</a></p>
			</div>
		</div>
		<div class="colorlibcopy-agile">
			<p>Management system</p>
		</div>
	</div>
</body>
</html>