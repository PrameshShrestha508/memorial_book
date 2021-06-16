<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cz">
<?php
error_reporting(1);

?>
     <head>

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
 table{
        border-spacing:15px;
    }
    td{
        padding:30px;
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

</style>
    </head>
    <body>
<?php
 include('navbar.php');
include('scripts.php');
?>	

<br/>
<br/>

<div class="container-fluid">
<div class="row">

    <div class="col-sm-2 mt-5"><br/>
      <?php include('list.php');?>
  </div>	
	 <div class="col-sm-10 mt-5">
	 <br/>
	 <h1 align='center'><font color="Black"style="century">Your Search is here</font></h1>
	 <hr>
   <div id="searchbox" class="container-fluid" style="width:80%;text-align:center">
            <div>
                <form role="search" method="POST" action="osearch.php">
                    <input type="text" class="form-control" name="q" style="border-color:orange; text-align:center" placeholder="Search for a Book , Author Or Category">
                    
                </form>
            </div>
        </div>
    <?php
 require "connect.php";
   $k=$_REQUEST['q'];

	$sql="select * from obook where BOOKNAME LIKE '%{$k}%'";
    $row = $conn->query($sql);
    $n=0;
  echo"<form method='post'><table border='0' align='center'><tr>";
        while($arr = $row->fetch_assoc()) 
        {
               $i=$arr['BOOKID'];
        if($n%3==0)
        {
        echo "<tr>";
        }
       echo "
        <td height='280' width='240' align='center'><img src='data:image/jpeg;base64,".base64_encode( $arr['IMAGE'] )."'height='250' width='200'><br/>
        <b>BOOKNAME:</b>".$arr['BOOKNAME']."
       <br><b>Author:</b>".$arr['AUTHOR']."
       <br><b>Publication:</b>&nbsp;".$arr['PUBLICATION']."
	   <br><b>Price:</b>".$arr['PRICE']."RS
       <br><br><a href='sellerinfo.php?itemno=$i'><img src='images/view7.jpg' width='70' height='20'/></a>
       </td>";
      $n++;
        }
          echo "</tr></table>
           </form>";


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
 


<div id="Bottom" align='center'>
<br><br><a href='requirements.php'><button type='button' class='btn btn-primary'>SUBMIT YOUR REQUIREMENTS</button></a>
</div><br>
<?php include('footer.php'); ?>
    </body>
    </html>
