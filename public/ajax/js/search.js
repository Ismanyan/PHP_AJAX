$(document).ready(function() {
	//event ketika keyword di tulis
	$('#keyword-index').on('keyup', function() {
		// $.get()
		// ambil data dari get dan jika sudah berhasil di ambil lakukan fungsi sambil mengirimkan data hasilnya
		$.get('../ajax/search-index.php?keyword=' + $('#keyword-index').val(), function(data){
			// Jika berhasil ganti isi dari #content
			$('#content').html(data);
		});
	});

	//event ketika keyword di tulis
	$('#keyword-member').on('keyup', function() {
		// $.get()
		// ambil data dari get dan jika sudah berhasil di ambil lakukan fungsi sambil mengirimkan data hasilnya
		$.get('../ajax/search-member.php?keyword=' + $('#keyword-member').val(), function(data){
			// Jika berhasil ganti isi dari #content
			$('#content').html(data);
		});
	});

});
