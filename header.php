<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Della PHP URL Redirection </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    
   
</head>
<body>
    <br>
    <div class="container">
        <h2 align="center">Della PHP URL Redirecction</h2>    
        <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-brand">Home</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <?php 
                        if($_SESSION['type']== 'master'){?>
                            <li><a href="user.php">User</a></li>
                            <li><a href="category.php">Category</a></li>
                            <li><a href="brand.php">Brand</a></li>
                            <li><a href="product.php">Product</a></li>
                        <?php } ?>
                            <li><a href="order.php">Order</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span><?php echo $_SESSION["user_name"];?></a>
                      
                            <ul class="dropdown-menu">
                                <li><a href="profile.php">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>                   
                </div>
        </nav>    
    </div>
</body>
</html>