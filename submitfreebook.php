<?php
error_reporting(1);
session_start();
$id=$_SESSION['eid'];
include("config.php");
require 'connect.php';	
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
  $url=$_REQUEST['url']; 
 $file=$_FILES['photo']['tmp_name'];
   
   if($file)
   {
     $image=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	
    $image_name=addslashes($_FILES['photo']['name']); 
    $image_size=getimagesize($_FILES['photo']['tmp_name']);
	 if( mysqli_query($connection,"INSERT INTO freebook (BOOKNAME, AUTHOR,PUBLISHER,PRICE,SELLER,IMAGE,Branch,Sem,URL)
		VALUES ('$b' ,'$c','$d','$e','$id','$image','$f','$g','$url')"))
		{
			header("location:freebook.php");
		}
		else
		{
			die(mysql_error());
		}
		
  } 
}
  
  }
if(isset($_REQUEST['log'])=='out')
{
session_destroy();
header("location:index.php");
}
else if($id=="")
{
header("location:login.php");
}
	
?>

<?php 
include('navbar.php');
include('scripts.php');
?>

<br/>
<br/>

<div>
	
<br/><br/>
<br/>  
<br/>


</div>

    <div class="main-content">


        <form method="post" name="f1" onSubmit="return vali()" class="form-basic" enctype="multipart/form-data">

            <div class="form-title-row">
                <h3>Submit FreeBook</h3>
            </div>

            <div class="form-row">
                <label>
                    <span>Book Name:</span>
                    <input name="bn" type="text" id="bn" required="required" onChange="return phone()">
			        </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Book URL:</span>
                    <input name="url" type="text" id="url" required="required" onChange="return phone()">
			        </label>
            </div>

			
			
			<div class="form-row">
                <label>
                    <span>Author:</span>
          <input name="by" type="text" id="by" required="required"  onChange="return phone()">
				  </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Publisher:</span>
<input name="bb" type="text" id="bb" required="required" onChange="return phone()">
			   </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Price:</span>
          <input name="bs" type="text" id="bs" required="required" onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Branch:</span>
           <input name="ba" type="text" id="ba" required="required"  onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Sem:</span>
          <input name="bp" type="text" id="bp" required="required" onChange="return phone()">
				  </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Image:</span>
         <input name="photo" type="file" required="required"/>
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
  

<?php include('footer.php');?>

</body>

</html>
