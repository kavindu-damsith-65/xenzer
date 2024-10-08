    <?php
        // session_start();
        // require('Inc/dash_connect.php');
        require_once('db_config.php');
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./CSS/dbdstyle.css">

    <body>

        <div
            class="container-fluid bg-dark text-light p-2 d-flex align-items-center justify-content-between sticky-top">
            <h3 class="mb-0" style="margin-left:10px">NeuroScan</h3>

            <div class="user-wrapper p-3 d-flex align-items-center justify-content-between sticky-top">
                <div class="admin-icon" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item admin-name-circle">
                            <a class="nav-link admin-name second-text fw-bold" href="settings.php" id="navbarDropdown"
                                role="button">
                                <i class="bi bi-person-circle me-2"></i><span id="admin_name"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="logout.php" class="logout btn btn-danger btn-sm">LOG OUT</a>
            </div>

        </div>

        <div class=" col-lg-2 bg-dark text-white  p-4 border-top border-4 border-light" id="dashboard-menu">
            <div class="bg-dark p-4">
                <h4>DOCTOR PANEL</h4>
            </div>
            <ul class="nav flex-column">
                <!-- <li class="nav-item ">
                    <a class="nav-link  text-white" aria-current="page" href="dashbord.php">Dashboard</a>
                </li> -->
                <li class="nav-item ">
                    <a class="nav-link  text-white" href="user-queries.php">Your All Appointments 
                        <?php
                     $data = mysqli_query($con, "SELECT COUNT(id) as count FROM user_queries");
                     $unReadMessages=($count = mysqli_fetch_assoc($data))?$count['count']:'0';
                     ?>
                        <span class="badge badge-secondary unread" id="unread"> <?php echo $unReadMessages?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <?php
                        // $Q_ordered_rooms = 'SELECT roomId FROM single_room';
                        // $Data_ordered_rooms = mysqli_query($con,$Q_ordered_rooms);
                        // $current_date = date('Y-m-d'); 
                        // $roomCount=0;
                        // while($room_ordered = $Data_ordered_rooms->fetch_assoc()){
                        //     $no = $room_ordered['roomId'];
                        //     $roomId = 'room_'.$no;
                        //     $users = mysqli_query($con,'SELECT * FROM '.$roomId.' WHERE checkOut>"'.$current_date.'"');
                        //     $roomCount+=mysqli_num_rows($users);
                        // }
                    ?>
                    <a class="nav-link text-white" href="addReport.php">Add a Report</a>
                </li>
            </ul>

        </div>

        <script>
        document.getElementById("admin_name").innerHTML = 'Dr. ' + '<?php echo $_SESSION['correct_name']?>';
        </script>
    </body>


    </html>