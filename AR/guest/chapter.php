
<!DOCTYPE html>
<html dir="rtl">
<head>
        <title>
        <?php


@include 'user.php';
require("../../config/db.php");
require("../../config/connect.php");
?>
<?php
if(isset($_GET['ID'])){
require("../../config/db.php");
require("../../config/connect.php");
$ID = $_GET["ID"];

?>
<?php

$sql="SELECT DISTINCT sura_name_ar
       
FROM   sour WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"سورة ".$row["sura_name_ar"]."";
                
        
     }}}

?>
- منصة الكتاب المبين 

    </title>
    <link rel="icon" type="image/x-icon" href="../../images/favicon.ico">
            <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
   
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
<?php
if(isset($_GET['ID'])){
require("../../config/db.php");
$ID = $_GET["ID"];

?>

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
     

                echo"سورة ".$row["sura_name_ar"]."";
                
        
     }}

?>


    <small>  ورقمها :

        <?php echo"$ID"?></small></h1>
    عدد اياتها<br>
    <?php

$sql="SELECT DISTINCT aya_no
       
FROM   sour WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"".$row["aya_no"]."";
                
        
     }}

?>

  </div>
</header>


<center>
    <div class="example">





    
        <div class="container">
    <div class="shaped"></div>
    <div class="content">
<body>
    






    


<form method="POST">
    المحتوى الصوتي <img src="../../images/aud.png" height="50px">
    <div class="trapezoid">
        <form method="POST">
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
<input type="submit" name="show">
    </form>
<div class="rect rect-default rect-panel" id="logo">
    <div class="recitation">
            <audio id="recitation" autoplay preload="auto" tabindex="0" controls>
                <?php if ($ID=='1' or $ID== '9'){   echo'<source src="../../mp3/2.mp3">';}else{ echo'
                <source src="../../mp3/1.mp3">';}?>
            </audio>
        </div>
    </div>
  </div>
  
   



المحتوى القرآني<img src="../../images/conn.png" height="50px">
<div class="sour">


        

 <ul id="playlist">
        
       <li class="active list-rec" id="audioaya">

            <a href="../../mp3/2.mp3" id="list-rec-audio">
                <?php
if ($ID=='1' or $ID== '9'){ 

echo "";
}else{
    echo "<P>‏ ‏‏ ‏‏‏‏ ‏‏‏‏‏‏ ‏</P>";
   
}


?>
               
            </a></li>
            <br>

        <?php
if (isset($_POST["show"])) {
   
$sql="SELECT *
       
FROM   sour S, userpre U,tafseer T,en_sahih E  WHERE
 S.sura_no='$ID' AND T.id=S.id AND E.index=S.id AND S.aya_no  GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
$variable3=mysqli_real_escape_string($connection, $_POST['recitation']);
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
$repno = mysqli_real_escape_string($connection, $_POST['repno']);
if($repno=="1"){
for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="https://everyayah.com/data/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'

            </a></li>';

        }

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';
echo"<p id=tafseer>".$row["t_aya_tafseer"]."</p>";

    echo'
      </div></div>';



        
       
     }else{
     for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="https://everyayah.com/data/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                </a></li>';}
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
           
            


        


echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';
echo"<p id=tafseer>".$row["t_aya_tafseer"]."</p>";

    echo'
      </div></div>';



       

     }}}


    }else{


        $sql="SELECT *
       
FROM   sour S, userpre U,tafseer T,en_sahih E  WHERE
 S.sura_no='$ID' AND T.id=S.id AND E.index=S.id AND S.aya_no  GROUP BY S.id LIMIT 7 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

$variable=$row["sura_no"];
$variable2=$row["aya_no"];




       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="https://everyayah.com/data/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'

            </a></li>';

        

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button><div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';
echo"<p id=tafseer>".$row["t_aya_tafseer"]."</p>";

    echo'
      </div></div>';



        
       
     }
    }}
?>


 
    </ul></form>
    
 <script type="text/javascript">
    var audio;
var playlist;
var tracks;
var current;

init();
function init(){
    current = 0;
    audio = $('#recitation');
    playlist = $('#playlist');
    tracks = playlist.find('li a');
    len = tracks.length - 0;
    audio[0].volume = 1;
    audio[0].play();
    playlist.find('a').click(function(e){
        e.preventDefault();
        link = $(this);
        current = link.parent().index();
        run(link, audio[0]);
    });
    audio[0].addEventListener('ended',function(e){
        current++;
        if(current == len){
            current = 0;
            link = playlist.find('a')[0];
        }else{
            link = playlist.find('a')[current];    
        }
        run($(link),audio[0]);
    });
}
function run(link, player){
        player.src = link.attr('href');
        par = link.parent();
        par.addClass('active').siblings().removeClass('active');
        audio[0].load();
        audio[0].play();
}

</script>


<br>
<br>
<br>
</div>
</div></div></div></div>
</body></div>
<?php
require("../../config/db.php");
require("../../config/connect.php");
$next=$ID+1;
$previous=$ID-1;
if ($ID=='1'){  
echo "<a  id=sour href='chapter.php?ID=$next'>السورة التالية</a>";}


elseif ($ID=='114'){
    echo "<a id=sour href='chapter.php?ID=$previous'>السورة السابقة</a>";
}



else{
    echo "<a id=sour href='chapter.php?ID=$next'>السورة التالية</a>";
    echo "<a id=sour href='chapter.php?ID=$previous'>السورة السابقة</a>";

}




?>


<script type="text/javascript">
</script>

</html>
<?php

  
 }else{include"sour.php";}?>