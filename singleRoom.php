<?php require('./Inc/header.php') ;

  if(!$userLoggedIn or !isset($_GET['doctorId'])){
    redirect('index.php');
  }
  $doctorId=$_GET['doctorId'];
 
  $Doctor=$con->query("SELECT * FROM `user_queries` WHERE id=".$doctorId);
  
  echo "<script>let doctorId=$doctorId;</script>";
 
  $edit=FALSE;
  if(isset($_GET['time']) && $_GET['time']!=""){
    $appId=$_GET['appId'];
    $time=$_GET['time'];
    $edit=TRUE;
  }
?>



<br>
<br>
<br><br>
<br><br>

<?php if($Doctor!=NULL){
   
    $doctor=mysqli_fetch_assoc($Doctor);
    // $dateChackout=(strtotime($_GET['checkOut']));
    $dateChackIn=(strtotime($_GET['checkIn']));
    // $days=floor(($dateChackout-$dateChackIn)/(60*60*24));
    // $days=($days>=0)?$days:0;
?>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <style>
    .card {

        border: none;
    }

    .card-header {
        padding: .5rem 1rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, .03);
        border-bottom: none;
    }

    .btn-light:focus {
        color: #212529;
        background-color: #e2e6ea;
        border-color: #dae0e5;
        box-shadow: 0 0 0 0.2rem rgba(216, 217, 219, .5);
    }

    .form-control {

        height: 50px;
        border: 2px solid #eee;
        border-radius: 6px;
        font-size: 14px;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #039be5;
        outline: 0;
        box-shadow: none;

    }

    .input {

        position: relative;
    }

    .input i {

        position: absolute;
        top: 16px;
        left: 11px;
        color: #989898;
    }

    .input input {

        text-indent: 25px;
    }

    .card-text {

        font-size: 13px;
        margin-left: 6px;
    }

    .certificate-text {

        font-size: 12px;
    }


    .billing {
        font-size: 11px;
    }

    .super-price {

        top: 0px;
        font-size: 22px;
    }

    .super-month {

        font-size: 11px;
    }


    .line {
        color: #bfbdbd;
    }

    .free-button {

        background: #1565c0;
        height: 52px;
        font-size: 15px;
        border-radius: 8px;
    }


    .payment-card-body {

        flex: 1 1 auto;
        padding: 24px 1rem !important;

    }
    </style>
</head>


<div id="scroolInto" class="container">
    <div class="card mb-4 border-0">
        <div class="row">
            <div class="my-3 px-4">
                <h2 class="fw-bold h-font text-center"><?php echo "&nbsp;&nbsp; Dr. ".strtoupper($doctor['name'])?></h2>
            </div>
        </div>

        <div class="row g-0 p-3 align-item-center">
            <div class="col-md-6  mb-lg-0 mb-md-0 mb-3">
                <!-- ist edit image -->
                <img src="<?php echo './Images/room3.jpg'?>" class="img-fluid rounded-start" alt="...">
               
            </div>
            <div class="col-md-6 px-lg-5 px-md-3 px-0">
                <div>
                    <div class="my-3 px-4">
                        <h4 class="mb-1 text-center">Email: <?php echo $doctor['email'] ?></h4>
                    </div>
                    <div class="my-3">
                        <h4 class="mb-1 text-center">Phone Number: 0<?php echo $doctor['contact'] ?></h4>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 bg-white shadow p-4">
                        <h4 id="availableLable" style="text-align:center;color:red"></h4>
                        <div class="row align-items-end">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" style="font-weight:500 ;">Date</label>
                                <input id="checkInDate" type="date" class="form-control shadow-none"
                                    value="<?php echo isset($_GET['checkIn'])?$_GET['checkIn']:''?>">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label" style="font-weight:500 ;">Time</label>
                                <input id="time" type="time" class="form-control shadow-none"
                                    value="<?php echo isset($_GET['time'])?$_GET['time']:''?>""
                                    onchange="onChange(<?php //echo $room['price'].','.$roomId ?>);">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 bg-white shadow p-4">
                        
                    <div class="border bg-light p-3 mb-3 m-auto text-center">
                    <p id="errorLog" style="color:red;"></p>
                        <button class="btn text-white shadow-none custom-bg"
                            onclick="<?php echo ($edit)?'updateApp('.$appId.')':'placeApp()' ?>;"><?php echo ($edit)?"Update Appointment" :"Place Appointment Now"?></button>
                    </div>
                    </div>
                    
                </div>


            </div>




        </div>
    </div>



    <!-- hidden field -->
    <div style="display:none">
        <input id="checkIn" type="date" class="form-control shadow-none">
        <input id="checkOut" type="date" class="form-control shadow-none">
        <input id="adult" type="number" class="form-control" placeholder="Number">
        <input id="children" type="text" type="number" class="form-control" placeholder="Number">
    </div>
    <!-- hidden field -->

    <script>
  
    </script>
    <div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <form> -->
                <div class="modal-body">
                    <div class="mb-3">
                        <!-- <label class="form-label">Email address</label>
                            <input type="email" id="userEmailLog" class="form-control shadow-none"> -->
                        <div class="row">
                            <div class="col-md-6">
                                <img style=" width: 100%;height: 100%; object-fit: scale-down;"
                                    src="<?php echo $room['image']?>" alt="">
                            </div>
                            <div class="col-md-6">
                                <h4 class=""><?php echo $room['name']?></h4>
                                <div id="bookedDate" class="mt-3"></div>
                            </div>
                            <div class="col-md-12 my-4 text-success text-center">
                                <h3>SUCCESSFULLY BOOKED!!</h3>
                            </div>
                        </div>
                        <div class="col-md-12 text-center  mb-2">
                            <a href="index.php" class=" btn btn-sm  text-white custom-bg shadow-none px-5">
                                OK
                            </a>
                        </div>
                    </div>
                </div>

                <!-- </form> -->

            </div>
        </div>
    </div>



    <?php
}else{
    // redirect('index.php');
}
require('./Inc/footer.php');
?>
    </body>

    </html>