<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="rtl">
<head>
  <title>منصة تحفيظ القران الكريم اون لاين - الملف الشخصي</title>
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

<?php
if(isset($_GET['ID'])){
require("../../config/db.php");
require("../../config/connect.php");
$ID = $_GET["ID"];

?>  
</head>
<header class="opener">
  <div class="wrapper">
      <h1><?php

$sql="SELECT DISTINCT sura_name_ar
       
FROM   sour WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"سورة ".$row["sura_name_ar"]."";
                
        
     }}

?>
</h1>
  </div>
</header>
<h1>اختر الصفحات التي ترغب في تسميعها</h1>
    
   <form method="POST" enctype="multipart/form-data">
من صفحة
    <select name="from">
        <?php

$sql="SELECT DISTINCT page
       
FROM   sour WHERE
sura_no='$ID' GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     


echo"<option>";
echo"".$row["page"]."";
echo"</option>";

        
     }

      

    echo"ok";

    }else{echo"error";};
        ?>
    </select>
       الى

       <select name="to">

            <?php

$sql="SELECT DISTINCT page
       
FROM   sour WHERE
sura_no='$ID' GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     


echo"<option>";
echo"".$row["page"]."";
echo"</option>";


        
     }

      

    echo"ok";

    }else{echo"error";};
        ?>
       </select>
<label>قارئك المفضل</label>



<?php

$sql = "SELECT * FROM `recitation`";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<select name=recitation>";
while($row = $result->fetch_assoc()) {



 echo"<option value=" .$row["path"].">";
    echo"".$row["namear"]."</option>";

} echo"</select>";}
    
    else{

        $fmsg = "<div class='fmsg fmg'>دخول فاشل تاكد من اسم المستخدم او كلمة المرور</div>";

        
    }


    ?>
</SELECT>
<label>تكرار التلاوة</label>
<select name="repno">
    
<?php
for ($i = 1; $i <= 100; $i++) {
    echo"<option>";
    echo $i;
    echo"</option>";
}
?>

</select> <p>بدون تكرار؟ دع القيمة =1*</p>

<input type="submit" name="rec" value="عرض">

</form>
<?php
if (isset($_POST["rec"])) {
$from = mysqli_real_escape_string($connection, $_POST['from']);
    $to = mysqli_real_escape_string($connection, $_POST['to']);
$sql="SELECT DISTINCT page
       
FROM   sour WHERE
sura_no='$ID' AND page BETWEEN $from AND $to  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

$variable4=$row["page"];

echo "<img src='qmoh/";
 echo sprintf("%'03d", $variable4);
 echo "___Hafs39__DM.jpg' width='500px'><br>";

}}}
?>       


<?php

 }} else {
   ?>
   
   <?php
@include"login.php";
 }?>