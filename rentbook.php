<?php include('navbar.php');
include('scripts.php');
?>
<link rel="stylesheet" href="style2.css">
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
         <!-- <h1 class="center">MOST SOLD BOOKS</h1> -->
         <!-- <hr> -->
         <div class="latest-books-wrapper">
                     <div class="row latest-books-items-active">
                            <?php
                                include('config.php');
                                $query = "SELECT * FROM  rbook limit 9";
                                $query_run = mysqli_query($connection, $query);
                                if(mysqli_num_rows($query_run) > 0)        
                                {
                                    while($row = mysqli_fetch_assoc($query_run))
                                    {
                                       $i=$row['BookId'];
                  
                                       
                                       ?>
                            <div class="col-lg-4 col-md-6 grid-item grid-sizer cat-two">
                                <div class="latest-books-item mb-60">
                                    <div class="latest-books-thumb mb-25">
                                    <img src="<?php echo $row['BookImage'];?>"  alt="">
                                    </div>
                                    <div class="latest-book-content">
                                        <p>BOOKNAME : <span><?php echo $row['BOOKNAME'];?></span></p>
                                        <p>Author : <span><?php echo $row['Author'];?></span></p>
                                        <p>PublicatonHouse : <span><?php echo $row['PublicatonHouse'];?></span></p>
                                        
                                        <p>Rent Per Day : <span>RS.<?php echo $row['Rent'];?></span></p>
                                        <div class="latest-book-meta">
                                        <div class="inv-content-top">
                                        <?php
                                       
                                             echo"<br><br><a href='loginrent.php?itemno=$i'><button type='button' class='btn btn-primary'>Rent A Book</button></a>";
   
                                             ?>
                                       </div><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
         </div>
   </div>
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
