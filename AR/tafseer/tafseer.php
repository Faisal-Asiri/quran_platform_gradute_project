<!DOCTYPE html>
<html dir="rtl">
<head>
     <title>تفسير 
     
        <?php


@include 'user.php';
require("../../config/db.php");
require("../../config/connect.php");
?>
<?php
if(isset($_GET['ID'])){
require("../../config/db.php");
require("../../config/connect.php");
$ID = $_GET["ID"];
}
?>
<?php

$sql="SELECT DISTINCT sura_name_ar
       
FROM   quran WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"سورة ".$row["sura_name_ar"]."";
                
        
     }}

?>
- منصة الكتاب المبين 

    </title>

     </title>
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
      <h1> تفسير 
      <?php

$sql="SELECT DISTINCT sura_name_ar
       
FROM   sour WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"سورة ".$row["sura_name_ar"]."";
                
        
     }}

?>


    <small>  ورقمها :

        <?php echo"$ID"?></small></h1>
    عدد اياتها<br>
</h1>
  </div>
</header>
<body>
 
     <div class="container">
<div class="example">
     <div class="sour">

     <?php


    $sql=$sql="SELECT *
       
    FROM   quran S, userpre U,tafseer T,en_sahih E  WHERE
     S.sura_no='$ID' AND T.id=S.id AND E.index=S.id AND S.aya_no  GROUP BY S.id  
    ;";


$result = $conn->query($sql);
if ($result->num_rows > 0) {


echo "<br>";

while($row = $result->fetch_assoc()) {
     

$variable=$row["sura_no"];
$variable2=$row["aya_no"];
echo"<p id=bsmla>ﵡ";
echo"</p>";
echo"".$row["aya_text"]."<p id=bsmla >ﵠ</p>";
echo"<br><p id=tf>".$row["t_aya_tafseer"]."</p><br>";


}}
     ?><br>
     
</div></div></div></body>
</html>
