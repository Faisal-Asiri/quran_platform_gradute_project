<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        

                    


<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	
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
      <h1> الملف الشخصي وتفضيلات المستخدم
</h1>
  </div>
</header>
<div class="example">




<center>
	<div class="container">
<body>
<?php  



$sql="select * from memories where username = '".$_SESSION['username']."' ORDER BY id DESC
LIMIT 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {echo "تقدمك الحالي <table><tr>";

while($row = $result->fetch_assoc()) {
echo "<tr><th>اسم السورة</th><th>رقم الآية</th><th>تابع تقدمك</th></tr><tr>";

echo "<td>".$row["sura_name_ar"]."</td>";
echo "<td>".$row["aya_no"]."</td>";
echo "<td><a href='chapter.php?ID=";
echo "".$row["sura_no"]."'";
echo ">انتقل للسورة</a></td></tr>";

echo "</table>";




}}else{echo "لم تقم بحفظ تقدمك - قم بالنقر على رقم اللآية للحفظ";
}




?>	


<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">ملفك الشخصي</a></li>
    <li><a href="#tab2" data-toggle="tab">تفضيلات العرض</a></li>
    <li><a href="#tab3" data-toggle="tab">تفضيلات القراءة</a></li>
    <li><a href="#tab4" data-toggle="tab">تعديل تفضيلات القراءة</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
<h1>ملفك الشخصي </h1>




	<img src="images/user.jpg" height="150px" id="avatars">
<form method="POST">
<?php
$sql="SELECT * 
       
FROM  login L,userinfo U  WHERE
U.username='$user'  GROUP BY U.id  
;";
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 echo"اسمك :".$row["fullname"]."<br>";
		 echo" اسم المستخدم : $user<br>";
		 echo"البريد الإلكتروني :".$row["email"]."<br>";

		}
	}else{ echo"<label>اسمك الكامل</label>"; echo"<input type=text name=fullname placeholder=fullname required>";  echo"<br>";
 echo"<input type=submit name=fullnamesubmit>";}


?>
</form>






<?php

if (isset($_POST["fullnamesubmit"])) {
	$username = $user;
	$fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
$sql = "INSERT INTO  `userinfo` (username, fullname) VALUES ('$username', '$fullname') ";
	$result = mysqli_query($connection, $sql); 
	if($result){
		echo "تم تسجيل اسمك بنجاح";
		echo'<meta http-equiv="refresh" content="1">';
	}}
?>
<br>
    </div>
    <div class="tab-pane" id="tab2">
      

<h1>تفضيلات العرض</h1>
<div id="displaymood">
<form method="POST">
	<button name="dark" value="dark" id="dark"><img src="images/dark.png" height="50px"></button>
	<button name="light" value="light" id="light"><img src="images/light.png" height="50px"></button>
</form>
<?php
$username = $user;
if (isset($_POST["dark"])) {
	
	$displaymood = mysqli_real_escape_string($connection, $_POST['dark']);
$sql = "INSERT INTO  `stylemood` (username, displaymood) VALUES ('$username', '$displaymood') ";
	$result = mysqli_query($connection, $sql); 
	if($result){
		echo "تم حفظ  تفضيلك";
		echo'<meta http-equiv="refresh" content="1">';
	}}
	if (isset($_POST["light"])) {
	
	$displaymood = mysqli_real_escape_string($connection, $_POST['light']);
$sql = "INSERT INTO  `stylemood` (username, displaymood) VALUES ('$username', '$displaymood') ";
	$result = mysqli_query($connection, $sql); 
	if($result){
		echo "تم حفظ  تفضيلك";
		echo'<meta http-equiv="refresh" content="1">';
	}}
?>
<?php 
$sql = "SELECT * FROM stylemood WHERE username='$user' ORDER BY ID DESC LIMIT 1"  ;
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($row['displaymood']=="dark"){echo"داكن";}
			if($row['displaymood']=="light"){echo "فاتح";}
		}}else{echo "افتراضي فاتح";}

 ?>
</div>
<br>
</div>

<div class="tab-pane" id="tab3">
<h1>تفضيلات القراءة</h1>
<div id="options">

<?php



	

	$sql = "SELECT * FROM userpre U, recitation R WHERE U.username='$user' AND R.path=U.recitationpath"  ;
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "اسلوب العرض : ";
		if($row['displaytype']=="verses"){echo "ايات";}
		if($row['displaytype']=="page"){echo "صفحات";}
		if($row['displaytype']=="chapter"){echo "اجزاء";}
		if($row['displaytype']=="full"){echo "عرض السورة بالكامل";}
		echo"<br>";
		echo "القارئ:".$row["namear"]."<br>";
		echo "تكرارات التلاوة:".$row["repno"]."<br>";
	}}else{


if (isset($_POST["submit"])) {
	$username = $user;
	$displaytype = mysqli_real_escape_string($connection, $_POST['display']);
		$recitationpath = mysqli_real_escape_string($connection, $_POST['recitation']);
		$repno = mysqli_real_escape_string($connection, $_POST['repno']);
	
	

	$sql = "INSERT INTO  `userpre` (username, displaytype, recitationpath,repno) VALUES ('$username', '$displaytype', '$recitationpath',$repno) ";
	$result = mysqli_query($connection, $sql); 
	if($result){
		echo "تم تسجيل حسابك بنجاح قم بتسجيل الدخول الان";
	}}else{}


	}?>
  </div>
</div>
<br>
<div class="tab-pane" id="tab4">
<h1>تعديل تفضيلات القراءة</h1>
<form method="POST">
	
	
	<label>اسلوب العرض</label>
<select name="display">
	<option value="verses">ايات</option>
	<option value="page">برقم الصفحة</option>
	<option value="chapter">برقم الجزء</option>
	<option value="full">عرض كامل السورة</option>
</select><br>
<label>قارئك المفضل</label>
<?php

$sql = "SELECT * FROM `recitation`";
	$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<select name=recitation>";
while($row = $result->fetch_assoc()) {



 echo"<option value=" .$row["path"].">";
	echo"".$row["namear"]."</option>";

} echo"</select>";}
	
	else{

		$fmsg = "<div class='fmsg fmg'>دخول فاشل تاكد من اسم المستخدم او كلمة المرور</div>";

		
	}


	?>
</SELECT>
<label>تكرار التلاوة</label>
<select name="repno">
	
<?php
for ($i = 1; $i <= 100; $i++) {
	echo"<option>";
    echo $i;
    echo"</option>";
}
?>

</select> <p>بدون تكرار؟ دع القيمة =1*</p>
<input type="submit" name="submit">
	</form>
<?php

if (isset($_POST["submit"])) {
	$username = $user;
	$displaytype = mysqli_real_escape_string($connection, $_POST['display']);
		$recitationpath = mysqli_real_escape_string($connection, $_POST['recitation']);
		$repno = mysqli_real_escape_string($connection, $_POST['repno']);
	
	

	$sql = "UPDATE  `userpre` SET displaytype='$displaytype', recitationpath='$recitationpath', repno='$repno'  where username='$user'";
	$result = mysqli_query($connection, $sql); 
	if($result){
		echo "تم تسجيل تفضيلاتك";
		echo'<meta http-equiv="refresh" content="1">';
	}else{
		echo "فشل تسجيل تسجيل تفضيلاتك";
	}
}

?>


</form>
</div>
</div>
</div>
</body>
</html>
<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>