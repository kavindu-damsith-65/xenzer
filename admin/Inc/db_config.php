<?php 
    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'xenzer3';

    $con = mysqli_connect($hname,$uname,$pass,$db);
   
    if(!$con){
        die("Cannot Connect to Database".mysqli_connect_error());
        
    }

    function filteration($data){
        foreach($data as $key => $value){
            $data[$key] = trim($value);
            $data[$key] = stripslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);

        }
        return $data;
    }

    function select($sql,$values,$datatypes){
        $con = $GLOBALS['con']; 
        $stmt = mysqli_prepare($con,$sql);
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            
           mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            

        
      
    }


    function update($sql,$values,$datatypes){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$sql)){
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
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


function normalSelect($query) {
        $con = $GLOBALS['con'];
        if ($con->connect_errno) {
            echo "Failed to connect to MySQL: " . $con->connect_error;
            exit();
        }
    
        $result = $con->query($query);
    
        if ($result) {
             return $result;
        } else {
            echo "Error executing query: " . $con->error;
        }
    
        $con->close();
    }
    