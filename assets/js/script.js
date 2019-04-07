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

function tambahTeknisi(){
	$('.tambahData').on('click', function(){
		$('#judulModal').html('Tambah Data Teknisi');
		$('.modal-footer #submit').html('Tambah Data');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/add_teknisi');
		const divisi = $('#defaultDivisi').html();
		const team = $('#defaultTeam').html();
		const datel = $('#defaultDatel').val();
		$('#id').val('');
		$('#nik').val('');
		$('#nama').val('');
		$('#alamat').val('');
		$('#divisi').val(divisi);
		$('#team').val(team).attr('selected');
		$('#datel').val(datel).attr('selected');
	});
}


function editTeknisi(){
	$('.editModal').on('click', function(){
		$('#judulModal').html('Edit Data Teknisi');
		$('.modal-footer #submit').html('Edit Data');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_teknisi');
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data:{
				id:id
			},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#id').val(data[0].id_teknisi);
				$('#nik').val(data[0].nik);
				$('#nama').val(data[0].nm_teknisi);
				$('#alamat').val(data[0].alamat);
				$('#divisi').val(data[0].divisi);
				$('#team').val(data[0].team);
				$('#datel').val(data[0].id_datel);
			}
		});
	});
}

function detailsTeknisi(){
	$('.detailsModal').on('click', function(){
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data:{
				id:id
			},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#Details .modal-body').html('<section class="content"><h2 class="text-center mb-3">Detail Teknisi</h2><table class="table table-striped"><tr><th>NIK</th><td>'+ data[0].nik +'</td></tr><tr><th>Nama</th><td>'+ data[0].nm_teknisi +'</td></tr><tr><th>Alamat</th><td>'+ data[0].alamat +'</td></tr><tr><th>Divisi</th><td>'+ data[0].divisi +'</td></tr><tr><th>Team</th><td>'+ data[0].team +'</td></tr><tr><th>Datel</th><td>'+ data[0].nm_datel +'</td></tr><tr><th>Alamat Datel</th><td>'+ data[0].lokasi +'</td></tr></table></section>');
			}
		});
	});
}

tambahTeknisi();
editTeknisi();
detailsTeknisi();