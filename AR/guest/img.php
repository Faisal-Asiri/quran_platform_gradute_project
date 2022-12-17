
<!DOCTYPE html>
<html dir="rtl">
<head>
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
	<link rel="stylesheet" type="text/css" href="imgstyle.css">
</head>
<body>
  <center>
    <br>
    <br>
    <br>
    <br>

	<div class="sour">
<?php


if (isset($_GET['id'], $_GET['p_id'])) {

include "../../config/db.php";
include "../../config/connect.php";
$id = $_GET["id"];
$p_id = $_GET["p_id"];
    


$sql="SELECT *
       
FROM   sour S, tafseer T,en_sahih E  WHERE
 S.sura_no='$id' AND T.id=S.id AND E.index=S.id AND S.aya_no='$p_id' ORDER BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  $aya=$row["aya_text"];   

                echo"".$row["aya_text"]."";
              echo"<div id=tafseer><p >-سورة ".$row["sura_name_ar"]."</p><br>";

echo"<p >التفسير الميسر: :".$row["t_aya_tafseer"]."</p>";

   echo"<p >sahih international explanation :".$row["text"]."</p></div>";


echo"";
        
     }}}



     ?>

</div>
<p id="right">مشروع تحفيظ القران الكريم اون لاين</p>


</body>
</html>

