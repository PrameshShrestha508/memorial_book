<?php
session_start();
$id=$_SESSION['eid'];
include("config.php");
require 'connect.php';
$itemno=$_REQUEST['itemno'];
 $sql=mysqli_query($connection,"select * from users where user_name='$id'");
	if($sql==false)
	{
		die(mysqli_error());
	}
       $m=0;
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $i=$mat['utype'];
			   if($i=='ADMIN')
				$m=1;
               					 
		}
	if($m==1)
	{		
if(isset($_REQUEST['send']))
  {
	   
		
  $a=$_REQUEST['bi'];
  $b=$_REQUEST['bn'];
  $c=$_REQUEST['by'];
  $d=$_REQUEST['bb'];
  $e=$_REQUEST['bs'];
  $f=$_REQUEST['ba'];
  $g=$_REQUEST['bp'];
  $h=$_REQUEST['bpr'];
  $i=$_REQUEST['bd'];
  $j=$_REQUEST['bs'];
  $k=$_REQUEST['bq'];
  
	if(mysqli_query($connection,"UPDATE nbook                                                              
SET BookId='$a',BOOKNAME='$b',Year='$c',Branch='$d',Sem='$e',Author='$f',PublicatonHouse='$g',Price='$h',Discount='$i',Stock='$j',soldq='$k'
WHERE BookId='$itemno'"))
{ 
header("location:cpanel.php?itemno=1");
}
else
{
	die(mysql_error());
} 
}
  }
	else
	{
		header("location:outofstock.html");
	}
  
if(isset($_REQUEST['log'])=='out')
{
session_destroy();
header("location:index.php");
}
else if($id=="")
{
header("location:index.php");
}
if($itemno=="")
{
	header("location:index.php");
}

	
?>
<?php 
include('navbar.php');
include('scripts.php');
?>
 <style>
 body
      {
        background-image:url(12.jpg);
       
    background-size:cover;
       
      }
	  </style>
</head>

<body>

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
	<nav class="navbar navbar-inverse navbar-fixed-top">  
	<div class="container-fluid">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	   <div class="collapse navbar-collapse" id="myNavbar">
	 <ul class="nav navbar-nav">

 <li class="active"><a  href="index.php">NewBooks</a></li>
  <li><a href="oldbook.php">OldBooks</a></li>
  <li><a href="rentbook.php">Rent a book</a></li>
  <li><a href="feedback.php">Feedback</a></li>
  <li><a href="contact.php">ContactUs</a></li>
  </ul>
   <ul class="nav navbar-nav navbar-right">
 <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> MyProfile</a></li>
 <?php
	$sql=mysqli_query($connection,"select * from nbook where BookId='$itemno'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
			    $a=$mat['Year'];
               $br=$mat['Branch'];
			   $b=$mat['BOOKNAME'];
			   $p=$mat['Price'];
			   $pc=$mat['PublicatonHouse'];
			   $d=$mat['Discount'];
			    $aut=$mat['Author'];
				 $sem=$mat['Sem'];
				  $stck=$mat['Stock'];
				   $sold=$mat['soldq'];
			
		}   
	?>
 
</ul>
   
</div>
</div>
</nav>	
<br/>
<br/>
<br/>  
<br/>
<div>
	
<br/><br/>
<br/>  
<br/>


</div>

    <div class="main-content">


        <form method="post" name="f1" onSubmit="return vali()" class="form-basic" action="#">

            <div class="form-title-row">
                <h3>UPDATE NEW BOOKS</h3>
            </div>

            <div class="form-row">
                <label>
                    <span>BookId:</span>
                    <input name="bi" type="text" id="bi" required="required" onChange="return phone()" value="<?php echo $itemno;?>"
                </label>
            </div>


			
			
			<div class="form-row">
                <label>
                    <span>Book Name:</span>
                    <input name="bn" type="text" id="bn" required="required" value="<?php echo $b;?>"onChange="return phone()">
                </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Year</span>
                    <input name="by" type="text" id="by" required="required" value="<?php echo $a;?>" onChange="return phone()">
                </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Branch:</span>
                   <input name="bb" type="text" id="bb" required="required" value="<?php echo $br;?>"onChange="return phone()">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Sem:</span>
					<input name="bs" type="text" id="bs" required="required" value="<?php echo $sem;?>" onChange="return phone()">
					</label>
            </div>
			
             <div class="form-row">
                <label>
                    <span>Author:</span>
                   <input name="ba" type="text" id="ba" required="required" value="<?php echo $aut;?>" onChange="return phone()">
					</label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Publisher:</span>
					<input name="bp" type="text" id="bp" required="required" value="<?php echo $pc;?>" onChange="return phone()">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Price:</span>
				<input name="bpr" type="text" id="bpr" required="required" value="<?php echo $p;?>" onChange="return phone()">
                </label>
            </div>
			
           <div class="form-row">
                <label>
                    <span>Discount:</span>
					<input name="bd" type="text" id="bd" required="required" value="<?php echo $d;?>" onChange="return phone()">
                </label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Stock:</span>
					<input name="bs" type="text" id="bs" required="required" value="<?php echo $stck;?>" onChange="return phone()">
					</label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>SOldq:</span>
			<input name="bq" type="text" id="bq" required="required" value="<?php echo $sold;?>" onChange="return phone()">
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
  

<div id="Bottom" align='center'>
<h5 class="down" align='center'><b>DONT USE THIS PROJECT FOR COMMERCIAL PURPOSE</b></h5>
<h5 class="down" align='center'><b>Copyright &copy; ABHISHEK DUDHAL</b></h5>

</div>

</body>

</html>
