<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <title>منصة تحفيظ القران الكريم اون لاين - الرئيسية</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        

                    
<link rel="stylesheet" type="text/css" href="homestyle.css">

<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<nav class="navbar navbar-light" style="background-color:  #006B3C; color: white;">
  <a class="navbar-brand" href="#" style="color:white;">
    
      الْقُرْآنِ الْكَرِيمِ
    
  </a>
<a class="navbar-brand" href="../EN" style="color:white;">EN</a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    
      
    </div>
  </div>
</nav>
<body><header class="opener">
  <div class="wrapper">
<p>قال تعالى:</p>
    <div id="homeaya"  class="line-1 anim-typewriter">

<?php
require("../config/db.php");
require("../config/connect.php");



           



$sql="select * from sour WHERE sura_no IN(54)   AND aya_no IN(17)  LIMIT 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {


echo "".$row["aya_text"]."</div></h1><br>";

echo "-".$row["sura_name_ar"]."";




}}else{echo "لم تقم بحفظ تقدمك - قم بالنقر على رقم اللآية للحفظ";
}




?></div></header><center>  
</div>
<button type="button" onclick="location.href='user/sour.php'"  class="btn btn-outline-success">نسخة المستخدم</button>
<button type="button" onclick="location.href='guest/sour.php'" class="btn btn-outline-success">نسخة الزائر</button>
<h2>Comparison Table</h2>

<table>
  <tr>
    <th style="width:50%">Features</th>
    <th>Basic</th>
    <th>Pro</th>
  </tr>
  <tr>
    <td>Sample text</td>
    <td><i class="fa fa-remove"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>Sample text</td>
    <td><i class="fa fa-check"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>Sample text</td>
    <td><i class="fa fa-check"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>Sample text</td>
    <td><i class="fa fa-remove"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>Sample text</td>
    <td><i class="fa fa-check"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
</table>
</body>
</html>