
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>منصة الكتاب المبين - قائمة السور</title>
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
      <h1> قائمة سور القرآن الكريم
</h1>
  </div>
</header>
  
<body>

<div class="container">
<div class="example">




	<form method="POST">
<h1></h1>
<table>
<tr>
  <th>اسم السورة</th><th>رقمها</th></tr>
<?php
require("../../config/db.php");
require("../../config/connect.php");
$sql="SELECT DISTINCT sura_no,sura_name_ar,sura_name_en
       
FROM   quran
GROUP BY id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

echo"<tr><td>";
echo "<a id=sour href='chapter.php?ID={$row['sura_no']}'>" . $row["sura_name_ar"]. "</a>          ";
echo"</td><td>". $row["sura_no"]."</td></tr>";



}}else{echo "there is something wrong!";}

?>

</table>

<br>



</form>
</center></span>
</body></div>
</div>
</html>

