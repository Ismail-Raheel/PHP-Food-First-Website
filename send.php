<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'ismailraheel906@gmail.com'; // Your email address
    $mail->Password = 'shidexozmufflmay'; // Your gmail app password
    $mail->SMTPSecure = 'ssl'; // Encryption (ssl or tls)
    $mail->Port = 465; // for ssl
    // $mail->Port = 587; // for tls

    //Recipients
    $mail->setFrom('ismailraheel906@gmail.com', $_POST["firstname"]);
    $mail->addAddress('ismailraheel906@gmail.com');
    
    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $_POST["number"];
    $mail->Body = $_POST["message"] . $_POST["email"];

    $mail->send();
    echo '
    <script>
    alert("Email Sent Successfully");
    document.location.href = "Contact.php"
    </script>
    ';


}

?>