
<?php
error_reporting(1);

?>
	
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
</style>
    </head>
    <body>
	    <style>
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
    </style>
	 <?php 
include('navbar.php');
     include('scripts.php');
?>
<br/><br/><br/>
<div id="RightPart">

    <?php


          echo "</tr></table>
           </form>";
if($_REQUEST['con']==1)
{
include("login.php");
}
if($_REQUEST['con']==2)
{
	include("home.php");
}
error_reporting(1);


   ?>
   <div class="cleaner"></div>
</div>
<div id="Bottom">

</div>
		</div>
</div>

    </body>
    </html>
