<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html >
<head>
    
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
 <title><?php
if(isset($_GET['ID'])){
require("../../config/db.php");
require("../../config/connect.php");
$ID = $_GET["ID"];

?>



<?php

$sql="SELECT DISTINCT sura_name_ar,sura_name_en
       
FROM   sour WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"".$row["sura_name_ar"]."-";
                echo"".$row["sura_name_en"]."";
                
        
     }}}

?></title>
</head>
<?php
if(isset($_GET['ID'])){
require("../../config/db.php");
require("../../config/connect.php");
$ID = $_GET["ID"];

?>

<header class="opener">
  <div class="wrapper">
      <h1>

<?php

$sql="SELECT DISTINCT sura_name_ar,sura_name_en
       
FROM   sour WHERE
sura_no='$ID'  ORDER BY id DESC
LIMIT 1;
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     

                echo"".$row["sura_name_ar"]."-";
                echo"".$row["sura_name_en"]."";
                
        
     }}

?>
<br>

    <small>  No:

        <?php echo"$ID"?></small></h1>
    Total No of verses:<br>
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
    
<?php  



$sql="select * from memories where username = '".$_SESSION['username']."' ORDER BY id DESC
LIMIT 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {echo "Your current progress <table><tr>";

while($row = $result->fetch_assoc()) {
echo "<tr><th>Surah/Chapter Name</th><th>Verse No</th><th>Page No</th><th>Follow your progress</th></tr><tr>";

echo "<td>".$row["sura_name_ar"]."";
echo"".$row["sura_name_en"]."</td>";
echo "<td>".$row["aya_no"]."</td>";
echo "<td>".$row["page"]."</td>";
echo "<td><a href='chapter.php?ID=";
echo "".$row["sura_no"]."'";
echo ">click here</a></td></tr>";

echo "</table>";




}}else{echo "You have not saved your progress - click on the verse number to save";
}




?>  







    

display style  <img src="../../images/display.png" height="50px">
<div id="flag">
<form method="POST">


<?php

$sql="SELECT  DISTINCT displaytype
       
FROM  userpre  WHERE
username='$user'  GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     if($row['displaytype']=="verses"){

echo"display";
echo" ";
echo"verses";
echo" ";
echo"from";
        
     }

 if($row['displaytype']=="chapter"){

echo"display";
echo" ";
echo"chapters";
echo" ";
echo"from";
        
     }

      if($row['displaytype']=="page"){

echo"display";
echo" ";
echo"Pages";
echo" ";
echo"from";
        
     }
      



    }}else{echo"error";};

?>





    <select name="from">


<?php

$sql="SELECT DISTINCT S.aya_no,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     if($row['displaytype']=="verses"){

echo"<option>";
echo"".$row["aya_no"]."";
echo"</option>";
        
     }


      

    echo"ok";

    }}else{echo"error";};

?>











<?php

$sql="SELECT DISTINCT S.jozz,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     if($row['displaytype']=="chapter"){

echo"<option>";
echo"".$row["jozz"]."";
echo"</option>";
        
     }


      

    echo"ok";

    }}else{echo"error";};

?>




<?php

$sql="SELECT DISTINCT S.page,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
if($row['displaytype']=="page"){

echo"<option>";
echo"".$row["page"]."";
echo"</option>";

        
     }

      

    echo"ok";

    }}else{echo"error";};

?>

</select>
to
<select name="to">


<?php

$sql="SELECT DISTINCT S.aya_no,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     if($row['displaytype']=="verses"){

echo"<option>";
echo"".$row["aya_no"]."";
echo"</option>";
        
     }


      

    echo"ok";

    }}else{echo"error";};

?>

<?php

$sql="SELECT DISTINCT S.jozz,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     if($row['displaytype']=="chapter"){

echo"<option>";
echo"".$row["jozz"]."";
echo"</option>";
        
     }


      

    echo"ok";

    }}else{echo"error";};

?>




<?php

$sql="SELECT DISTINCT S.page,U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
if($row['displaytype']=="page"){

echo"<option>";
echo"".$row["page"]."";
echo"</option>";

        
     }

      

    echo"ok";

    }}else{echo"error";};

?>

</select>
<?php

$sql="SELECT DISTINCT U.displaytype
       
FROM   sour S, userpre U WHERE
U.username='$user'  AND S.sura_no='$ID' GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
if($row['displaytype']=="full"){

echo "يتم عرض كامل السورة";

        
     }

     if($row['displaytype']=="chapter"){

echo'<input type="submit" name="show">';

        
     }
if($row['displaytype']=="page"){

echo'<input type="submit" name="show">';

        
     }
    if($row['displaytype']=="verses"){

echo'<input type="submit" name="show">';

        
     }  

    

    }}else{};

?>

</form>
</div>
<form method="POST">
    Audio content <img src="../../images/aud.png" height="50px">
    <div class="trapezoid">
