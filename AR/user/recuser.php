<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="rtl">
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
@include"../../config/db.php";
@include"../../config/connect.php";
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
@include"../../config/db.php";
@include"../../config/connect.php";
$ID = $_GET["ID"];

?>
</head>
<header class="opener">
  <div class="wrapper">
      <h1> 
        <?php

$sql="SELECT DISTINCT sura_name_ar
       
FROM   sour WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"تسميع سورة ".$row["sura_name_ar"]."";
                
        
     }}

?>

</h1>
  </div>
</header>
<body>
    <a href="mem.php">انقر هنا لعرض تسجيلاتك السابقة</a>
    <div class="container">
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?></div>

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

<?php

$sql="SELECT * 
       
FROM   sour WHERE
sura_no='$ID' GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     



echo"<input type=text name=sura_name_ar value=".$row["sura_name_ar"]." hidden>";
echo"<input type=text name=sura_name_en value=".$row["sura_name_en"]." hidden>";

        
     }

      

   

    }else{echo"error";};
        ?>

<input type="submit" name="rec" value="عرض">
<br>

  
<?php

if (isset($_POST["rec"])) {
    if (isset($_SESSION['mbr1'])) {
 
   $mbr1=$_SESSION['mbr1'];
  
  $amember = mysqli_real_escape_string($connection, $mbr1); 

}

if (isset($_SESSION['mbr2'])) {
  
   $mbr2=$_SESSION['mbr2'];
$amember = mysqli_real_escape_string($connection, $mbr2); 

}
if (isset($_SESSION['mbr3'])) {
 
   $mbr3=$_SESSION['mbr3'];
  $member = mysqli_real_escape_string($connection, $mbr3); 

}
if (isset($_SESSION['mbr4'])) {
  
   $mbr4=$_SESSION['mbr4'];
 $amember = mysqli_real_escape_string($connection, $mbr4); 

   
}
    $from = mysqli_real_escape_string($connection, $_POST['from']);
    $to = mysqli_real_escape_string($connection, $_POST['to']);
    $sura_no = mysqli_real_escape_string($connection, $ID);
$sura_name_en =mysqli_real_escape_string($connection, $_POST['sura_name_en']);
$sura_name_ar = mysqli_real_escape_string($connection, $_POST['sura_name_ar']);
$mdate= date_default_timezone_set("Asia/Riyadh");
  $mdate=date('Y-m-d H:i:s');
  $mtime= date_default_timezone_set("Asia/Riyadh");
  $mtime=date("h:i:sa");
$_SESSION['sura_no'] = $sura_no;
$_SESSION['sura_name_en'] = $sura_name_en;
$_SESSION['sura_name_ar'] = $sura_name_ar;
$_SESSION['p_from'] = $from;
$_SESSION['p_to'] = $to;
$_SESSION['mdate'] = $mdate;
$_SESSION['mtime'] = $mtime;
$sql="SELECT *
       
FROM   sour  WHERE
sura_no='$ID' AND page BETWEEN $from AND $to  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    include 'rec.html';
    echo'<div class="sour">
';



echo"<br>";
   echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#1';

echo'">';
echo "اظهار المحتوى القرآني<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="1';


  echo'" class="collapse">
    ';
    echo "<input type=text name=p_from value=$from hidden>";
        echo "<input type=text name=p_to value=$to hidden>";
while($row = $result->fetch_assoc()) {

echo"<p id=audioaya>".$row["aya_text"]."</p>";
 echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
        



}
    echo'
      </div></div>';} }

?>

</div>

    </form>





</body>
</html>
<?php

 }} else {
   ?>
   
   <?php
@include"login.php";
 }?>