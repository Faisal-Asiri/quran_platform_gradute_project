
<!DOCTYPE html>
<html dir="rtl">
<head>
        <title>
            منصة الكتاب المبين - أذكار الصباح

<?php

require("../../config/db.php");
require("../../config/connect.php");


?>


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
 <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 90px;
   background-color: darkgreen;
   color: white;
   text-align: center;
}
.zir {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
}
.zir2 {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
}
.zir3 {
  background-color: lightgray; /* Green */
  border: dotted;
  color: black;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
  background-color: white;
}
</style>
</head>


<header class="opener">
  <div class="wrapper">
      <h1>

أذكار الصباح

</h1>
    
    

  </div>
</header>


<center>
    <div class="example">





   
        
<body>
    


<?php

$sql="SELECT *
FROM   azkar WHERE
category='أذكار الصباح'  ORDER BY id 
;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
     echo'<div class="sour"> ';

                echo"".$row["zekr"]."<br><br><br>";
                echo"الوصف: ".$row["description"]."<br><br>";
                 echo"عدد التكرار : ".$row["count"]."<br>";
                 
                 echo'</div> ';
        echo "<br>";
     }}

?>



    











<br>
<br>
<br>
</div>
</body></div>

<div class="footer">
    <button id="add" class="zir">تسبيح</button>
 <span id="Value" class="zir3">0</span> 
 
<button id="reset" class="zir2">تصفير</button>
</div>

<script type="text/javascript">
   var a = 0;
var add = function(valueToAdd) {
    a += valueToAdd;
    document.getElementById('Value').innerHTML = a;
}

var reset = function() {
    a = 0;
    document.getElementById('Value').innerHTML = 0;
}


var addButton = document.querySelector("#add");
var resetButton = document.querySelector("#reset");

addButton.addEventListener("click", function() {
    add(1);
})

resetButton.addEventListener("click", function() {
    reset();
})
</script>

</html>
