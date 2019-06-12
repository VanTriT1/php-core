<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>User</title>
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <script src="../assets/js/jquery-1.10.2.js"></script>
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
                        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li><a href="add.php"><i class="fa fa-plus"></i> Add new</a></li>
                            <li><a href="index.php"><i class="fa fa-list"></i> List user</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Users</a></li>
                </ul>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">List users</h3>
                    </div>
                    <div class="panel-body">
                        <p class="pull-right">
                            <a class="btn btn-danger" href="add.php"><span class="fa fa-plus"></span>Add user</a>
                        </p>
                        <div id="w0" class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align:center;width:20%"><a href="">Username</a></th>
                                        <th style="text-align:center;width:20%"><a href="">Password</a></th>
                                        <th style="text-align:center;width:35%"><a href="">Email</a></th>
                                        <th style="text-align:center; width: 20%">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php require("../config/connectdb.php"); 
                                    $sqlListUsers = "SELECT id, username, password, email FROM user";
                                    $listUsers = $conn->query($sqlListUsers);
                                    while($user = $listUsers->fetch_assoc()) {
                                ?>
                                    <tr class="success" data-key="1">
                                        <td style="text-align:center"><?php echo $user["id"]?></td>
                                        <td style="text-align:center"><?php echo $user["username"]?></td>
                                        <td style="text-align:center"><?php echo $user["password"]?></td>
                                        <td style="text-align:center"><?php echo $user["email"]?></td>
                                        <td style="text-align:center"> <a class="btn btn-sm btn-success" href="edit.php?id=<?php echo $user["id"];?>">Edit</a> <a class="btn btn-sm btn-danger" onclick="return confirm("Are you sure?"")" href="delete.php?id=<?php echo $user["id"]; ?>">Delete</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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