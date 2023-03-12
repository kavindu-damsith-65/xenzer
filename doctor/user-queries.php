<?php
    require('Inc/essentials.php');
    include_once 'Inc/db_config.php';
    drLogin();

    if(isset($_GET['seen'])){
        
        $frm_data = filteration($_GET);
        if($frm_data['seen']=='all'){
            $q_unread = 'SELECT * FROM appointment';
            $data_unread = mysqli_query($con,$q_unread);

            while($unread = $data_unread->fetch_assoc()){
                $id = $unread['id'];
                if($unread['seen'] == 0){
                    $que = "UPDATE user_queries SET seen=1 WHERE id='$id'";
                    $unread_all_update = mysqli_query($con,$que);
                    echo '<h2>Completed</h2>';
                    // alert('success','Marked as read all');
                }
            }
            redirect('user-queries.php');

        }
        else{
            $q = "UPDATE `appointment` SET `seen`=? WHERE `id`=?";
            $values = [1,$frm_data['seen']];

            if(update($q,$values,'ii')){
                alert('success','Marked as read');
            }
            else{
                alert('error','Operation Failed!');
            }
        }
    }

    if(isset($_GET['del'])){
        
        $frm_data = filteration($_GET);
        if($frm_data['del']=='all'){
            $q = "DELETE FROM `appointment`";
            
            
            if(mysqli_query($con,$q)){
                alert('success','All data deleted!');
                redirect('user-queries.php');
            }
            else{
                alert('error','Operation Failed');
            }
        }
        else{
            $values = [$frm_data['del']];
            $a = $values['0'];
            $q = "DELETE FROM appointment WHERE id='$a'";
            $del = mysqli_query($con,$q);
            

            if(!$del){
                alert('error','Operation Failed');               
            }
            else{
                alert('success','Data deleted!');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Doctor Details</title>

    <link rel="stylesheet" href="./CSS/Style.css">
    <?php
    require('Inc/links.php');
    ?>
</head>

<body class="bg-light">

    <?php
    require('Inc/header.php');
    ?>

    <div class="container-fluid" id="main-contain">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="mb-4">DOCTOR DETAILS</h4>

                <div class="class border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-ark all reasm"><i class="bi bi-trash3-fill"></i> Delete all</a>
                        </div>
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = "SELECT * FROM appointment";
                                        $data = mysqli_query($con, $q);
                                        $i=1;

                                        $q_user = "SELECT * FROM user_details";
                                        $user_data = mysqli_query($con, $q_user);

                                        while($row = mysqli_fetch_assoc($data)){
                                            $row2 = mysqli_fetch_assoc($user_data);
                                            $seen='';

                                            if($row['seen'] != 1){
                                                $seen = "<a href='?seen=$row[id]' class='btn btn-sm rounded-pill btn-primary'>Compelted</a>";
                                            }
                                           else{
                                            $seen="<a href='?missed=$row[id]' class='btn btn-sm rounded-pill btn-danger mt-2'>Missed</a>";
                                           }                                          

                                            echo"
                                                <tr>
                                                    <td>$i</td>
                                                    <td>$row[date]</td>
                                                    <td>$row[time]</td>
                                                    <td>$row2[userName]</td>
                                                    <td>$row2[phoneNumber]</td>
                                                    <td><span style='width:120px'>$seen</span></td>
                                                </tr>
                                            ";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>





        <?php require('Inc/script.php'); ?>

</body>

</html>