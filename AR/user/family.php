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




<center>
	<div class="container">
<body>
  <?php 
$sql = "SELECT * FROM family  WHERE username='$user'  ORDER BY ID "  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $mbr1=$row["mbr1"];$mbr2=$row["mbr2"];$mbr3=$row["mbr3"];$mbr4=$row["mbr4"];
      $_SESSION['mbr11']=$mbr1;$_SESSION['mbr12']=$mbr2;$_SESSION['mbr13']=$mbr3;$_SESSION['mbr14']=$mbr4;
    echo"افراد العائلة<br>";
   echo"$user-".$row["mbr1"]."-".$row["mbr2"]."-".$row["mbr3"]."-".$row["mbr4"]."<form method=POST><button name=edit>تعديل<img src=../../images/edit.png height=40px></button></form><br>";

     
    } }else{echo "لايوجد اعضاء مضافين";

echo "<br>يمكنك اضافة ما يصل الى 4 اعضاء او عضوا واحدا على الاقل";
echo'<form method="POST">

<input type="text" name="mbr1" required placeholder="اسم العضو">
<input type="text" name="mbr2" placeholder="اسم العضو">
<input type="text" name="mbr3" placeholder="اسم العضو">
<input type="text" name="mbr4" placeholder="اسم العضو">
  
  
  
  
    <input type="submit" name="family"  value="حفظ">
  </form>';
  }

 ?>
  <script>// remove readonly when clicking on the input
$("body").on("click", "#wasa input", function(){  
  $(this).prop("readonly", "");
  
  // EDIT: this was the prevoius answer
  //$(this).prop("readonly", !$(this).prop("readonly"));// unlock by clicking on the input
});

/* NEW */
// lock input when click/tab away
$("body").on("focusout", "#wasa input", function(){  
  $(this).prop("readonly", "readonly");  
});</script>
<form method="POST">
<?php
if (isset($_POST["edit"])) {
  echo"<div id='wasa'>";
  echo "عند تغيير الاسم قد تحذف بيانات الاسم السابق نهائيا";echo "<br>";
 echo "*لتمكين التعديل يجب النقر مرتين على الحقل*";

  echo "<input type=text id=date name=mbr1 placeholder='تعديل ".$_SESSION["mbr11"]."'value='".$_SESSION["mbr11"]."'readonly>";
  echo "<input type=text id=date name=mbr2 placeholder='تعديل ".$_SESSION["mbr12"]."'value='".$_SESSION["mbr12"]."'readonly>";
  echo "<input type=text id=date name=mbr3 placeholder='تعديل ".$_SESSION["mbr13"]."'value='".$_SESSION["mbr13"]."'readonly>";
  echo "<input type=text id=date name=mbr4 placeholder='تعديل ".$_SESSION["mbr14"]."'value='".$_SESSION["mbr14"]."'readonly>";
echo'</div>

';echo"<input type=submit name=updatesubnames value=تحديث >";
  
  }

  ?></form>
  <?php

if (isset($_POST["updatesubnames"])) {
  
  $mbbr1 = mysqli_real_escape_string($connection, $_POST['mbr1']);
    $mbbr2 = mysqli_real_escape_string($connection, $_POST['mbr2']);
    $mbbr3 = mysqli_real_escape_string($connection, $_POST['mbr3']);
    $mbbr4 = mysqli_real_escape_string($connection, $_POST['mbr4']);
  

  $sql = "UPDATE  `family` SET mbr1='$mbbr1', mbr2='$mbbr2', mbr3='$mbbr3',mbr4='$mbbr4'  where username='$user'";
  $result = mysqli_query($connection, $sql); 
  if($result){
    echo " تم تحديث اسماء افراد العائلة";
    echo "<br>انتظر ثلاث ثوان من فضلك";
    echo'<meta http-equiv="refresh" content="3">';
  }else{
    echo "فشل تعديل افراد العائلة حاول مرة اخرى";
  }
}

?>
 
<?php

$sql = "SELECT * FROM audiorec   WHERE username='$user' AND amember='' ORDER BY ID  "  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $audio=$row["audio"];$_SESSION['audio']=$audio;$mdate=$row["mdate"];$mtime=$row["mtime"];$_SESSION['mtime']=$mtime;$_SESSION['mdate']=$mdate;
      $sura_name=$row["sura_name_ar"];$pf=$row["p_from"];$pt=$row["p_to"];$_SESSION['sura']=$sura_name;$_SESSION['pf']=$pf;$_SESSION['pt']=$pt;

    }}

?>
<?php

$sql = "SELECT * FROM audiorec   WHERE username='$user' AND amember!='' AND amember='".$mbr1."' ORDER BY ID  "  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $a1=$row["audio"];$_SESSION['a1']=$a1;
       $m1date=$row["mdate"];$m1time=$row["mtime"];$_SESSION['m1time']=$m1time;$_SESSION['m1date']=$m1date;
      $sura_name1=$row["sura_name_ar"];$pf1=$row["p_from"];$pt1=$row["p_to"];$_SESSION['sura1']=$sura_name1;$_SESSION['pf1']=$pf1;$_SESSION['pt1']=$pt1;

    }}

