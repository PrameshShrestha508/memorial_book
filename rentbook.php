<?php include('navbar.php');
include('scripts.php');
?>
<div class="container-fluid">
    <div class="Library">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                   <br>
                  <div class="titlepage">
                     <h2>RENT <strong class="black">Books </strong></h2>
                     <span>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</span> 
                  </div>
               </div>
            </div>
         </div>
         <div id="searchbox" class="container-fluid" style="width:80%;text-align:center">
            <div>
                <form role="search" method="POST" action="search.php">
                    <input type="text" class="form-control" name="keyword" style="border-color:orange; text-align:center" placeholder="Search for a Book , Author Or Category">
                    
                </form>
            </div>
        </div>
      <div class="row">
         <div class="col-md-3">
            <!-- <form class="form-inline my-2 my-lg-0" action='search.php' role="search">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <br><br>
               <?php include('list.php') ?>
         </div>
         <div class="col-md-9">
         <br/>
	 <!-- <h1 align='center'><font color="Black"style="century">OLD BOOKS</font></h1> -->
	 <hr>
   <?php
      require "connect.php";
        $sql="select * from rbook";
          $row = $conn->query($sql);
          $n=0;
          echo"<form method='post'><table border='0' align='center'><tr>";
              while($arr = $row->fetch_assoc()) 
              {
                    $i=$arr['ID'];
              if($n%3==0)
              {
              echo "<tr>";
              }
            echo "
              <td  height='280' width='240' align='center'><img src=".$arr['BookImage']." width='200' min-height='200'/><br/>
              <b>BOOKNAME:</b>".$arr['BOOKNAME']."
            <br><b>Author:</b>".$arr['Author']."
            <br><b>Publication:</b>&nbsp;".$arr['PublicatonHouse']."
            <br><b>Rent Per Day:</b>".$arr['Rent']."RS
            <br><br><a href='loginrent.php?itemno=$i'><button type='button' class='btn btn-primary'>Rent A Book</button></a>
            
            </td>";
            $n++;
              }

                echo "</tr></table>
                </form>";

      error_reporting(1);
   ?>
            <div class="cleaner"></div>
         </div>
        <div>
    </div>
</div>
<br/>
    
<hr color="black"><br/>
<?php include('footer.php'); ?>
    </body>
    </html>
