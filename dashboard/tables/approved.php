<?php
$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);


if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    $ok = false;
}else{
    $sql = "select * from userapplication where applicationstatus ='Verified' ";

    $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
       $data[] = $row;
    }
    //echo json_encode($data);
    if(!empty($data)){
        echo json_encode($data);
    }else{
        echo json_encode(array('data'=>''));
    }

    }

?>