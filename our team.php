
<?php 
include('navbar.php');
include('scripts.php');
?>
 <style>
body {
    background-image: url(back.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}

.team {
    text-align: center
}

.section {
    padding: 30px 0
}

.section-title {
    text-align: center;
    font-size: 40px;
    position: relative;
    margin-bottom: 40px;
    margin-top: 10px;
}
h3{
    color:white;
}

.team .team-item {
    text-align: left;
    margin-bottom: 30px;
    overflow: hidden
}

.team .team-item figure {
    position: relative;
    overflow: hidden
}

/* img {
    width: 100%
} */

.team .team-item figure figcaption {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    background: rgba(9, 9, 9, .6);
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    transition: all .5s ease
}

.team .team-item figure figcaption .info {
    position: absolute;
    color: #fff;
    float: left;
    bottom: 10px;
    left: 20px;
    margin-left: -80px;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    transition: all .5s ease
}

.team .team-item figure:hover figcaption {
    opacity: 1
}

.team .team-item figure:hover figcaption .info {
    margin-left: 0
}

.team .team-item figure figcaption .info h3 {
    font-size: 20px
}

.team .team-item figure figcaption .info p {
    color: #fff
}

.team .team-item figure:hover figcaption .social {
    margin-bottom: 0
}

.team .team-item figure figcaption .social {
    position: absolute;
    float: right;
    bottom: 90px;
    margin-bottom: -80px;
    right: 20px;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    transition: all .5s ease
}

.team .team-item figure figcaption .social a {
    color: #fff;
    font-size: 15px;
    width: 36px;
    height: 36px;
    background: #3f51b5;
    display: inline-block;
    text-align: center;
    line-height: 36px;
    border-radius: 2px
}
</style> 
<br><br><br><br>
<div class="container-fluid mt-5">
<section class="team section">
    <div class="container">
        <h1 class="section-title text-center">Our Team </h1>
        
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-item">
                    <figure> <img src="images/team/roshan.jpg" alt="">
                        <figcaption>
                            <div class="info">
                                <h3>Roshan Thapa</h3>
                                <p>Developer</p>
                            </div>
                            <div class="social"> <a href="#" class="twitter" data-abc="true"><i class="fa fa-twitter"></i></a> <a href="#" class="facebook" data-abc="true"><i class="fa fa-facebook"></i></a> <a href="#" class="google-plus" data-abc="true"><i class="fa fa-linkedin"></i></a> </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-item">
                    <figure> <img src="images/team/pramesh.jpg" alt="">
                        <figcaption>
                            <div class="info">
                                <h3>Pramesh B. Shrestha</h3>
                                <p>Developer</p>
                            </div>
                            <div class="social"> <a href="#" class="twitter" data-abc="true"><i class="fa fa-twitter"></i></a> <a href="#" class="facebook" data-abc="true"><i class="fa fa-facebook"></i></a> <a href="#" class="google-plus" data-abc="true"><i class="fa fa-linkedin"></i></a> </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="team-item">
                    <figure> <img src="images/team/madhu.jpg" alt="">
                        <figcaption>
                            <div class="info">
                                <h3>Madhu Khadka</h3>
                                <p>Developer</p>
                            </div>
                            <div class="social"> <a href="#" class="twitter" data-abc="true"><i class="fa fa-twitter"></i></a> <a href="#" class="facebook" data-abc="true"><i class="fa fa-facebook"></i></a> <a href="#" class="google-plus" data-abc="true"><i class="fa fa-linkedin"></i></a> </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?php include('footer.php');?>