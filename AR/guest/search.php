
<!DOCTYPE html>
<html dir="rtl">
<head>
     <title>منصة تحفيظ القران الكريم اون لاين - البحث</title>
            <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    
<link rel="icon" type="image/x-icon" href="../../images/favicon.ico">


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

require("../../config/db.php");
require("../../config/connect.php");
?>
<?php 
echo'<link rel="stylesheet" type="text/css" href="style.css">';
@include 'navbar.php';

 ?>
</head>
<header class="opener">
  <div class="wrapper">
      <h1> البحث
</h1>
  </div>
</header>
<body>
    <form method="POST">
<label></label><input type="text" name="search_aya" required="" minlength="3" placeholder="ابحث عن  نص الاية القرآنية أو التفسير"><br><input type="submit" name="search" value="ابحث في الآيات">
<input type="submit" name="searchex" value="ابحث في التفسير">
     </form>
     <div class="container">
<div class="example">
     <div class="sour">

     <?php
if (isset($_POST["search"])) {
    $search_aya = mysqli_real_escape_string($connection, $_POST['search_aya']);

    $sql="SELECT *
       
FROM   sour S, userpre U ,tafseer T,en_sahih E  WHERE
 S.aya_text_emlaey like'%$search_aya%'  AND T.id=S.id AND E.index=S.id   GROUP BY S.id  
;";


$result = $conn->query($sql);
if ($result->num_rows > 0) {

$row_cnt = $result->num_rows;

printf("تم ايجاد  %d نتيجة بحث.\n", $row_cnt);
echo "<br>";

while($row = $result->fetch_assoc()) {
     

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
echo"<p id=tafseer>".$row["t_aya_tafseer"]."</p>";

    echo'
      </div></div>';
echo "<br><audio controls>";
echo "<source src=../../mp3/basit/";

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
 T.t_aya_tafseer like'%$search_aya%'  AND T.id=S.id AND E.index=S.id   GROUP BY S.id  
;";


$result = $conn->query($sql);
if ($result->num_rows > 0) {

$row_cnt = $result->num_rows;

printf("تم ايجاد  %d نتيجة بحث.\n", $row_cnt);
echo "<br>";

while($row = $result->fetch_assoc()) {
     

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
echo"<p id=tafseer>".$row["t_aya_tafseer"]."</p>";

    echo'
      </div></div>';
echo "<br><audio controls>";
echo "<source src=../../mp3/basit/";

echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo".mp3 type=audio/mpeg>";
echo "</audio><br>";




}}}
     ?>
</div></div></div></body>
</html>
