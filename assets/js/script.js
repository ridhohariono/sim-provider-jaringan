const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal.fire({
		title: 'Data',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

$('.delete').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah Anda Yakin ?',
		text: "Data yang anda pilih akan di Hapus!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data',
		closeOnConfirm: false
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
