<?php
 session_start();


 if (isset($_SESSION['adminusername'])) {
 ?>
<?php
 @include 'admin.php';
require("../config/db.php");
require("../config/connect.php");


?>


<?php

$sql="SELECT *
       
FROM   login       ORDER BY id ; 
  
;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
    $name=$row["username"];
    $email=$row["email"];





   
    $usermessage = "<html><body><center>
    
    <a href='https://quranmo.com'>
    <img src='https://quranmo.com/images/eid.png'><br>
    <img src='https://quranmo.com/images/qmo-logo-black.png'><br>
    
    <p>منصة الكتاب المبين </p><p>https://quranmo.com</p>
    </a>
    </body></html>
    ";
    
    $message ="". $name . "\r\n   " . $email . "\r\n " . $usermessage; 
    
    $subject ="  $name  عيد اضحى مبارك وكل عام وانت بخير";
    $fromname ="منصة الكتاب المبين";
    $fromemail = 'no-reply@quranmo.com';  //if u dont have an email create one on your cpanel

    $mailto = $email;  //the email which u want to recv this email

   
    $content = chunk_split(base64_encode($content));
    // a random hash will be necessary to send mixed content
   
    // carriage return type (RFC)
    $eol = "\r\n";
    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-type: text/html; charset=UTF-8 " . $eol;
    
    
    // message
    $body = "مرحبا:" . $separator . $eol;
    
   
    $body .= $message . $eol;
    // attachment
    
    
    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo "تم ارسال الاستدعاء شكرا ساتواصل معك في اقرب وقت"; // do what you want after sending the email
        
        
    } else {
        echo "فيه مشكله في الارسال دز امها الحين وبعدين نحل المشكله!";
        print_r( error_get_last() );
    }

}}else{echo "NO data";}
?>
<?php


 } else {
   ?>
   
   <?php
@include"login.php";
 }?>