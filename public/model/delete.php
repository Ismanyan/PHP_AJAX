<?php
  // Session start
  session_start();

  if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
  }
  require '../config/config.php';

  $id = $_GET["id"];

  if(hapus($id) > 0){
    echo "
      <script>
        alert('Data berhasil dihapus');
        document.location.href='../home/';
      </script>
    ";
  } else{
    echo "
      <script>
        alert('Data gagal di hapus');
      </script>

    ";
  }
