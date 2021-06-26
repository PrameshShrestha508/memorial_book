
<?php
error_reporting(1);

?>

  <style>

table {
    border-collapse: collapse;
    width: 100%;
	align:center;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color:Green;
    color: white;
}
tr:nth-child(even){background-color: #f2f2f2}
</style>
    <style>
	
     body
      {
        background-image: url("back.jpg");
        background-position:0px 0px;
    background-size: cover;
        background-repeat: repeat;
      }
    </style>
	<style>
.center {
    margin: auto;
    width: 60%;
    padding: 100px;
}
]
     body
      {
        background-image: url(back.jpg);
		background-position:0px 0px;
background-attachment:fixed;
    background-size: cover;
        background-repeat: repeat;
      }
	   .a{
    opacity: 0.7;
    filter: alpha(opacity=50); 
	}
	
</style>
    </head>
    <body>
	
	<?php
 include('navbar.php');
include('scripts.php');
?>	
</br>
</br>
</br>
</br>
<div class="container-fluid">
	<div class="row">

		<div class="col-sm-2"><br/>
			<h3>My Profile</h3>
			<li class="list-group-item"><a  href="myprof.php">MyOrders</a></li>
			<li class="list-group-item"><a  href="myprof.php?itemno=1">MyCart</a></li>
			<li class="list-group-item"><a href="myprof.php?itemno=2">RentBookStatus</a></li>
			<li class="list-group-item"><a  href="myprof.php?itemno=3">Delete Add</a></li>
			<li class="list-group-item"><a  href="changepwd.php">change Password</a></li>
			</ul>	
		</div>
	 <div class="col-sm-10">
	 <br/>
	 <br/>
<div align:center>
<br/>
  <?php
	session_start();
$id=$_SESSION['eid'];
$itemno=$_REQUEST['itemno'];
 require "config.php";

 $sql="select * from mycart where user_name='$id'";
    $row=$connection->query($sql);
	if($itemno==1)
	{
	echo"<h1 align='center'><strong>MYCART</strong></h1>";
	if($row->fetch_assoc()>0)
	{
//  $sml="select * from myacart where user_name='$id'";
	
		
	$sql="select * from mycart where user_name='$id'";
    $row = $connection->query($sql);
   echo "<table align='center'><tr> <th>BOOKNAME</th><th>Author</th><th>Price</th><th>Discount</th><th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
               $bi=$arr['BookId'];
                $cartid=$arr['cartid'];
			   $sel="select * from nbook where BookID='$bi'";
			   $rowb = $connection->query($sel);
			   if($arb = $rowb->fetch_assoc())
               {
				 $bn=$arb['BOOKNAME'];
				 $ammount=$arb['Price'];
				 $Dis=$arb['Discount'];
				 $ar=$arb['Author'];
			   }	
              			 
       echo "<tr><td>" .$bn."</td><td>" . $ar."</td><td>" .$ammount."</td><td>".$Dis."</td><td>.<a href='loginshop.php?itemno=$bi'><button type='button' class='btn btn-primary'>BUY NOW</button></a>.</td>
	   <td>.<a href='deletecart.php?itemno=$cartid'><button type='button' class='btn btn-primary'>DELETE</button>
	   </a>.</td></tr>";
        }
          echo "</table>";
	}
