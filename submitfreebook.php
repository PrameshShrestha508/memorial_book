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


<link rel="stylesheet" href="css/style3.css">
<div><br/><center><h2><font face="Lucida Handwriting" size="+2" color="white">Welcome 
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
</font></h2>

</div>	


<div class="w3ls-main">
<div class="w3ls-form">
<form action="#" method="post" name="f1" onSubmit="return vali()"  enctype="multipart/form-data">
<ul class="fields1">
	<h2>SUMMIT FREE BOOKS</h2> 
	<li>	
		<label class="w3ls-opt">Book Name: </label>
		<div class="w3ls-name">	
			<input type="text" name="bn" id="bn" onchange="return phone()" required=" "/>
		</div>
</div>
	</li>
	<li>
		<label class="w3ls-opt">Author:</label>
		<div class="w3ls-name">
        <input type="text" name="by" id="by" onchange="return phone()" required=" "/>
		</div>
	</li>
	<li>
		<label class="w3ls-opt">Publisher:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="bb" id="bb" onchange="return phone()" required=" "/>
	</li>
    <li>
		<label class="w3ls-opt">Price:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="bs" id="bs" onchange="return phone()" required=" "/>
		</span>
	</li>	
	<li>
		<label class="w3ls-opt">Branch:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="ba" id="ba" onchange="return phone()"  required=" "/>
		</span>
	</li>
    <li>
		<label class="w3ls-opt">Semester:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="bp" id="bp" onchange="return phone()" required=" "/>
		</span>
	</li>
    <li>
		<label class="w3ls-opt">Semester:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="bp" id="bp" onchange="return phone()" required=" "/>
		</span>
	</li>
    <li>
		<label class="w3ls-opt">URL:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="url" id="url" onchange="return phone()" required=" "/>
		</span>
	</li>			
    <li>
		<label class="w3ls-opt">Image:</label>	
		<span class="w3ls-text w3ls-name"><br>
        <input type="file" name="photo"  required=" "/>
		</span>
	</li>	
</ul>
<br>
<div class="clear"></div>
	<div class="w3ls-btn">
    <button class="btn btn-primary" name="send" type="submit" id="send" value="Send">Submit Form</button>
	</div>
</form>

    </div>

<br/>
<br/>

<br/>
  

<?php include('footer.php');?>

</body>

</html>
