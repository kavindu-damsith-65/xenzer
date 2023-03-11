<?php
require('db_config.php');
$userLoggedIn=FALSE;
   session_start();
    if ((isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true)) {
      $userLoggedIn=TRUE;
}

function getData($data,$con,$limit,$orderBy){
   
    $queryNew="SELECT * FROM user_queries";
    
    if($data['docterName']!=""){
        
        $queryNew.=" WHERE  `name` LIKE '%".$data['docterName']."%'";
       
    }
    
    $reseve =$con->query($queryNew);
   
    $arr=[];
    if($reseve!=NULL && $reseve->num_rows!=0){
      while ($row = mysqli_fetch_assoc($reseve)) {
        $selected=TRUE;
      
            if($data['checkInDate']!=""){
               
                $newSql="SELECT DISTINCT `doctor_id`, COUNT(`date`) AS count 
                FROM `appointment` WHERE `date`=? AND `doctor_id`=? ;";
                
                $res=select($newSql,[$data['checkInDate'],$row['id']],"si");
                // $res=select("SELECT singleDoctor FROM `single_doctor` WHERE doctorId=?",[$row['id']],"i");

                if($res->num_rows!=0){
                    $newRow=mysqli_fetch_assoc($res);
                    if($newRow['count']>3){
                        $selected=FALSE;
                    }
                   }
                
               }
        if($selected){array_push($arr,$row['id']);}
        } 
       
    }
    // print_r($arr);
    $arr=join(",",$arr);
    // echo $arr."kaivnud";
    $query="SELECT * FROM user_queries WHERE id IN($arr) ".$orderBy." ".$limit;
   
   $filterDoctors=$con->query($query);
   return $filterDoctors;
  }




if(isset($_POST['selector'])){
    
    if($_POST['selector']=="doctorFilterMainPage"){
    $data=$_POST['data'];
    $filterDoctors=getData($data,$con,"LIMIT 9","ORDER BY name ASC");
    if($filterDoctors!=NULL){
    while($filterDoctor=mysqli_fetch_assoc($filterDoctors)){

        
        ?>
<div class="col-lg-4 col-md-4 d-flex justify-content-center fadeInAnimation" style="margin-top:30px;">
    <div class="card border-0" style="width: 18rem;">

      <!-- must change image -->
        <img src="<?php echo './Images/room3.jpg'?>" class="card-img-top" alt="...">
        <div class="card-body">
            <label>
                <h5><?php echo "&nbsp;&nbsp; Dr. ".strtoupper($filterDoctor['name'])?></h5>
            </label>
           <br>
           <hr>
            <h6 class="mb-4 fw-normal">Email: <?php echo $filterDoctor['email']?></h6>
            <h6 class="mb-4 fw-normal">Phone Number: <?php echo $filterDoctor['contact']?></h6>
            
            

            <div class="d-flex justify-content-evenly">
                <a href="<?php 
                $link="doctorId=".$filterDoctor['id']."&checkIn=".$data['checkInDate'];
                echo ($userLoggedIn)?"singleRoom.php?$link":"";
                ?>
                " class="btn btn-sm text-white custom-bg shadow-none"
                    <?php echo ($userLoggedIn)?"":'data-bs-toggle="modal" data-bs-target="#LoginModal"'?>>Place Appointment</a>
                
            </div>
        </div>
    </div>
</div>



<?php
    }
  }
  

     $link="checkIn=".$data['checkInDate']."&name=".$data['docterName'];
    echo'<div class="col-lg-12 text-center mt-5">
            <a href="room.php?'.$link.'" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms..</a>
         </div>';


    }

  
  
  if($_POST['selector']=="doctorFilterDoctorPage"){
    $data=$_POST['data'];
    $limit="LIMIT 2"." OFFSET ".$data['offset'];
    $filterDoctors=getData($data,$con,$limit,"ORDER BY name ASC");
    if($filterDoctors!=NULL){
    
    while($filterDoctor=mysqli_fetch_assoc($filterDoctors)){
    

    ?>
<div class="card mb-4 border-0 fadeInAnimation">
    <div class="row g-0 p-3 align-item-center">
        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">

        <!-- must change image -->
            <img src="<?php echo './Images/room3.jpg'?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-5 px-lg-5 px-md-3 px-0 ">
            <label>
                <h3><?php echo "&nbsp;&nbsp; Dr. ".strtoupper($filterDoctor['name'])?></h3>
            </label>
            <hr>
            <label>
                <h6>Email: <?php echo $filterDoctor['email']?></h6>
            </label>
            <label>
                <h6>Phone Number: <?php echo $filterDoctor['contact']?></h6>
            </label>
            <br>
            <hr>
            <a href="<?php 
               $link="doctorId=".$filterDoctor['id']."&checkIn=".$data['checkInDate'];
                echo ($userLoggedIn)?"singleRoom.php?$link":"";
                ?>" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"
                <?php echo ($userLoggedIn)?"":'data-bs-toggle="modal" data-bs-target="#LoginModal"'?>>Place Appointment </a>

        </div>
       
    </div>
</div>

<?php
     }
    }
  }


}  
?>