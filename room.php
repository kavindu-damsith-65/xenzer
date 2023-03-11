<?php require('./Inc/header.php') ;
  ?>
  <br>
  <br>
  <br><br>

 <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">ALL DOCTORS</h2>
    <div class="h-line bg-dark"></div>
  </div>

  <div class="container m-auto">
    <div class="row">
      <div class="col-lg-3 col-md-12 mb-lg-0 px-lg-0">
        <div class="bg-white  p-4 border-top border-4 border-dark">
          <div class="bg-white p-4">
            <h4>FILTERS</h4>
          </div>
          <div class="border bg-light p-3 mb-3 m-auto">
            <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
            <label class="form-label">Check-in</label>
            <input type="date" id="checkIn" class="form-control shadow-none mb-3" value="<?php echo isset($_GET['checkIn'])?$_GET['checkIn']:''?>">
           

          </div>

         
          <div class="border bg-light p-3 mb-3">
            <h5 class="mb-3" style="font-size: 18px;">Name of Doctor</h5>
            <div class="d-flex">
              <div class="me-3">
                <input placeholder="Enter Name" id="docterName" type="text" class="form-control" value="<?php echo isset($_GET['name'])?$_GET['name']:''?>">
              </div>
              
            </div>
          </div>
          <div class="border bg-light p-3 mb-3 m-auto text-center">
          <button  class="btn text-white shadow-none custom-bg" onclick="findDoctors('doctorFilterDoctorPage');">Submit</button>
          </div>
        </div>
      </div>


      <div class="col-lg-9 col-md-12 px-4" id="doctorFilterDoctorPage">
       
      </div>
    </div>
  </div>
  

<!-------footer----->
<?php require('./Inc/footer.php') ?>
</div>
</body>
</html>