?>
<?php

$sql = "SELECT * FROM audiorec   WHERE username='$user' AND amember!='' AND amember='".$mbr2."' ORDER BY ID  "  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $a2=$row["audio"];$_SESSION['a2']=$a2;
       
       $m2date=$row["mdate"];$m2time=$row["mtime"];$_SESSION['m2date']=$m2date;$_SESSION['m2time']=$m2time;
      $sura_name2=$row["sura_name_ar"];$pf2=$row["p_from"];$pt2=$row["p_to"];$_SESSION['sura2']=$sura_name2;$_SESSION['pf2']=$pf2;$_SESSION['pt2']=$pt2;

    }}

?>
<?php

$sql = "SELECT * FROM audiorec   WHERE username='$user' AND amember!='' AND amember='".$mbr3."' ORDER BY ID  "  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $a3=$row["audio"];$_SESSION['a3']=$a3;
      
       $m3date=$row["mdate"];$m3time=$row["mtime"];$_SESSION['m3date']=$m3date;$_SESSION['m3time']=$m3time;
      $sura_name3=$row["sura_name_ar"];$pf3=$row["p_from"];$pt3=$row["p_to"];$_SESSION['sura3']=$sura_name3;$_SESSION['pf3']=$pf3;$_SESSION['pt3']=$pt3;
    }}

?>
<?php

$sql = "SELECT * FROM audiorec   WHERE username='$user' AND amember!='' AND amember='".$mbr4."' ORDER BY ID  "  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $a4=$row["audio"];$_SESSION['a4']=$a4;

       $m4date=$row["mdate"];$m4time=$row["mtime"];$_SESSION['m4date']=$m4date;$_SESSION['m4time']=$m4time;
      $sura_name4=$row["sura_name_ar"];$pf4=$row["p_from"];$pt4=$row["p_to"];$_SESSION['sura4']=$sura_name4;$_SESSION['pf4']=$pf4;$_SESSION['pt4']=$pt4;

    }}

?>
 <?php 
$sql = "SELECT * FROM memories   WHERE username='$user' AND member=''  ORDER BY ID "  ;
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
        echo'<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">';
    echo "$user حساب رئيسي  ▼";
    echo'</button>
      </h5>
    </div>';
    echo' <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">';
   echo'سجلات القراءة والحفظ<br>';
    while($row = $result->fetch_assoc()) {
    

      
      echo "سجل قراءة :اسم السورة:".$row["sura_name_ar"]."-رقم الاية:".$row["aya_no"]."-رقم الصفحة :".$row["page"]."-بتاريخ:".$row["mdate"]."-الساعه:".$row["mtime"]."<br>";


     
    }if (isset($_SESSION['audio'])) {
      echo "تسجيل صوتي لسورة :".$_SESSION['sura']."-";
      echo "من صفحة ".$_SESSION['pf']."";
       echo "الى".$_SESSION['pt']."";
     echo'-<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="';
      echo "".$_SESSION['audio']."";
      echo'" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>';echo "بتاريخ:".$_SESSION['mdate']."";echo "-".$_SESSION['mtime']."<br>";} echo " </div>
    </div>
  </div>"; }else{echo "لايوجد سجلات";
    echo"للقراءة";
  }

 ?>

<?php

$sql="SELECT * 
       
FROM  memories M,family F WHERE
F.username='$user' AND F.username=M.username AND M.member=F.mbr1 AND M.member!=''  
;";
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    echo'<div id="accordion">
  <div class="card">
    <div class="card-header" id="heading1">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">';
      echo "".$_SESSION['mbr11']."▼";
      echo'</button>
      </h5>
    </div>';
    echo' <div id="collapse1" class="collapse " aria-labelledby="heading1" data-parent="#accordion">
      <div class="card-body">';
         echo'سجلات القراءة والحفظ<br>';
    while($row = $result->fetch_assoc()) {

      echo "سجل قراءة :اسم السورة:".$row["sura_name_ar"]."-رقم الاية:".$row["aya_no"]."-رقم الصفحة :".$row["page"]."-بتاريخ:".$row["mdate"]."-الساعه:".$row["mtime"]."<br>";



      }if (isset($_SESSION['a1'])) {

     echo "تسجيل صوتي لسورة :".$_SESSION['sura1']."-";
      echo "من صفحة ".$_SESSION['pf1']."";
       echo "الى".$_SESSION['pt1']."";
     echo'-<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="';
      echo "".$_SESSION['a1']."";
      echo'" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>';echo "بتاريخ:".$_SESSION['m1date']."";echo "-".$_SESSION['m1time']."<br>";} echo " </div>
    </div>
  </div>"; 
      }else{echo "لايزجد سجلات لهذا العضو";}?>
  <?php
 $sql="SELECT * 
       