else
{
	echo"<h2 align='center'><strong>NOTHING IN THE CART</strong></h2>";
}	
	}
	if($itemno=="")
	{
 //order code
 $sql="select * from orders where user_name='$id'";
    $row=$connection->query($sql);
	echo"<h2 align='center'><strong>ORDER STATUS</strong></h2>";
	if($row->fetch_assoc()>0)
	{
		
	$sql="select * from orders where user_name='$id'";
    $row = $connection->query($sql);
    echo "<table align='center'><tr> <th>ORDERNO</th><th>BOOKNAME</th><th>Amount Paid</th><th>DiliveryAddress</th><th>Courier</th><th>orderstatus</th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
               $on=$arr['order_no'];
			   $ad=$arr['Address'];
			   $bi=$arr['BookId'];
			   $ci=$arr['courire_id'];
			   $os=$arr['OrderStatus'];
			   $sel="select * from nbook where BookID='$bi'";
			   $rowb = $connection->query($sel);
			   if($arb = $rowb->fetch_assoc())
               {
				 $bn=$arb['BOOKNAME'];
				 $ammount=$arb['Price'];
				 $Dis=$arb['Discount'];
				 $ap=$ammount-($ammount*$Dis)/100;
			   }	
               $scl="select * from courier where courire_id='$ci'";
			   $rowc = $connection->query($scl);
			   if($arc = $rowc->fetch_assoc())
               {
				 $cnb=$arc['courier_name'];
			   }	
             $rowc = $connection->query($scl);	
              			 
       echo "<tr><td>" .$on."</td><td>" . $bn."</td><td>" .$ap."</td><td>".$ad."</td><td>".$cnb."</td><td>".$os."</td> <td>.<a href='cancel.php?itemno=$on'><button type='button' class='btn btn-primary'>CANCEL</button>
	   </a>.</td></tr>";
        }
          echo "</table>";
		  
	}
	else
	{
		echo"<h2 align='center'><strong>NO ORDER YET</strong></h2>";
	
	}
	}
	if($itemno==2)
	{	//rent code
echo"<h2 align='center'><strong>BOOK RENT STATUS</strong></h2>";
		  $srl="select * from users where user_name='$id'";
           $rrow = $connection->query($srl);
		   if($rar = $rrow->fetch_assoc())
               {
				 $us=$rar['servicea'];
			   }
		if($us=='PRO')
		{
			
			$sql="select * from booksonrent where user_name='$id'";
    $row = $connection->query($sql);
	echo"<h2 align='center'><strong>BOOK RENT STATUS</strong></h2>";
	if($row->fetch_assoc()>0)
	{
		$spl="select * from booksonrent where user_name='$id'";
    $rw = $connection->query($spl);
		
    echo "<table align='center'><tr> <th>ORDERNO</th><th>BOOKNAME</th><th>Rent</th><th>DAys Issued</th><th>Ammount</th><th>Status</th></tr>";
        while($arr = $rw->fetch_assoc()) 
        {
               $onr=$arr['order_no'];
			   $bid=$arr['ID'];
			   $di=$arr['daysissued'];
			   $par=$arr['PayAmnt'];
			   $rent=$arr['rent'];
			   $osr=$arr['Status'];
			   $sel="select * from rbook where ID='$bid'";
			   $rowb = $connection->query($sel);
			   if($arb = $rowb->fetch_assoc())
               {
				 $bnr=$arb['BOOKNAME'];
			   }		
              			 
       echo "<tr><td>" .$onr."</td><td>" . $bnr."</td><td>" .$rent."</td><td>".$di."</td><td>".$par."</td><td>".$osr."</td></tr>";
        }
          echo "</table>";
			
			
			
			
			
			
	}
else
{
	echo"<h2 align='center'><strong>NO ORDER YET</strong></h2>";
}	
		}
	
else
{
	echo"<h4 align='center'><strong>You are Not a pro user</strong></h4>";
	echo"<h4 align='center'><strong><a  href='proreg.php'>Apply </a>for Pro membership to rent a book</strong></h4>";
}	
			   
	}
	if($itemno==3)
	{
 $sql="select * from obook where SELLER='$id'";
    $row=$connection->query($sql);
	
	echo"<h1 align='center'><strong>MY POSTS</strong></h1>";
	if($row->fetch_assoc()>0)
	{
 $sml="select * from obook where SELLER='$id'";
	
		
	$sql="select * from obook where SELLER='$id'";
    $row = $connection->query($sql);
   echo "<table align='center'><tr> <th>BOOKNAME</th><th>Author</th><th>Price</th><th></th></tr>";
        while($arb = $row->fetch_assoc()) 
        {
                 $bi=$arb['BOOKID'];
				 $bn=$arb['BOOKNAME'];
				 $ammount=$arb['PRICE'];
				 $Dis=$arb['AUTHOR'];
			  
              			 
       echo "<tr><td>" .$bn."</td><td>" . $Dis."</td><td>" .$ammount."</td>
	   <td>.<a href='deletepost.php?itemno=$bi'><button type='button' class='btn btn-primary'>DELETE</button>
	   </a>.</td></tr>";
        }
          echo "</table>";
	}
else
{
	echo"<h2 align='center'><strong>NO POST YET</strong></h2>";
}
	}
	if($itemno==4)
	header("location:changepwd.php");	
	if($itemno>4)
		header("location:myprof.php");
if(isset($_REQUEST['log'])=='out')
{
session_destroy();
header("location:index.php");
}
else if($id=="")
{
header("location:index.php");
}
error_reporting(1);
   ?>
   <div class="cleaner"></div>
</div>
</div>
</div>
	 </div>
<br/>
<br/>
<br/>
 

<?php
 include('footer.php');
?>	

    </body>
    </html>
