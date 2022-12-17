<?php
session_start();?>
 
 <!DOCTYPE html>
<html dir="rtl">
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="loginstyle.css">

 <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet prefetch" href="normalize.min.css"/>
                        <script src="jquery-2.2.4.min.js"></script>
                        



<meta name="description" content="CDN Bootstrap">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<div class="example">
<nav class="navbar navbar-light" style="background-color:  #006B3C; color: white;">
  <a class="navbar-brand" href="#" style="color:white;">
    
      الْقُرْآنِ الْكَرِيمِ
    
  </a>

   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="home">Home <span class="sr-only">(current)</span></a>
      
    </div>
  </div>
</nav>
<header class="opener">
  <div class="wrapper">
<h1>تسجيل الدخول</h1>

</div></header>
	<div class="container">



 <?php

require_once('../config/connect.php');
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password =hash('sha256',$_POST['password']);

	$sql = "SELECT * FROM `admincp` WHERE adminusername='$username' AND adminpassword='$password'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['adminusername'] = $username;
	}else{

		$fmsg = "<div class='fmsg fmg'>بيانات غير صحيحة تاكد من  اسم المستخدم وكلمة المرور</div>";

		
	}
}
if(isset($_SESSION['adminusername'])){
	$smsg = "<div class='smsg'>دخول ناجح</div>";
	echo "
	<meta HTTP-EQUIV='REFRESH' content='0; url=dashboard.php'/>";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>User Login in PHP & MySQL</title>
	<!-- Latest compiled and minified CSS -->
	

	<!-- Latest compiled and minified JavaScript -->
	<script src="" ></script>

	
</head>

<body style="background-color:#B1D8B7;">
    <div class="account-wall">
                <img class="profile-img" src="../images/photo.png"
                    alt="">
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <form class="form-signin" method="POST" id="login">
        <h2 class="form-signin-heading">تسجيل الدخول</h2>
        <div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">@</span>
		  <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" required>
		</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="كلمة المرور" required>
        <button class="btn btn-outline-success" type="submit">دخول</button>
        
      
      </form>
</div></div>
</body>
</html>