<?php
require 'config.php';
session_start();
$id=$_SESSION['eid'];
if(isset($_REQUEST['send']))
  {
	  
  $b=$_REQUEST['bn'];
  
$c=$_REQUEST['au'];
$d=$_REQUEST['pn'];

	 if( mysql_query("INSERT INTO requirment (user_name,BookName,Author,Publisher)
		VALUES ('$id' ,'$b','$c','$d')"))
		{
			 $sql=mysql_query("select * from users where user_name='$id'");
	if($sql==false)
	{
		die(mysql_error());
	}
   
	  while($mat = mysql_fetch_array($sql)) 
        {
               $umail=$mat['user_mail'];
			   
		}  
		$msg="THANK YOU WE WILL REPLY YOU SOON WHEN BOOKS WILL BE ADDED : ";
 mail($umail,"WE GOT YOUR REQUIRMENTS",$msg);
			echo"<h2 align='center'><strong>We will contact you</strong></h2>";
		}
		else
		{
			die(mysql_error());
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

 <style>
 body
      {
        background-image:url(back.jpg);
       background-position:0px 0px;
background-attachment:fixed;
    background-size: cover;
    
       
      }
	  </style>
</head>
<body>
<?php
 include('navbar.php');
include('scripts.php');
?>	
<br/>
<br/>
<br/>  
<br/>
</body>
<div class="main-content">


        <form method="post" name="f1" action='requirements.php' onSubmit="return vali()" class="form-basic">

            <div class="form-title-row">
                <h3>Requirements</h3>
            </div>

            <div class="form-row">
                <label>
                    <span>User Name:</span>
                    <input name="uid" type="text" id="uid" onChange="return fnam()" readonly="readonly" value="<?php echo $id;?>">
                </label>
            </div>


			<div class="form-row">
                <label>
                    <span>BookName:</span>
					 <input name="bn" type="text" id="bn" onChange="return fnam()"  value="">
					</label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Author:</span>
                     <input name="au" type="text" id="au" onChange="return fnam()"  value="">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Publisher:</span>
                      <input name="pn" type="text" id="pn" onChange="return fnam()"  value="">
                </label>
            </div>
			

        
            <div class="form-row">
                <button name="send" type="submit" id="send" value="Send">Submit</button>
            </div>

        </form>

    </div>
<br/>
<br/>

<br/>
  
<?php include('footer.php'); ?>

</html>