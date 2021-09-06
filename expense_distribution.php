<?php require "includes/common.php";
error_reporting(0);
if(!isset($_SESSION['id'])){
header("location:index.php");
}
else{
?>
<!DOCTYPE html><!-- starting of html Document-->
<html><!-- Starting html tag-->
    <head><!-- Starting head tag-->
        <title>Ct&#8377;l Budget</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta charset="UTF-8">
        <meta name="description" content="We are here to manage your financial work and account Effectively.">
        <meta name="author" content="Sohail Ahmed">
        <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
       
    </head><!-- closing html tag-->
    <body><!-- Starting body tag-->
    <?php include 'includes/header.php';?>
    <!-- Starting container-->
        <div class="container" style="margin-top:6em;margin-left:2em;margin-right:2em;margin-bottom:5vw;">
        <!-- Starting row1-->
            <div class="row">
                <!-- Starting col-1-->
                <div class="col-md-6 col-md-offset-4">
                    <!-- Starting of panel-->
                    <div class="panel panel-default">
                        <!-- Starting panel-heading-->
                        <div class="panel-heading text-center" id="panel">
                            <?php 
                            $user_id=$_SESSION['id'];
                            $plan_id=$_GET['id2'];
                            $sql23="select plan.*,plan_details.* from plan join plan_details on plan.id=plan_details.plan_id where plan.id=$plan_id and plan.user_id=$user_id";
                            $res23=mysqli_query($con,$sql23) or die(mysqli_error($con));
                            while($expd=mysqli_fetch_array($res23)){
                            $p=$expd['No_of_people'];?>
                            <!-- Starting pane-heading first row-->
                            <div class="row">
                                <!-- Starting panel-heading first row first column-->
                                <div class="col-md-10">
                                <h3 class="h3"><?php echo $expd['title'];?></h3>
                                </div>
                                <!-- closing panel-heading first row first column-->
                                <!-- Starting panel-heading first row second column-->
                                <div class="col-md-2">
                                    <span class="glyphicon glyphicon-user" style="font-size:1.5em;padding-top:1em;float:right;"><?php echo $expd['No_of_people'];?></span>
                                </div>
                                <!-- closing panel-heading first row second column-->
                            </div>
                            <!-- closing panel-heading first row-->
                        </div>
                        <!-- Starting panel-body-->
                        <div class="panel-body">
                            <!-- Starting panel-body first row first column-->
                            <div class="row" id="panel_text">
                                <!-- starting of panel-body first row first column-->
                                <div class="col-md-4 text-left"><b>Initial Budget</b></div>
                                <!-- closing of panel-body first row first column-->
                                <!-- starting of panel-body first row second column-->
                                <div class="col-md-4 col-md-offset-4 text-right" style="float:right;"><b><?php echo "&#8377; ".$expd['Initial_Budget'];?></b></div>
                                <!-- closing of panel-body first row second column-->
                            </div>
                            <?php $sql24="select name from person where person.plan_id=$plan_id";
                                $res24=mysqli_query($con,$sql24) or die(mysqli_error($con));
                                $totalamount_spent=0;$Remaining_amount=$expd['Initial_Budget'];
                                
                                $c=0;
                                while($per=mysqli_fetch_array($res24))
                                {
                                $name=$per['name'];
                                $tmp[$c]=$name;
                            ?>
                            <!-- starting of panel-body second row-->
                            <div class="row" id="panel_text">
                                <!-- starting of panel-body second row first column-->
                                <div class="col-md-3 text-left"><b><?php echo $per['name'];?></b></div>
                                <!-- closing of panel-body second row first column-->
                                <?php $sql25="select * from expense where expense.plan_id=$plan_id and expense.person_name='$name'";
                                    $res25=mysqli_query($con,$sql25) or die(mysqli_error($con));
                                    $amount_spent=0;
                                    while($expp=mysqli_fetch_array($res25))
                                    {
                                
                                    $amount_spent=$amount_spent+$expp['amount_spent'];
                                    }
                                    $amp[$c]=$amount_spent;
                                    $totalamount_spent=$totalamount_spent+$amount_spent;
                                    $individual_share=($totalamount_spent/$p);
                                    $c++;
                                ?>
                                <!-- starting of panel-body second row second column-->
                                <div class="col-md-3 col-md-offset-6 text-right" style="float:right;"><b><?php echo "&#8377; ".$amount_spent;?></b></div>
                                <!-- closing of panel-body second row second column-->
                            </div>
                                <?php }?>
                            <!-- starting of panel-body third row-->
                            <div class="row" id="panel_text">
                                <!-- starting of panel-body third row first column-->   
                                <div class="col-md-4 text-left"><b><?php echo "Total amount spent";?></b></div>
                                <!-- starting of panel-body third row second column-->
                                <div class="col-md-3 col-md-offset-5 text-right" style="float:right;"><b><?php echo "&#8377; ".$totalamount_spent;?></b></div>
                            </div>
                            <!-- closing of panel-body third row-->
                            <!-- starting of panel-body fourth row-->
                            <div class="row" id="panel_text">
                                <div class="col-md-4 text-left"><b><?php echo "Remaining amount";?></b></div>
                                    <?php $Remaining_amount=$Remaining_amount-$totalamount_spent;
                                    if($Remaining_amount<0){?>
                                <div class="col-md-4 col-md-offset-4 text-right" style="float:right;"><b style="color:red;"><?php echo "Overspent by &#8377; ".abs($Remaining_amount);?></b></div>
                                    <?php }
                                    elseif($Remaining_amount>0){?>
                                <div class="col-md-4 col-md-offset-4 text-right" style="float:right;"><b style="color:green;"><?php echo "&#8377; ".$Remaining_amount;?></b></div>
                                    <?php }
                                    else{?>
                                <div class="col-md-4 col-md-offset-4 text-right" style="float:right;"><b><?php echo " No amount left &#8377; ".$Remaining_amount;?></b></div>
                                    <?php }?>
                            </div>
                            <div class="row" id="panel_text">
                                <div class="col-md-4 text-left"><b><?php echo "Individual share";?></b></div>
                                <div class="col-md-4 col-md-offset-4 text-right"><b><?php echo "&#8377; ".number_format((float)$individual_share,2,'.','');?></b></div>
                            </div>
                            <?php
                                for($k=0;$k<$p;$k++){?>
                            <div class="row" id="panel_text">
                                <div class="col-md-4 text-left"><b><?php echo $tmp[$k];?></b></div>
                                <div class="col-md-4 col-md-offset-4 text-right" style="float:right;"><?php
                                $individual_share_left=$individual_share-$amp[$k]; 
                                $i=number_format((float)$individual_share_left,2,'.','');
                                if($i<0){
                                 echo "<b style='color:red;'>"."Owes "."&#8377; ".abs($i)."</b>";
                                }
                                elseif($i>0){
                                echo "<b style='color:green;'>"."Gets back &#8377; ".abs($i)."</b>";
                                }
                                else{
                                echo "<b>All Settled up &#8377; ".abs($i)."</b>";
                                }?>
                                </div>
                            </div>    
                            <?php }?>
                            <div class="row" id="panel_text">
                                <center>
                                    <a href="view plan.php?id=<?php echo $plan_id;?>"><button type="submit" class="btn btn-active" id="button"><span class="glyphicon glyphicon-arrow-left"></span>Go back</button></a>
                                </center>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php';?>
    </body><!-- closing html tag-->
</html><!-- closing html tag-->
<?php }?>