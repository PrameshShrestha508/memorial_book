<?php 
include('navbar.php');
include('scripts.php');
?>
      <section class="slider_section">
         <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner.jpg" alt="First slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1>The Best Libraries That<br> Every Book Lover Must<br> Visit!</h1>
                        <p>BMC Pustakalaya is an online bookstore, physically based in Butwal, Nepal<br> with an aim to create the largest community of book readers in Nepal.<br> News and events At BMC Pustakalaya, you can browse and buy books online at the lowest everyday prices </p>
                        <div class="button_section"> <a class="main_bt" href="#">Read More</a>  </div>
                        <ul class="locat_icon">
                           <li> <a href="#"><img src="icon/facebook.png"></a></li>
                           <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                           <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                           <li> <a href="#"><img src="icon/instagram.png"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner.jpg" alt="Second slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1>The Best Libraries That<br> Every Book Lover Must<br> Visit!</h1>
                        <p>BMC Pustakalaya is an online bookstore, physically based in Butwal, Nepal<br> with an aim to create the largest community of book readers in Nepal.<br> News and events At BMC Pustakalaya, you can browse and buy books online at the lowest everyday prices </p>
                        <div class="button_section"> <a class="main_bt" href="#">Read More</a>  </div>
                        <ul class="locat_icon">
                           <li> <a href="#"><img src="icon/facebook.png"></a></li>
                           <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                           <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                           <li> <a href="#"><img src="icon/instagram.png"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner.jpg" alt="Third slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1>The Best Libraries That<br> Every Book Lover Must<br> Visit!</h1>
                        <p>BMC Pustakalaya is an online bookstore, physically based in Butwal, Nepal<br> with an aim to create the largest community of book readers in Nepal.<br> News and events At BMC Pustakalaya, you can browse and buy books online at the lowest everyday prices </p>
                        <div class="button_section"> <a class="main_bt" href="#">Read More</a>  </div>
                        <ul class="locat_icon">
                           <li> <a href="#"><img src="icon/facebook.png"></a></li>
                           <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                           <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                           <li> <a href="#"><img src="icon/instagram.png"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>
      <!-- about -->
      <div class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="aboutheading">
                     <h2>About <strong class="black">Us</strong></h2>
                     <span>BMC Pustakalaya is an online bookstore, physically based in Butwal, Nepal, with an aim to create the largest community of book readers in Nepal.News and events At BMC Pustakalaya, you can browse and buy books online at the lowest everyday prices.</span>
                  </div>
               </div>
            </div>
            <div class="row border">
               <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                  <div class="about-box">
                     <p> BMC Pustakalaya is an online bookstore with a mission to financially support local, independent bookstores.
                           We believe that bookstores are essential to a healthy culture. They’re where authors can connect with readers, where we discover new writers, where children get hooked on the thrill of reading that can last a lifetime. They’re also anchors for our downtowns and communities.
                           As more and more people buy their books online, we wanted to create an easy, convenient way for you to get your books and support bookstores at the same time.</p>
                     <a href="#">Read More</a>
                  </div>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                  <div class="about-box">
                     <figure><img src="images/about.png" alt="img" /></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <!-- end about -->
      <!-- Library -->
      <div class="Library">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>Our <strong class="black">Library </strong></h2>
                     <span>Take a Look Of Our Best Books Libraries</span> 
                  </div>
               </div>
            </div>
         </div>
         <div id="searchbox" class="container-fluid" style="width:80%;text-align:center">
          <div>
              <form role="search" method="POST" action="search.php">
                  <input type="text" class="form-control" name="q" style="border-color:orange; text-align:center" placeholder="Search for a Book , Author Or Category" id="q">
                  
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
	 <h1 align='center'><font color="Black"style="century">MOST SOLD BOOKS</font></h1>
	 <hr>
    <?php
            require "connect.php";
         $sql="select * from nbook order by soldq desc limit 21";
         $row = $conn->query($sql);
         $n=0;
         echo"<form method='post'><table border='0' align='center'><tr>";
            while($arr = $row->fetch_assoc()) 
            {
               if($n<12)
               {
                     $i=$arr['BookId'];
                  
                     $stk=$arr['Stock'];
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
            <br><b>Price:</b>".$arr['Price']."RS ";
            
            if($stk!=0)
            {   
            echo"<br><br><a href='loginshop.php?itemno=$i'><button type='button' class='btn btn-success'>Shop Now</button></a>
            <a href='logincart.php?itemno=$i'><button type='button' class='btn btn-primary'>Add to Cart</button></a>";
            }
            else
            echo"<br><br><button type='button' class='btn btn-danger'>out of stock</button>";
            echo"</td>";
            $n++;
            }
            }
               echo "</tr></table>
               </form>";

               error_reporting(1);

      ?>
   <div class="cleaner"></div>
         </div>
      </div>
 </div>
      <!-- end Library -->
      <!-- Contact -->
      <!-- <div class="Contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage3">
                     <h2>Contact</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <form>
                     <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <input class="form-control" placeholder="Name" type="Name">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <input class="form-control" placeholder="Phone Number" type="Phone Number">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <input class="form-control" placeholder="Email" type="Email">
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                           <textarea class="textarea" placeholder="Message">Message</textarea>
                        </div>
                     </div>
                  </form>
               </div>
               <button class="send-btn">Send</button>
            </div>
         </div>
      </div> -->
      <!-- end Contact -->
      <?php include('footer.php') ?>
     
   </body>
   <script>


    </script>
</html>