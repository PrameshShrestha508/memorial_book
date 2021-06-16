<?php
session_start();
$id=$_SESSION['eid'];
include("config.php");
$itemno=$_REQUEST['itemno'];
 if(mysqli_query($connection,"insert into mycart (user_name,BookId) values('$id','$itemno')"))
    {
	   header("location:index.php");
    }
else
{
header("location:index.php");
}
	
?>

