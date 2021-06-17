<?php
error_reporting(1);

?><?php
session_start();
$id=$_SESSION['eid'];
include("config.php");
$itemno=$_REQUEST['itemno'];
if(isset($_REQUEST['send']))
  {
       $spl=mysqli_query($connection,"select * from booksonrent where user_name='$id'");
	   $nck=0;
	   if($spl==false)
	{
		die(mysqli_error());
	}
	 while($mt = mysqli_fetch_array($spl)) 
        {
			   $mtc=$mt['Status'];
			   if($mtc=='Approved')
				   $nck++;
		}  
		if($nck==0)
		{
	  $sql=mysqli_query($connection,"select * from rbook where ID='$itemno'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $s=$mat['stock'];
		}  
	if($s!=0)
	{
		
  $uid=$_REQUEST['uid'];
  $bn=$_REQUEST['bn'];
  $dy=$_REQUEST['dy'];
  $pr=$_REQUEST['pr'];
  $pn=$_REQUEST['pn'];
  $mn=$_REQUEST['mn'];
  $add=$_REQUEST['ad'];
  $c=$_REQUEST['c'];
  $pa=$dy*$pr;
  $order_no='rent'.rand(100,500);
  if($pa>0)
  {
	  if($pa<15)
	  {
		  if($pa>5)
		  {
	  $s=$s-1;
	if(mysqli_query($connection,"UPDATE rbook                                                              
SET stock='$s'
WHERE ID='$itemno'"))
{ }
else
{
	die(mysql_error());
}	
 if(mysqli_query($connection,"insert into booksonrent (user_name,ID,MobileNumber,Address,city,daysissued,rent,PayAmnt,order_no) values('$uid','$itemno','$mn','$add','$c','$dy','$pr','$pa','$order_no')"))
    {
	     echo "<script>location.href='ordersent.php?ordersent.php?order=$order_no&i=3&pa=$pa'</script>";
    }
	else
	{
		die(mysqli_error());
	}
	}
	else
	{
		echo "sorry we cant provide books less than 5 days";
	}
	  }
	else
		echo "sorry we cant provide books more than 15 days";
  }
	else
	{
		header("location:days.html");
	}
	}
	else
	{
		header("location:outofstock.php");
	}
  }
  else
  {
	  echo"<h2 align='center'><strong>SORRY YOU CAN RENT ONLY ONE BOOK AT A TIME</strong></h2>";
  }
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
 else if($itemno=="")
{
header("location:index.php");
} 
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
 <?php 
   include('navbar.php');
    include('scripts.php');
 ?>
<br/>
<br/>
<br/>  
<br/>
<div>
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
<?php
	$sql=mysqli_query($connection,"select * from rbook where ID='$itemno'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $a=$mat['Author'];
			   $b=$mat['BOOKNAME'];
			   $p=$mat['Rent'];
			   $pc=$mat['PublicatonHouse'];
		}   
	?>
    <div class="main-content">


        <form method="post" name="f1" onSubmit="return vali()" class="form-basic">

            <div class="form-title-row">
                <h3>Rent Form</h3>
            </div>

            <div class="form-row">
                <label>
                    <span>User Id:</span>
                    <input name="uid" type="text" id="uid" onChange="return fnam()" readonly="readonly" value="<?php echo $id;?>">
                </label>
            </div>


			<div class="form-row">
                <label>
                    <span>BookName:</span>
					 <input name="bn" type="text" id="bn" onChange="return fnam()" readonly="readonly" value="<?php echo $b;?>">
					</label>
            </div>
			
			 <div class="form-row">
                <label>
                    <span>Author:</span>
                     <input name="au" type="text" id="au" onChange="return fnam()" readonly="readonly" value="<?php echo $a;?>">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Publisher:</span>
                      <input name="pn" type="text" id="pn" onChange="return fnam()" readonly="readonly" value="<?php echo $pc;?>">
                </label>
            </div>
			
             <div class="form-row">
                <label>
                    <span>Rent:</span>
                    <input name="pr" type="text" id="pr" onChange="return lnam()" readonly="readonly" value="<?php echo $p;?>Rs">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>No of Days:</span>
                    <input name="dy" type="text" id="dy" required="required" onChange="return phone()">
                </label>
            </div>
			
			
			<div class="form-row">
                <label>
                    <span>Mobile no:</span>
                    <input name="mn" required="required" type="text" id="mn" onChange="return phone()">
                </label>
            </div>
			
            <div class="form-row">
                <label>
                    <span>Address</span>
                     <textarea name="ad" required="required" id="ad" value="return add()"></textarea>
                </label>
            </div>

        <div class="form-row">
                <label>
                    <span>City</span>
                    <select name="c" id="c">
                        <option value="Mumbai">Mumbai</option>
                        <option value="Pune">Pune</option>
                        
                    </select>
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
  

<?php 
  include('footer.php');
?>

</body>

</html>
