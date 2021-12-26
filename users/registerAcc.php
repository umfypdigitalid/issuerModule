<?php

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
//$homeaddress = $_POST['homeaddress'];
$birthdate = $_POST['birthdate'];
$createdon = date("Y-m-d");
$nric = $_POST['nric'];

$host = "localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host, $user, $passw, $db);

if(isset($_POST['homeaddress'])) {
    $homeaddress = $_POST['homeaddress'];
}

if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());

} else {

    $sql = "INSERT INTO userapplication (username,password,fullname,nric,birthdate,address,applicationstatus,email,createdon) VALUES ('".$username."', '".$password."',' ".$fullname."' , '".$nric."','".$birthdate."','".$homeaddress."', 'Verifying' , '".$email."','".$createdon."')";

    $result = mysqli_query($conn, $sql);

    if (($result) == true) {
        echo "Submitted successfully";
        exit();
    } else {
        echo "Failed.";
        exit();
    }
}
