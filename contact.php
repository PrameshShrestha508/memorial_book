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
	 if( mysqli_query($connection,"INSERT INTO contactus (name, emailid,mobileno,purpose,discription)
		VALUES ('$b' ,'$c','$d','$e','$f')"))
		{
		
			echo"<h2 align='center'><strong>Thank you we will reply you soon</strong></h2>";
		$msg="THANK YOU WE WILL REPLY YOU SOON: ";
 mail($c,"THANK YOU",$msg);
			
		}
		else
		{
			die(mysqli_error());
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ContactUs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  -->
   <style>
  .modal-header, h4, .close {
      background-color: #b7b795;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #b7b795;
  }
  
  body
  {
    background-image: url(back.jpg);
    background-size: cover;
    background-repeat: no-repeat;
  }
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

   <div class="container-fluid bg-grey">
  <h2 class="text-center"><font color="white">CONTACT US</font></h2>
  <div class="row">
    <div class="col-sm-5">
      <p></span><font color="black" size="4px">Contact us and we'll get back to you within 24 hours.</font></p>
      <p><font color="black" size="3px"><span class="glyphicon glyphicon-map-marker"></span>Butwal,Rupendehi,Nepal</font></p>
      <p><font color="black" size="3px"><span class="glyphicon glyphicon-phone"></span></span> +977-7768000788</font></p>
	   <p><font color="black" size="3px"><span class="glyphicon glyphicon-phone"></span></span> +977-9011902243</font></p>

      <p><font color="black" size="3px"><span class="glyphicon glyphicon-envelope"></span></span>bmcpustakalya@gmail.com</font></p>

    </div>
    <div class="col-sm-7">
      <div class="row">
	  <form method="post" action='contact.php' name="f1" onSubmit="return vali()">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
		
      </div>
	   <div class="row">
	   <div class="col-sm-6 form-group">
          <input class="form-control" id="mn" name="mn" placeholder="Mobile.No" type="text" required onChange="return phone()">
		   
        </div>
		<div class="col-sm-6 form-group">
		<label>
                 
                    <select name="a" id="a">
                        <option value="SERVICE">Service</option>
                        <option value="SELLWITHUS">Sell with us</option>
						<option value="OTHER">Other</option>
                        
                    </select>
                </label>
				</div>
		</div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" id='send' name='send' type="submit">Send</button>
        </div>
      </div>
	  </form>
    </div>
  </div>
</div>
<div id="googleMap" style="height:350px;width:100%;"></div>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(19.0224 , 72.8556);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:12,
  scrollwheel:false,
  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
	
	



</body>
</html>