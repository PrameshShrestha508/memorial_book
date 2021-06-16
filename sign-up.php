<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('index.php');
}

if(isset($_POST['btn-signup']))
{   $fname = strip_tags($_POST['txt_fname']);
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	$aname = strip_tags($_POST['txt_aname']);
	$cname = strip_tags($_POST['txt_cname']);
	$pname = strip_tags($_POST['txt_pname']);
	$mname = strip_tags($_POST['txt_mname']);
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($fname,$uname,$umail,$upass,$aname,$cname,$pname,$mname)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>

<link rel="stylesheet" href="style.css" type="text/css"  />
 
    <style>
	
     body
      {
        background-image: url("14.jpg");
        background-position:0px 0px;
    background-size: cover;
        background-repeat: repeat;
      }
	  label h3{
        color:black;
      }

    </style>
	
</head>
<body>
<?php
 include('navbar.php');
include('scripts.php');
?>

<div class="signin-form">

<div class="container-fluid">
<div class="row"> 

<div class="col-sm-6 m-5"> 	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Sign up.</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
			<div class="form-group">
            <input type="text" class="form-control" name="txt_fname" placeholder="Full Name" value="<?php if(isset($error)){echo $name;}?>" />
            </div>
            <input type="text" class="form-control" name="txt_uname" placeholder="Username" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="Password" />
            </div>
			<div class="form-group">
            <input type="text" class="form-control" name="txt_aname" placeholder="Address" value="<?php if(isset($error)){echo $aname;}?>" />
            </div>
			<div class="form-group">
            <input type="text" class="form-control" name="txt_cname" placeholder="City" value="<?php if(isset($error)){echo $cname;}?>" />
            </div>
			<div class="form-group">
            <input type="text" class="form-control" name="txt_pname" placeholder="Pin Code" value="<?php if(isset($error)){echo $pname;}?>" />
            </div>
			<div class="form-group">
            <input type="text" class="form-control" name="txt_mname" placeholder="Mobile Number" value="<?php if(isset($error)){echo $mname;}?>" />
            </div>
			  <div class="form-group">
            
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label><h3>have an account !  <a href="login.php"> <u>Sign In</u><h3></a></label>
        </form>
		</div>
       </div>
</div>
</div>
</div>
<?php
 include('footer.php');
?>
</div>
</body>
</html>