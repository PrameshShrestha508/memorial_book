<?php
session_start();
$id=$_SESSION['eid'];
include("config.php");
require 'connect.php';
$itemno=$_REQUEST['itemno'];
 $sql=mysqli_query($connection,"select * from users where user_name='$id'");
	if($sql==false)
	{
		die(mysqli_error());
	}
       $m=0;
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $i=$mat['utype'];
			   if($i=='ADMIN')
				$m=1;
               					 
		}
	if($m==1)
	{		
if(isset($_REQUEST['send']))
  {
	   
		
  $a=$_REQUEST['bi'];
  $b=$_REQUEST['bn'];
  $c=$_REQUEST['by'];
  $d=$_REQUEST['bb'];
  $e=$_REQUEST['bs'];
  $f=$_REQUEST['ba'];
  $g=$_REQUEST['bp'];
  $h=$_REQUEST['bpr'];
  $i=$_REQUEST['bd'];
  $j=$_REQUEST['bs'];
  $k=$_REQUEST['bq'];
  
	if(mysqli_query($connection,"UPDATE orders                                                          
SET user_name='$a',Address='$b',MobileNumber='$c',PaymentMethod='$d',PaymentStatus='$e',OrderStatus='$f',PaymentToken='$g',order_no='$h',city='$i',courire_id='$j',BookId='$k'
WHERE order_no='$itemno'"))
{ 
header("location:cpanel.php?itemno=3");
}
else
{
	die(mysql_error());
} 
}
  }
	else
	{
		header("location:outofstock.html");
	}
  
if(isset($_REQUEST['log'])=='out')
{
session_destroy();
header("location:index.php");
}
else if($id=="")
{
header("location:index.php");
}

	
?>

<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="form-basic.css">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <style>
 body
      {
        background-image:url(12.jpg);
       
    background-size:cover;
       
      }
	  </style>
</head>

<body>
<?php
	$sql=mysqli_query($connection,"select * from users where user_name='$id'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
			
               $j=$mat['Name'];
			   echo $j;
		}   
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top">  
	<div class="container-fluid">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	   <div class="collapse navbar-collapse" id="myNavbar">
	 <ul class="nav navbar-nav">

 <li class="active"><a  href="index.php">NewBooks</a></li>
  <li><a href="oldbook.php">OldBooks</a></li>
  <li><a href="rentbook.php">Rent a book</a></li>
  <li><a href="feedback.php">Feedback</a></li>
  <li><a href="contact.php">ContactUs</a></li>
  </ul>
   <ul class="nav navbar-nav navbar-right">
 <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> MyProfile</a></li>
 <?php
	$sql=mysqli_query($connection,"select * from orders where order_no='$itemno'");
	if($sql==false)
	{
		die(mysql_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
			    $a=$mat['user_name'];
               $br=$mat['Address'];
			   $b=$mat['MobileNumber'];
			   $p=$mat['PaymentMethod'];
			   $pc=$mat['PaymentStatus'];
			   $d=$mat['OrderStatus'];
			    $aut=$mat['PaymentToken'];
				 $sem=$mat['BookId'];
				  $stck=$mat['city'];
				   $sold=$mat['courire_id'];
			
		}   
	?>
 
</ul>
   
</div>
</div>
</nav>	
<br/>
<br/>
<br/>  
<br/>
<div>
	
<br/><br/>
<br/>  
<br/>


</div>

    <div class="main-content">


        <form method="post" name="f1" onSubmit="return vali()" class="form-basic" action="#">

            <div class="form-title-row">
                <h3>UPDATE ORDERS</h3>
            </div>

            <div class="form-row">
                <label>
                    <span>User Name:</span>
                    <input name="bi" type="text" id="bi" required="required" onChange="return phone()" value="<?php echo $a;?>">
                </label>
            </div>


			
			
			<div class="form-row">
                <label>
                    <span>Mobile no:</span>
                    <input name="by" type="text" id="by" required="required" value="<?php echo $b;?>" onChange="return phone()">
                </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Address</span>
					<input name="bb" type="text" id="bb" required="required" value="<?php echo $br;?>" onChange="return phone()">
                    </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Payment Method:</span>
                    <input name="bb" type="text" id="bb" required="required" value="<?php echo $p;?>"onChange="return phone()">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Payment Status:</span>
					<input name="bs" type="text" id="bs" required="required" value="<?php echo $pc;?>" onChange="return phone()">
					</label>
            </div>
			
             <div class="form-row">
                <label>
                    <span>Order Status:</span>
                    <input name="ba" type="text" id="ba" required="required" value="<?php echo $d;?>" onChange="return phone()">
					</label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Order no:</span>
					<input name="ap" type="text" id="ap" required="required" value="<?php echo $itemno;?>" onChange="return phone()">
                    
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>PayToken:</span>
					<input name="bp" type="text" id="bp" required="required" value="<?php echo $aut;?>" onChange="return phone()">
                </label>
            </div>
			
           <div class="form-row">
                <label>
                    <span>City:</span>
					<input name="bd" type="text" id="bd" required="required" value="<?php echo $stck;?>" onChange="return phone()">
                </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Courier:</span>
					<input name="bs" type="text" id="bs" required="required" value="<?php echo $sold;?>" onChange="return phone()">
					</label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>BookId:</span>
			<input name="bq" type="text" id="bq" required="required" value="<?php echo $sem;?>" onChange="return phone()">
			</label>
            </div>
			
            <div class="form-row">
                <button name="send" type="submit" id="send" value="Send">Submit Form</button>
            </div>

        </form>

    </div>
<br/>
<br/>

<br/>
  
<div id="Bottom" align='center'>
<h5 class="down" align='center'><b>DONT USE THIS PROJECT FOR COMMERCIAL PURPOSE</b></h5>
<h5 class="down" align='center'><b>Copyright &copy; ABHISHEK DUDHAL</b></h5>

</div>

</body>

</html>
