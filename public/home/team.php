<?php
  //Session cek
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Team</title>
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
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="profile.php">About Us</a>
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
        <!-- Bilkis Ismail -->
        <div class="card p-4">
          <div class="card-title ml-3">
            <p style="font-weight:bold; font-size: 30px;">KELOMPOK 7</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <img src="../../resource/assets/img/avatar/2.png" class="w-100" alt="Photo">
              </div>
              <div class="col-sm-4">
                <p style="font-weight:bold; font-size: 20px;">Nama </p><p></p>
                <p>Bilkis Ismail</p>
                <p style="font-weight:bold; font-size: 20px;">NIS </p><p></p>
                <p>1.17.16707</p>
                <p style="font-weight:bold; font-size: 20px;">NISN </p><p></p>
                <p>0021190888</p>
                <p style="font-weight:bold; font-size: 20px;">Kelas </p><p></p>
                <p>XI RPL 2</p>
              </div>
            </div>
          </div>
        </div>
        <!--  Fredy Fajar Adi Putra -->
        <div class="card p-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <img src="../../resource/assets/img/avatar/3.png" class="w-100" alt="Photo">
              </div>
              <div class="col-sm-4">
                <p style="font-weight:bold; font-size: 20px;">Nama </p><p></p>
                <p>Fredy Fajar Adi Putra</p>
                <p style="font-weight:bold; font-size: 20px;">NIS </p><p></p>
                <p>1.17.16713</p>
                <p style="font-weight:bold; font-size: 20px;">NISN </p><p></p>
                <p>-</p>
                <p style="font-weight:bold; font-size: 20px;">Kelas </p><p></p>
                <p>XI RPL 2</p>
              </div>
            </div>
          </div>
        </div>
        <!--  Eben Ezer Obed Marpaung -->
        <div class="card p-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <img src="../../resource/assets/img/avatar/1.png" class="w-100" alt="Photo">
              </div>
              <div class="col-sm-4">
                <p style="font-weight:bold; font-size: 20px;">Nama </p><p></p>
                <p>Eben Ezer Obed Marpaung</p>
                <p style="font-weight:bold; font-size: 20px;">NIS </p><p></p>
                <p>1.17.16710</p>
                <p style="font-weight:bold; font-size: 20px;">NISN </p><p></p>
                <p>0017176610</p>
                <p style="font-weight:bold; font-size: 20px;">Kelas </p><p></p>
                <p>XI RPL 2</p>
              </div>
            </div>
          </div>
        </div>
        <!--  Rafli Zacky Dhafullah -->
        <div class="card p-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <img src="../../resource/assets/img/avatar/4.png" class="w-100" alt="Photo">
              </div>
              <div class="col-sm-4">
                <p style="font-weight:bold; font-size: 20px;">Nama </p><p></p>
                <p>Rafli Zacky Dhafullah</p>
                <p style="font-weight:bold; font-size: 20px;">NIS </p><p></p>
                <p>1.17.16732</p>
                <p style="font-weight:bold; font-size: 20px;">NISN </p><p></p>
                <p>0024016891</p>
                <p style="font-weight:bold; font-size: 20px;">Kelas </p><p></p>
                <p>XI RPL 2</p>
              </div>
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
