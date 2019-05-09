<?php
  //Session cek
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  require "../config/config.php";
  //cek apakah tombol submit pernah di tekan apa belum
  if (isset($_POST["submit"])) {
    if(tambah($_POST)>0){
      echo "
        <script>
          alert('Data berhasil di tambahkan');
        </script>
      ";
    } else{
      echo "
        <script>
          alert('Data gagal di tambahkan');
        </script>

      ";
    }
  }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../resource/assets/css/bootstrap.min.css">
    <style media="screen">
      body {
        background-color: #f8f9fa;
      }
    </style>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">ISMALIST</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="member.php">Member</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="team.php">About Us</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Of Navbar -->
    <br><br>
    <!-- Content -->
    <section id="content" class="content mt-5">
      <div class="container">
        <div class="card p-4">
          <div class="card-title ml-3">
            <p style="font-weight:bold; font-size: 30px;">MY PROFILE</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <img src="../../resource/assets/img/avatar/2.png" class="w-100" alt="Photo">
              </div>
              <!-- Get user in session -->
              <?php	$id = $_SESSION["id"]; ?>
              <?php $bio = query("SELECT * FROM user WHERE id = '$id' "); ?>
              <!-- Get all data -->
              <?php foreach ($bio as $row): ?>
              <div class="col-sm-4">
                <p style="font-weight:bold; font-size: 20px;">Nama </p><p></p>
                <p><?= $row['nama']; ?></p>
                <p style="font-weight:bold; font-size: 20px;">Email </p><p></p>
                <p><?= $row['email']; ?></p>
                <p style="font-weight:bold; font-size: 20px;">No Hp </p><p></p>
                <p><?= $row['no_hp']; ?></p>
              </div>
              <div class="col-sm-4">
                <p style="font-weight:bold; font-size: 20px;">Date Of Birthday </p><p></p>
                <p><?= $row['date']; ?></p>
                <p style="font-weight:bold; font-size: 20px;">Jenis Kelamin </p><p></p>
                <p><?= $row['gender']; ?></p>
                <p style="font-weight:bold; font-size: 20px;">No Pemulihan </p><p></p>
                <p><?= $row['no_pemulihan']; ?></p>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Of Content -->

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="../../resource/assets/js/jquery-3.4.0.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="../../resource/assets/js/bootstrap.min.js"></script>
  </body>
</html>
