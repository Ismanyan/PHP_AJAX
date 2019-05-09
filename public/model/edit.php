<?php
  //Cek session 
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
  }

  require "../config/config.php";

  //ambiil datad di url
  $id = $_GET["id"];
  //Query data siswa berdasarkan id
  $pekerjaan = query("SELECT * FROM pekerjaan WHERE id = $id")[0];
  //cek apakah tombol submit pernah di tekan apa belum
  if (isset($_POST["edit"])) {
    if(ubah($_POST)>0){
      echo "
        <script>
          alert('Data berhasil diubah');
          document.location.href='../home/index.php';
        </script>
      ";
    } else{
      echo "
        <script>
          alert('Data gagal diubah');
        </script>
      ";
    }
  }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Edit Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../resource/assets/css/bootstrap.min.css">
    <!-- Costume CSS -->
    <link rel="stylesheet" href="../../resource/assets/css/CostumeCss/register.css">
  </head>
  <body>

    <!-- Register Page -->
    <section id="register" class="register mt-5">
      <div class="container">
        <div class="card p-3">
          <div class="card-title ml-3">
            <p>Daftar</p>
          </div>
          <div class="card-body">
            <!-- Form -->
            <form method="post">
              <input type="hidden" name="id" value="<?= $pekerjaan["id"]; ?>">
              <!-- Name -->
              <div class="form-group">
                <input type="text" class="form-control validate" placeholder="Nama Lengkap" name="name" value="<?= $pekerjaan['nama']; ?>" required>
              </div>
              <!-- Ktp -->
              <div class="form-group">
                <input type="text" class="form-control validate" placeholder="Ktp" name="ktp" value="<?= $pekerjaan['ktp']; ?>" required>
              </div>
              <!-- Gender -->
              <div class="form-group">
                <select class="form-control" name="gender" id="gender" required>
                  <option value="<?= $pekerjaan['gender']; ?>"><?= $pekerjaan['gender']; ?></option>
                  <option value="Laki laki">LK</option>
                  <option value="perempuan">PR</option>
                </select>
              </div>
              <!-- TTL -->
              <div class="form-row mb-3">
                <div class="col">
                  <input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir" value="<?= $pekerjaan['location']; ?>" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="tgl" placeholder="Tgl Lahir " value="<?= $pekerjaan['dates']; ?>" required>
                </div>
              </div>
              <!-- Agama -->
              <div class="form-group">
                <select class="form-control" id="agama" name="agama" required>
                  <option value="<?= $pekerjaan['agama']; ?>"><?= $pekerjaan['agama']; ?></option>
                  <?php $religions = query("SELECT * FROM agama ORDER BY id"); ?>
                  <?php foreach ($religions as $row): ?>
                  <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <!-- Status -->
              <div class="form-group">
                <select class="form-control" id="status" name="status" required>
                  <option>Kawin</option>
                  <option>Belum Kawin</option>
                </select>
              </div>
              <br>
              <button class="btn btn-warning" type="submit" name="edit">EDIT ACCOUNT</button>
            </form>
            <!-- End Of Form -->
          </div>
        </div>
      </div>
    </section>
    <!-- End of Register Page -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../resource/assets/js/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="../../resource/assets/js/bootstrap.min.js"></script>
  </body>
</html>
