<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html >
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
      <h1> List of chapters in the Quran 
</h1>
  </div>
</header>
<div class="example">

<center>
	<div class="container">
<body>



	<form method="POST">
    
(Table of Surahs)
<table>
<tr>
  <th>Name:</th><th>No:</th></tr>
<?php
require("../../config/db.php");
$sql="SELECT DISTINCT sura_no,sura_name_ar,sura_name_en
       
FROM   sour
GROUP BY id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

echo"<tr><td>";
echo "<a id=sour href='chapter.php?ID={$row['sura_no']}'>" . $row["sura_name_ar"]. "-"  . $row["sura_name_en"].  "</a>          ";
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

<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>