<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <title>منصة الكتاب المبين - عنا</title>
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
  
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="index.php">الرئيسية</a>
    <a class="nav-item nav-link" href="#serv">الخدمات</a>
 <a class="nav-item nav-link" href="aboutus.php">عن المشروع</a>
      
  <a class="nav-item nav-link" href="guest/sour.php">قائمة السور</a>
      <a class="nav-item nav-link" href="user/login.php">الملف الشخصي وتفضيلات المستخدم</a>
      <a class="nav-item nav-link" href="guest/search.php">البحث</a>
            <a class="nav-item nav-link" href="guest/audio.php">استمع للقران الكريم كاملا</a>
      <a class="nav-item nav-link" href="guest/list.php">النسخة المصورة  للمصحف</a>
      <a class="nav-item nav-link" href="guest/audior.php">الرقية الشرعية</a>
                  <a class="nav-item nav-link" href="guest/morning.php">أذكار الصباح</a>
                        <a class="nav-item nav-link" href="guest/night.php">أذكار المساء</a>
                                              <a class="nav-item nav-link" href="guest/klist.php">الختمة
                      </a>
<a class="nav-item nav-link" href="guest/klist.php">احب الكلام الى الله
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

<h2>عن المشروع</h2>
مشروع تحفيظ القرآن الكريم تم تقديمه كمشروع تخرج للسنة الاخيرة من متطلبات التخرج  بقسم نظم المعلومات - كلية علوم الحاسب الآلي -بجامعة الملك خالد ، الدفعة 24: 

والذي قام بتطويره وبنائه كفريق عمل :
<br>
فيصل عسيري 
<br>
حمزة عرابي 
<br>
رائد الخيري
<br>
<h2>
شكر وعرفان
</h2>
اود ان اشكر زملائي في المشروع - وعائلتي الكريمة على تقديم كل الدعم لانجاح هذا المشروع 
كما اود ان اشكر مجمع الملك فهد لطباعة المصحف الشريف لتقديم المحتوى القرآني وتسهيل الوصول لهذه المصادر والمراجع 
<br>
https://qurancomplex.gov.sa
<br> 
كما اود ان اشكر موقع Every Ayah على تقديم كل ما نحتاجة من التلاوات الصوتية 
https://everyayah.com/
<br>
كما اود ان اشكر كل من الدكتور رشيد كمشرف على المشروع في جزئه الاول والدكتور اشرول الاسلام كمشرف للمشروع في جزئه الثاني 
وكذلك للجنة التقييم الدكتور حامد القحطاني الاستاذ المساعد بقسم نظم المعلومات  والدكتور نعيم احمد  والدكتور عبد العزيز القحطاني على ملاحظاتهم واقتراحاتهم اثناء عرض المشروع في تقديماته الاربع 

واود ان اشكر كل اولائك الرائعين الذين لم اتمكن من تذكر اسمائهم اثناء كتابتي لهذه الاسطر واسهموا بشكل او بآخر بتقديم اقتراحاتهم ومساعدتهم لانجاح هذا المشروع <br>
 ختاما اسأل الله ان يكون هذا العمل خالصا لوجهه الكريم

<br>
تم تحريره يوم الخميس - الساعه 4:30 م - 12 جمادى الاول من عام 1443 هـ الموافق - 16 ديسمبر 2021 م
<br>
فيصل عسيري

</body>
</html>