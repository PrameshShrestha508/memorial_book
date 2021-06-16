<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cz">
<?php
error_reporting(1);

?>
     <head>
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	
	<style>

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
      include('scripts.php');
      ?>

<br/>
<br/>

<div class="container-fluid">
<div class="row">

    <div class="col-sm-2 mt-5">
    <br><br>
        <?php 
      include('list.php');
      ?>
  </div>	
	 <div class="col-sm-10 mt-5">
	 <br/><br>
	 <h1 align='center'><font color="Black"style="century">MOST SOLD BOOKS</font></h1>
	 <hr>
     <div id="searchbox" class="container-fluid mt-3" style="width:100%;text-align:center">
          <div>
              <form role="search" method="POST" action="search.php">
                  <input type="text" class="form-control" name="q" style="border-color:orange; text-align:center" placeholder="Search for a Book , Author Or Category" id="q">
                  
               </form>
          </div>
      </div>  
    <?php
 require "connect.php";
	$sql="select * from nbook where Branch='IT'";
    $row = $conn->query($sql);
    $n=0;
    echo"<form method='post'><table border='0' align='center'><tr>";
        while($arr = $row->fetch_assoc()) 
        {
			
               $i=$arr['BookId'];
        if($n%3==0)
        {
        echo "<tr>";
        }
       echo "
        <td height='280' width='240' align='center'><img src=".$arr['BookImage']." width='200' height='250'/><br/><br/>
        <b>BOOKNAME:</b>".$arr['BOOKNAME']."
       <br><b>Author:</b>".$arr['Author']."
       <br><b>Publication:</b>&nbsp;".$arr['PublicatonHouse']."
       <br><b>Discount:</b>".$arr['Discount']."%
	   <br><b>Price:</b>".$arr['Price']."RS
       <br><br><a href='loginshop.php?itemno=$i'><img src='images/MetalPlakDa5new.gif' width='70' height='20'/></a>
       <a href='logincart.php?itemno=$i'><img src='images/addtocart.gif' width='70' height='20'/></a>
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
 

<?php 
      include('footer.php');
 ?>



    </body>
    </html>
