<?php require 'includes/common.php';
error_reporting(0);
if(!isset($_SESSION['Email'])){
header('location:index.php');}
else{
    $user_id=$_SESSION['id'];
    $sql14="select id from plan where user_id=$user_id";
    $res14=mysqli_query($con,$sql14) or die(mysqli_error($con));
    if(($row14=mysqli_num_rows($res14))==0)
    {?>
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

<div class="container" style="margin-top:6em;margin-bottom:22em;"><!--starting of container-->
   <div class="row" ><!--Starting of first row-->
     <div class="col-lg-12"><!--Starting of first column-->
      <h3 class="h3">You don't have any plans.</h3>
     </div><!--ending of first column-->
    </div><!--ending of first row-->
   <div class="row"><!--Starting of second row-->
      <div class="col-lg-3 col-lg-offset-3 col-md-3  col-sm-3  col-xs-3"><!--Starting of second column-->
         <div class="panel panel-default box-shadow" style="width:12em;height:10em;"><!--Starting of panel-->
            <div class="panel-body" style="margin-top:25%;"><!--Starting of panel-body-->
               <a href="Add New plan.php"><span class="glyphicon glyphicon-plus-sign" style="color:#5f9ea0;"></span>Create New Plan</a>
            </div><!--closing of panel-body-->
                
         </div><!--closing of panel-->
            
        </div><!--closing of Second column-->
    </div><!--closing of Second row-->
</div><!--closing of container-->       
        <?php include 'includes/footer.php';?>
</body>
</html>
<?php }
else{
    ?><!DOCTYPE html>
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
<div class="container" style="margin-top:6em;margin-bottom:18vw;margin-left:2em;margin-right:2em;"><!--starting of container-->
   <div class="row"><!--starting of row-->
       <!--PHP tag open -->
       <?php $user_id=$_SESSION['id'];//assign session id to user_id variable
          $sql15="select plan.*,plan_details.* from plan join plan_details on plan.id=plan_details.plan_id where plan.user_id=$user_id";
          $res15=mysqli_query($con,$sql15) or die(mysqli_error($con));
          while($row=mysqli_fetch_array($res15))
          {//opening of while
          $fdate=$row['from_date'];
          $tdate=$row['to_date'];?><!--PHP tag closed-->
        <div class="col-md-4">
            <div class="panel panel-default border">
                <div class="panel-heading" id="panel">
                    <h3 class="h3 text-center"><?php echo $row['title'];?><span class="glyphicon glyphicon-user" style="float:right"><?php echo $row['No_of_people'];?></span></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2 text-left">
                            <strong>Budget</strong>
                        </div>
                        <div class="col-md-offset-6 col-md-4 text-right">
                            &#8377;<?php echo " ".$row['Initial_Budget'];?>
                        </div>
                    </div>
                    <div class="row" style="padding-top:1em;padding-bottom:1em;">
                        <div class="col-md-2 text-left">
                            <strong>Date</strong>
                        </div>
                        <div class="col-md-offset-2 col-md-8 text-right">
                            <?php 
                                if((date("Y",strtotime($fdate)))==(date("Y",strtotime($tdate)))){
                                    $nfdate=date("jS M",strtotime($fdate));
                                    $ntdate=date("jS M Y",strtotime($tdate));
                                    echo $nfdate." - ".$ntdate;
    
                                }
                                else{
                                    $nfdate=date("jS M Y",strtotime($fdate));
                                    $ntdate=date("jS M Y",strtotime($tdate));
                                    echo $nfdate." - ".$ntdate;
                                }
                            ?>
                        </div>
                    </div>
                    <a href="view plan.php?id=<?php echo $row['plan_id'];?>"><button type="submit" class="btn btn-active btn-block text-center" id="button">View Plan</button></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    
</div>
<div class="container-fluid">
<div style="float:right;margin-left:95vw;">
    <a href="Add New plan.php"><span class="glyphicon glyphicon-plus-sign" style="font-size:3em;color:#5f9ea0;"></span></a>
</div>
</div>
        
<?php include 'includes/footer.php';?>
    </body>
</html>
<?php }
} ?>