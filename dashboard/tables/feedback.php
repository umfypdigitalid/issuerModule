<?php
$host = "localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host, $user, $passw, $db);
$date = date("Y-m-d");

if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    $ok = false;
} else {

    $sql = "select * from feedback where type ='Feedback' ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    echo json_encode($data);



    
    
    
}
?>
