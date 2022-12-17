<?php
 session_start();


 if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html dir="rtl">
<head>
    <title></title>
            <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        

                    


<meta name="description" content="CDN Bootstrap">
       
        <script src="../../style/bootstrap.min.js"></script>

<script src="../../style/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="../../style/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../../style/bootstrap2.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
   


</script>



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
      <h1> 
        
      تتبع الحفظ
</h1>
  </div>
</header>
<body>

<div class="sour">

    



        <?php

$sql="SELECT *
       
FROM   audiorec WHERE
username='$user' GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

      echo'<audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="';
      echo "".$row['audio']."";
      echo'" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>';

echo"<p id=audioaya>".$row["sura_name_ar"]."</p>";
               
echo'<div class="container" ><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#';
echo"".$row["id"]."";
echo'">';
echo "<img src=../../images/exp.png height=20px>";
echo'</button>
  <div id="';
echo"".$row["id"]."";

  echo'" class="collapse">
    ';
echo"<p id=tafseer>من صفحة".$row["p_from"]."</p>";echo"الى<p id=tafseer>".$row["p_to"]."</p>";

    echo'
      </div></div>';
 

            


        
     }}else{echo"no data";}

      

    ?>
</ul>
</div>
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
    len = tracks.length -0;
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
 



 

</body>
</html>
<?php

 } else {
   ?>
   
   <?php
@include"login.php";
 }?>