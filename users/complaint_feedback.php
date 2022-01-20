<?php

//if(isset($_POST['email']) and isset($_POST['fullname']) && isset($_POST['comment'])&& isset($_POST['type'])){
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $comment = $_POST['comments'];
    $type = $_POST['type'];

    $email2 = str_replace('"',"",$email);
 
//}
use PHPMailer\PHPMailer\PHPMailer;
require_once "../PHPMailer/PHPMailer/src/PHPMailer.php";
require_once "../PHPMailer/PHPMailer/src/SMTP.php";
require_once "../PHPMailer/PHPMailer/src/Exception.php";

//require '../vendor/autoload.php';
$mail = new PHPMailer(true);

$host ="localhost";
$user = "root";
$passw = "";
$db = "digitalid";
$conn = new mysqli($host,$user,$passw,$db);

if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

}else{
    
    $sql = "INSERT INTO feedback (type,email,fullname,comment) VALUES ($type,$email, $fullname,$comment)";

    $result = mysqli_query($conn, $sql);
if(($result)==true){
    
    /*$sql2 = "select feedbackID from feedback where email = '$email'";
    $result2 = mysqli_query($conn, $sql2);
  
    while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
        echo $row;
    }*/
    $last_id = $conn->insert_id;
    echo $last_id;
    echo "\nSubmitted successfully\n";

    //PHPMAILER
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fypdigitalid@gmail.com';                     //SMTP username
        $mail->Password   = 'digitalid';                               //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = "ssl";

        //Recipients
        $mail->setFrom('fypdigitalid@gmail.com');
        $mail->addAddress($email2,$fullname);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Complaint/Feedback ID:';
        $mail->Body    = "Thank you for submitting your feedbacks.<br> Your unique ID is: <b>$last_id</b> <br> Please use this to view your complaint status.";

        $mail->send();
        echo "\n";
        echo "Email has been sent.";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    exit();
}
else{
    echo "Failed.";
    exit();
}   
   
}

?>