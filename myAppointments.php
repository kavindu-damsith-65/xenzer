<?php require('./Inc/header.php') ?>
<br>
<br>
<br><br>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">MY APPOINTMENTS</h2>
    <div class="h-line bg-dark"></div>

</div>

<?php 
    $sql="SELECT * FROM  `appointment` WHERE `user_id`=".$_SESSION['userId'];
    $data=normalSelect($sql);
    

?>
<div class="container">
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Contact No.(Doctor)</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                <?php
            $cou=1;
            while ($row = $data->fetch_assoc()) {
             ?>
                <tr>
                    <th scope="row"><?php echo $cou?></th>
                    <?php
                        $result=normalSelect("SELECT `id`,`name`,`contact` FROM `user_queries` WHERE id=".$row['doctor_id']);
                        if($result = $result->fetch_assoc()){
                           
                        ?>

                    <td><?php echo $result['name']?></td>
                    <td><?php echo $result['contact']?></td>

                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['time']?></td>

                    <td><a href="<?php 
                          $link="doctorId=".$result['id']."&checkIn=".$row['date']."&time=".$row['time']."&appId=".$row['id'];
                          echo "singleRoom.php?$link";
                        }?>" class="btn btn-sm btn-warning">Edit </a>


                    </td>
                    <td><button onclick="delectAppointment(<?php echo $row['id'] ?>)"
                            class="btn btn-sm btn-danger">Delete</button></td>

                </tr>
                <?php
               $cou+=1;
              }
              ?>
            </tbody>
        </table>


    </div>
</div>

<br><br><br><br>
<!-------footer----->

<?php require('./Inc/footer.php');?>
</body>

</html>