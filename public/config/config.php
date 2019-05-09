<?php
	//koneksi database
	$conn = mysqli_connect("localhost","root","","php_ajax");

	function query($query){
		global $conn;
		$result = mysqli_query($conn,$query);
		$rows = [];

		while ( $row = mysqli_fetch_assoc($result)) {
			$rows[] =$row;
		}

		return $rows;
	}

	function tambah($data){
		global $conn;

		$nama = htmlspecialchars($data["nama"]);
    $ktp = htmlspecialchars($data["ktp"]);
    $gender = htmlspecialchars($data["gender"]);
    $tempat = htmlspecialchars($data["tempat"]);
    $date = htmlspecialchars($data["tgl"]);
    $agama = htmlspecialchars($data["agama"]);
		$status = htmlspecialchars($data["status"]);

		//query insert data
		$query = "INSERT INTO pekerjaan VALUES ('','$nama','$ktp','$gender','$tempat','$date','$agama','$status')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

	function hapus($id){
		global $conn;
		mysqli_query($conn,"DELETE FROM pekerjaan WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

	function ubah($data){
		global $conn;

		$id = $data["id"];
		$nama = htmlspecialchars($data["name"]);
		$ktp = htmlspecialchars($data["ktp"]);
		$gender = htmlspecialchars($data["gender"]);
		$tempat = htmlspecialchars($data["tempat"]);
		$date = htmlspecialchars($data["tgl"]);
		$agama = htmlspecialchars($data["agama"]);
		$status = htmlspecialchars($data["status"]);

		//query insert data
		$query = "UPDATE pekerjaan SET
				  nama = '$nama',
				  ktp = '$ktp',
				  gender = '$gender',
				  location = '$tempat',
				  dates = '$date',
					agama = '$agama',
					status = '$status'

				  WHERE id = $id
			     ";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


	function cari($keyword){
		$query = "SELECT * FROM mahasiswa
					WHERE
					nama LIKE '%$keyword%' OR
					nrp LIKE '%$keyword%' OR
					email LIKE '%$keyword%' OR
					jurusan LIKE '%$keyword%'
					";
		return query($query);
	}

	function registrasi($data){
		global $conn;

    $nama = htmlspecialchars($data["Fname"]);
    $nama .= " ";
    $nama .= htmlspecialchars($data["Bname"]);

    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $nohp = htmlspecialchars($data["ponsel"]);

    $date = htmlspecialchars($data["date"]);
    $date .= "-";
    $date .= htmlspecialchars($data["month"]);
    $date .= "-";
    $date .= htmlspecialchars($data["years"]);

    $gender = htmlspecialchars($data["gender"]);
    $nohp2 = htmlspecialchars($data["ponsel2"]);

		//cek username sudah ada apa belum
		$result = mysqli_query($conn , "SELECT email FROM user WHERE email = '$email'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('email telah terdaftar');
				  </script>";
			  return false;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// MASUKAN KEDALAM DATABASE
		mysqli_query($conn, "INSERT INTO user VALUES('','$nama','$email','$password','$nohp','$date','$gender','$nohp2')");

		return mysqli_affected_rows($conn);
	}
