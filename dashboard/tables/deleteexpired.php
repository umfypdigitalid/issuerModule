<?php
$host = "localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host, $user, $passw, $db);
$date = date("Y-m-d");
$ic = $_POST['nric'];


if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());

} else {
    
        $sql = "UPDATE userapplication set isDeleted=true, applicationstatus='Unverified',expiredby='$date' where nric = $ic";
        $result = mysqli_query($conn, $sql);
        if($result==true){
            echo "Revoked successfully";
         
        }else{
            echo "query failed";
        }
    
    
   
}
?>