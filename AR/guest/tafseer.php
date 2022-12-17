<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
	@font-face {
  font-family: bodyfont;
  src: url(./UthmanicHafs1Ver16.ttf);
}
		


		body{
			font-family: bodyfont;
			color: red;
			font-size: 20px;
		}
		#tafseer{
			color: black;
		}
		#aya{
			color: darkgreen;
			font-weight: bold;
		}
		.opener {
  background-color: #B1D8B7;
  color: #333;
  text-align: center;
}

.opener::after {
  display: block;
  content: "";
  border-top: 100px solid #B1D8B7;
  border-left: 100vw solid transparent;
  background-color: #fff;
}
  
.wrapper {
  padding: 30px;
}

.content {
  margin: 0 auto;
  padding: 10px;
  max-width: 910px;
}
	</style>
</head>
<body>


<?php
require("db.php");
require("connect.php");

?>

<?php
if(isset($_GET['ID'])){
require("db.php");
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


  	<small>التفسير الميسر

  		</small></h1>
   </div></header>


<?php

$sql="SELECT *
       
FROM   tafseer WHERE
 sura_no='$ID' GROUP BY id  
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

	
echo"<p id=aya>{".$row["aya_text"]."}</p>";
echo"<p id=tafseer>".$row["aya_tafseer"]."</p><br>";

}}}

?>

</body>
</html>