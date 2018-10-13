<?php
include('database_connection.php');
if(!isset($_SESSION['type'])){
    header("location:login.php");

}
include('header.php');

?>

<span id="alert_action"></span>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">                    
                            <h3 class="panel-title">User List</h3>
                        </div>                
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                            <div class="row" align="right">

                            </div>
                        </div>
                    </div>           
                </div>

                <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var userdataTable = $('#user_data').DataTable({
            "processing":true,
            "serverside" true,
            "order":[],
            "ajax":{
                url:"user_fetch.php",
                type:"POST",            
            },
            "columnDefs":[
                {
                    // "target":[4,5],
                    // "or"
                }
            ]
        });
    });
</script>