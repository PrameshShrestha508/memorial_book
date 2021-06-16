<?php
session_start();
include('config.php');
include('connect.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location:config.php");
}

if(!$_SESSION['eid'])
{
    header('Location:login.php');
}
?>