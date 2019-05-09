<?php
	require '../config/config.php';
	// Tangkap keyword
	$keyword = $_GET['keyword'];

	$query = "SELECT * FROM pekerjaan WHERE nama LIKE '%$keyword%' OR ktp LIKE '%$keyword%' ";

	$datas = query($query);

?>

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
						<a class="btn btn-warning" href="#"><i class="fa fa-edit"></i> Edit</a>
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
