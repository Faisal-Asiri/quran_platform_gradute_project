<?php
 session_start();


 if (isset($_SESSION['adminusername'])) {
 ?>
<?php
 @include 'admin.php';
require("../config/db.php");
require("../config/connect.php");


?>
<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta charset="utf-8">
	<title></title>
</head>

	<link rel="stylesheet" type="text/css" href="loginstyle.css">


 <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        



<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<div class="example">
<nav class="navbar navbar-light" style="background-color:  #006B3C; color: white;">
  <a class="navbar-brand" href="#" style="color:white;">
    
      الْقُرْآنِ الْكَرِيمِ
    
  </a>
<p><?php echo "welcome $admin ";
echo"<a href=logout.php> logout </a>";?></p>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="home">Home <span class="sr-only">(current)</span></a>
      
    </div>
  </div>
</nav>
<header class="opener">
  <div class="wrapper">
<h1>لوحة الإدارة</h1>

</div></header></div>

<body>
   
   <img src="../images/users.png" height="50px"> المستخدمين
<?php

$sql="SELECT *
       
FROM   login  GROUP BY id  
;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table><tr><th>المستخدم</th><th>عرض البيانات</th></tr>";
while($row = $result->fetch_assoc()) {

echo "<tr><td>".$row["username"]."</td>";
echo"<td>";
echo "<a  href='userinfo.php?ID={$row['username']}'>معرف رقم" . $row["id"]. " اضغط هنا</a>          ";
echo "</td></tr>";
}}?>

</table>

</body>

</html>
<?php


 } else {
   ?>
   
   <?php
@include"login.php";
 }?>