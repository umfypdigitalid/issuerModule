<?php

$host ="localhost";
$host = "root";
$password = "";
$db = "demo";

mysql_connect($host,$user,$password);
mysql_select_db($db);

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