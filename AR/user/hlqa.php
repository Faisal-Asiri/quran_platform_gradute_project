<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="rtl">
<head>
  <title>منصة تحفيظ القران الكريم اون لاين - الملف الشخصي</title>
      <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        

                    


<meta name="description" content="CDN Bootstrap">
       
        <script src="../../style/bootstrap.min.js"></script>

<script src="../../style/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../../style/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../../style/bootstrap2.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  
<?php

echo "<center>";
@include 'user.php';
require("../../config/db.php");
require("../../config/connect.php");

?>
<?php 
$sql = "SELECT * FROM stylemood WHERE username='$user' ORDER BY ID DESC LIMIT 1"  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row['displaymood']=="dark"){echo'<link rel="stylesheet" type="text/css" href="dark.css">';
@include 'navbardark.php';



    }if($row['displaymood']=="light"){echo'<link rel="stylesheet" type="text/css" href="style.css">';
@include 'navbar.php';
}
      
    }}else{echo'<link rel="stylesheet" type="text/css" href="style.css">';
@include 'navbar.php';
}

 ?>

<?php
if(isset($_GET['ID'])){
require("../../config/db.php");
require("../../config/connect.php");
$ID = $_GET["ID"];

?>  
</head>
<header class="opener">
  <div class="wrapper">
      <h1><?php

$sql="SELECT *
       
FROM   sessionenr S,msessions M  WHERE
S.username='$user' AND S.surl='$ID' AND M.surl='$ID' GROUP BY S.id 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  echo "".$row["ses"]."";

}}else{echo "انت غير منضم لهذه الحلقة اضغط التالي للاستمرار";}
     


?>
</h1>
  </div>
</header>
<?php

$sql="SELECT *
       
FROM   sessionenr R, sour S  WHERE
R.surl='$ID' GROUP BY R.id 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
if($row['admin']=="$user"){
  echo "انت مدير هذه الحلقة";

  echo "<br>";
  
}

}}else{echo "انت غير منضم لهذه الحلقة اضغط التالي للاستمرار";}
     


?>
<form method="POST">
  <?php $rand2 = rand(1111111111,9999999999); ?>
  <input type="text" name="invitecode" value="<?php echo($rand2);?>" hidden>
<?php

$sql="SELECT *
       
FROM   sessionenr R, invite I,msessions M  WHERE
R.surl='$ID' AND R.admin='$user' AND R.admin=I.admin AND R.surl=I.surl AND M.stype='2' GROUP BY I.id 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

  echo "كود الدعوة: ".$row["invitecode"]."";


  
}

}else{ echo "<input type=submit name=invite value='انشئ  كود دعوة'>  ";}
     


?>


  </form>
<?php
if (isset($_POST["invite"])) {
  $admin = mysqli_real_escape_string($connection, $user);
  $username = mysqli_real_escape_string($connection, $user);
$surl = mysqli_real_escape_string($connection, $ID);


$invitecode = md5($_POST['invitecode']);

$sql = "INSERT INTO `invite` (admin,username,surl,invitecode) VALUES ('$admin','$username', '$surl', '$invitecode')";
    $result = mysqli_query($connection, $sql);
    if($result){




        echo "تم الحفظ";
}}?>

<?php

$sql="SELECT *
       
FROM   sessionenr  WHERE 
 surl='$ID' order by rand()
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<br>المنضمين:<br>";
while($row = $result->fetch_assoc()) {

  
  echo "".$row["username"]."-";


}}else{}
     


?>
<form method="POST">
<?php

$sql="SELECT DISTINCT S.sura_name_ar,S.sura_no,R.surl,R.admin
       
FROM   sessionenr R, sour S  WHERE
R.surl='$ID' AND R.admin='$user' GROUP BY S.id 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<a href=correct.php>قيم الواجبات المرسلة</a>";
echo "<br>اضف مهمة حفظ جديدة";
echo "<select name='sura'>";
while($row = $result->fetch_assoc()) {
  
echo "<option value=".$row["sura_no"].">".$row["sura_name_ar"]."</option>";


  


}echo "</select>";echo "<input type=submit name='assign' value='اختر السورة'>";}else{}
     


?>
</form>
<form method="POST">

