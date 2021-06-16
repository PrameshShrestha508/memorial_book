<?php
error_reporting(1);

?>
   <!-- body -->
   <body class="main-layout home_page">
      <!-- loader  -->
      <!-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div> -->
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="../index.php"><img src="../images/bmc8.png" height="60px" width="80px"  alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li class="active"> <a href="cpanel.php?itemno=6">Users</a> </li>
                                 <li class="nav-item dropdown">
                                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         Books detail
                                       </a>
                                       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       <a class="dropdown-item" href="cpanel.php?itemno=1">NewBooks</a>
                                          <a class="dropdown-item" href="cpanel.php?itemno=7">Old Books</a>
                                          <a class="dropdown-item" href="cpanel.php?itemno=2">Rent Books</a>
                                          <!-- <a class="dropdown-item" href="freebook.php">Free Books</a> -->
                                       </div>
                                       </li>
                                   <li><a href="cpanel.php?itemno=8">Feedback</a></li>
                                 <li><a href="cpanel.php?itemno=9">ContactUs</a></li>
                                 <li class="mean-last"> <a href="../login.php"><span class="glyphicon glyphicon-user"></span> MyProfile </a></li>
                                 <?php
 	session_start();
$id=$_SESSION['eid'];
    if($id!="")
   echo"<li><a href='?log=out'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
   if(isset($_REQUEST['log'])=='out')
{
session_destroy();
header("location:index.php");
}
   ?>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- end header inner -->
      </header>
      <!-- end header -->