<?php
	require '../config/config.php';
	// Tangkap keyword
	$keyword = $_GET['keyword'];

	$query = "SELECT * FROM user WHERE nama LIKE '%$keyword%'
                                 OR email LIKE '%$keyword%'
                                 OR no_hp LIKE '%$keyword%' ";

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
          <th scope="col">Email</th>
          <th scope="col">No Hp</th>
          <th scope="col">Date Birthday</th>
          <th scope="col">Gender</th>
        </tr>
      </thead>
      <tbody class="bg-white">
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
