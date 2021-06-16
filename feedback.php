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

	   <div class="table-responsive mt-5">
    <?php
                $query = "SELECT * FROM feedback";
                $query_run = mysqli_query($connection, $query);
            ?>
      <table class="table table-bordered text-center" style="width:50%">
        <thead>
          <tr>
            <th> S.N </th>
            <th>UserName </th>
            <th>Comment</th>
          </tr>
        </thead>
        <tbody>
     
                    <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['srno']; ?></td>
                                <td><?php  echo $row['user_name']; ?></td>
                                <td><?php  echo $row['comment']; ?></td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>
   <div class="cleaner"></div>
</div><br/><br/><br/><br/><br/><br/><br/><br/>
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
