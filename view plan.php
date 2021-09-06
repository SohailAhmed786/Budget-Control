<?php require "includes/common.php";
error_reporting(0);

if(!isset($_SESSION['Email'])){
header('location:index.php');}
else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ct&#8377;l Budget</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta charset="UTF-8">
        <meta name="description" content="We are here to manage your financial work and account Effectively.">
        <meta name="author" content="Sohail Ahmed">
        <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
        a:hover{
            color:green;
        }</style>
       
    </head>
    <body>
        <?php include 'includes/header.php';?>
        <div class="container" style="margin-top:6em;margin-left:2em;margin-right:2em;">
            <div class="row">
            <?php $user_id=$_SESSION['id'];
            $plan_id=$_GET['id'];//assign session id to user_id variable
          $sql15="select plan.*,plan_details.* from plan join plan_details on plan.id=plan_details.plan_id where plan.user_id=$user_id and plan.id=$plan_id";
          $res15=mysqli_query($con,$sql15) or die(mysqli_error($con));
          while($row=mysqli_fetch_array($res15))
          {//opening of while
          $fdate=$row['from_date'];
          $tdate=$row['to_date'];?>
                <div class="col-md-6">
                    <div class="panel panel-default">
                    <div class=" panel-heading" id="panel">
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
                    </div><?php $sql16="select amount_spent from expense where expense.user_id=$user_id and expense.plan_id=$plan_id";
                    $res16=mysqli_query($con,$sql16) or die(mysqli_error($con));
                    $sum=0;
                    $budget=$row['Initial_Budget'];
                    $Remaining_amount=$budget;
                    while($rowexp=mysqli_fetch_array($res16))
                    { 
                        $amount_spent=$rowexp['amount_spent'];
                        $sum=$sum+$amount_spent;
                        $Remaining_amount=($budget-$sum);
                    }
                    if($Remaining_amount==0||$Remaining_amount==NULL){?>
                    <div class="row" style="padding-top:1em;padding-bottom:1em;">
                        <div class="col-md-6 text-left">
                            <strong>Remaining amount</strong>
                        </div>
                        <div class="col-md-offset-1 col-md-5 text-right">
                        <?php echo "&#8377;"." "."$Remaining_amount";?>
                            
                        </div>
                    </div>
                    <?php }
                    elseif($Remaining_amount>0){ ?>
                    <div class="row" style="padding-top:1em;padding-bottom:1em;">
                        <div class="col-md-6 text-left">
                            <strong>Remaining amount</strong>
                        </div>
                        <div class="col-md-offset-1 col-md-5 text-right text-success">
                        <b><?php echo "&#8377;"." ".$Remaining_amount;?></b>
                            
                        </div>
                    </div>
                    <?php }
                    else{ ?>
                    <div class="row" style="padding-top:1em;padding-bottom:1em;">
                        <div class="col-md-6 text-left">
                            <strong>Remaining amount</strong>
                        </div>
                        <div class="col-md-offset-1 col-md-5 text-right text-danger">
                        <?php echo "<b>&#8377;"." ".$Remaining_amount."</b>";?>
                            
                        </div>
                    </div>
                    <?php } ?>
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
                    </div>
                </div>
                            <?php } ?>
            </div>
            <div class="col-md-offset-2 col-md-3">
                
                <a href="expense_distribution.php?id2=<?php echo $plan_id;?>"><button type="submit" class="btn  btn-active btn-lg" id="button" style="margin-top:25%;">Expense Distribution</button></a>
            </div>
        </div>
        <div class="row">
        <?php $sql20="select * from expense where expense.user_id=$user_id and expense.plan_id=$plan_id";
        $res20=mysqli_query($con,$sql20) or die(mysqli_error($con));?>
        <div class="col-md-6">
        <?php if(($rows=mysqli_num_rows($res20))>0){?>
        <div class="row">
        <?php while($exp=mysqli_fetch_array($res20)){?>
        <div class="col-md-6">
        <div class="panel panel-default">
        <div class="panel-heading" id="panel">
        <h3 class="h3 text-center"><?php echo $exp['expense_title'];?></h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-4 text-left">
        <b>Amount</b>
        </div>
        <div class="col-md-6 col-md-offset-2 text-right">
        <?php echo "&#8377; ".$exp['amount_spent'];?>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4 text-left">
        <b>Paid by</b>
        </div>
        <div class="col-md-6 col-md-offset-2 text-right">
        <?php echo $exp['person_name'];?>
        </div>
        </div>
        <div class="row">
        <div class="col-md-4 text-left">
        <b>Paid on</b>
        </div>
        <div class="col-md-6 col-md-offset-2 text-right">
        <?php $expdate=$exp['expense_date'];
           $extdate=date("jS M Y",strtotime($expdate));
            echo $extdate;?>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12 text-center">
        <?php $bill=$exp['image_name'];
        if($bill==="NO_BILL"){?>
        
            <a style="text-decoration:none;"><?php echo "You Don't have bill.";?></a>
        <?php }
        else{?>
        <?php $path=$exp["image_name"];?>
            <a href="<?php echo $path;?>" style="text-decoration:none;">Show Bill</a>
            <?php }
        ?>
        
        </div>
        </div>
        </div>
        </div>
        </div>
        
        <?php }?>
        </div>
        
        <?php } ?>
        </div>
        
            <div class="col-md-offset-2 col-md-4">
                <div class="panel panel-default border">
                    <div class="panel-heading text-center " id="panel">
                        <h4 class="h4">Add New Expense</h4>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="includes/expense_add_script.php?id1=<?php echo $plan_id;?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" placeholder="Expense Name" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <?php $sql26="select from_date,to_date from plan_details where plan_details.plan_id=$plan_id";
                        $res26=mysqli_query($con,$sql26) or die(mysqli_error($con));
                        
                        while($da=mysqli_fetch_array($res26)){
                            $min=$da['from_date'];
                            $max=$da['to_date'];
                            
                        }?>
                            <label for="date">Date</label>
                            <input type="date" placeholder="dd/mm/yyyy" min="<?php echo $min;?>" max="<?php echo $max;?>" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount Spent</label>
                            <input type="text" placeholder="Amount Spent"  name="amount"  class="form-control" required="true" pattern="^[1-9][0-9]*$">
                        </div>
                        <div class="form-group">
                        <select name="person" placeholder="Choose" class="form-control" required>
                        <option readonly>Choose</option>
                        <?php $sql17="select name from person where person.plan_id=$plan_id and person.user_id=$user_id";
                        $res17=mysqli_query($con,$sql17) or die(mysqli_error($con));
                        while($person=mysqli_fetch_array($res17)){
                            ?>
                            <option  name="person[]" value="<?php echo $person['name'];?>"><?php echo $person['name'];?></option>
                        <?php } ?>
                        </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="bill">Upload Bill</label>
                            <input type="file"  name="uploadedimage" id="uploadedimage" class="form-control">
                        </div>
                        <div class="form-group">
                            
                            <button type="submit" class="btn btn-block btn-active text-center" style="border-style:solid;border-color:#5f9ea0;border-width:1px;color:#5f9ea0;background-color:white;">Add</button>
                        </div>
                        </form>
                    </div>
                </div>
        
            </div>
            
            </div>

        </div>
                        
        <?php include 'includes/footer.php';?>
    </body>
</html>
<?php } ?>