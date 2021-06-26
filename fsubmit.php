<?php
error_reporting(1);

require 'config.php';
require 'dbconfig.php';
require 'connect.php';
// session_start();
print_r($id=$_SESSION['eid']);
if(isset($_REQUEST['send']))
  {
    if(isset($_FILES['fileToUpload']))
    {
    
    $file_name=$_FILES['fileToUpload']['name']; 
    $file_type=$_FILES['fileToUpload']['type'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_size=$_FILES['fileToUpload']['size'];
    
    
    if(!empty($file_name))
    {
    
    $file_actual = strtolower(pathinfo($file_name,PATHINFO_EXTENSION)); 
    
    
    // valid image extensions
    $valid_extensions = array('jpeg','jpg','gif','png'); 
    
    
    if(in_array($file_actual, $valid_extensions))
    {
  move_uploaded_file($file_tmp,"images/feedback/".$file_name);

    
        echo "images uploaded:";
    }
    else
    {
        echo "Sorry only jpg,jpeg,png and gif allowed:";
    }
    
    }}
    

 

  $name=$_REQUEST['name'];
  $faculty=$_REQUEST['faculty'];
  $comments=$_REQUEST['comments']; 


	 if(mysqli_query($connection,"INSERT INTO feedback (user_name, faculty,comment,IMAGE)
		VALUES ('$name' ,'$faculty','$comments','$file_name')"))
		{
			header("location:feedback.php");
		}
		else
		{
			die(mysql_error());
		}
		
  } 

  


// if(isset($_REQUEST['log'])=='out')
// {
// session_destroy();
// header("location:index.php");
// }
// else if($id=="")
// {
// header("location:login.php");
// }

?>
   
</head>
<body>


<link rel="stylesheet" href="css/style3.css">
<div class="w3ls-main">
<div class="w3ls-form">
<form action="fsubmit.php" method="post" name="f1" onSubmit="return vali()"  enctype="multipart/form-data">
<ul class="fields1 mt-5">
	<h2 class="text-white">SUMMIT FEEDBACK</h2> 
	<li>	
		<label class="w3ls-opt"> Name: </label>
		<div class="w3ls-name">	
			<input type="text" name="name" id="name"  value="<?php echo $id;?>" required=" "/>
		</div>
</div>
	</li>
	<li>
		<label class="w3ls-opt">Faculty:</label>
		<div class="w3ls-name">
        <input type="text" name="faculty" id="faculty"  required=" "/>
		</div>
	</li>
  <li>
		<label class="w3ls-opt">comments:</label>
		<div class="w3ls-name">
        <input type="text" name="comments" id="comments"  required=" "/>
		</div>
	</li>
    <li>
		<label class="w3ls-opt">Image:</label>	
		<span class="w3ls-text w3ls-name"><br>
        <input type="file" name="fileToUpload"  required=" "/>
		</span>
	</li>	
</ul>
<br>
<div class="clear"></div>
	<div class="w3ls-btn">
    <button class="btn btn-primary" name="send" type="submit" id="send" value="Send">Submit FEEDBACK</button>
	</div>
</form>

    </div>

<?php 
include('navbar.php');
include('scripts.php')?>


</body>
</html>
