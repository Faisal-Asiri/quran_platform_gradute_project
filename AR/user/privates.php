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
      <h1> حلقات التحفيظ
</h1>
  </div>
</header>

<a href="#"><button disabled>انشاء حلقة تحفيظ جديدة</button></a>
<a href="sessions.php"><button>الحلقات العامة</button></a><br>
<form method="POST">
<input type="text" name="invitecode" placeholder="ادخل كود الدعوة" ><input type="submit" name="chinvite" value="تحقق من كود الدعوة"></form><br>

<?php
if (isset($_POST["chinvite"])) {
$invitecode= mysqli_real_escape_string($connection, $_POST['invitecode']);



$sql="SELECT *
       
FROM  invite I,msessions M  WHERE
I.invitecode='$invitecode' AND I.surl=M.surl AND M.stype='2' GROUP BY I.id 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
echo'<a href=';
 echo "scheck.php?ID=".$row["surl"].">".$row["ses"]."";
}}else{echo "الكود غير صحيح";}}
     
?>

<?php

$sql="SELECT *
       
FROM   msessions M,sessionenr S WHERE M.stype=2 AND M.surl=S.surl AND S.username='$user'
   
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  


?>
<div class="example">

	<div class="container">
    <body>
      


<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../../images/qursns.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo "".$row["ses"].""; ?></h5>
    <p class="card-text"><?php echo "".$row["des"].""; ?>
     
        
    </p>
    <a href='<?php echo "scheck.php?ID=".$row["surl"]."";?>' class="btn btn-primary">انضم الان</a>
 

  

 </div>
</div>  </body>
  <?php
}}else{echo "انت غير منظم في اي حلقة خاصة";}

?>



<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>