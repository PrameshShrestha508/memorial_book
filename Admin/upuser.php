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
   $h=$_REQUEST['ap'];
    $i=$_REQUEST['ab'];


  
	if(mysqli_query($connection,"UPDATE users                                                            
SET Name='$a',user_name='$b',user_email='$c',Address='$d',City='$e',Pin='$f',Mobile='$g',utype='$h',
servicea='$i' WHERE user_name='$itemno'"))
{ 
header("location:cpanel.php?itemno=6");
}
else
{
	die(mysqli_error());
} 
}
  }
	else
	{
		header("location:index.php");
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
if($itemno=="")
{
	header("location:index.php");
}
	
?>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" href="../form-basic.css">
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
 <li><a href="../login.php"><span class="glyphicon glyphicon-user"></span> MyProfile</a></li>
 	<?php
	$sql=mysqli_query($connection,"select * from users where user_name='$itemno'");
	if($sql==false)
	{
		die(mysql_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
			    $a=$mat['Name'];
               $br=$mat['user_name'];
			   $b=$mat['user_email'];
			   $p=$mat['Address'];
			   $pc=$mat['City'];
		
			    $aut=$mat['Pin'];		  
			$pamnt=$mat['Mobile'];
             $rent=$mat['utype'];	
   			 $pstat=$mat['servicea'];	
		}   
	?>
</ul>
   
</div>
</div>
</nav>	
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
                <h3>UPDATE USER</h3>
            </div>

            <div class="form-row">
                <label>
                    <span>Name:</span>
                  <input name="bi" type="text" id="bi" required="required" onChange="return phone()" value="<?php echo $itemno;?>">
				  </label>
            </div>


			
			
			<div class="form-row">
                <label>
                    <span>User Name:</span>
                  <input name="bn" type="text" id="bn" required="required" value="<?php echo $itemno;?>"onChange="return phone()"> </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Email-Id:</span>
                <input name="by" type="text" id="by" required="required" value="<?php echo $b;?>" onChange="return phone()">  </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Address:</span>
                 <input name="bb" type="text" id="bb" required="required" value="<?php echo $p;?>"onChange="return phone()">
				 </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>City:</span>
					<input name="bs" type="text" id="bs" required="required" value="<?php echo $pc;?>" onChange="return phone()"></label>
            </div>
			
             <div class="form-row">
                <label>
                    <span>Pin:</span>
                  <input name="ba" type="text" id="ba" required="required" value="<?php echo $aut;?>" onChange="return phone()">
					</label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Mobile:</span>
					<input name="bp" type="text" id="bp" required="required" value="<?php echo $pamnt;?>" onChange="return phone()"></label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>User Type:</span>
					<input name="ap" type="text" id="ap" required="required" value="<?php echo $rent;?>" onChange="return phone()"></label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Service Area:</span>
					<input name="ab" type="text" id="ab" required="required" value="<?php echo $pstat;?>" onChange="return phone()"></label>
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
