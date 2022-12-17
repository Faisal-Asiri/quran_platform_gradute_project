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


</head>
<header class="opener">
  <div class="wrapper">
      <h1> تقييم واجبات حلقتك 
</h1>
  </div>
</header>
<body>
  <form method="POST">
  <?php

$sql="SELECT DISTINCT A.a_code,S.sura_name_ar,M.b_code,M.b_username,M.mark,A.a_from,A.a_to,M.b_id,M.audio
       
FROM   sour S,assignments A,assignments_answers M  WHERE
A.admin='$user' AND S.sura_no=A.surano AND M.mark='0'
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  $code=$row["a_code"];
if($row['b_code']=="$code"){
  echo "معرف الواجب ".$row['b_code']."-".$row['sura_name_ar']."-ارسلها : ".$row['b_username']."<br>";
   echo "-من صفحة :".$row['a_from']."- الى : ".$row['a_to']."<br>";
   echo "<input type=text hidden name=id value=";
   echo "".$row['b_id'].">";
  if($row['mark']=="0"){
  echo "بحاجة الى تقييم";
  echo "<br>";
  echo"<audio controls>";
      echo "<source src='".$row["audio"]."'";
      echo' type="audio/mpeg">
  Your browser does not support the audio element.
</audio><br>';


 echo "حدث التقييم: <select name=mark><option value=0>سأقيم لاحقا -سيبقى الواجب غير مقيم</option><option value=1>اعد تسجيل الواجب</option><option value=2>احسنت</option></select>"; echo"<input type=submit name=upd value='حدث'>";   echo "<br>";echo "<br>";


 

}}

}}echo "لا يوجد واجبات تحتاج الى تقييم";
     


?>
</form>
<?php

if (isset($_POST["upd"])) {
  
  $b_id = mysqli_real_escape_string($connection, $_POST['id']);
    $mark = mysqli_real_escape_string($connection, $_POST['mark']);
    
  
  

  $sql = "UPDATE  `assignments_answers` SET mark='$mark' where b_id='$b_id'";
  $result = mysqli_query($connection, $sql); 
  if($result){
   echo "تم تحديث  اللتقيمم ";
    echo'<meta http-equiv="refresh" content="1">';
  }else{
    echo "فشل التحديث";
  }
}

?>

</body></html>
<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>