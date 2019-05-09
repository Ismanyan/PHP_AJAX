<?php
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

  // Setting For pagination
  $jumlahDataPerHalaman = 5;
	$jumlahData = count(query("SELECT * FROM user"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Member</title>
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
            <li class="nav-item active">
              <a class="nav-link" href="member.php">Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">About Us</a>
            </li>
          </ul>
          <form class="form-inline mr-auto my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="text" name="keyword" autofocus placeholder="Search..." autocomplete="off" id="keyword-member">
          </form>
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
        <table class="table table-responsive">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">No Hp</th>
              <th scope="col">Date Birthday</th>
              <th scope="col">Gender</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <?php $datas = query("SELECT * FROM user ORDER BY id DESC LIMIT $awalData,
          		$jumlahDataPerHalaman"); ?>
            <?php $i = 1; ?>
            <?php foreach ($datas as $row) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $row['nama']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['no_hp']; ?></td>
              <td><?= $row['date']; ?></td>
              <td><?= $row['gender']; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>
    <!-- End Of Content -->

    <!-- Pagination -->
    <section class="pagination" id="pagination">
      <div class="container">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <?php if ($halamanAktif > 1) : ?>
            <li class="page-item"><a class="page-link" href="?halaman= <?= $halamanAktif - 1; ?>">Previous</a></li>
            <?php endif; ?>
            <?php for ($i=1; $i <= $jumlahHalaman; $i++) :?>
          		<?php if ($i == $halamanAktif) :?>
                <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
          			<?php else :?>
                  <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
          		<?php endif; ?>
          	<?php endfor; ?>
            <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <li class="page-item"><a class="page-link" href="?halaman= <?= $halamanAktif + 1; ?>">Next</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </section>
    <!-- End Of Pagination -->


     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="../../resource/assets/js/jquery-3.4.0.min.js"></script>
     <script src="../ajax/js/search.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="../../resource/assets/js/bootstrap.min.js"></script>
  </body>
</html>
