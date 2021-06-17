<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{     

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
	$unpass = strip_tags($_POST['txt_npassword']);
		
	if($login->changepwd($uname,$umail,$upass,$unpass))
	{
		
	session_destroy();
header("location:login.php");
	}
	else
	{
		
		$error ="Wrong Deails";
	}	
}
}
else
{
	echo "<script>location.href='index.php'</script>";
}

?>
  
<link rel="stylesheet" href="style.css" type="text/css"  />
<style>
 body
      {
        background-image:url(sign.jpg);
        background-position:0px 0px;
    background-size: cover;
        background-repeat: repeat;
      }
	  </style>
</head>
<body>

<br/>
<br/>
	 
<?php include('navbar.php');
      include('scripts.php');
    ?>
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form" >
      
        <h2 class="form-signin-heading">Welcome to  BMC Pustakalaya</h2><hr />     
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
        <input type="text" class="form-control text-dark"  readonly="readonly" name="txt_uname_email" value="<?php
$id=$_SESSION['eid']; echo $id;?>" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="OLD Password" />
        </div>
          <div class="form-group">
        <input type="password" class="form-control" name="txt_npassword" placeholder="NEW Password" />
        </div>
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-primary">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; Change Password
            </button>
        </div>  
      	<br />
           
      </form>

    </div>
    
</div>

</body>
<br>
<?php
 include('footer.php');
  
?>

</html>