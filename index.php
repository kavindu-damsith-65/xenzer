<!------------Header--------->
<?php require('./Inc/header.php') ?>

<!------------Swipper--------->
<div class="container-fluid">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="./Images/image1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="./Images/image2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="./Images/image3.jpg" alt=""></div>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</div>
<!------------Swipper-End--------->

<!------------carousel--------->
<div class="container-fluid px-lg-4 mt-4">

</div>
<!------------check booking availability form--------->
<div class="container availability-form" data-aos="fade-up">
    <div class="row" >
        <div class="col-lg-12 bg-white shadow p-4">
            <h5 class="mb-4">Check Doctor Availability</h5>
            <!-- <form> -->
            <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
                    <label class="form-label" style="font-weight:500;">Doctor Name</label>
                    <input id="docterName" type="text" class="form-control" placeholder="Enter Name">
                </div>
               
                <div class="col-lg-3 mb-3">
                    <label class="form-label" style="font-weight:500 ;">Check-in-Date</label>
                    <input id="checkIn" type="date" class="form-control shadow-none">
                </div>
                <!-- <div class="col-lg-3 mb-3">
                    <label class="form-label" style="font-weight:500 ;">Check-out-Time</label>
                    <input id="checkOut" type="date" class="form-control shadow-none">
                </div> -->
                
                <div class="col-lg-1 mb-3">
                    <button class="btn text-white shadow-none custom-bg"
                        onclick="findDoctors('doctorFilterMainPage');">Search</button>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!------------check booking availability form - end--------->

<div class="container" style="margin-bottom:150px">
    <div class="row" id="doctorFilterMainPage" data-aos="fade-up">

    </div>
</div>









<!-------footer----->
<?php require('./Inc/footer.php');
 // require('./Inc/newFooter.php')
  ?>

</body>

</html>