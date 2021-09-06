<?php require 'includes/common.php';
error_reporting(0);
if(!isset($_SESSION['Email'])){
    header('location:index.php');
}
else{ ?>
<<!DOCTYPE html>
<html>
    <head>
        <title>Ct&#8377;l Budget</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta charset="UTF-8">
        <meta name="description" content="We are here to manage your financial work and account Effectively.">
        <meta name="author" content="Sohail Ahmed">
        <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">

    </head>
    <body>
       <?php include 'includes/header.php';?>
       <div class="container" style="margin-top:7em;margin-bottom:18em;">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#fff;">
                          <h3 class="text-center">Change Password</h3>  
                        </div>
                        <div class="panel-body">
                            <form method="post" action="includes/password_setting_script.php">
                                
<div class="form-group">
    <label for="old_password">Old Password</label>
                                    <input type="text" name="old_password" placeholder="Old Password" class="form-control"required>
</div>
<div class="form-group">
<label for="new_password">New Password:</label>
                                    <input type="text" name="new_password" placeholder="New Password" class="form-control" required="true" minlength="6">
</div>
<div class="form-group">
<label for="retype_new_password">Confirm New Password:</label>
                                    <input type="text" name="retype_new_password" placeholder="New Password" class="form-control" required="true" minlength="6">
</div>


<div class="form-group">
                                    <button type="Submit"  class="btn btn-block" id="panel">Change</button>
</div>

                            </form>
                        </div></div></div></div></div></div>
        <?php include 'includes/footer.php';?>

        </body>
        </html>
<?php } ?>