<?php
  //Config
  require 'config/config.php';
  // Send data
  if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
      echo "<script>
          alert('User baru telah ditambahkan');
          </script>";
      header("Location: index.php");
    } else {
      echo mysqli_error($conn);
    }
  }

 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Register Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../resource/assets/css/bootstrap.min.css">
    <!-- Costume CSS -->
    <link rel="stylesheet" href="../resource/assets/css/CostumeCss/register.css">
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
              <!-- Name -->
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Nama Depan" name="Fname" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Nama Belakang" name="Bname" required>
                </div>
              </div>
              <!-- Email -->
              <div class="form-group">
                <input type="email" class="form-control validate" placeholder="Nama pengguna Gmail @gmail.com" name="email" required>
              </div>
              <!-- Password -->
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Kata Sandi" name="password" required>
              </div>
              <!-- No Ponsel -->
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nomor Ponsel" name="ponsel" required>
              </div>
              <!-- Date Of birthday -->
              <div class="form-row">
                <div class="col-md-2 col-sm-12 mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text w-100">Tanggal Lahir</label>
                  </div>
                </div>
                <!-- Date -->
                <div class="col-md-3 col-sm-12 mb-3">
                  <select class="custom-select" name="date" required>
                    <option selected>Tanggal</option>
                    <?php for ($i=1; $i <= 31; $i++) :?>
                    <option value="<?= $i; ?>"><?= $i; ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
                <!-- Month -->
                <div class="col-md-4 col-sm-12 mb-3">
                  <select class="custom-select" name="month" required>
                    <option selected>Bulan</option>
                    <?php $date = query("SELECT * FROM bulan"); ?>
                    <?php foreach ($date as $row):?>
                    <option value="<?= $row['month']; ?>"><?= $row['month']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- Years -->
                <div class="col-md-3 col-sm-12 mb-3">
                  <select class="custom-select" name="years" required>
                    <option selected>Tahun</option>
                    <?php $years = query("SELECT * FROM tahun"); ?>
                    <?php foreach ($years as $row):?>
                    <option value="<?= $row['tahun']; ?>"><?= $row['tahun']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- Gender -->
              <div class="form-check form-check-inline mb-3">
                <input class="form-check-input" type="radio" name="gender" value="Laki Laki">
                <label class="form-check-label" for="inlineRadio2">Laki Laki</label>
                <input class="form-check-input ml-4" type="radio" name="gender" value="Perempuan">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
              <!-- No Ponsel -->
              <div class="form-group">
                <input type="text" class="form-control" placeholder="No Pemulihan (OPSIONAL)" name="ponsel2" required>
              </div>
              <small>Saya memahami kebijakan dan privasi</small>
              <br>
              <button class="btn btn-info" type="submit" name="register">BUAT ACCOUNT</button>
            </form>
            <!-- End Of Form -->
          </div>
        </div>
      </div>
    </section>
    <!-- End of Register Page -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../resource/assets/js/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="../resource/assets/js/bootstrap.min.js"></script>
  </body>
</html>
