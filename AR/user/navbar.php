

<!-- Image and text -->

<nav class="navbar navbar-light" style="background-color: #B1D8B7;">
    <a class="navbar-brand" href="../index.php" style="color:white;">
    
      <img src="../../images/qmo-logo-black.png "height=40px>
    
  </a>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XH5CXTYJVK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XH5CXTYJVK');
</script>
<a class="navbar-brand" href="../../EN" style="color:black;">EN</a>
   <a class="text-dark" href="logout.php">Logout</a>
    <a class="btn btn-sm btn-outline-primary m-2"  href="userp.php"><?php echo"$user";?></a>
    <?php

if (isset($_SESSION['mbr1'])) {
 
   $mbr1=$_SESSION['mbr1'];

   echo "حساب عائلي :<a href=family.php>$mbr1</a>";
   echo "<a href=welcome.php><img src=../../images/changefu.png height=40px></a>";

}

if (isset($_SESSION['mbr2'])) {
  
   $mbr2=$_SESSION['mbr2'];
    echo "حساب عائلي :<a href=family.php>$mbr2</a>";
    echo "<a href=welcome.php><img src=../../images/changefu.png height=40px></a>";


}
if (isset($_SESSION['mbr3'])) {
 
   $mbr3=$_SESSION['mbr3'];
    echo "حساب عائلي :<a href=family.php>$mbr3</a>";
    echo "<a href=welcome.php><img src=../../images/changefu.png height=40px></a>";


}
if (isset($_SESSION['mbr4'])) {
  
   $mbr4=$_SESSION['mbr4'];
   echo "حساب عائلي :<a href=family.php>$mbr4</a>";
   echo "<a href=welcome.php><img src=../../images/changefu.png height=40px></a>";


   
}
  ?><button onclick="goBack()" id="back">العودة للخلف</button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
 <a class="nav-item nav-link" href="../index.php">الرئيسية</a>
    <a class="nav-item nav-link" href="../index.php#serv">الخدمات</a>
 <a class="nav-item nav-link" href="../aboutus.php">عن المشروع</a>
      <a class="nav-item nav-link" href="sour.php">قائمة السور</a>
      <a class="nav-item nav-link" href="userp.php">الملف الشخصي وتفضيلات المستخدم</a>
      <a class="nav-item nav-link" href="search.php">البحث</a>
      <a class="nav-item nav-link" href="sessions.php">حلقات التحفيظ</a>
      <a class="nav-item nav-link" href="../guest/audio.php">استمع للقران الكريم كاملا</a>
      <a class="nav-item nav-link" href="../guest/list.php">النسخة المصورة  للمصحف</a>
      <a class="nav-item nav-link" href="../guest/audior.php">الرقية الشرعية</a>
                  <a class="nav-item nav-link" href="../guest/morning.php">أذكار الصباح</a>
                        <a class="nav-item nav-link" href="../guest/night.php">أذكار المساء</a>
                                              <a class="nav-item nav-link" href="../guest/klist.php">الختمة
                      </a>
<a class="nav-item nav-link" href="../guest/azkar.php">احب الكلام الى الله
                      </a>


     
      
    </div>
  </div>
</nav>






<script>
function goBack() {
  window.history.back();
}
</script>

