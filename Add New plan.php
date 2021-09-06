<?php require "includes/common.php";
error_reporting(0);
if(!isset($_SESSION['id'])){
    header('location:index.php');
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
<div class="container" style="margin-top:7em;margin-bottom:15em;">
<div class="row">
<div class="col-lg-5 col-lg-offset-4">
<div class="panel panel-default">
<div class="panel-heading" id="panel">
<h4 class="h4 text-center">Create New Plan</h4></div>
<div class="panel-body">
<form method="post" action="includes/newplan_script.php">
<div class="form-group">
<label for="initial_budget">Initial Budget</label>
<input type="text" name="initial_budget" placeholder="Initial Budget (Ex. 4000)" class="form-control" required="true" pattern="^[1-9][0-9]*$"></div>
<div class="form-group">
<label for="people">How many people you want to add in group?</label>
<input type="text" name="people" placeholder="No. of people" class="form-control" required="true" pattern="^[1-9][0-9]*$"></div>
<div class="form-group">

<button type="submit"  class="btn btn-block text-center" id="button">Next</button></div>
</form></div></div></div></div></div>
<?php include 'includes/footer.php';?>
</body></html>
<?php } ?>