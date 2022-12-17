
<!-- Image and text -->
<nav class="navbar navbar-dark bg-dark" style="background-color: #121212;">
  <a class="navbar-brand" href="#">
    
      الْقُرْآنِ الْكَرِيمِ
    
  </a>
  <a class="text-dark" href="logout.php">Logout</a>
    <a class="btn btn-sm btn-outline-primary m-2"  href="userp.php">
      <?php echo"$user";?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="home">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="sour.php">قائمة السورة</a>
      <a class="nav-item nav-link" href="userp.php">الملف الشخصي وتفضيلات المستخدم</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>
