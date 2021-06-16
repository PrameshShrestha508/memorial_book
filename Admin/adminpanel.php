<?php
session_start();
$id=$_SESSION['eid'];
include("../config.php");
$sql=mysqli_query($connection,"select * from users where user_name='$id'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $s=$mat['utype'];
		}
    if($s=='ADMIN')
	{
		
	}
else
{
	header("location:index.php");
}

if($id=="")
{
header("location:index.php");
}	
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cz">
<?php
error_reporting(1);

?>

    <style>
	
     body
      {
        background-image: url("../back.jpg");
        background-position:0px 0px;
    background-size: cover;
        background-repeat: repeat;
      }
    </style>
	<style>
.center {
    margin: auto;
    width: 60%;
    padding: 100px;
}
 table{
        border-spacing:15px;
    }
    td{
        padding:30px;
    }
     body
      {
        background-image: url(../back.jpg);
		background-position:0px 0px;
background-attachment:fixed;
    background-size: cover;
        background-repeat: repeat;
      }
	   .a{
    opacity: 0.7;
    filter: alpha(opacity=50); 
	}

</style>
    </head>
    <body>
	
		 <?php include('navbar.php');
     include('scripts.php');?>

<br/>
<br/>

<div class="container-fluid">
<div class="row">

   
  <br/>
	 <div class="col-sm-12 mt-5">
	 <br/>
	 <h1 align='center'><font color="Black"style="century">Welcome ADMIN</font></h1>
	 <hr>
    <?php


   ?>
   <div class="cleaner"></div>
</div>
</div>
</div>
	 </div>
<br/>
<br/>
<br/>
 <br><br><br><br>

<?php include('footer.php');?>


    </body>
    </html>
