<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>منصة تحفيظ القران الكريم اون لاين - الحساب العائلي</title>
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
      <h1> الحساب العائلي
</h1>
  </div>
</header>
<div class="example">





	<div class="container">
<body>
<form method="POST" >
 <?php 
$sql = "SELECT * FROM family WHERE username='$user'  ORDER BY ID "  ;
  $result = mysqli_query($connection, $sql);
  unset($_SESSION['mbr1']);
    unset($_SESSION['mbr2']);
      unset($_SESSION['mbr3']);
        unset($_SESSION['mbr4']);
  if ($result->num_rows > 0) {

  	echo"اختر حساب للدخول";
    echo "<a href=sour.php>";
  	echo'<div class="card bg-light mb-3" style="width: 10rem;">
  <img src="../../images/user.jpg" class="card-img-top" alt="...">
  <div class="card-body"><p class="card-text">
    ';
    


      echo "$user (حساب رئيسي)";
      echo'</p>
  </div>
</div>';echo "</a>";
    while($row = $result->fetch_assoc()) {
    	$mbr1=$row["mbr1"];$mbr2=$row["mbr2"];$mbr3=$row["mbr3"];$mbr4=$row["mbr4"];
if($row['mbr1']!==""){
echo'<button name=mbr1>';
    	echo'<div class="card text-white bg-success mb-3" style="width: 8rem;">
  <img src="../../images/user.jpg" class="card-img-top" alt="...">
  <div class="card-body"><p class="card-text">
    ';


      echo "".$row["mbr1"]."";
      echo'</p>
  </div>
</div>';
     echo'</button>';
}if($row['mbr2']!==""){
     echo'<button name=mbr2>';
      echo'<div class="card text-white bg-success mb-3" style="width: 8rem;">
  <img src="../../images/user.jpg" class="card-img-top" alt="...">
  <div class="card-body"><p class="card-text">
    ';


      echo "".$row["mbr2"]."";
      echo'</p>
  </div>
</div>';
     echo'</button>';}if($row['mbr3']!==""){

     echo'<button name=mbr3>';
      echo'<div class="card text-white bg-success mb-3" style="width: 8rem;">
  <img src="../../images/user.jpg" class="card-img-top" alt="...">
  <div class="card-body"><p class="card-text">
    ';


      echo "".$row["mbr3"]."";
      echo'</p>
  </div>
</div>';
     echo'</button>';}if($row['mbr4']!==""){

     echo'<button name=mbr4>';
      echo'<div class="card text-white bg-success mb-3" style="width: 8rem;">
  <img src="../../images/user.jpg" class="card-img-top" alt="...">
  <div class="card-body"><p class="card-text">
    ';


      echo "".$row["mbr4"]."";
      echo'</p>
  </div>
</div>';
     echo'</button>';}
    } }else{echo "
	<meta HTTP-EQUIV='REFRESH' content='0; url=sour.php'/>";
  }

 ?>
</form>
<?php 
if (isset($_POST["mbr1"])) { 
  
  $_SESSION['mbr1'] = $mbr1;
 echo "
  <meta HTTP-EQUIV='REFRESH' content='0; url=sour.php'/>";


  }
if (isset($_POST["mbr2"])) { 
  
 $_SESSION['mbr2'] = $mbr2;
 echo "
  <meta HTTP-EQUIV='REFRESH' content='0; url=sour.php'/>";
  }
  if (isset($_POST["mbr3"])) { 
   $_SESSION['mbr3'] = $mbr3;
   echo "
  <meta HTTP-EQUIV='REFRESH' content='0; url=sour.php'/>";

  }
  if (isset($_POST["mbr4"])) { 
  
 $_SESSION['mbr4'] = $mbr4;
 echo "
  <meta HTTP-EQUIV='REFRESH' content='0; url=sour.php'/>";
  }

  ?>

  
  </body></div></div></html>
  
  
    
  
<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>