<!------------Header--------->
<?php require('./Inc/header.php') ;

if(!$userLoggedIn or !isset($_GET['reportId'])){
    redirect('myReports.php');
  }
  $reportId=$_GET['reportId'];
//  $reportId=1;
$report=$con->query("SELECT * FROM `user_reports` WHERE id=".$reportId);
if($report!=NULL){
    $report=mysqli_fetch_assoc($report);
    
    $user=$con->query("SELECT * FROM `user_details` WHERE userID=".$report['user_id']);
    if($user!=NULL){
        $user=mysqli_fetch_assoc($user);
        // echo "<script>alert(". $user['userID'].")</script>";
        $doctor=$con->query("SELECT `name` FROM `user_queries` WHERE id=".$report['doctor_id']);
        if($doctor!=NULL){
            $doctor=mysqli_fetch_assoc($doctor);

    

//   echo "<script>let doctorId=$doctorId;</script>";
?>

<br>
<br>
<br><br>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">VIEW  REPORT</h2>
    <div class="h-line bg-dark"></div>

</div>


<div class="container px-5 px-5">
   

    <div class="row" style="margin-top:150 px ;margin-bottom:150px">
    <h4>A Report By : Dr.<?php echo strtoupper($doctor['name'])?></h4>
    <hr>

        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Name</label>
            <label type="text" id="userName" class="form-control shadow-none"><?php echo $user['userName']?></label>
        </div>
        <div class="col-md-6 p-0">
            <label class="form-label">Email</label>
            <label type="email" id="email" class="form-control shadow-none"><?php echo $user['email']?></label>
        </div>
        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Phone Number</label>
            <label id="phoneNumber" type="number" class="form-control shadow-none"><?php echo $user['phoneNumber']?></label>
        </div>
        <div class="col-md-6 p-0 mb-3">
        <label class="form-label">Date of birth</label>
            <label id="dateOfBirthLabel" class="form-label" style="font-size: 12px;color:red; "></label>
            <label type="date" id="dateOfBirth" class="form-control shadow-none"><?php echo $user['dateOfBirth']?></label>
        </div>
        <div class="col-md-12 p-0 mb-3">
            <label class="form-label">Address</label>
            <label id="address" class="form-control shadow-none" rows="1"><?php echo $user['address']?></label>
        </div>
        
        <br><br><br>
        <hr><br><br>

        <div class="col-md-12 p-0 mb-3">
            <label class="form-label">Patient demographics</label>
            <label id="demographics" class="form-control shadow-none" rows="1"><?php echo $report['demographics']?></label>
        </div>
        <div class="col-md-12 p-0 mb-3">
            <label class="form-label">The reason for the disease of the patient</label>
            <label id="resons" class="form-control shadow-none" rows="1"><?php echo $report['resons']?></label>
        </div>
        <div class="col-md-12 p-0 mb-3">
            <label class="form-label">The prescriptions for that particular patient</label>
            <label id="prescriptions" class="form-control shadow-none" rows="1"><?php echo $report['prescriptions']?></label>
        </div>
        <div class="col-md-12 p-0 mb-3">
            <label class="form-label">Treatment plans</label>
            <label id="treatments" class="form-control shadow-none" rows="1"><?php echo $report['treatments']?></label>
        </div>
        <div class="col-md-12 p-0 mb-3">
            <label class="form-label">Progress notes</label>
            <label id="progress" class="form-control shadow-none" rows="1"><?php echo $report['progress']?></label>
        </div>
        <div class="text-center my-1">
            <a  href="myReports.php" type="submit" class=" btn btn-success shadow-none">
                Back
        </a>
        </div>

    </div>
</div>



<!-------footer----->
<?php 
     
    }

   }
   

}


require('./Inc/footer.php');
 // require('./Inc/newFooter.php')
  ?>

</body>

</html>