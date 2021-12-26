<?php
$host = "localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host, $user, $passw, $db);
$date = date("Y-m-d");
$ic = isset($_POST['nric']);

if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());

} else {
    $sql = "select * from userapplication where expiredby < "."'$date'". " and isDeleted = false and applicationstatus='Verified'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
        
    }
    if(!empty($data)){
        echo json_encode($data);
    }else{
        echo json_encode(array('data'=>''));
    }
 
    

    
}

//echo json_encode($data);
?>