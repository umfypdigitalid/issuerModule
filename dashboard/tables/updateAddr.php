<?php 

$array = array("oncreated","fullname","nric","address","email","image","applicationstatus");
$contractAddr = ($_POST['contractAddr']);
$ic = ($_POST['ic']);
//echo json_encode($direction);

//$date = date("Y-m-d");
//$oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"));

$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);


if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
  
}else{
    $sql = "UPDATE userapplication set image = $contractAddr where nric=$ic limit 1";  
    $result = mysqli_query($conn, $sql);
    if(($result)==true){
       echo "Contract address successfully added";
    }
  
    else{     
        echo "Operation fail";
        exit();
    }       
}
