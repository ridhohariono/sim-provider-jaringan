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

// TEKNISI
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

// DATEL

function tambahDatel(){
	$('.tambahData').on('click', function(){
		$('.modal-footer #submit').html('Tambah Data');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/add_datel');
		const defStatus = $('#defaultStatus').html();
		$('#id').val('');
		$('#nama_datel').val('');
		$('#lokasi').val('');
		$('#kakandatel').val('');
		$('#status').val(defStatus);
	});
}

function detailsDatel(){
	$('.detailsDatel').on('click', function(){
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
				$('tr:first-child #id_datel').html(data[0].id_datel);
				$('tr:nth-child(2) #nm_datel').html(data[0].nm_datel);
				$('tr:nth-child(3) #lokasi').html(data[0].lokasi);
				$('tr:nth-child(4) #kakandatel').html(data[0].kakandatel);
				$('tr:nth-child(5) #status').html(data[0].status);
			}
		});
		const url2 = 'http://localhost/sim-indihome/admin/datel_detailJson?id='+id;
		$.ajax({
			url: url2,
			method: 'post',
			dataType: 'json',
			success:function(data){
				if(data > 0){
					$('tr:nth-child(6) #teknisi').html(data +' Orang</td>');
				}else{
					$('tr:nth-child(6) #teknisi').html('Belum ada Teknisi di Datel Ini!');
				}
			}
		});
	});
}	

function editDatel(){
	$('.editDatel').on('click', function(){
		$('#judulModal').html('Edit Data Datel');
		$('.modal-footer button[type=submit]').html('Edit Datel');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_datel');
		const id = $(this).data('id');
		const base_url = $(this).data('url');

		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#id').val(data[0].id_datel);
				$('#nama_datel').val(data[0].nm_datel);
				$('#lokasi').val(data[0].lokasi);
				$('#kakandatel').val(data[0].kakandatel);
				$('#status').val(data[0].status);
			}
		});
	});
}

// LAYANAN
function tambahLayanan(){
	$('.tambahData').on('click', function(){
		$('.modal-footer #submit').html('Tambah Data');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/add_layanan');
		const defPaket = $('#defStatus').html();
		$('#nama_layanan').val('');
		$('#paket').val(defPaket);
		$('#nm_paket').val('');
		$('#kecepatan').val('');
		$('#harga').val('');
	});
}

function editLayanan(){
	$('.editLayanan').on('click', function(){
		$('#judulModal').html('Edit Layanan');
		$('.modal-footer button[type=submit]').html('Edit Layanan');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_layanan');
		const id = $(this).data('id');
		const base_url = $(this).data('url');

		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#id').val(data[0].id_layanan);
				$('#nama_layanan').val(data[0].nm_layanan);
				$('#paket').val(data[0].paket);
				$('#nm_paket').val(data[0].nm_paket);
				$('#kecepatan').val(data[0].kecepatan);
				$('#harga').val(data[0].harga);
			}
		});
	});
}

function number_format(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function detailsLayanan(){
	$('.Details').on('click', function(){
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function(data){
				const nStr = data[0].harga;
				const harga = number_format(nStr);
				$('#Details .modal-body').html('<section class="content"><h1 class="text-center">Detail Layanan</h1><table class="table table-striped"><tr><th>ID Layanan</th><td>'+ data[0].id_layanan +'</td></tr><tr><th>Nama Layanan</th><td>'+ data[0].nm_layanan +'</td></tr><tr><th>Paket</th><td>'+ data[0].paket +'</td></tr><tr><th>Nama Paket</th><td>'+ data[0].nm_paket +'</td></tr><tr><th>Kecepatan</th><td>'+ data[0].kecepatan +'</td></tr><tr><th>Harga</th><td>Rp.'+ harga +'</td></tr><tr><th>Pelanggan</th><td>Belum Di bikin</td></tr></table></section>');
			}
		});
	});
}

// Teknisi
tambahTeknisi();
editTeknisi();
detailsTeknisi();

//Datel
tambahDatel();
editDatel();
detailsDatel();

// Layanan
tambahLayanan();
editLayanan();
detailsLayanan();