<?php

/*$host ="localhost";
$user = "root";
$password = "";
$db = "digitalid";

mysql_connect($host,$user,$password,$db);
mysql_select_db($db);*/

$conn = new mysqli('localhost','root','','digitalid');
if($conn->connect_error){
    die('connection fail: '.$conn->connect_error);
}else{
    echo("working");
}


if(isset($_POST['username'])){
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from staff where username = '".$uname."'AND password = '".$password."'
    limit 1 ";

    $result = mysql_query($sql);

    if(mysql_num_rows($result)==1){
        echo "You have Successfully Logged in!";
        exit();
    }
    else{
        echo "Incorrect Password/Username.";
        exit();
    }    
}
?>