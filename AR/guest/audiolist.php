
<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>منصة الكتاب المبين-قائمة سور القران الكريم</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<div class="example">
<?php
@include 'navbar.php';

?>
<center>
	<div class="container">
<body>



	<form method="POST">
<h1>قائمة سور القرآن الكريم</h1>

<?php
require("../../config/db.php");
$sql="SELECT DISTINCT sura_no,sura_name_ar,sura_name_en
       
FROM   sour
GROUP BY id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {


echo "<a id=sour href='audio.php?ID={$row['sura_no']}'>" . $row["sura_name_ar"]. "-"  . $row["sura_name_en"].  "</a>          ";




}}else{echo "there is something wrong!";}

?>



<br>



</form>
</center></span>
</body></div>
</div>
</html>

