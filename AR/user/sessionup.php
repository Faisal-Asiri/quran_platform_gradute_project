<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
 
 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<?php

require("../../config/db.php");
require("../../config/connect.php");
@include 'user.php';
$ID = $_GET["ID"];
print_r($_FILES,$_POST); //this will print out the received name, temp name, type, size, etc.


$size = $_FILES['audio_data']['size']; //the size in bytes
$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
$output ="uploadssess/".$_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea


 $b_code=$_SESSION['b_code'];

$as_date=$_SESSION['as_date'];
$as_time=$_SESSION['as_time'];


$sql = "INSERT INTO `assignments_answers` (b_username,b_code,audio,as_date,as_time,mark) VALUES ('$user','$b_code', '$output','$as_date','$as_time','0')";
    $result = mysqli_query($connection, $sql);
    if($result){
       
        $smsg = "<div class='smsg'>دخول ناجح</div>";
        echo'<a href=mem.php>حفظط الحالي</a>';

    }else{$fmsg = "<div class='fmsg fmg'>بيانات غير صحيحة تاكد من  اسم المستخدم وكلمة المرور</div>";}
                           





//move the file from temp name to local folder using $output name
move_uploaded_file($input, $output)
?>
<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>