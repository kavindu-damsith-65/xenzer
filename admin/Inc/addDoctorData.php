<?php


require('db_config.php');
session_start();
if ($_POST['enterData']=='register'){
    $sql="INSERT INTO `user_queries`(`name`, `email`, `contact`, `dr_password`)  
    VALUES (?,?,?,?)";
    $user=filteration($_POST['user']);
    $values=[$user['uName'],$user['uEmail'],$user['uPhone'],$user['uPassword']];
    enterData ($sql,$values,"ssis",$user);
   
}



function enterData($sql,$values,$datatypes,$user){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
    
          echo"succeed";
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Update");
        }
    }
    else{
        die("Query cannot be executed - Update");
    }
}