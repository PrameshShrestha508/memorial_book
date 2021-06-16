<?php
session_start();
$id=$_SESSION['eid'];
include("../config.php");
$sql=mysqli_query($connection,"select * from users where user_name='$id'");
	if($sql==false)
	{
		die(mysqli_error());
	}
   
	  while($mat = mysqli_fetch_array($sql)) 
        {
               $s=$mat['utype'];
		}
    if($s=='ADMIN')
	{
		
	}
else
{
	header("location:index.php");
}

if($id=="")
{
header("location:index.php");
}	
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cz">
<?php
error_reporting(1);

?>

  <style>

table {
    border-collapse: collapse;
    width: 100%;
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
	.ascroll{
		max-height:605px;
		overflow-y:scroll;
	}
	.bscroll{
		max-height:600px;
		overflow-y:scroll;
	}
</style>
    </head>
    <body>
	
	<?php include('navbar.php');
     include('scripts.php');?>

<br/>
<br/>

<div class="container-fluid">
<div class="row">
  <br/>

	 <div class="col-sm-12 mt-5">
	 <br/>
	 <!-- <h1 align='center'><font color="Black"style="century">Welcome ADMIN</font></h1> -->
	 <hr>
    <?php

 
	session_start();
$id=$_SESSION['eid'];
include("config.php");
$cnd=$_REQUEST['itemno'];
 require "../connect.php";

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
 if($cnd=='1')
	 {           
		 $sql="select * from nbook";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>NEW BOOKS</strong></h1>";
    echo "<table align='center'><tr> <th>BOOKID</th><th>NAME</th><th>Branch</th><th>SEM</th><th>AUTHOR</th><th>PUBLISHER</th><th>PRICE</th><th>DISCOUNT</th><th>STOCK</th><th>SOLD</th><th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['BookId'];
			  $bn=$arr['BOOKNAME'];
			  $bss=$arr['Sem'];
			  $bb=$arr['Branch'];
			  $bu=$arr['Author'];
			  $bp=$arr['PublicatonHouse'];
			  $bpr=$arr['Price'];
			  $bd=$arr['Discount'];
			  $bs=$arr['Stock'];
			  $bq=$arr['soldq'];
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $bb."</td><td>" . $bss."</td><td>" . $bu."</td><td>" . $bp."</td>
	   <td>" . $bpr."</td><td>" . $bd."</td><td>" . $bs."</td><td>" . $bq."</td>
	   <td>.<a href='upnbook.php?itemno=$bi'><button type='button' class='btn btn-success'>Update Books</button></a>.</td>
	   <td>.<a href='delete.php?con=1&itemno=$bi'><button type='button' class='btn btn-danger'>Delete Books</button>
	   </a>.</td></tr>";
        }
          echo "</table>";
		 echo"<a href='addnewbook.php'><button type='button' class='btn btn-primary'>ADD NEW BOOK</button></a>";
	 }
	  else if($cnd=='2')
	 {
		 $sql="select * from rbook";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>RENT BOOKS</strong></h1>";
    echo "<table align='center'><tr> <th>BOOKID</th><th>NAME</th><th>Branch</th><th>SEM</th><th>AUTHOR</th><th>PUBLISHER</th><th>Rent</th>
	<th>STOCK</th><th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['ID'];
			  $bn=$arr['BOOKNAME'];
			  $bss=$arr['Sem'];
			  $bb=$arr['Branch'];
			  $bu=$arr['Author'];
			  $bp=$arr['PublicatonHouse'];
			  $bpr=$arr['Rent'];

			  $bs=$arr['stock'];
			 
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $bb."</td><td>" . $bss."</td><td>" . $bu."</td><td>" . $bp."</td>
	   <td>" . $bpr."</td><td>" . $bs."</td><td>.<a href='uprbook.php?itemno=$bi'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=2&itemno=$bi'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td></tr>";
        }
          echo "</table>";
		   echo"<a href='addrbook.php'><button type='button' class='btn btn-primary'>ADD RENT BOOK</button></a>";
	 }
	 else if($cnd=='3')
	 {
		  $sql="select * from orders";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>ORDERS</strong></h1>";
    echo "<table align='center'><tr> <th>ORDERNO</th><th>USER</th><th>OrderStatus</th><th>PAYMETHOD</th>
	<th>PAYSTATUS</th><th>PAYTOKEN</th><th>ADDRESS</th><th>CITY</th><th>MONO</th><th>COURIER</th><th>BOOKID</th>
	<th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
			   $oun=$arr['user_name'];
               $on=$arr['order_no'];
			   $os=$arr['OrderStatus'];
			   $oa=$arr['Address'];
			   $opm=$arr['PaymentMethod'];
			   $ops=$arr['PaymentStatus'];
			   $pt=$arr['PaymentToken'];
			   $oc=$arr['city'];
			   $occ=$arr['couriers'];
			   $obi=$arr['Book_Id'];
			   $om=$arr['MobileNumber'];
              
            
              			 
       echo "<tr><td>" .$on."</td><td>" . $oun."</td><td>" . $os."</td><td>" . $opm."</td><td>" . $ops."</td><td>" . $pt."</td><td>" . $oa."</td>
	   <td>" . $oc."</td><td>" . $om."</td><td>" . $occ."</td><td>" . $obi."</td>
	   <td>.<a href='uporder.php?itemno=$on'><button type='button' class='btn btn-success'>Update</button>
	   </a>.</td><td>.<a href='delete.php?con=3&itemno=$on'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td></tr>";
        }
          echo "</table>";
	 }
	  else if($cnd=='4')
	 {
		 $sql="select * from courier";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>COURIER</strong></h1>";
    echo "<table align='center'><tr> <th>ID</th><th>user_name</th><th>Name</th><th>Owner</th><th>ContactNo</th><th>EmailId</th><th>City</th><th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
               $ci=$arr['courire_id'];
			   $cu=$arr['cuser_id'];
			   $cn=$arr['courier_name'];
			   $cm=$arr['contact'];
			   $co=$arr['owner'];
			   $cc=$arr['city'];
			   $ce=$arr['email_id'];
              
            
              			 
       echo "<tr><td>" .$ci."</td><td>" . $cu."</td><td>" . $cn."</td><td>" . $co."</td><td>" . $cm."</td><td>" . $ce."</td>
	   <td>" . $cc."</td><td>.<a href='upcourier.php?itemno=$ci'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=4&itemno=$ci'><button type='button' class='btn btn-danger'>Delete</button></a>.</td></tr>";
        }
          echo "</table>";
		  echo"<a align='center 'href='addcourier.php'><button type='button' class='btn btn-primary'>ADD Courier</button></a>";
	 }
	  else if($cnd=='5')
	 {
		  $sql="select * from booksonrent";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>BOOKS RENT</strong></h1>";
    echo "<table align='center'><tr> <th>username</th><th>bookid</th><th>address</th><th>city</th><th>mobileno</th>
	<th>dayissued</th>
	<th>orderno</th><th>status</th><th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['user_name'];
			  $bn=$arr['book_id'];
               $bb=$arr['daysissued'];
			   $bm=$arr['MobileNumber'];
			   $ba=$arr['Address'];
			  $bc=$arr['city'];
			  $bu=$arr['order_no'];
			  $bp=$arr['Status'];
			 
			 
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $ba."</td><td>" . $bc."</td><td>" . $bm."</td><td>" . $bb."</td><td>" . $bu."</td><td>" . $bp."</td>
	   <td>.<a href='upbooksonrent.php?itemno=$bu'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=5&itemno=$bu'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td>
	   </tr>";
        }
          echo "</table>";
	 }
	 else if($cnd=='6')
	 {
		$sql="select * from users";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>USERS</strong></h1>";
    echo "<table align='center'><tr> <th>NAME</th><th>USERNAME</th><th>EMAIL</th><th>ADDRESS</th><th>CITY</th>
	<th>PIN</th><th>MOBILE</th><th>UTYPE</th><th>SERVICE</th><th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['Name'];
			  $bn=$arr['user_name'];
			  $bss=$arr['user_email'];
			  $bb=$arr['Address'];
			  $bu=$arr['City'];
			  $bp=$arr['Pin'];
			  $bpr=$arr['Mobile'];

			  $bs=$arr['utype'];
			  $bk=$arr['servicea'];
			 
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $bss."</td><td>" . $bb."</td><td>" . $bu."</td><td>" . $bp."</td><td>" . $bpr."</td><td>" . $bs."</td><td>" . $bk."</td>
	   <td>.<a href='upuser.php?itemno=$bn'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=6&itemno=$bn'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td></tr>";	 
		 
	 } echo "</table>";
	 }
	 else if($cnd==7)
	 {
		 	$sql="select * from obook";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>OLD BOOKS</strong></h1>";
    echo "<table align='center'><tr> <th>BookId</th><th>BookName</th><th>Author</th><th>Publisher</th><th>Price</th><th>Seller</th>
<th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['BOOKID'];
			  $bn=$arr['BOOKNAME'];
			  $bss=$arr['AUTHOR'];
			  $bb=$arr['PUBLISHER'];
			  $bu=$arr['PRICE'];
			  $bp=$arr['SELLER'];
			
			 
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $bss."</td><td>" . $bb."</td><td>" . $bu."</td><td>" . $bp."</td>

	   <td>.<a href='upoldbook.php?itemno=$bi'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=7&itemno=$bi'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td></tr>";	 
		 
	 } echo "</table>";
	  
	 }
	 else if($cnd==8)
	 {
		 
		 	$sql="select * from feedback";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>FEEDBACK</strong></h1>";
    echo "<table align='center'><tr> <th>SrNo</th><th>username</th><th>comment</th>
	
<th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['srno'];
			  $bn=$arr['user_name'];
			  $bss=$arr['comment'];
			 
			
			 
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $bss."</td>
	  

	   <td>.<a href='upfeedback.php?itemno=$bi'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=8&itemno=$bi'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td></tr>";	 
		 
	 } echo "</table>";
	 }
	 else if($cnd==9)
	 {
		 $sql="select * from contactus";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>CONTACT US</strong></h1>";
    echo "<table align='center'><tr> <th>srno</th><th>Name</th><th>emailid</th><th>mobileno</th><th>purpose</th><th>discription</th>
<th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['srno'];
			  $bn=$arr['name'];
			  $bss=$arr['emailid'];
			  $bb=$arr['mobileno'];
			  $bu=$arr['purpose'];
			  $bp=$arr['discription'];
			
			 
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $bss."</td><td>" . $bb."</td><td>" . $bu."</td><td>" . $bp."</td>

	   <td>.<a href='upcontactus.php?itemno=$bi'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=9&itemno=$bi'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td></tr>";	 
		 
	 } echo "</table>";
	 }
	 else if($cnd==10)
	 {
		 
		 	$sql="select * from requirment";
    $row = $conn->query($sql);
	echo"<h1 align='center'><strong>REQUIREMENT</strong></h1>";
    echo "<table align='center'><tr> <th>SrNo</th><th>username</th><th>bookName</th><th>Author</th><th>Publisher</th>
	
<th></th><th></th></tr>";
        while($arr = $row->fetch_assoc()) 
        {
              $bi=$arr['srno'];
			  $bn=$arr['user_name'];
			  $bss=$arr['BookName'];
			  $ba=$arr['Author'];
			  $bp=$arr['Publisher'];
			 
			
			 
			  
              
            
              			 
       echo "<tr><td>" .$bi."</td><td>" . $bn."</td><td>" . $bss."</td><td>" .$ba."</td><td>" .$bp."</td>
	  

	   <td>.<a href='upreq.php?itemno=$bi'><button type='button' class='btn btn-success'>Update</button></a>.</td>
	   <td>.<a href='delete.php?con=10&itemno=$bi'><button type='button' class='btn btn-danger'>Delete</button>
	   </a>.</td></tr>";	 
		 
	 } echo "</table>";
	 }
	 
	}
	else
	{
		header("location:index.php");
	}
if($_REQUEST['itemno']=="")
{
	header("location:adminlogin.php");
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
error_reporting(1);
   ?>


   <div class="cleaner"></div>

</div>
	 </div>
<br/>
<br/>
<br/>
 



<?php include('footer.php');?>
    </body>
    </html>