<?php require "includes/common.php";
error_reporting(0);
if(isset($_SESSION['id'])){
    header("location:home.php");
}
else{?>
<!DOCTYPE html>
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
        <div class="container" style="margin-top:7em;margin-bottom:10em;">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#fff;">
                          <h3 class="text-center">Login</h3>  
                        </div>
                        <div class="panel-body">
                            <form method="post" action="includes/login_script.php">
                                
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="Email" name="email" placeholder="Email" class="form-control"required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control" required="true" minlength="6">
                                </div>


                                <div class="form-group">
                                    <button type="Submit"  class="btn btn-block" id="panel">Login</button>
                                </div>

                            </form>
                        </div>
                        <div class="panel-footer">
                            <h5>Don't have an account?<a href="signup.php">Click Here to Sign up</a></h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php';?>
    </body>
</html>
<?php }?>