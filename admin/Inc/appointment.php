<?php
require('db_config.php');
session_start();


function enterData2($sql,$values,$datatypes){

    $con = $GLOBALS['con'];
    $stmt = mysqli_prepare($con,$sql);
     mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    mysqli_stmt_execute($stmt);
         
    echo"succeed";
       
}

if(isset($_POST['selector'])){

    if($_POST['selector']=="addapontment"){
        $userId=$_SESSION['userId'];

        $sql="INSERT INTO `appointment`(`doctor_id`, `user_id`, `date`, `time`) 
        VALUES (?,?,?,?)";

        $app=filteration($_POST['data']);
        $values=[$app['doctorId'], $userId,$app['date'],$app['time']];

      
        update($sql,$values,"iiss");
        // enterData2($sql,$values,"iiss");
    }

    

    if($_POST['selector']=="updateappointment"){
        $userId=$_SESSION['userId'];
        $app=filteration($_POST['data']);
        $sql="UPDATE `appointment` SET `doctor_id`=?,`user_id`=?,`date`=?,`time`=? WHERE id=".$app['id'];
        
        $values=[$app['doctorId'], $userId,$app['date'],$app['time']];

        update($sql,$values,"iiss");
        
    }


    if($_POST['selector']=="deleteappintment"){
        
        $res=normalSelect("DELETE FROM `appointment` WHERE id=".$_POST['data']['deleteId']);
       
        if($res){
            
        }else{
            echo "error";
        }
    }



}
?>