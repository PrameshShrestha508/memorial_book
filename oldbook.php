<?php include('navbar.php');
include('scripts.php');
?>
<div class="container-fluid">
    <div class="Library">
         <!-- <div class="container"> -->
            <div class="row">
               <div class="col-md-10 offset-md-1">
                   <br>
                  <div class="titlepage">
                     <h2>OLD <strong class="black">Books </strong></h2>
                     <span>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</span> 
                  </div>
               </div>
            </div>
         <!-- </div> -->
         <div id="searchbox" class="container-fluid" style="width:80%;text-align:center">
            <div>
                <form role="search" method="POST" action="osearch.php">
                    <input type="text" class="form-control" name="q" style="border-color:orange; text-align:center" placeholder="Search for a Book , Author Or Category">
                    
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
            $sql="select * from obook";
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
            <br><br><a href='oldsellerinfo.php?itemno=$i'><button type='button' class='btn btn-primary'>View</button></a>
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
</div>

    <div id="Bottom" align='center'>
        <br><br><a href='submitob.php'><button type='button' class='btn btn-success'>Submit Old Books</button></a>
    </div>
<hr color="black"><br/>
<?php include('footer.php'); ?>
    </body>
    </html>
