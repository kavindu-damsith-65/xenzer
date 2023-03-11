<?php
require('Inc/essentials.php');
adminLogin();

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add a Doctor</title>
    <?php require('./Inc/links.php') ?>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./CSS/backend.css" />
    <!-- <script src="../Js/jquery.js"></script> -->
    <script src="js/main.js"></script>
</head>

<body>
<?php
    require('Inc/header.php');
    ?>

        <!------------------- Modal-------------------------->
        <div class=" fade show" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" style="display: block" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- <form  > -->
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i>ADD A DOCTOR
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Your details must match with your ID. that will be required during check-in.
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" id="userName" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0">
                                    <label class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input id="phoneNumber" type="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Picture</label>
                                    <input id="picture" type="file" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <label id="passwordLabel" class="form-label"
                                        style="font-size: 9px;color:red; "></label>
                                    <!-- <input type="password" id="password" class="form-control shadow-none"> -->
                                    <input type="password" id="password" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirm password</label>
                                    <label id="passConformLabel" class="form-label"
                                        style="font-size: 9px;color:red; "></label>
                                    <input type="password" id="passConform" class="form-control shadow-none">
                                </div>
                                <div class="text-center my-1">
                                    <button type="submit" class=" btn btn-dark shadow-none" onclick="submitData();">
                                        Register
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                    <!-- </form> -->

                </div>
            </div>
        </div>