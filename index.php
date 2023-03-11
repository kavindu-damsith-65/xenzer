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
    <div class="row">
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

<div class="container">
    <div class="row" id="doctorFilterMainPage" data-aos="fade-up">

    </div>
</div>




<!----------------------OUR-FACILITIES--------------------->
<div data-aos="fade-up">
    <h2 class="mt-5 pt-5 mb-4 text-center fw-light">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="box col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <img src="./Images/caffe.jpg" alt="" width="80px">
                <h5 class="mt-3">Caffe</h5>
            </div>
            <div class="box col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <img src="./Images/pool.png" alt="" width="80px">
                <h5 class="mt-3">Swimming Pool</h5>
            </div>
            <div class="box col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <img src="./Images/gym.png" alt="" width="80px">
                <h5 class="mt-3">Gym</h5>
            </div>
            <div class="box col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <img src="./Images/spa.svg" alt="" width="80px">
                <h5 class="mt-3">Spa</h5>
            </div>
            <div class="box col-lg-2 col-md-2 text-center bg-white shadow py-4 my-3">
                <img src="./Images/Bar.png" alt="" width="80px">
                <h5 class="mt-3">Bar</h5>
            </div>
        </div>
        <div class="col-lg-12 text-center  m-auto mt-5">
            <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More
                Facilities..</a>
        </div>
    </div>
</div>

<!-------------Testimonials-------------->
<div data-aos="slide-right">
<h2 class="mt-5 pt-5 mb-4 text-center fw-light ">" What People Say "</h2>
<div class="d-flex justify-content-center py-0" >
    <?php require('./Inc/slider.php');?>
</div>
</div>





<!-------footer----->
<?php require('./Inc/footer.php');
 // require('./Inc/newFooter.php')
  ?>

</body>

</html>