<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    
                        <script src="jquery-2.2.4.min.js"></script>
                    


<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<?php

echo "<center>";
@include 'user.php';
require("db.php");
require("connect.php");
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
if ($result->num_rows > 0) {echo "تقدمك الحالي <table><tr>";

while($row = $result->fetch_assoc()) {
echo "<tr><th>اسم السورة</th><th>رقم الآية</th><th>تابع تقدمك</th></tr><tr>";

echo "<td>".$row["sura_name_ar"]."</td>";
echo "<td>".$row["aya_no"]."</td>";
echo "<td><a href='sora.php?ID=";
echo "".$row["sura_no"]."'";
echo ">انتقل للسورة</a></td></tr>";

echo "</table>";




}}else{echo "لم تقم بحفظ تقدمك - قم بالنقر على رقم اللآية للحفظ";
}




?>	


	


<?php
if(isset($_GET['ID'])){
require("db.php");
$ID = $_GET["ID"];

?>


	<div class="panel panel-default audio-panel" >
            <audio id="audio" autoplay preload="auto" tabindex="0" controls  >
                <source src="mp3/1.mp3">
            </audio>
        </div>
  <div class="sour">
  <div class="page-header">
  <h1>

<?php

$sql="SELECT DISTINCT sura_name_ar
       
FROM   sour WHERE
sura_no='$ID'  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 

                echo"سورة ".$row["sura_name_ar"]."";
                
	 	
	 }}

?>


  	<small>  ورقمها :

  		<?php echo"$ID"?></small></h1>
</div>
   






        

 <ul id="playlist" hidden="">
        
       <li class="active list-group-item">
            <a href="mp3/2.mp3">
               بسم الله الرحمن الرحيم
            </a>

        <?php
if (isset($_POST["show"])) {
	$from = mysqli_real_escape_string($connection, $_POST['from']);
	$to = mysqli_real_escape_string($connection, $_POST['to']);
$sql="SELECT *
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' AND aya_no BETWEEN $from AND $to+1  GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
$repno=$row["repno"];
if($row['displaytype']=="verses"){

for($z=0;$z<$repno;$z++){
  


        echo'<li class="list-group-item" >
            <a href="mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"".$row["aya_no"]."";
                echo'
            </a>
        </li>';
    }
	 	
	 }}


	  



	}else{echo"error";};

?>


 <?php

$sql="SELECT *
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' AND page BETWEEN $from AND $to  GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];

if($row['displaytype']=="page"){



        echo'<li class="list-group-item" >
            <a href="mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"".$row["aya_no"]."";
                echo'
            </a>
        </li>';
	 	
	 }}


	  



	}else{echo"error";};

?>       
<?php

$sql="SELECT *
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' AND jozz BETWEEN $from AND $to  GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];

if($row['displaytype']=="chapter"){



        echo'<li class="list-group-item" >
            <a href="mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"".$row["aya_no"]."";
                echo'
            </a>
        </li>';
	 	
	 }}


	  



	}}else{echo"error";};

?>



        
        
           
    </ul>

 <script type="text/javascript">
    var audio;
var playlist;
var tracks;
var current;

init();
function init(){



    current = 0;
    audio = $('#audio');
    playlist = $('#playlist');
    tracks = playlist.find('li a');
    len = tracks.length - 1;
    audio[0].volume = 0.5;
    audio[0].play();
    playlist.find('a').click(function(e){
        e.preventDefault();
        link = $(this);
        current = link.parent().index();
        run(link, audio[0]);
    });
    audio[0].addEventListener('ended',function(e){
        current++;
        if(current == len){
            current = 0;
            link = playlist.find('a')[0];
        }else{
            link = playlist.find('a')[current];    
        }
        run($(link),audio[0]);
    });
}
function run(link, player){
        player.src = link.attr('href');
        par = link.parent();
        par.addClass('active').siblings().removeClass('active');
        audio[0].load();
        audio[0].play();
}
</script>




<form method="POST">


<?php

$sql="SELECT  DISTINCT displaytype
       
FROM  userpre  WHERE
username='$user'  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 if($row['displaytype']=="verses"){

echo"عرض";
echo" ";
echo"الايات";
echo" ";
echo"من";
	 	
	 }

 if($row['displaytype']=="chapter"){

echo"عرض";
echo" ";
echo"الاجزاء";
echo" ";
echo"من";
	 	
	 }

	  if($row['displaytype']=="page"){

echo"عرض";
echo" ";
echo"الصفحات";
echo" ";
echo"من";
	 	
	 }
	  



	}}else{echo"error";};

?>





	<select name="from">


<?php

$sql="SELECT DISTINCT S.aya_no,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 if($row['displaytype']=="verses"){

echo"<option>";
echo"".$row["aya_no"]."";
echo"</option>";
	 	
	 }


	  

	echo"ok";

	}}else{echo"error";};

?>











<?php

$sql="SELECT DISTINCT S.jozz,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 if($row['displaytype']=="chapter"){

echo"<option>";
echo"".$row["jozz"]."";
echo"</option>";
	 	
	 }


	  

	echo"ok";

	}}else{echo"error";};

?>




<?php

$sql="SELECT DISTINCT S.page,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 
if($row['displaytype']=="page"){

echo"<option>";
echo"".$row["page"]."";
echo"</option>";

	 	
	 }

	  

	echo"ok";

	}}else{echo"error";};

?>

</select>
الى
<select name="to">


<?php

$sql="SELECT DISTINCT S.aya_no,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 if($row['displaytype']=="verses"){

