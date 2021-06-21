<?php
 include('navbar.php');
include('scripts.php');
include('config.php');
include('connect.php');
?>		
	   <br/>
	   <br/>
	   <br/>
	   <br/>  
 <link rel="stylesheet" href="css/style_feedback.css">
<section class="section-medium section-arrow--bottom-center section-arrow-primary-color bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white text-center">
                <h2 class="section-title "> What Others Say About Us</h2>
            </div>
        </div>
    </div>
</section>
<section class="section-primary t-bordered">
    <div class="container">
        <div class="row testimonial-three testimonial-three--col-three">
        <?php
                $query = "SELECT * FROM feedback";
                $query_run = mysqli_query($connection, $query);
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                    ?>  
            <div class="col-md-4 testimonial-three-col">
                <div class="testimonial-inner">
                    <div class="testimonial-image" itemprop="image">
                        <img width="180" height="180" src="<?php echo 'images/feedback/'.$row['IMAGE']; ?>">
                    </div>
                    <div class="testimonial-content">
                        <p>
                        <?php echo $row['comment']; ?>
                        </p>
                    </div>
                    <div class="testimonial-meta">
                        <strong class="testimonial-name" itemprop="name"><?php echo $row['user_name']; ?></strong>
                        <span class="testimonial-job-title" itemprop="jobTitle"><?php echo $row['faculty']; ?></span> 
                    </div>
                </div>
            </div>
            <?php
                 } 
               }
                   else {
                            echo "No Record Found";
                  }
        ?>
          
            
        </div>
    </div>
</section>  
         
   
   <div class="cleaner"></div>
</div>
<div id="Bottom" align='center'>
<br><br><a href='fsubmit.php'><button type='button' class='btn btn-primary'>SUBMIT YOUR FEEDBACK</button></a>
</div>
<br>
<?php include('footer.php'); ?>
<style>
.table{
	margin-left:auto;
	margin-right:auto;
	
}
</style>
    </body>
    </html>