FROM  memories M,family F  WHERE
F.username='$user' AND F.username=M.username AND M.member=F.mbr2 AND M.member!=''  
;";
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
     echo'<div id="accordion">
  <div class="card">
    <div class="card-header" id="heading2">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">';
       echo "".$_SESSION['mbr12']."▼";
       echo'</button>
      </h5>
    </div>';
    echo' <div id="collapse2" class="collapse " aria-labelledby="heading2" data-parent="#accordion">
      <div class="card-body">';
           echo'سجلات القراءة والحفظ<br>';
    while($row = $result->fetch_assoc()) {
  
    echo "سجل قراءة :اسم السورة:".$row["sura_name_ar"]."-رقم الاية:".$row["aya_no"]."-رقم الصفحة :".$row["page"]."-بتاريخ:".$row["mdate"]."-الساعه:".$row["mtime"]."<br>";
   

      } if (isset($_SESSION['a2'])) {
     echo "تسجيل صوتي لسورة :".$_SESSION['sura2']."-";
      echo "من صفحة ".$_SESSION['pf2']."";
       echo "الى".$_SESSION['pt2']."";
     echo'-<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="';
      echo "".$_SESSION['a2']."";
      echo'" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>';echo "بتاريخ:".$_SESSION['m2date']."";echo "-".$_SESSION['m2time']."<br>";} echo " </div>
    </div>
  </div>";  
     
} 

?>
<?php
  $sql="SELECT * 
       
FROM  memories M,family F  WHERE
F.username='$user' AND F.username=M.username AND M.member=F.mbr3 AND M.member!=''    
;";
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    echo'<div id="accordion">
  <div class="card">
    <div class="card-header" id="heading3">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">';
      echo "".$_SESSION['mbr13']."▼";
        echo'</button>
      </h5>
    </div>';
    echo' <div id="collapse3" class="collapse " aria-labelledby="heading3" data-parent="#accordion">
      <div class="card-body">';
           echo'سجلات القراءة والحفظ<br>';
    while($row = $result->fetch_assoc()) {
   
  
      echo "سجل قراءة :اسم السورة:".$row["sura_name_ar"]."-رقم الاية:".$row["aya_no"]."-رقم الصفحة :".$row["page"]."-بتاريخ:".$row["mdate"]."-الساعه:".$row["mtime"]."<br>";
      

      } if (isset($_SESSION['a3'])) {
     echo "تسجيل صوتي لسورة :".$_SESSION['sura3']."-";
      echo "من صفحة ".$_SESSION['pf3']."";
       echo "الى".$_SESSION['pt3']."";
     echo'-<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="';
      echo "".$_SESSION['a3']."";
      echo'" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>';echo "بتاريخ:".$_SESSION['m3date']."";echo "-".$_SESSION['m3time']."<br>";} echo " </div>
    </div>
  </div>";  
     
 } 

?>
<?php
  $sql="SELECT * 
       
FROM  memories M,family F  WHERE
F.username='$user' AND F.username=M.username AND M.member=F.mbr4 AND M.member!=''  
;";
  $result = mysqli_query($connection, $sql);
  if ($result->num_rows > 0) {
    echo'<div id="accordion">
  <div class="card">
    <div class="card-header" id="heading4">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">';
         echo "".$_SESSION['mbr14']."▼";
         echo'</button>
      </h5>
    </div>';
    echo' <div id="collapse4" class="collapse " aria-labelledby="heading4" data-parent="#accordion">
      <div class="card-body">';
          echo'سجلات القراءة والحفظ<br>';
    while($row = $result->fetch_assoc()) {
   
  
  
      
      
      echo "سجل قراءة :اسم السورة:".$row["sura_name_ar"]."-رقم الاية:".$row["aya_no"]."-رقم الصفحة :".$row["page"]."-بتاريخ:".$row["mdate"]."-الساعه:".$row["mtime"]."<br>";
      if (isset($_SESSION['a4'])) {
     echo "تسجيل صوتي لسورة :".$_SESSION['sura4']."-";
      echo "من صفحة ".$_SESSION['pf4']."";
       echo "الى".$_SESSION['pt4']."";
     echo'-<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="';
      echo "".$_SESSION['a4']."";
      echo'" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>';echo "بتاريخ:".$_SESSION['m4date']."";echo "-".$_SESSION['m4time']."<br>";} echo " </div>
    </div>
  </div>";  
}
      }


?>
  <?php
if (isset($_POST["family"])) {
  $username = $user;
  $mbr1 = mysqli_real_escape_string($connection, $_POST['mbr1']);
  $mbr2 = mysqli_real_escape_string($connection, $_POST['mbr2']);
  $mbr3 = mysqli_real_escape_string($connection, $_POST['mbr3']);
  $mbr4 = mysqli_real_escape_string($connection, $_POST['mbr4']);
$sql = "INSERT INTO  `family` (username, mbr1,mbr2,mbr3,mbr4) VALUES ('$username', '$mbr1','$mbr2','$mbr3','$mbr4') ";
  $result = mysqli_query($connection, $sql); 
  if($result){
    echo "تم اضافة افراد العائلة";
    echo'<meta http-equiv="refresh" content="1">';
  }}

  ?>
  


  
<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>