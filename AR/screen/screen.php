<?php
require("connect.php");
?>
<!DOCTYPE html>
<html dir="rtl">
<head>

        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            // Find the right method, call on correct element
function launchFullScreen(element) {
  if(element.requestFullScreen) {
    element.requestFullScreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  }
}

// Launch fullscreen for browsers that support it!
launchFullScreen(document.documentElement); // the whole page
launchFullScreen(document.getElementById("pg")); // any individual element
        </script>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style type="text/css">
            @font-face {
  font-family: myFirstFont;
  src: url(quran.ttf);
}
@font-face {
  font-family: google;
  src: url(Tajawal-Regular.ttf);
}
            #audioaya{
                

                font-family:myFirstFont ;
                text-align: center;
                font-size: 40px;
                color:white;
                

            }
            body{
               
                margin: 0;
                background-color:black;
                
                background-image:linear-gradient( rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9) ), url("https://www.shangrilahawaii.org/static/media-flake-4bae4ebfe3bc3756538120471ce4dc6f.png");
                background-size: 100px;

                opacity: 0.9;
                
                background-repeat: repeat;
                
                font-family: google;


  
            }
            
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
 
 
  cursor: pointer;
}
audio { opacity: 0.0009;}
#myBtn:hover {
  background: #000;
  color: black;
}
audio::-webkit-media-controls-play-button {
  background-color: black;

 
}

h1{
    color:white;
    position: fixed;
  left: 50px;
    text-align:left;
    top:10px;
    font-family:google ;
}
h2{
    color:white;
    position: fixed;
    font-size:30px;
    width:100%;
    text-align:center;
    top:10px;
    font-family:google ;
}
#logo{
float:right;
}
#audioaya {
    color:white;
    text-align:center;
}
#eng{
  text-align: center;
   direction: ltr;
   color: white;
}
#text{
  position: fixed;
 
  
  bottom: 20%;
  width: 100%;
  animation: 4s anim-lineUp ease-out ;
}

@keyframes anim-lineUp {
  0% {
    opacity: 0;
    transform: translateY(80%);
  }
  20% {
    opacity: 0;
  }
  50% {
    opacity: 1;
    transform: translateY(0%);
  }
  100% {
    opacity: 1;
    transform: translateY(0%);
  }
}


        </style></head><body><div id="pg">
            
        <button id="myBtn" onclick="play()"><img id="logo" src="https://quranmo.com/images/qmo-logo-white.png" ></button>
        

<div class="content" id="content">

<?php
if(isset($_GET['ID'])){$ID = $_GET["ID"];}
if(isset($_GET['RNO'])){$RNO = $_GET["RNO"];}
?>
<?php
   $ID2=$ID+1;
$sql="SELECT *
       
FROM   sour S,en_sahih E,recitation R WHERE 
 S.id='$ID2' and  R.id='$RNO'and E.index=S.id  GROUP BY S.id  
;";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
echo'<audio controls id="video" width="1" height="1" autoplay >
    <source src="https://quranmo.com/mp3/';
while($row = $result->fetch_assoc()) {
    

$variable=$row["sura_no"];
$variable2=$row["aya_no"];
$path=$row["path"];

echo"$path/";



      
            

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo'.mp3" />
</audio>';



                echo"<h2>القارئ ".$row["namear"]."</h2>";
                 echo"<h1>سورة ".$row["sura_name_ar"]."</h1>";
                  echo"<div id='text'>";
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo"<p id=eng>".$row["text"]."</p></div>";
                

        }





        
       
     }else{


       echo "error";
        
       
     }
    
?>


 <button id="myBtn" onclick="myFunction()"></button>
</div>

<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>
    
 

<script type='text/javascript'>
    document.getElementById('video').addEventListener('ended',myHandler,false);
    function myHandler(e) {
        
        window.location = 'screen.php?ID=<?php echo($ID2);?>&RNO=<?php echo($RNO);?>';
        
    }
</script>

<script>
      function play() {
        var audio = document.getElementById("video");
        audio.play();
      }
    </script>

<br>
<br>
<br>
</div>
</div></div></div></div>
</body></div>


</html>
