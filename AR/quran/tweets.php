
<!DOCTYPE html>
<html dir="rtl">
<head>
     <title>منصة تحفيظ القران الكريم اون لاين -tweets</title>
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
      <h1> tweets
</h1>
  </div>
</header>
<body>
    
     <div class="container">
<div class="example">
     <div class="sour">

     <?php


    $sql="SELECT *
       
FROM   quran q,recitation r ORDER BY RAND()
LIMIT 1;
";


$result = $conn->query($sql);
if ($result->num_rows > 0) {


echo "<br>";

while($row = $result->fetch_assoc()) {
     $name=$row["namear"];
     $recitationpath=$row["path"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
echo"<p id=bsmla>ﵡ";
echo"</p>";
echo"".$row["aya_text"]."<p id=bsmla >ﵠ</p>";echo"- سورة:".$row["sura_name_ar"]."-";

echo'<a class="twitter-share-button"
href="https://twitter.com/intent/tweet?text=('.$row["aya_text"].')سورة:'.$row["sura_name_ar"].'(';
echo"تلاوة:$name)";
            echo "https://quranmo.com/mp3/$recitationpath/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3"
                ';
echo'"data-size="large">
غرد</a>';


}}
     ?><br>
     <a href="tweets.php">update</a>
</div></div></div></body>
</html>