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

$sql="SELECT DISTINCT S.sura_name_ar,S.sura_no,A.surl,A.surano,A.a_from,A.a_to,A.a_date,A.a_time
       
FROM   assignments A, sour S  WHERE
A.a_code='$ID' AND S.sura_no=A.surano GROUP BY A.a_time 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

  echo "سمع  واجب سورة:".$row["sura_name_ar"]." ";

  echo "من صفحة " .$row["a_from"]."";

   echo "الى".$row["a_to"]."";
   


}}else{}
     


?>
</h1></div></header><body>
	
	<form method="POST">

		<input type="submit" name="addrecorde" value="ابدأ التسميع">
	</form>
</body>

<?php 
if (isset($_POST["addrecorde"])) {

 include 'sessionrec.html';
 
    $b_code = mysqli_real_escape_string($connection, $ID);
    $b_username = mysqli_real_escape_string($connection, $user);

$as_date= date_default_timezone_set("Asia/Riyadh");
  $as_date=date('Y-m-d H:i:s');
  $as_time= date_default_timezone_set("Asia/Riyadh");
  $as_time=date("h:i:sa");
$_SESSION['b_code'] = $b_code;

$_SESSION['as_date'] = $as_date;
$_SESSION['as_time'] = $as_time; 

}
	?>

<?php

 }} else {
   ?>
   
   <?php
@include"login.php";
 }?>