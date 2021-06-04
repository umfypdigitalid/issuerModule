<?php

$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email =$_POST['email'];
$department = $_POST['department'];
$phonenum = $_POST['phonenum'];
$hash_password = password_hash($password, PASSWORD_DEFAULT);

$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);

$ok = true;
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    $ok = false;
}else{
    
    $sql = "INSERT INTO staff (username,password,email,fullname,phonenum,departmentID) VALUES ('".$username."', '".$hash_password."', '".$email."','".$fullname."','".$phonenum."','".$department."')";

$result = mysqli_query($conn, $sql);

if(($result)==true){
    echo "Submitted successfully;";
    exit();
}
else{
    echo "Failed.";
    exit();
}    
}

?>