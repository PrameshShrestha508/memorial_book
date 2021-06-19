<?php
error_reporting(1);

?><?php
session_start();
$id=$_SESSION['eid'];
include("config.php");
$itemno=$_REQUEST['itemno'];
if(isset($_REQUEST['send']))
  {
	   
	   $sql=mysqli_query($connection,"select * from nbook where BookId='$itemno'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $s=$mat['Stock'];
			   $sq=$mat['soldq'];
		}  
	if($s!=0)
	{
		
  $uid=$_REQUEST['uid'];
  $bn=$_REQUEST['bn'];
  $pr=$_REQUEST['pr'];
  $au=$_REQUEST['au'];
  $ap=$_REQUEST['ap'];
  $ds=$_REQUEST['ds'];
  $pn=$_REQUEST['pn'];
  $mob_no=$_REQUEST['mn'];
  $add=$_REQUEST['ad'];
  $bank=$_REQUEST['ban'];
  $city=$_REQUEST['c'];
  $order_no='ord'.rand(100,500);
  	  $s=$s-1;
	  $sq=$sq+1;
	if(mysqli_query($connection,"UPDATE nbook                                                              
SET stock='$s',soldq='$sq'
WHERE BookId='$itemno'"))
{ }
else
{
	die(mysqli_error());
}
$sql=mysqli_query($connection,"select courire_id from courier where city='$city'");
	   if($sql==false)
	{
		die(mysqli_error());
	}
        $p=$itemno;
	  while($mat = mysqli_fetch_array($sql)) 
        {       $k=1;
               $ci=$mat['courire_id'];
		}  
 if(mysqli_query($connection,"insert into orders (user_name,BookId,MobileNumber,Address,city,order_no,PaymentMethod,courire_id) values('$uid','$p','$mob_no','$add','$city','$order_no','$bank','$ci')"))
    {
	 if($bank=='PAYTM')
		{
	 echo "<script>location.href='ordersent.php?order=$order_no&i=2&pa=$ap'</script>";
	  }
	  else
	  {
		echo "<script>location.href='ordersent.php?order=$order_no&i=1&pa=$ap'</script>";
	  }
	  }
	 else
	 {
		 die(mysql_error());
	 }		 
    }
	else
	{
		header("location:outofstock.php");
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
if($itemno=="")
{
header("location:index.php");
}
	
?>

   <?php include('navbar.php');
      include('scripts.php');
    ?>

<body>
<?php
	$sql=mysqli_query($connection,"select * from users where user_name='$id'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	//   while($mat = mysqli_fetch_array($sql)) 
    //     {
			
    //            $j=$mat['Name'];
	// 		   echo $j;
	// 	}   
	?>
		  
<br/>
<br/>
<br/>  
<br/>
<div>
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
<br/><br/>
<br/>  
<br/>


</div>
<?php
	$sql=mysqli_query($connection,"select * from nbook where BookId='$itemno'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $a=$mat['Author'];
			   $b=$mat['BOOKNAME'];
			   $p=$mat['Price'];
			   $pc=$mat['PublicatonHouse'];
			   $d=$mat['Discount'];
			   $k=$p-$p*$d/100;
		}   
	?>
   
<div class="w3ls-main">
<div class="w3ls-form">
<form action="#" method="post" name="f1" onSubmit="return vali()">
<ul class="fields1">
	<h2>get order to pay instantly</h2> 
	<li>	
		<label class="w3ls-opt">User Id</label>
		<div class="w3ls-name">	
			<input type="text" name="uid" id="uid" onchange="return fnam()" readonly="readonly" value="<?php echo $id;?>" required=" "/>
		</div>
</div>
	</li>
	<li>
		<label class="w3ls-opt">BookName</label>
		<div class="w3ls-name">
		<input type="text" name="bn" id="bn" onchange="return fnam()" readonly="readonly" value="<?php echo $b;?>" required=" "/>
		</div>
	</li>
	<li>
		<label class="w3ls-opt">Author</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="au" id="au" onchange="return fnam()" readonly="readonly" value="<?php echo $a;?>" required=" "/>
		</span>
	</li>
    <li>
		<label class="w3ls-opt">Publisher</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="pn" id="pn" onchange="return fnam()" readonly="readonly" value="<?php echo $pc;?>" required=" "/>
		</span>
	</li>	
	<li>
		<label class="w3ls-opt">Price</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="pr" id="pr" onchange="return lnam()" readonly="readonly" value="<?php echo $p;?>" required=" "/>
		</span>
	</li>
    <li>
		<label class="w3ls-opt">Discount</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="ds" id="ds" onchange="return lnam()" readonly="readonly" value="<?php echo $d;?>" required=" "/>
		</span>
	</li>	
    <li>
		<label class="w3ls-opt">Amount to Pay</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="ap" id="ap" onchange="return lnam()" readonly="readonly" value="<?php echo $k;?>" required=" "/>
		</span>
	</li>	
    <li>
		<label class="w3ls-opt">Mobile No:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="mn" id="mn" onchange="return phone()" required=" "/>
		</span>
	</li>
    <li>
		<label class="w3ls-opt">Address:</label>	
		<span class="w3ls-text w3ls-name">
        <input type="text" name="ad" id="ad" onchange="return add()" required=" "/>
		</span>
	</li>	
</ul>
<ul class="fields2">
	<li>	
		<div class="mail">
			<label class="w3ls-opt">Payment Method</label>
			<span class="w3ls-text w3ls-name">
				<select id="ban" name="ban">
					<option value="COD">Cash On Delivery</option>
					<option value="saab">Paytym wallet</option>
				</select>
			</span>
		</div>
	</li>
	<li>
	<div class="mail">
			<label class="w3ls-opt">City</label>
			<span class="w3ls-text w3ls-name">
				<select id="c" name="c">
					<option value="butwal">Butwal</option>
					<option value="ktm">Kathmandu</option>
					<option value="chtwn">Chitwan</option>
				</select>
			</span>
		</div>
	</li>
	
</ul>
<div class="clear"></div>
	<div class="w3ls-btn">
    <button class="btn btn-primary" name="send" type="submit" id="send" value="Send">Submit Form</button>
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
