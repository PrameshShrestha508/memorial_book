<?php
session_start();
$id=$_SESSION['eid'];
include("config.php");
require 'connect.php';

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
	   if(is_uploaded_file($_FILES['photo']['tmp_name']) && getimagesize($_FILES['photo']['tmp_name']) != false)
	   
	   {
  
  $b=$_REQUEST['bn'];
  $c=$_REQUEST['by'];
  $d=$_REQUEST['bb'];
  $e=$_REQUEST['bs'];
  $f=$_REQUEST['ba'];
  $g=$_REQUEST['bp'];
  $h=$_REQUEST['bpr'];
 $i=$_REQUEST['bkp'];
  $j=$_REQUEST['bs'];

  

	 
 $file=$_FILES['photo']['tmp_name'];
   
   if($file)
   {
     $image=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	
    $image_name=addslashes($_FILES['photo']['name']); 
    $image_size=getimagesize($_FILES['photo']['tmp_name']);
	 if( mysqli_query($connection,"INSERT INTO nbook (BOOKNAME, Year,Branch,Sem,Author,PublicatonHouse,Price,Discount,BookImage,Stock)
		VALUES ('$b','$c','$d','$e','$f','$g','$h','$i','$image','$j')"))
		{
			header("location:cpanel.php?itemno=1");
		}
		else
		{
			die(mysql_error());
		}
		
  } 
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

 <li ><a  href="index.php">NewBooks</a></li>
  <li><a href="oldbook.php">OldBooks</a></li>
  <li><a href="rentbook.php">Rent a book</a></li>
  <li><a href="feedback.php">Feedback</a></li>
  <li><a href="contact.php">ContactUs</a></li>
  </ul>
   <ul class="nav navbar-nav navbar-right">
 <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> MyProfile</a></li>
 	
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


        <form method="post" enctype="multipart/form-data" name="f1" onSubmit="return vali()" class="form-basic" action="#">

            <div class="form-title-row">
                <h3>ADD NEW BOOK</h3>
            </div>

            <div class="form-row">
                <label>
                    <span>Book Name:</span>
            <input name="bn" type="text" id="bn" required="required" onChange="return phone()">
            </div>

			<div class="form-row">
                <label>
                    <span>Author:</span>
         <input name="ba" type="text" id="ba" required="required"  onChange="return phone()">
				  </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Publisher:</span>
<input name="bp" type="text" id="bp" required="required" onChange="return phone()">
			   </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Price:</span>
          <input name="bpr" type="text" id="bpr" required="required"  onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Year:</span>
           <input name="by" type="text" id="by" required="required"  onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Branch:</span>
           <input name="bb" type="text" id="bb" required="required" onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Sem:</span>
          <input name="bs" type="text" id="bs" required="required" onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Discount:</span>
<input name="bkp" type="text" id="bkp" required="required"  onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>stock:</span>
<input name="bs" type="text" id="bs" required="required" onChange="return phone()">
				  </label>
            </div>
			
			
			
			
			<div class="form-row">
                <label>
                    <span>Image:</span>
          <span><input name="photo" type="file" required="required"/></span>
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
<h5 class="down" align='center'><b>Copyright &copy; ABHISHEK DUDHAL</b></h5>

</div>

</body>

</html>
