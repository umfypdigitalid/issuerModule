<?php


$username = $_GET['username'];


$password = $_GET['password'];
$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);


if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    $ok = false;
}else{
    $sql = "select username from staff where username = '".$username."'  limit 1";

    $result = mysqli_query($conn, $sql);  
    $count = mysqli_num_rows($result);

    if(($count)==1){
        //$row = mysqli_fetch_assoc($result);
        //$hash = $row['password'];
        
        $sql2 = "SELECT password from staff where username =  '".$username."' limit 1";
        $result2 = mysqli_query($conn, $sql2);  
        $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $hash = $row['password'];
   
        if(password_verify($password,$hash)){
                echo "You have Successfully Logged in!";
                $url = "/issuerMod/dashboard/dashboard.php?username=".$username;
                //header("Location:/issuerMod/dashboard/dashboard.php");
                header("Location:".$url);
            exit();
            }
            else{
                echo "Incorrect Password.";
               header('Location:login2.html');
            }
    }
        else{
            echo "Incorrect Password/Username.";
            header('Location:login2.html');
            exit();
        }    
    }

?>