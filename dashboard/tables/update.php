<?php 

$array = array("oncreated","fullname","nric","address","email","image","applicationstatus");
$ic = ($_POST['ic']);
//echo json_encode($direction);
$status = $_POST['status'];
$userid = $_POST['userid'];
$date = date("Y-m-d");
$oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"));
var_dump($ic);
var_dump($status);
var_dump($date);
var_dump($oneYearOn);
var_dump($userid);
$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);

/*
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
  
}else{
    $sql = "UPDATE userapplication set applicationstatus='$status',approvedby='$date',expiredby='$oneYearOn' where nric=$ic limit 1";  
    $result = mysqli_query($conn, $sql);
    if(($result)==true){
        if($status=="Verified"){
            echo "Successfully verified";
            exit();
        }
        else{
            echo "Rejected successfully";
            exit();
        }
    }
  
    else{     
        echo "Operation fail";
        exit();
    }       
}*/

if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
  
}else{
    
    if($status == "Verified"){
        $sqlloop = "SELECT * from userapplication where nric = $ic AND applicationstatus = 'verified' ";
        $resultloop = mysqli_query($conn, $sqlloop);
        $count = mysqli_num_rows($resultloop);
        if($count == 0 ){
            echo "No duplicate.";
            $sql = "UPDATE userapplication set applicationstatus='$status',approvedby='$date',expiredby='$oneYearOn' where nric=$ic limit 1";  
            $result = mysqli_query($conn, $sql);
            if(($result)==true){         
                    echo "Successfully verified";
                    exit();             
            }  
            else{     
                echo "Operation fail";
                exit();
            }

        }else{
            echo "Duplicate verified IC exist";
            $sql2 = "UPDATE userapplication set applicationstatus='duplicated',approvedby='$date',expiredby='$date' where userID=$userid limit 1"; 
            $result2 = mysqli_query($conn, $sql2);
            if(($result2)==true){         
                    echo "Successfully remove due to duplication";
                    exit();             
            }  
            else{     
                echo "Operation fail";
                exit();
            } 


        }
    }else{
        $sql = "UPDATE userapplication set applicationstatus='$status',approvedby='$date',expiredby='$date' where nric=$ic limit 1";  
        $result = mysqli_query($conn, $sql);
        if(($result)==true){
            echo "Rejected successfully";
            exit();
            
        }  
        else{     
            echo "Operation fail";
            exit();
        }
    }

       

}   
?>