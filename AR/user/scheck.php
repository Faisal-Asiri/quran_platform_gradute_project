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
      <h1> حلقات التحفيظ
</h1>
  </div>
</header>
<form method="POST">
<?php

$sql="SELECT *
       
FROM   sessionenr  WHERE
username='$user' AND surl='$ID' GROUP BY id 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo"انت منظم مسبقا";
echo "<a href=hlqa.php?ID=$ID>دخول للحلقة</a>";

}}else{

echo "<input type=submit name=enrol value='اكد انضمامك''>";

}
     


?>
</form>
<?php
if (isset($_POST["enrol"])) {
  $username = mysqli_real_escape_string($connection, $user);
$surl = mysqli_real_escape_string($connection,$ID);

$endate= date_default_timezone_set("Asia/Riyadh");
  $endate=date('Y-m-d H:i:s');
  $entime= date_default_timezone_set("Asia/Riyadh");
  $entime=date("h:i:sa");
$sql = "INSERT INTO `sessionenr` (username,surl,endate,entime) VALUES ('$username','$surl',
'$endate','$entime')";
    $result = mysqli_query($connection, $sql);
    if($result){




        echo "تم الحفظ";
        echo "<img src=../../images/loading.gif height=90px>";
      echo'<meta http-equiv="refresh" content="3">';}}

?>


<?php

 }} else {
   ?>
   
   <?php
@include"login.php";
 }?>