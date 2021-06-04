<?php 

$array = array("oncreated","fullname","nric","address","email","image","applicationstatus");
$ic = ($_POST['ic']);
//echo json_encode($direction);
$status = $_POST['status'];
$date = date("Y-m-d");
$oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
var_dump($ic);
var_dump($status);
var_dump($date);
var_dump($oneYearOn);

$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);


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
    
}