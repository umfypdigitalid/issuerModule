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
    $sql2 = "update report r 
    inner join userapplication u on r.nric=u.nric
    set r.userID = u.userID";
    $result2 = mysqli_query($conn, $sql2);


    $sql = "select * from report r inner join userapplication u where r.userID = u.userID";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }

    //echo json_encode($data);
    //if empty datatable prevent error
    if(!empty($data)){
        echo json_encode($data);
    }else{
        echo json_encode(array('data'=>''));
    }
    
    if (!empty($_POST['revoke'])) {
        $data = json_decode($_POST['revoke'],true);
           //print_r($data);
        //echo $data['userID'];
        $userid = $data['userID'];
        $sql3 = "update userapplication set isDeleted=true, applicationstatus='Unverified',expiredby='$date ' where userID='$userid'";
        $result3 = mysqli_query($conn, $sql3);
        if($result3==true){
            echo "Revoked successfully";
            $sql4 = "delete from report where userID='$userid'";
            $result4 = mysqli_query($conn, $sql4);
            if($result4==true){
                echo "Delete from report";
            }
            else{
                echo "fail to delete report";
            }
        }
        else{
            echo "Query failed";
        }

    }

}
