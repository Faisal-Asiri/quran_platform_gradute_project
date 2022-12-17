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
$output ="uploads/".$_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea


 $sura_no=$_SESSION['sura_no'];
$sura_name_ar=$_SESSION['sura_name_ar'];
$sura_name_en=$_SESSION['sura_name_en'];
$from=$_SESSION['p_from'];
$to=$_SESSION['p_to'];
$mdate=$_SESSION['mdate'];
$mtime=$_SESSION['mtime'];
if (isset($_SESSION['mbr1'])) {
 
   $mbr1=$_SESSION['mbr1'];
  
  $amember = mysqli_real_escape_string($connection, $mbr1); 

}

if (isset($_SESSION['mbr2'])) {
  
   $mbr2=$_SESSION['mbr2'];
$amember = mysqli_real_escape_string($connection, $mbr2); 

}
if (isset($_SESSION['mbr3'])) {
 
   $mbr3=$_SESSION['mbr3'];
  $amember = mysqli_real_escape_string($connection, $mbr3); 

}
if (isset($_SESSION['mbr4'])) {
  
   $mbr4=$_SESSION['mbr4'];
 $amember = mysqli_real_escape_string($connection, $mbr4); 

   
}

$sql = "INSERT INTO `audiorec` (username,amember,sura_no,sura_name_en,sura_name_ar,p_from,p_to,audio,mdate,mtime) VALUES ('$user','$amember', '$sura_no','$sura_name_en', '$sura_name_ar','$from','$to','$output','$mdate','$mtime')";
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