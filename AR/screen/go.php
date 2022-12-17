<?php
require("connect.php");
?>
<?php
if(isset($_GET['SNO'])){$SNO = $_GET["SNO"];}
if(isset($_GET['RNO'])){$RNO = $_GET["RNO"];}
?>
<h1>يتم تجهيز كل شيء لإجلك انتظر قليلا</h1>
<img src="https://thumbs.gfycat.com/AstonishingGlitteringArizonaalligatorlizard-size_restricted.gif">
<?php 
$sql="SELECT  *
       
FROM   sour where sura_no='$SNO' LIMIT 1;
;";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
	   $ID=$row["id"];
	   $ID3=$ID-1;
	   
	   
       echo"<meta http-equiv='refresh' content='5; URL=screen.php?ID=$ID3&RNO=$RNO'/>";
        }
     }else{
       echo "error"; 
     }
?>
