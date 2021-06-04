<?php

$email = $_POST['email'];
$reason = $_POST['reason'];


$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);

if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

}else{
    
    $sql = "INSERT INTO report (email,reason,status) VALUES ($email, $reason,'Pending')";
    $result = mysqli_query($conn, $sql);
if(($result)==true){
    echo "Submitted successfully;";
    $sql2 = "update report r 
    inner join userapplication u on r.email=u.email
    set r.userID = u.userID";
    $result2 = mysqli_query($conn, $sql2);
    echo("updated userID");
    exit();
}
else{
    echo "Failed.";
    exit();
}   
   
}

?>