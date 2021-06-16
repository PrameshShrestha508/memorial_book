
<?php
error_reporting(1);

?>
     <head>
	<style>

</style>
    <style>
	
   
    </style>
	<style>
.center {
    margin: auto;
    width: 80%;
    padding: 100px;
}
 table{
        border-spacing:10px;
      width:90%;
    }
    
  
    a{
    opacity: 0.7;
    filter: alpha(opacity=50); 
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
	 <br/>
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
	$sql="select * from nbook where Branch='civil' OR Branch='Civil Engineering'";
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
       <br><br><a href='loginshop.php?itemno=$i'><button type='button' class='btn btn-success'>BUY NOW</button></a>
       <a href='logincart.php?itemno=$i'><button type='button' class='btn btn-warning'>ADD TO CART</button></a>
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
