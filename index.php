<!DOCTYPE html>
<html lang="en">
<head>
  <title>PORTAL_IT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
  
  <style>
  .fakeimg {
    height: 160px;
  }

  .fakeimg img {
    width : 210px;
    height: 160px;
  }
  </style>
</head>


<body>
<?php
$conn=mysqli_connect('localhost:3307','root','','db_noding');
?>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>PORTAL IT</h1>
  <p>Informasi Seputar Teknologi Informasi</p>
<img src="image/multimidea-2866159_960_720.png" width="300px">  
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="?">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="?berita">Berita</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
<?php
if(isset($_GET['berita'])){
	include "berita.php";
}
else{
?>
  <div class="row">
    <div class="col-sm-4">
      <h2>About Us</h2>
      <h5>Photo of us:</h5>
      <div class="fakeimg">
        <img src="image/MI.jpg">
      </div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      <h3>Some Links</h3>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Back To Top</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://www.polsri.ac.id/">Politeknik Negeri Sriwijaya</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2>NODING (Never Stop Coding)</h2>
      <h5>Pelatihan Desain Web, Jun 23, 2019</h5>
      <div class="fakeimg">
        <img src="image/Noding.png">
      </div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <br>
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
  <?php } ?>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
</div>

</body>
</html>
