
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>منصة الكتاب المبين - الرقية الشرعية</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                    


<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<?php

echo "<center>";

require("../../config/db.php");
require("../../config/connect.php");
?>
<?php echo'<link rel="stylesheet" type="text/css" href="style.css">';
@include 'navbar.php';


 ?>
</head>


<header class="opener">
  <div class="wrapper">
      <h1> الرقية الشرعية
</h1>
  </div>
</header>


<center>
	<div class="example">



<form method="POST">
	
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

<input type="submit" name="submit">
</form>

	
		<div class="container">
    <div class="shaped"></div>
    <div class="content">
<body>



<div id="flag">
<form method="POST">




</form>
</div>
<form method="POST">
	المحتوى الصوتي <img src="../../images/aud.png" height="50px">
	<div class="trapezoid">
<div class="rect rect-default rect-panel" id="logo">
            <audio id="recitation" autoplay preload="auto" tabindex="0" controls>
            	<?php  echo'
                <source src="../../mp3/1.mp3">';?>
            </audio>
        </div>
    </div>
  
  
   






        

 <ul id="playlist" hidden="">
        
       <li class="active list-rec" id="audioaya">

            <a href="../../mp3/2.mp3" id="list-rec-audio" >
       
<?php
if (isset($_POST["submit"])) {
	
	
		$recitationpath = mysqli_real_escape_string($connection, $_POST['recitation']);
		
$sql="SELECT *
       
FROM   sour 
    WHERE id IN(1,2,3,4,5,6,7,8,9,10,11,12,170,171,172,262,263,264,291,292,293,294,295,296,297,298,319,320,321,1008,1009,1010,1421,1422,1970,2111,2788,2789,2790,2791,3012,3789,3790,3791,3792,3793,3794,3795,4262,4932,4933,4934,4935,4936,4937,5448,5449,5450,5147,5148,5149,5150,5244,5245,5322,5323,547,1776,6222,6223,6224,6225,6226,6227,6228,6229,6230,6231,6232,6233,6234,6235,6236) 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
	 

$variable=$row["sura_no"];
$variable2=$row["aya_no"];



       echo'<li class="list-rec" id="ayasc" >
            <a  id="list-rec-audio" href="https://everyayah.com/data/';
            echo "$recitationpath/";

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);




            echo'.mp3">
                ';
                
                echo'
            ';
echo "</a></li>";
        echo'<br>';


	 }}}else{echo"";};

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
    audio[0].volume = 0.5;
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


<script type="text/javascript">
</script>

</html>
