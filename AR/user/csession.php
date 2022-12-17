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
      <h1> انشئ حلقة تحفيظ
</h1>
  </div>
</header>
<div class="example">

<form method="POST">
	 <?php $rand = rand(1111111111,9999999999);?>
	 <input type="text" name="ses" placeholder="اسم الحلقة"><br>
	 <textarea name="des" placeholder="وصف الحلقة"></textarea><br>
	 

	 
<select name="stype" >	<option disabled selected value>اختر نوع الحلقة  </option>
	<option value="1">عامة</option>
	<option value="2">خاصة</option>
	<option value="3">موثقة</option></select><br>
	<input type="text" name="surl" value="<?php echo($rand);?>" hidden>
	<input type="submit" name="cs" value="انشاء الحلقة">
</form>
	<?php

if (isset($_POST["cs"])) {
	$username = mysqli_real_escape_string($connection, $user);
$ses = mysqli_real_escape_string($connection, $_POST['ses']);
$des = mysqli_real_escape_string($connection, $_POST['des']);

$stype = mysqli_real_escape_string($connection, $_POST['stype']);

$surl = md5($_POST['surl']);
$sdate= date_default_timezone_set("Asia/Riyadh");
  $sdate=date('Y-m-d H:i:s');
  $stime= date_default_timezone_set("Asia/Riyadh");
  $stime=date("h:i:sa");
$sql = "INSERT INTO `msessions` (username,ses,des,stype,surl,sdate,stime) VALUES ('$username','$ses', '$des', '$stype','$surl',
'$sdate','$stime')";
    $result = mysqli_query($connection, $sql);
    if($result){




        echo "تم الحفظ";
        $sql = "INSERT INTO `sessionenr` (admin,username,surl,endate,entime) VALUES ('$username','$username','$surl',
'$sdate','$stime')";$result = mysqli_query($connection, $sql);
    if($result){echo "تم تعيينك مسؤلا عن هذه الحلقة تلقائيا";}else{echo "حدثت مشكلة اثناء محاولة اضافتك  كمسؤول لهذه الحلقة";}
        echo'<meta http-equiv="refresh" content="5">';
    }else{
        echo "error";
    }
}



	?>









<center>
	<div class="container">
<body>

<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>