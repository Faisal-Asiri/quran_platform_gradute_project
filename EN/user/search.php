<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="ltr">
<head>
    <title></title>
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
      <h1> Search in Holy Quran 
</h1>
  </div>
</header>
<body>
    <form method="POST">
<label></label><input type="text" name="search_aya" required="" minlength="3" placeholder="search in verses texts or in sahih international explanation"><br><input type="submit" name="search" value="search in verse text in arabic only">
<input type="submit" name="searchex" value="search in SI explanation">
     </form>
     <div class="container">
<div class="example">
     <div class="sour">

     <?php
if (isset($_POST["search"])) {
    $search_aya = mysqli_real_escape_string($connection, $_POST['search_aya']);

    $sql="SELECT *
       
FROM   sour S, userpre U ,tafseer T,en_sahih E  WHERE
U.username='$user'  AND S.aya_text_emlaey like'%$search_aya%'  AND T.id=S.id AND E.index=S.id   GROUP BY S.id  
;";


$result = $conn->query($sql);
if ($result->num_rows > 0) {

$row_cnt = $result->num_rows;

printf(" results %d\n", $row_cnt);
echo "<br>";

while($row = $result->fetch_assoc()) {
     
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
echo"<p id=bsmla>ﵡ";
echo"</p>";
echo"".$row["aya_text"]."<p id=bsmla >ﵠ</p>";echo"- سورة:".$row["sura_name_ar"]."";
echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';
echo"<p id=tafseer>".$row["text"]."</p>";

    echo'
      </div></div>';
echo "<br><audio controls>";
echo "<source src=../../mp3/$variable3/";

echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo".mp3 type=audio/mpeg>";
echo "</audio><br>";




}}}
     ?>
     <?php
if (isset($_POST["searchex"])) {
    $search_aya = mysqli_real_escape_string($connection, $_POST['search_aya']);

    $sql="SELECT *
       
FROM   sour S, userpre U ,tafseer T,en_sahih E  WHERE
U.username='$user'  AND E.text like'%$search_aya%'  AND T.id=S.id AND E.index=S.id   GROUP BY S.id  
;";


$result = $conn->query($sql);
if ($result->num_rows > 0) {

$row_cnt = $result->num_rows;

printf(" results %d\n", $row_cnt);
echo "<br>";

while($row = $result->fetch_assoc()) {
     
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
echo"<p id=bsmla>ﵡ";
echo"</p>";
echo"".$row["aya_text"]."<p id=bsmla >ﵠ</p>";echo"- سورة:".$row["sura_name_ar"]."";
echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["index"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["index"]."";

  echo'" class="collapse">
    ';
echo"<p id=tafseer>".$row["text"]."</p>";

    echo'
      </div></div>';
echo "<br><audio controls>";
echo "<source src=../../mp3/$variable3/";

echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo".mp3 type=audio/mpeg>";
echo "</audio><br>";




}}}
     ?>
</div></div></div></body>
</html>
<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>