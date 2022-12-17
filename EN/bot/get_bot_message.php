<?php
date_default_timezone_set('Asia/Riyadh');
include('database.inc.php');
$txt=mysqli_real_escape_string($connection,$_POST['txt']);
$sql="select * from sour where aya_text_emlaey like '%$txt%'";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
echo"اظنني اعرف ما تبحث عنه  ";
echo"<img src='image/smiley.png' height=15px> ...";

while($row = $result->fetch_assoc()) {


echo "{ ". $row["aya_text"].
" }";
echo " ". $row["sura_name_ar"].
"/";
echo "آية :". $row["aya_no"].
"<br>";
}}else{
	echo"لا اعتقد انني فهمت";
}


?>