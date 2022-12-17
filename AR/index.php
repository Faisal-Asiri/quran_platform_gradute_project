<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <title>منصة الكتاب المبين- الرئيسية</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        

                    
<link rel="stylesheet" type="text/css" href="homestyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 16px;
}

th:first-child, td:first-child {
  text-align: left;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}

.fa-check {
  color: green;
}

.fa-remove {
  color: red;
}
</style>

<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2544312482829427"
     crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-light" style="background-color:  #006B3C; color: white;">
  <a class="navbar-brand" href="index.php" style="color:white;">
    
      <img src="../images/qmo-logo-white.png "height=40px>
    
  </a>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XH5CXTYJVK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XH5CXTYJVK');
</script>
<a class="navbar-brand" href="../EN" style="color:white;">EN</a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="color:white;">
    <div class="navbar-nav" style="color:white;">
        <a class="nav-item nav-link" href="index.php" style="color:white;">الرئيسية</a>
    <a class="nav-item nav-link" href="#serv" style="color:white;">الخدمات</a>
 <a class="nav-item nav-link" href="aboutus.php" style="color:white;">عن المشروع</a>
      
  <a class="nav-item nav-link" href="guest/sour.php" style="color:white;">قائمة السور</a>
      <a class="nav-item nav-link" href="user/login.php" style="color:white;">الملف الشخصي وتفضيلات المستخدم</a>
      <a class="nav-item nav-link" href="guest/search.php" style="color:white;">البحث</a>
            <a class="nav-item nav-link" href="guest/audio.php" style="color:white;">استمع للقران الكريم كاملا</a>
      <a class="nav-item nav-link" href="guest/list.php" style="color:white;">النسخة المصورة  للمصحف</a>
      <a class="nav-item nav-link" href="guest/audior.php" style="color:white;">الرقية الشرعية</a>
                  <a class="nav-item nav-link" href="guest/morning.php" style="color:white;">أذكار الصباح</a>
                        <a class="nav-item nav-link" href="guest/night.php" style="color:white;">أذكار المساء</a>
                                              <a class="nav-item nav-link" href="guest/klist.php" style="color:white;">الختمة
                      </a>
<a class="nav-item nav-link" href="guest/azkar.php" style="color:white;">احب الكلام الى الله
                      </a>

      
      
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



           



$sql="select * from sour WHERE sura_no IN(44)   AND aya_no IN(3)  LIMIT 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {


echo "".$row["aya_text"]."</div></h1><br>";

echo "-".$row["sura_name_ar"]."";




}}else{echo "لم تقم بحفظ تقدمك - قم بالنقر على رقم اللآية للحفظ";
}




?></div></header><center>  
</div>

<br>
<?php include 'demo.php';?>
<?php

$sql = "SELECT * FROM `recitation`";
  $result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {



 
  echo"".$row["namear"].", ";

} }
  
  else{

    $fmsg = "<div class='fmsg fmg'>دخول فاشل تاكد من اسم المستخدم او كلمة المرور</div>";

    
  }


  ?>
<h2>اختر وجهتك : </h2>
<button type="button" onclick="location.href='user/sour.php'"  class="btn btn-outline-success">نسخة المستخدم</button>
<button type="button" onclick="location.href='guest/sour.php'" class="btn btn-outline-success">نسخة الزائر</button>
<button type="button" onclick="location.href='quran/sour.php'" class="btn btn-outline-success">
    نسخة الخط العثماني لجميع الاجهزة
</button>
<button type="button" onclick="location.href='screen'" class="btn btn-outline-success">
    الكتاب المبين TV - نسخة الشاشات الذكية
</button>

<br><br><br>
<h2>مقارنة للخدمات المقدمة</h2>

<table id="serv">
  <tr>
    <th style="width:50%">الخصائص</th>
    <th>نسخة الزائر</th>
    <th>نسخة المستخدم</th>
  </tr>
  <tr>
    <td>عرض المحتوى القراني والتفسير والبحث والتلاوات الصوتية</td>
    <td><i class="fa fa-check"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>الحساب العائلي</td>
    <td><i class="fa fa-remove"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>حلقات التحفيظ</td>
    <td><i class="fa fa-remove"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>التفضيلات</td>
    <td><i class="fa fa-remove"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
  <tr>
    <td>خدمة مجانية</td>
    <td><i class="fa fa-check"></i></td>
    <td><i class="fa fa-check"></i></td>
  </tr>
</table>
</body>
</html>