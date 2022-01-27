<?php
$host = "localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host, $user, $passw, $db);

$email = $_GET['email'];
$type = $_GET['type'];

if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
   
} else {
  
  
        $sql = "SELECT reportID, email, reason, status,nric from `report` as r where r.email = $email";
        $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $data = array();

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $data[] = $row;
        }

        //prevent empty data table error invalid json response.
        echo json_encode($data);      
     
    
}
