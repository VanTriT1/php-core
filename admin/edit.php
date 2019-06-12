<?php require("../config/connectdb.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id'])) {
        $sqlUser = "SELECT id, username, email FROM user WHERE id = {$_GET['id']}";
        $result = $conn->query($sqlUser);
        $user = mysqli_fetch_assoc($result);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usernameErr = $emailErr = "";
        $username = $email = "";
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
        }
    }
        
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(!empty($_POST['username']) && !empty($_POST['email'])) {
        $sqlCheckUsername = "SELECT * FROM user WHERE username = '.$username.' OR email = '.$email.'";
        $result = $conn->query($sqlCheckUsername);
        $row = mysqli_fetch_assoc($result);
        if($row == NULL) {
            $sql = "UPDATE user SET username = '{$username}', email = '{$email}' WHERE id = {$_POST['id']}";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
            } else {
                header("Location: edit.php?message=error");
            }
        } else {
            header("Location: edit.php?message=exist");
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>User</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
        <link href="../assets/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><span style="color: red"><i class="fa fa-home"></i>Management system</a></span>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="dropdown">
                            <a href="index.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Users <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li><a href="add.php"><i class="fa fa-plus"></i> Add new</a></li>
                            <li><a href="index.php"><i class="fa fa-list"></i> List users</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">Users</a></li>
                    <li class="active">User info</li>
                </ul>
                <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><span style="color: red;font-weight: bold;">User info</span></h3>
                </div>
                
                <div class="panel-body col-md-6">
                    <div class="student-form">
                        <form id="w0" action="edit.php" method="post">
                            <div class="form-group field-student-student_code required">
                                <label class="control-label" for="student-student_code">Id_user</label>
                                <input type="text" id="id" class="form-control" disabled=disabled value="<?php echo $user['id']?>"  name="hidden-id" aria-required="true" required>
                                <input type="hidden" name="id" value="<?php echo $user['id']?>">
                                <div class="help-block"></div>
                            </div>
                            
                            <div class="form-group field-student-fullname required">
                                <label class="control-label" for="student-fullname">Username</label>
                                <input type="text" id="username" class="form-control" name="username" aria-required="true" value="<?php echo $user['username']?>" required>
                                <div class="help-block"></div>
                            </div>

                            <div class="form-group field-student-class required">
                                <label class="control-label" for="student-class">Email</label>
                                <input type="text" id="email-class" class="form-control" name="email" aria-required="true" value="<?php echo $user['email']?>" required>
                                <div class="help-block"></div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Edit</button>
                                <button type="reset" class="btn btn-success">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/js/jquery.validate.js"></script>
        <script src="../assets/js/setingvalidate.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/search.js"></script>
        <script src="../assets/js/searchBill.js"></script>
        <script src="../assets/js/raphael-min.js"></script>
    </body>
</html>