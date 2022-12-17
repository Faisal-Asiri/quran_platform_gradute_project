
<?php require("connect.php");?>

<form method="POST">
<select name="sour">
<?php 
$sql="SELECT  distinct sura_name_ar,sura_no
       
FROM   sour GROUP BY id  
;";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
       echo"<option value='".$row["sura_no"]."'>".$row["sura_name_ar"]."</option>";
        }
     }else{
       echo "error"; 
     }
?>
</select>
<?php require("connect.php");?>
<select name="rec">
<?php 
$sql="SELECT  *
       
FROM   recitation GROUP BY id  
;";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
       echo"<option value='".$row["id"]."'>".$row["namear"]."</option>";
        }
     }else{
       echo "error"; 
     }
?>
</select>
<input type="submit" name="submit" value="التالي">

</form>
<?php
if(isset($_POST['submit'])){
   $sour=mysqli_real_escape_string($connection, $_POST['sour']);
   $rec=mysqli_real_escape_string($connection, $_POST['rec']);
   echo "<a href='go.php?SNO=$sour&RNO=$rec'>انتقل للشاشة</a>";
}
?>