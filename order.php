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
    <div class="main-content">


        <form method="post" name="f1" onSubmit="return vali()" class="form-basic" action="#">

            <div class="form-title-row">
                <h3>Order Form</h3>
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
                    <span>Price:</span>
                    <input name="pr" type="text" id="pr" onChange="return lnam()" readonly="readonly" value="<?php echo $p;?>Rs">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Discount:</span>
                    <input name="ds" type="text" id="ds" onChange="return lnam()" readonly="readonly" value="<?php echo $d;?>%">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Amount to Pay:</span>
                   <input name="ap" type="text" id="ap" onChange="return lnam()" readonly="readonly" value="<?php echo $k;?>Rs">
                </label>
            </div>
			
			<div class="form-row">
                <label>
                    <span>Mobile no:</span>
                    <input name="mn" type="text" id="mn" required="required" onChange="return phone()">
                </label>
            </div>
			
            <div class="form-row">
                <label>
                    <span>Address</span>
                    <textarea name="ad" id="ad"  required="required" value="return add()"></textarea>
                </label>
            </div>

            <div class="form-row">
               <label>
                <span>Payment Method</span>
                <select id="ban" name="ban">
                    <option value="COD">Cash on delivery</option>
                    <option value="saab">Pytm wallet</option>
                </select>
                <label>
            </div>

        <div class="form-row">
                <label>
                    <span>City</span>
                    <select name="c" id="c">
                        <option value="butwal">BUTWAL</option>
                        <option value="Ktm">KATHMANDU</option> 
                        <option value="chtwn">CHITWAN</option> 
                        <option value="pkr">POKHARA</option> 
                    </select>
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
  
<?php
 include('footer.php');
 ?>

</body>

</html>
