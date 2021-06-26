<?php
error_reporting(1);

?>
<?php
require 'config.php';
if(isset($_REQUEST['send']))
  {
	  
  $b=$_REQUEST['name'];
  $c=$_REQUEST['email'];
  $d=$_REQUEST['mn'];
  $e=$_REQUEST['a'];
 $f=$_REQUEST['comments'];
	  mysqli_query($connection,"INSERT INTO contactus (name, emailid,mobileno,purpose,discription)
		VALUES ('$b' ,'$c','$d','$e','$f')");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ContactUs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  -->
 
  </style>
</head>
<body>
<br/>
<br/>
<br/>
<div class="container">
<?php 
include('navbar.php');
include('scripts.php');


?>	
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="style_contact.css">
<div class="container contact-form bg-grey mt-5">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" action='contact.php' name="f1" onSubmit="return vali()">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="mn" class="form-control" placeholder="Your Phone Number *" value="" required="" />
                        </div>
                        <div class="form-group">
                          <select name="a" id="a" required="">
                            <option value="SERVICE">Service</option>
                            <option value="SELLWITHUS">Sell with us</option>
                            <option value="OTHER">Other</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="send" class="btnContact btn-primary" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="comments" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required=""></textarea>
                        </div>
                    </div>
                </div>
            </form>
            </div>
    </div><br>
<?php 
include('footer.php');
?>
</body>
</html>