echo"<option>";
echo"".$row["aya_no"]."";
echo"</option>";
	 	
	 }


	  

	echo"ok";

	}}else{echo"error";};

?>

<?php

$sql="SELECT DISTINCT S.jozz,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 if($row['displaytype']=="chapter"){

echo"<option>";
echo"".$row["jozz"]."";
echo"</option>";
	 	
	 }


	  

	echo"ok";

	}}else{echo"error";};

?>




<?php

$sql="SELECT DISTINCT S.page,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 
if($row['displaytype']=="page"){

echo"<option>";
echo"".$row["page"]."";
echo"</option>";

	 	
	 }

	  

	echo"ok";

	}}else{echo"error";};

?>

</select>
<input type="submit" name="show">
</form>


<form method="POST">
<?php

if (isset($_POST["show"])) {

	$from = mysqli_real_escape_string($connection, $_POST['from']);
	$to = mysqli_real_escape_string($connection, $_POST['to']);


$sql="SELECT  DISTINCT displaytype,recitationpath
       
FROM  userpre  WHERE
username='$user'  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

$variable3=$row["recitationpath"];

	 if($row['displaytype']=="verses"){

echo'<div class="alert alert-success">';
echo"يتم العرض الان";
echo" من الآية رقم ";
echo"$from";
echo"الى الاية رقم ";
echo"$to";
echo'<button class="close">&times;</button>';
echo'</div>';

$sql="SELECT * 
       
FROM   sour  WHERE `sura_no`= '$ID' AND aya_no BETWEEN $from AND $to 
GROUP BY id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {


echo "  " . $row["aya_text"]. " ";
echo " <button name=aya_no value= " . $row["aya_no"]. " id=save><img src=images/bookmark.png height=20px></button><br><br>";
echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

$variable=$row["sura_no"];
$variable2=$row["aya_no"];

echo "<audio controls id=sound>";
echo "<source src=mp3/$variable3/";
echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo".mp3 type=audio/mpeg>";
echo "</audio><br><br>";




}}





	 	
	 }

 if($row['displaytype']=="chapter"){

echo"يتم العرض الان";
echo" من الجزء رقم ";
echo"$from";
echo"الى الجزء رقم ";
echo"$to";
echo"<br>";

$sql="SELECT * 
       
FROM   sour  WHERE `sura_no`= '$ID' AND jozz BETWEEN $from AND $to 
GROUP BY id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
while($row = $result->fetch_assoc()) {


echo "  " . $row["aya_text"]. " ";

echo " <input type=submit name=aya_no value= " . $row["aya_no"]. "> ";
echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";
$variable=$row["sura_no"];
$variable2=$row["aya_no"];


echo "<br><audio controls id=sound>";
echo "<source src=mp3/$variable3/";
echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo".mp3 type=audio/mpeg>";
echo "</audio><br>";

}}



	 	
	 }

	  if($row['displaytype']=="page"){


echo"يتم العرض الان";
echo" من الصفحة رقم ";
echo"$from";
echo"الى الصفحة رقم ";
echo"$to";
echo"<br>";

$sql="SELECT * 
       
FROM   sour  WHERE `sura_no`= '$ID' AND page BETWEEN $from AND $to 
GROUP BY id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
while($row = $result->fetch_assoc()) {


echo "  " . $row["aya_text"]. " ";

echo " <input type=submit name=aya_no value= " . $row["aya_no"]. "> ";
echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";
$variable=$row["sura_no"];
$variable2=$row["aya_no"];


echo "<br><audio controls id=sound>";
echo "<source src=mp3/$variable3/";
echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo".mp3 type=audio/mpeg>";
echo "</audio><br>";

}}






	 	
	 }
	  



	}}}else{echo"فضلا انقر على زر العرض ";};











?>
</form>
<?php

if (isset($_POST["aya_no"])) {

$username = mysqli_real_escape_string($connection, $user);
$sura_no = mysqli_real_escape_string($connection, $ID);
$sura_name_ar = mysqli_real_escape_string($connection, $_POST['sura_name_ar']);
$aya_no = mysqli_real_escape_string($connection, $_POST['aya_no']);
$page = mysqli_real_escape_string($connection, $_POST['page']);
$sql = "INSERT INTO `memories` (username, sura_no, sura_name_ar,aya_no,page) VALUES ('$username', '$sura_no', '$sura_name_ar','$aya_no','$page')";
	$result = mysqli_query($connection, $sql);
	if($result){
		echo "تم الحفظ";
		echo'<meta http-equiv="refresh" content="1">';
	}else{
		echo "error";
	}
}




?>


<br>
<br>
<br>
</div>

</body></div>



<?php
require("db.php");
$next=$ID+1;
$previous=$ID-1;
if ($ID=='1'){	
	echo'<ul class="pager"><li class="next">';
echo "<a href='sora.php?ID=$next'>السورة التالية</a>";echo'</li>';}



elseif ($ID=='114'){
	echo'<li class="previous">';
	echo "<a  href='sora.php?ID=$previous'>السورة السابقة</a>";
	echo'</li></ul>';
}




else{
	echo'<ul class="pager">
  <li class="next">';
	echo "<a  href='sora.php?ID=$next'>السورة التالية</a>";
	echo'</li>';
echo'<li class="previous">';
	echo "<a href='sora.php?ID=$previous'>السورة السابقة</a>";
echo'</li>
</ul>';
}




?>




</html>
<?php

 }} else {
   ?>
   
   <?php
@include"login.php";
 }?>