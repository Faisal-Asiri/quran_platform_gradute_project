<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html >
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">


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
<div class="example">




<center>
	<div class="container">
<body>
<?php  



$sql="select * from memories where username = '".$_SESSION['username']."' ORDER BY id DESC
LIMIT 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {echo "Your current progress <table><tr>";

while($row = $result->fetch_assoc()) {
echo "<tr><th>Surah/Chapter Name</th><th>Verse No</th><th>Page No</th><th>Follow your progress</th></tr><tr>";

echo "<td>".$row["sura_name_ar"]."";
echo"".$row["sura_name_en"]."</td>";
echo "<td>".$row["aya_no"]."</td>";
echo "<td>".$row["page"]."</td>";
echo "<td><a href='chapter.php?ID=";
echo "".$row["sura_no"]."'";
echo ">click here</a></td></tr>";

echo "</table>";




}}else{echo "You have not saved your progress - click on the verse number to save";
}




?>	


<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">profile</a></li>
    <li><a href="#tab2" data-toggle="tab">Display Preferences</a></li>
    <li><a href="#tab3" data-toggle="tab">Reading preferences</a></li>
    <li><a href="#tab4" data-toggle="tab">Edit reading preferences</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
<h1>profile </h1>




	<img src="../../images/user.jpg" height="150px" id="avatars">
<form method="POST">
<?php
$sql="SELECT * 
       
FROM  login L,userinfo U  WHERE
U.username='$user'  GROUP BY U.id  
;";
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 echo"Your Name :".$row["fullname"]."<br>";
		 echo" UserName : $user<br>";
		 echo"Email :".$row["email"]."<br>";

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
      

<h1>Display Preferences</h1>
<div id="displaymood">
<form method="POST">
	<button name="dark" value="dark" id="dark"><img src="../../images/dark.png" height="50px"></button>
	<button name="light" value="light" id="light"><img src="../../images/light.png" height="50px"></button>
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
			if($row['displaymood']=="dark"){echo"Dark";}
			if($row['displaymood']=="light"){echo "light";}
		}}else{echo "افتراضي فاتح";}

 ?>
</div>
<br>
</div>

<div class="tab-pane" id="tab3">
<h1>Reading preferences</h1>
<div id="options">

<?php



	

	$sql = "SELECT * FROM userpre U, recitation R WHERE U.username='$user' AND R.path=U.recitationpath"  ;
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "display style : ";
		if($row['displaytype']=="verses"){echo "Verses";}
		if($row['displaytype']=="page"){echo "Pages";}
		if($row['displaytype']=="chapter"){echo "Chapters";}
		if($row['displaytype']=="full"){echo "Full surah/Chapter";}
		echo"<br>";
		echo "recitation by ".$row["nameen"]."<br>";
		echo "repetitions of recitation:".$row["repno"]."<br>";
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
<h1>Edit reading preferences</h1>
<form method="POST">
	
	
	<label>display style</label>
<select name="display">
	<option value="verses">verses</option>
	<option value="page">pages</option>
	<option value="chapter">chapter</option>
	<option value="full">Full surah/Chapter</option>
</select><br>
<label>Your favorite recitation</label>
<?php

$sql = "SELECT * FROM `recitation`";
	$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<select name=recitation>";
while($row = $result->fetch_assoc()) {



 echo"<option value=" .$row["path"].">";
	echo"".$row["nameen"]."</option>";

} echo"</select>";}
	
	else{

		$fmsg = "<div class='fmsg fmg'>دخول فاشل تاكد من اسم المستخدم او كلمة المرور</div>";

		
	}


	?>
</SELECT>
<label>Repetition</label>
<select name="repno">
	
<?php
for ($i = 1; $i <= 100; $i++) {
	echo"<option>";
    echo $i;
    echo"</option>";
}
?>

</select> <p>without repetition? Let the value = 1</p>
<input type="submit" name="submit" value="save">
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