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
    $sql2 = "update feedback r 
    inner join userapplication u on r.email=u.email
    set r.userID = u.userID";
    $result2 = mysqli_query($conn, $sql2);


    $sql = "select * from feedback where status=false and type ='Complaint' ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    echo json_encode($data);

    if (!empty($_POST['feedback'])){
        $feedbackid= $_POST['feedbackid'];
        $reply = ($_POST['feedback']);
        $sql3 = "UPDATE feedback set reply=$reply,status=true where feedbackid=$feedbackid ";
        $result3 = mysqli_query($conn, $sql3);
       if($result3==true){
            echo $sql3;
       }
       else{
            echo "failed";
        }

    }
    
    
}
?>