<?php require 'includes/common.php';
error_reporting(0);
if(!isset($_SESSION['Email'])){
    header('location:index.php');
}
else{ 
    if(!empty($_SESSION['plan_id'])){?>
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
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="includes/details_script.php">
                <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" placeholder="Enter Title(Ex. trip to Goa)" name="title" class="form-control" required>
</div></div></div>
<div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="from">From</label>
                        <input type="date"  min="2019-04-01" max="2020-04-01" name="from" class="form-control" required>
</div></div>
<div class=" col-lg-6">
                    <div class="form-group">
                        <label for="to">To</label>
                        <input type="date" min="2019-04-01" max="2020-04-01" name="to" class="form-control" required>
</div></div>
</div>
<div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="budget">Initial Budget</label>
                        <input type="text" value="<?php echo $_GET['budget'];?>" name="budget" class="form-control" readonly>
</div></div>
<div class=" col-lg-4">
                    <div class="form-group">
                        <label for="people">No. of people</label>
                        <input type="text"  value="<?php echo $_GET['people'];?>" name="people" class="form-control" readonly>
</div></div>
</div>
<?php $n=$_GET['people'];
$i=1;
while($i<=$n)
{?>
<div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="person <?php echo $i;?>">Person <?php echo $i;?></label>
                        <input type="text"  name="person[]" class="form-control" pattern="[a-zA-Z ]{1,255}" title="Enter valid Name" required>
</div></div></div>
<?php $i++; 
} ?>

<div class="form-group">

<button type="submit"  class="btn btn-block text-center" style="border-style:solid;border-color:#5f9ea0;border-width:1px;color:#5f9ea0;background-color:white;">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php';?>
</body></html>
<?php } 
else{
    header('location:Add New plan.php');
}
}?>