<div class="rect rect-default rect-panel" id="logo">
            <audio id="recitation" autoplay preload="auto" tabindex="0" controls>
                <?php if ($ID=='1' or $ID== '9'){   echo'<source src="../../mp3/2.mp3">';}else{ echo'
                <source src="../../mp3/1.mp3">';}?>
            </audio>
        </div>
    </div>
  
  
   


Quranic content<img src="../../images/conn.png" height="50px">
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
               
            </a></li><br>

        <?php
if (isset($_POST["show"])) {
    $from = mysqli_real_escape_string($connection, $_POST['from']);
    $to = mysqli_real_escape_string($connection, $_POST['to']);
$sql="SELECT *
       
FROM   sour S, userpre U,tafseer T,en_sahih E  WHERE
U.username='$user'  AND S.sura_no='$ID' AND T.id=S.id AND E.index=S.id AND S.aya_no BETWEEN $from AND $to  GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
$repno=$row["repno"];
if($row['displaytype']=="verses"){
if($row['repno']=="1"){
for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'

            </a></li>';

        }
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";
    echo'
      </div></div>';



        
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";
     }else{

for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                </a></li>';}
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'
            ';
            
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";

        
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";
    echo'
      </div></div>';



       

     }}}


    }else{echo"";};

?>


 <?php

$sql="SELECT *
       
FROM   sour S, userpre U ,tafseer T,en_sahih E  WHERE
U.username='$user'  AND S.sura_no='$ID' AND T.id=S.id AND E.index=S.id AND page BETWEEN $from AND $to  GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
$repno=$row["repno"];
if($row['displaytype']=="page"){
if($row['repno']=="1"){
for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'
            </a></li>';}
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";
        
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";

    echo'
      </div></div>';



       
     }else{

for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                </a></li>';}
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'
            ';
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";
        
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";

    echo'
      </div></div>';



       

     }}}



    }else{echo"";};

?>       
<?php

$sql="SELECT *
       
FROM   sour S, userpre U ,tafseer T,en_sahih E  WHERE
U.username='$user'  AND S.sura_no='$ID' AND T.id=S.id AND E.index=S.id AND jozz BETWEEN $from AND $to  GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
$repno=$row["repno"];
if($row['displaytype']=="chapter"){
if($row['repno']=="1"){
for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'
            </a></li>';}
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";
        
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";
    echo'
      </div></div>';



       
     }else{

for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a  id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                </a></li>';}
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'
            ';
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";
        
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";
    echo'
      </div></div>';



       

     }}}


      



    }}else{echo"";};

?>

<?php

$sql="SELECT *
       
FROM   sour S, userpre U ,tafseer T,en_sahih E  WHERE
U.username='$user'  AND S.sura_no='$ID' AND T.id=S.id AND E.index=S.id   GROUP BY S.id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     
$variable3=$row["recitationpath"];
$variable=$row["sura_no"];
$variable2=$row["aya_no"];
$repno=$row["repno"];
if($row['displaytype']=="full"){

if($row['repno']=="1"){
for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'
            </a></li>';}
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";
      
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";
    echo'
      </div></div>';



        
     }else{

for($z=0;$z<$repno;$z++){


       echo'<li class="list-rec" id="ayasc" >
            <a id="list-rec-audio" href="../../mp3/';
            echo "$variable3/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                </a></li>';}
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo'
            ';
echo "<button name=aya_no value= " . $row["aya_no"]. " id=save><img src=../../images/bookmark.png height=20px></button>";
        
        echo " <input type=text name=sura_name_ar hidden value= " . $row["sura_name_ar"]. "> ";
        echo " <input type=text name=sura_name_en hidden value= " . $row["sura_name_en"]. "> ";
echo " <input type=text name=page hidden value= " . $row["page"]. "> ";

echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["t_aya_no"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["t_aya_no"]."";

  echo'" class="collapse">
    ';

echo"<p id=tafseer>".$row["text"]."</p>";

    echo'
      </div></div>';



        

     }}}
      



    }else{echo"";};

?>

        
        
           
    </ul></form>
    <?php

    ?>
<?php

if (isset($_POST["aya_no"])) {

$username = mysqli_real_escape_string($connection, $user);
$sura_no = mysqli_real_escape_string($connection, $ID);
$sura_name_ar = mysqli_real_escape_string($connection, $_POST['sura_name_ar']);
$sura_name_en = mysqli_real_escape_string($connection, $_POST['sura_name_en']);
$aya_no = mysqli_real_escape_string($connection, $_POST['aya_no']);
$page = mysqli_real_escape_string($connection, $_POST['page']);
$sql = "INSERT INTO `memories` (username, sura_no,sura_name_en,sura_name_ar,aya_no,page) VALUES ('$username', '$sura_no','$sura_name_en', '$sura_name_ar','$aya_no','$page')";
    $result = mysqli_query($connection, $sql);
    if($result){
        echo "تم الحفظ";
        echo'<meta http-equiv="refresh" content="1">';
    }else{
        echo "error";
    }
}




?>
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
echo "<a  id=sour href='chapter.php?ID=$next'>next chapter</a>";}


elseif ($ID=='114'){
    echo "<a id=sour href='chapter.php?ID=$previous'>previous chapter</a>";
}



else{
    echo "<a id=sour href='chapter.php?ID=$next'>next chapter</a>";
    echo "<a id=sour href='chapter.php?ID=$previous'>previous chapter</a>";

}




?>


<script type="text/javascript">
</script>

</html>
<?php

 }} else {
   ?>
   
   <?php
@include"login.php";
 }?>