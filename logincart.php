<?php
$i=$_REQUEST['itemno'];
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{     
echo "<script>location.href='addtocart.php?itemno=$i'</script>";
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		 $_SESSION['eid']=$uname;
		echo "<script>location.href='addtocart.php?itemno=$i'</script>";
	}
	else
	{
		
		$error = "Wrong Details !";
	}	
}
?>
<link rel="stylesheet" href="style.css" type="text/css"  />

 <style>body
      {
        background-image:url(14.jpg);
        background-position:0px 0px;
    background-size: cover;
        background-repeat: norepeat;
      }
      label h3{
        color:black;
      }
      button{
        color:white;
        background-color:blue;
      }
	  </style>
</head>
<body>
<?php
 include('navbar.php');
include('scripts.php');
?>
<br><br>
<div class="signin-form">

	<div class="container mt-5">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Welcome to BMC Pustakalaya</h2><hr />
        
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
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
      	<br />
        <label><h4>Don't have an account yet ! <a href="sign-up.php"> <u>Sign Up</u></h4></a></label>
      </form>

    </div>
    
</div>

<br/>
<br/>

  

<?php
 include('footer.php');

?>


</body>
</html>