<?php
if (isset($_POST["assign"])) {
$sura = mysqli_real_escape_string($connection, $_POST['sura']);
$_SESSION['sura'] = $sura;
 $rand = rand(1111111111,9999999999);
$sql="SELECT DISTINCT page
       
FROM   sour WHERE
sura_no='$sura'  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "اختر الصفحات <br>";
  echo"من";
echo "<select name=from>";
while($row = $result->fetch_assoc()) {
     


echo"<option>";
echo"".$row["page"]."";
echo"</option>";

        


      

    echo"ok";

    }echo "</select>";}

?>
<?php

$sura = mysqli_real_escape_string($connection, $_POST['sura']);
$_SESSION['sura'] = $sura;


$sql="SELECT DISTINCT page
       
FROM   sour WHERE
sura_no='$sura'  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "الى";
echo "<select name=to>";
while($row = $result->fetch_assoc()) {
     


echo"<option>";
echo"".$row["page"]."";
echo"</option>";

        


      

    echo"ok";

    }echo "</select>";echo "<input type=text name=a_code hidden value=";echo($rand);echo ">";echo "<input type=submit name=addA value='اضف مهمة حفظ '>";}}else{};

?>



</form>
<?php
if (isset($_POST["addA"])) {
$sura2= $_SESSION['sura'] ;
$admin = mysqli_real_escape_string($connection, $user);
$surano = mysqli_real_escape_string($connection, $sura2);
$surl = mysqli_real_escape_string($connection, $ID);
$from = mysqli_real_escape_string($connection, $_POST['from']);
$to = mysqli_real_escape_string($connection, $_POST['to']);
$a_code = mysqli_real_escape_string($connection, $_POST['a_code']);
$a_date=date('Y-m-d H:i:s');
  $a_time= date_default_timezone_set("Asia/Riyadh");
  $a_time=date("h:i:sa");
$sql = "INSERT INTO `assignments` (surl,admin,a_code,surano,a_from,a_to,a_date,a_time) VALUES ('$surl','$admin', '$a_code','$surano', '$from','$to','
$a_date','$a_time')";
    $result = mysqli_query($connection, $sql);
    if($result){
        echo "تم الحفظ";
        echo'<meta http-equiv="refresh" content="1">';

    }else{echo "error";}}

?>
<?php

$sql="SELECT  *
       
FROM   assignments A, sour S ,assignments_answers B WHERE
A.surl='$ID'  AND B.b_username ='$user' AND B.b_code=A.a_code AND S.sura_no=A.surano GROUP BY A.a_time 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo'<div class="card text-center">
  <div class="card-header">';
echo "الواجبات المحلولة :<br>";

while($row = $result->fetch_assoc()) {
$code=$row["a_code"];
if($row['b_code']=="$code"){
echo "سورة: ".$row["sura_name_ar"]." ";
echo "من صفحة :  ".$row["a_from"]."الى  ".$row["a_from"]."";
echo"<audio controls>";
      echo "<source src='".$row["audio"]."'";
      echo' type="audio/mpeg">
  Your browser does not support the audio element.
</audio><br>';
echo "حالة الواجب:";
if($row['mark']=="0"){
  echo "بحاجة الى تقييم";
  echo "<br>";
  echo "===========<br>";echo "<br>";

}
if($row['mark']=="1"){
  echo "اعد ارسال الواجب";
  echo "<br>";
  echo "===========<br>";echo "<br>";

}
if($row['mark']=="2"){
  echo "احسنت";
  echo "<br>";
  echo "===========<br>";echo "<br>";

}
}



  


}echo "</div></div><br>";}else{}
     


?>
<?php

$sql="SELECT  *
       
FROM   assignments A, sour S WHERE
A.surl='$ID'  AND S.sura_no=A.surano GROUP BY A.a_time 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
$code=$row["a_code"];
  echo'<div class="card text-center">
  <div class="card-header">
    واجب مضاف
  </div>
  <div class="card-body">
    <h5 class="card-title">
    ';
    echo "سورة:".$row["sura_name_ar"]."";
    echo'</h5>
    <p class="card-text">
    ';
    echo "من صفحة :".$row["a_from"]."الى".$row["a_to"]."";
    
    echo'</p>

    <a href="assignments.php?ID=';
echo "".$row["a_code"]."";
    echo'" class="btn btn-primary">سمع</a>
  </div>
  <div class="card-footer text-muted">
   ';
   echo "".$row["a_date"]."-".$row["a_time"]."";
   echo'
  </div>
</div><br>';



  


}}else{}
     


?>
<?php

 }} else {
   ?>
   
   <?php
@include"login.php";
 }?>