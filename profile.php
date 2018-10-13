<?php
include('database_connection.php');

if(!isset($_SESSION['type'])){
    header("location:login.php");
}

$query = "
SELECT * FROM user_details
WHERE user_id = '".$_SESSION["user_id"]."'
";

$statment = $connect->prepare($query);
$statment->execute();
$result = $statment->fetchAll();
$name = '';
$email = '';
$user_id = '';
foreach($result as $row){
    $name = $row['user_name'];
    $email = $row['user_email'];

}
include('header.php');
?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">Edit Profile</div>
    <div class="panel-body">
        <form method="post" id="edit_profile_form">
            <span id="message"></span>
            <div id="form-group">
                <label for="">Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $name;?>" required>
            </div>
            <div id="form-group">
                <label for="">Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo $email;?>" required>
            </div>
            <hr>
            <label for="">Leave Password blank if you don't want to change</label>
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="user_new_password" id="user_new_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Re-enter Password</label>
                <input type="password" name="user_re_enter_password" id="user_re_enter_password" class="form-control">
                <span id="error_password"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Edit" name="edit_profile" id="edit_profile" class="btn btn-info">
            </div>
        </form>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#edit_profile_form").on('submit', function(event){
            event.preventDefault();
            if($('#user_new_password').val() != ''){
                if($('#user_new_password').val() != $('#user_re_enter_password').val()){
                    $('#error_password').html('<label class="text-danger">Password Not Match</label>');
                } else {
                    $('#error_password').html('');
                }
            }
            $('#edit_profile').attr('disabled', 'disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url:"edit_profile.php",
                method:"POST",
                data: form_data,
                success:function(data){
                    $('#edit_profile').attr('disabled', false);
                    $('#user_new_password').val('');
                    $('#user_re_enter_password').val('');
                    $('#message').html(data);
                }
            })
        });
    });
</script>