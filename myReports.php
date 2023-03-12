<!------------Header--------->
<?php require('./Inc/header.php');
     $report1=$con->query("SELECT * FROM `user_reports` WHERE user_id=".$_SESSION['userId']);
     if($report1!=NULL){
        

?>

<br>
<br>
<br><br>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">MY REPORTS</h2>
    <div class="h-line bg-dark"></div>

</div>

<div class="container px-lg-4 mt-4">

    <div class="row" style="margin-bottom:150px">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Reson</th>
                  
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?php
            $cou=1;
            while($report=mysqli_fetch_assoc($report1)){
                $doctor=$con->query("SELECT `name` FROM `user_queries` WHERE id=".$report['doctor_id']);
                $doctor=mysqli_fetch_assoc($doctor);
             ?>
                <tr>
                    <th scope="row"><?php echo $cou?></th>
                 
                    <td><?php echo $doctor['name']?></td>
                    <td><?php echo $report['resons']?></td>

                 
                    <td><a href="<?php 
                          $link="reportId=".$report['id'];
                          echo "singleReport.php?$link";
                        ?>" class="btn btn-sm btn-success">View Report </a>


                    </td>
                   

                </tr><br><br>
                <?php
               $cou+=1;
               
              }
              ?>
            </tbody>
        </table>

<br><br><br>
    </div>


</div>




<!-------footer----->
<?php 
         
        
            }
    
    require('./Inc/footer.php');
 // require('./Inc/newFooter.php')
  ?>

</body>

</html>