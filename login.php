<?php 
include('database_connection.php');
if(isset($_SESSION['type'])){
    header("location:index.php");
}
$message = '';
if(isset($_POST["login"])){
    $query = "
    SELECT * FROM user_details 
        WHERE user_email = :user_email        
    ";

    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            'user_email' => $_POST['user_email']
        )
    );

    $count = $statement->rowCount();
    if($count > 0){
        $result = $statement->fetchAll();
        foreach($result as $row){
           
            //$hash = password_hash($row['user_password'], PASSWORD_DEFAULT);
          
            if(password_verify($_POST['user_password'], $row['user_password'] )){
                if($row['user_status']=='Active'){
                    $_SESSION['type'] = $row['user_type'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    header("location:index.php");

                } else {
                    $message = "<label>Your account is disabled, Contact Master</label>";
                }
            } else {
                $message = "<label>Wrong Password</label>";

            }
        }
    } else {
        $message = "<label>Wrong Email Address</label>";
    }

}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>IMS</title>

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    
    
    
    <script src="assets/js/main.js"></script>
    </head>
    <body>
        <div class="container">
            <h2 align="center">Della PHP Redirection</h2>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form action="" method="post">
                        <?php echo $message;?>
                        <div class="form-group">
                            <label for="">User Email</label>
                            <input type="text" name="user_email" id="" class="form-control" required>                            
                        </div>
                        <div class="form-group">    
                            <label for="">Password</label>
                            <input type="password" name="user_password" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" name="login" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
