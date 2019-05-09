<?php
  // Cek session
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
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
	$jumlahData = count(query("SELECT * FROM pekerjaan"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="member.php">Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="team.php">About Us</a>
            </li>
          </ul>
          <form class="form-inline mr-auto my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="text" name="keyword" autofocus placeholder="Search..." autocomplete="off" id="keyword-index">
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
    <br><br><br><br>

    <!-- Button trigger modal -->
    <div class="container">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
        Tambah Data <i class="fa fa-plus-square"></i>
      </button>
    </div>

    <!-- Content -->
    <section id="content" class="content mt-5">
      <div class="container">
        <table class="table table-responsive">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">No KTP</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Agama</th>
              <th scope="col">Status</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <?php $datas = query("SELECT * FROM pekerjaan ORDER BY id DESC LIMIT $awalData,
          		$jumlahDataPerHalaman"); ?>
            <?php $i = 1; ?>
            <?php foreach ($datas as $row) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $row['nama']; ?></td>
              <td><?= $row['ktp']; ?></td>
              <td><?= $row['gender']; ?></td>
              <td><?= $row['location']; ?></td>
              <td><?= $row['dates']; ?></td>
              <td><?= $row['agama']; ?></td>
              <td><?= $row['status']; ?></td>
              <td>
                <a class="btn btn-warning" href="../model/edit.php?id=<?= $row['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-danger" href="../model/delete.php?id=<?= $row['id']; ?>"><i class="fa fa-trash"></i> Delete</a>
              </td>
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





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post">
          <div class="modal-body">
            <!-- Nama -->
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama..." required>
              </div>
            </div>
            <!-- KTP -->
            <div class="form-group row">
              <label for="ktp" class="col-sm-2 col-form-label">KTP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ktp" id="ktp" placeholder="KTP..." required>
              </div>
            </div>
            <!-- Gender -->
            <div class="form-group row">
              <label for="gender" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <select class="form-control" name="gender" id="gender" required>
                  <option value="Laki laki">LK</option>
                  <option value="perempuan">PR</option>
                </select>
              </div>
            </div>
            <!-- TTL -->
            <div class="form-row mb-3">
              <label class="col-sm-2 col-form-label">TTL</label>
              <div class="col">
                <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" required>
              </div>
              <div class="col">
                <input type="text" class="form-control" name="tgl" placeholder="Tgl Lahir " required>
              </div>
            </div>
            <!-- Agama -->
            <div class="form-group row">
              <label for="agama" class="col-sm-2 col-form-label">Agama</label>
              <div class="col-sm-10">
                <select class="form-control" id="agama" name="agama" required>
                  <?php $religions = query("SELECT * FROM agama ORDER BY id"); ?>
                  <?php foreach ($religions as $row): ?>
                  <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- Status -->
            <div class="form-group row">
              <label for="status" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select class="form-control" id="status" name="status" required>
                  <option>Kawin</option>
                  <option>Belum Kawin</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
          </div>
          </form>
        </div>
      </div>
    </div>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="../../resource/assets/js/jquery-3.4.0.min.js"></script>
     <script src="../ajax/js/search.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="../../resource/assets/js/bootstrap.min.js"></script>
  </body>
</html>
