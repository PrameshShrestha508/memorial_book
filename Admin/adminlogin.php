<?php
session_start();
require_once("../class.user.php");
$login = new USER();
require '../config.php';
if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = ($_POST['txt_password']);
		$sql=mysqli_query($connection,"select * from users where user_name='$uname'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $s=$mat['utype'];
		} 		
	if($login->doLogin($uname,$umail,$upass))
	{
		if($s=='ADMIN')
		{
		 $_SESSION['eid']=$uname;
		echo "<script>location.href='adminpanel.php'</script>";
	    }
	else
	{
		session_destroy();
        header("location:index.php");
	}
	}
	else
	{
		
		$error = "Wrong Details !";
	}	
}


?>
<link rel="stylesheet" href="../style.css" type="text/css"  />

<style>
 body
      {
        background-image: url(sign.jpg);
    background-size: cover;
    background-repeat: no-repeat
      }
	  </style>
</head>
<body>
<?php 
include('navbar.php');
     include('scripts.php');
?>
<div class="signin-form">
<br>
	<div class="container mt-5">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading text-center">Welcome to BMC Pustakalaya</h2>
		<h2 class="form-signin-heading text-center">ADMIN LOGIN</h2><hr />     		
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-primary">
                	SIGN IN
            </button>
        </div>  
 
      </form>

    </div>
    
</div>
 <br>
<?php 
include('footer.php');

?>
</div>
</body>
</html>