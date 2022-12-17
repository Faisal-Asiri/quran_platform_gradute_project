<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XH5CXTYJVK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XH5CXTYJVK');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2544312482829427"
     crossorigin="anonymous"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        

                    
<link rel="stylesheet" type="text/css" href="homestyle.css">

<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<nav class="navbar navbar-light" style="background-color:  #006B3C; color: white;">
  <a class="navbar-brand" href="#" style="color:white;">
    
      <img src="../images/qmo-logo-white.png "height=40px>
    
  </a>
<a class="navbar-brand" href="../AR" style="color:white;">AR</a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="home">Home <span class="sr-only">(current)</span></a>
      
    </div>
  </div>
</nav>
<body><header class="opener">
  <div class="wrapper">
      <p>قال تعالى:</p>
    <div id="homeaya"  class="line-1 anim-typewriter">
<?php
require("../config/db.php");
require("../config/connect.php");



           


$sql="SELECT *
       
FROM   sour S, en_sahih E  WHERE
  S.sura_no IN(2)  AND S.aya_no IN(185) AND  E.index=S.id  GROUP BY S.id  
;";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {


echo "".$row["aya_text"]."</div></h1><br>";
echo "<small id=eng>".$row["text"]."</small><br>";
echo "-<small>".$row["sura_name_ar"]."";
echo "-".$row["sura_name_en"]."</small>";



}}else{echo "error";
}




?></div></header><center>  
</div>
<button type="button" onclick="location.href='user/sour.php'"  class="btn btn-outline-success">User Version</button>
<button type="button" onclick="location.href='guest/sour.php'" class="btn btn-outline-success">Guest Version</button>
</body>
</html>