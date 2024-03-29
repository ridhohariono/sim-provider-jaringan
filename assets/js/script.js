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

const flashDataTeknisi = $('.flash-datateknisi').data('flashteknisi');
if (flashDataTeknisi) {
	Swal.fire({
		title: 'Status',
		text: 'Berhasil ' + flashDataTeknisi,
		type: 'success'
	});
}

$('.prosesPasang').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Proses Task ?',
		text: 'Status akan di Ubah Menjadi "Prosses"',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Proses',
		closeOnConfirm: false
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

$('.onlinePasang').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Mengaktifkan Pengguna ?',
		text: "Sebelum Mengaktifkan pastikan anda telah selesai memasang Property",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Aktifkan',
		closeOnConfirm: false
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

$('.cabutSelesai').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Menyatakan Selesai',
		text: "Pastikan anda telah selesai mencabut Property",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Selesai',
		closeOnConfirm: false
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// TEKNISI
function tambahTeknisi() {
	$('.tambahTeknisi').on('click', function () {
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


function editTeknisi() {
	$('.editModal').on('click', function () {
		$('#judulModal').html('Edit Data Teknisi');
		$('.modal-footer #submit').html('Edit Data');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_teknisi');
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
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

function detailsTeknisi() {
	$('.detailsModal').on('click', function () {
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#Details .modal-body').html('<section class="content"><h2 class="text-center mb-3">Detail Teknisi</h2><table class="table table-striped"><tr><th>NIK</th><td>' + data[0].nik + '</td></tr><tr><th>Nama</th><td>' + data[0].nm_teknisi + '</td></tr><tr><th>Alamat</th><td>' + data[0].alamat + '</td></tr><tr><th>Divisi</th><td>' + data[0].divisi + '</td></tr><tr><th>Team</th><td>' + data[0].team + '</td></tr><tr><th>Datel</th><td>' + data[0].nm_datel + '</td></tr><tr><th>Alamat Datel</th><td>' + data[0].lokasi + '</td></tr></table></section>');
			}
		});
	});
}

// DATEL

function tambahDatel() {
	$('.tambahDatel').on('click', function () {
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

function detailsDatel() {
	$('.detailsDatel').on('click', function () {
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('tr:first-child #id_datel').html(data[0].id_datel);
				$('tr:nth-child(2) #nm_datel').html(data[0].nm_datel);
				$('tr:nth-child(3) #lokasi').html(data[0].lokasi);
				$('tr:nth-child(4) #kakandatel').html(data[0].kakandatel);
				$('tr:nth-child(5) #status').html(data[0].status);
			}
		});
		const url2 = 'http://localhost/sim-indihome/admin/datel_detailJson?id=' + id;
		$.ajax({
			url: url2,
			method: 'post',
			dataType: 'json',
			success: function (data) {
				if (data > 0) {
					$('tr:nth-child(6) #teknisi').html(data + ' Orang</td>');
				} else {
					$('tr:nth-child(6) #teknisi').html('Belum ada Teknisi di Datel Ini!');
				}
			}
		});
	});
}

function editDatel() {
	$('.editDatel').on('click', function () {
		$('#judulModal').html('Edit Data Datel');
		$('.modal-footer button[type=submit]').html('Edit Datel');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_datel');
		const id = $(this).data('id');
		const base_url = $(this).data('url');

		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function (data) {
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
function tambahLayanan() {
	$('.tambahLayanan').on('click', function () {
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

function editLayanan() {
	$('.editLayanan').on('click', function () {
		$('#judulModal').html('Edit Layanan');
		$('.modal-footer button[type=submit]').html('Edit Layanan');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_layanan');
		const id = $(this).data('id');
		const base_url = $(this).data('url');

		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function (data) {
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

function detailsLayanan() {
	$('.Details').on('click', function () {
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function (data) {
				const nStr = data[0].harga;
				const harga = number_format(nStr);
				$('#Details .modal-body').html('<section class="content"><h1 class="text-center">Detail Layanan</h1><table class="table table-striped"><tr><th>ID Layanan</th><td>' + data[0].id_layanan + '</td></tr><tr><th>Nama Layanan</th><td>' + data[0].nm_layanan + '</td></tr><tr><th>Paket</th><td>' + data[0].paket + '</td></tr><tr><th>Nama Paket</th><td>' + data[0].nm_paket + '</td></tr><tr><th>Kecepatan</th><td>' + data[0].kecepatan + '</td></tr><tr><th>Harga</th><td>Rp.' + harga + '</td></tr><tr><th>Pelanggan</th><td>Belum Di bikin</td></tr></table></section>');
			}
		});
	});
}

// LOKASI
function tambahLokasi() {
	$('.tambahData').on('click', function () {
		$('#judulModal').html('Tambah Data Lokasi');
		$('.modal-footer #submit').html('Tambah Data');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/add_lokasi');
		$('#id_lokasi').val('');
		$('#nama_odp').val('');
		$('#lat').val('');
		$('#long').val('');
		$('#kapasitas').val('');
		$('#tgl_buat').val('');
	});
}

function editLokasi() {
	$('.editModal').on('click', function () {
		$('#judulModal').html('Edit Lokasi');
		// $('select[name=datel_def]').attr('disabled', 'disabled');
		$('.modal-footer button[type=submit]').html('Edit Lokasi');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_lokasi');
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_lokasi').val(data[0].id_lokasi);
				$('#nama_odp').val(data[0].nm_odp);
				$('#nama_odc').val(data[0].nm_odc);
				$('#lat').val(data[0].latitude);
				$('#long').val(data[0].longtitude);
				$('#kapasitas').val(data[0].kapasitas);
				$('#tgl_buat').val(data[0].tgl_dibuat);
				$('#sto').val(data[0].id_sto).attr('selected');
			}
		});
	})
}

function detailsLokasi() {
	$('.detailsLokasi').on('click', function () {
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.modal-body #nm_odp').html(data[0].nm_odp);
				$('.modal-body #nm_odc').html(data[0].nm_odc);
				$('.modal-body #lat').html(data[0].latitude);
				$('.modal-body #long').html(data[0].longtitude);
				$('.modal-body #kapasitas').html(data[0].kapasitas);
				$('.modal-body #alamat').html(data[0].alamat);
				$('.modal-body #detailssto').html(data[0].nm_sto + ' - ' + data[0].alamat);
				$('.modal-body #tgl_buat').html(data[0].tgl_dibuat);
			}
		});
	});
}


// STO
function editSto() {
	$('.modalEditSto').on('click', function () {
		$('#judulModal').html('Edit STO');
		$('select[name=datel_def]').attr('disabled', 'disabled');
		$('.modal-footer button[type=submit]').html('Edit Sto');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_sto');
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data[0].id_sto);
				$('#id_datel').val(data[0].id_datel);
				$('#nama_sto').val(data[0].nm_sto);
				$('#lokasi').val(data[0].lokasi);
				$('#datel_def').val(data[0].id_datel);
			}
		});
	})
}

function tambahSto() {
	$('.tambahSto').on('click', function () {
		$('#judulModal').html('Tambah STO');
		$('.modal-footer #submit').html('Tambah Sto');
		$('select[name=datel_def]').removeAttr('disabled');
		const defSto = $('#datel_def option:first-child').val();
		$('#id').val('');
		$('#nama_sto').val('');
		$('#lokasi').val('');
		$('#datel_def').val(defSto);
	});
}

// PELANGGAN
function tambahPelanggan() {
	$('.tambahPelanggan').on('click', function () {
		$('.modal-footer #submit').html('Tambah Pelanggan');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/add_pelanggan');
		const hide = $('.div-layanan').hide();
		if (hide) {
			$('#paket').on('change', function () {
				$('.div-layanan').show()
				const id = $(this).find(':selected').attr('data-id');
				$.ajax({
					url: 'http://localhost/sim-indihome/admin/getJsonLayanan?id=' + id,
					method: 'post',
					dataType: 'json',
					success: function (data) {
						$('#layanan').html(`<option value="` + data[0].id_layanan + `">` + data[0].nm_layanan + `</option>`);
					}
				});
			});
		}
		$('.div-odp').hide();
		$('#id_datel').on('change', function () {
			const idDatel = $(this).find(':selected').val();
			if (idDatel > 0) {
				$.ajax({
					url: 'http://localhost/sim-indihome/admin/getOdcByDatelIdJson?id_datel=' + idDatel,
					method: 'post',
					dataType: 'json',
					success: function (data) {
						$('.div-odp').show();
						$('#odp').val(data[0].nm_odp);
					}
				});
			} else {
				$('.div-odp').hide();
			}
		});
	});
}

function editPelanggan() {
	$('.editPelanggan').on('click', function () {
		$('.modal-footer #submit').html('Edit Pelanggan');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_pelanggan');
		const id = $(this).data('id');
		const base_url = $(this).data('url');

		$.ajax({
			url: base_url,
			data: {
				id_pelanggan: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_pelanggan_edit').val(data[0].id_pelanggan);
				$('#nm_pelanggan_edit').val(data[0].nm_pelanggan);
				$('#speedy_edit').val(data[0].speedy);
				$('#voice_edit').val(data[0].voice);
				$('#alamat_edit').val(data[0].alamat);
				$('#label_edit').val(data[0].label);
				$('#layanan_edit').val(data[0].id_layanan);
				$('#id_layanan_edit').val(data[0].id_layanan);
			}
		});

	});
}

function detailsPelanggan() {
	$('.detailsPelanggan').on('click', function () {
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data: {
				id_pelanggan: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.modal-body #nm_pelanggan').html(data[0].nm_pelanggan);
				$('.modal-body #speedy').html(data[0].speedy);
				$('.modal-body #voice').html(data[0].voice);
				$('.modal-body #alamat').html(data[0].alamat);
				$('.modal-body #odp').html(data[0].odp);
				$('.modal-body #port').html(data[0].port);
				$('.modal-body #paket').html(data[0].paket);
				$('.modal-body #layanan').html(data[0].nm_layanan);
				$('.modal-body #label').html(data[0].label);
				$('.modal-body #status').html(data[0].status);
				if (data[0].nm_teknisi == null) {
					$('.modal-body #teknisi').addClass('badge badge-danger');
					$('.modal-body #teknisi').html('Belum Ada Teknisi yang Merespon Pemasangan');
				} else {
					$('.modal-body #teknisi').removeClass('badge badge-danger');
					$('.modal-body #teknisi').html(data[0].nm_teknisi);
				}
				if (data[0].tgl_psb == null) {
					$('.modal-body #tgl_psb').addClass('text-danger');
					$('.modal-body #tgl_psb').html('Belum Terpasang/Aktif');
				} else {
					var date = new Date(data[0].tgl_psb);
					var day = date.getDate();
					var month = date.getMonth() + 1;
					var year = date.getFullYear();
					var bulanIn = [{
						"1": "Januari",
						"2": "February",
						"3": "Maret",
						"4": "April",
						"5": "Mei",
						"6": "Juni",
						"7": "Juli",
						"8": "Agustus",
						"9": "September",
						"10": "Oktober",
						"11": "November",
						"12": "December"
					}];
					var changeMont = bulanIn[0][month];
					$('.modal-body #tgl_psb').html(day + ' - ' + changeMont + ' - ' + year);
				}
			}
		});
	});
}

// Pemasangan Indihome
function detailPemasangan() {
	$('.detailsPemasangan').on('click', function () {
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			data: {
				id_pelanggan: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('.modal-body #nm_pelanggan_t').html(data[0].nm_pelanggan);
				$('.modal-body #speedy_t').html(data[0].speedy);
				$('.modal-body #voice_t').html(data[0].voice);
				$('.modal-body #alamat_t').html(data[0].alamat);
				$('.modal-body #odp_t').html(data[0].odp);
				$('.modal-body #port_t').html(data[0].port);
				$('.modal-body #paket_t').html(data[0].paket);
				$('.modal-body #layanan_t').html(data[0].nm_layanan);
				$('.modal-body #label_t').html(data[0].label);
				$('.modal-body #status_t').html(data[0].status);
				if (data[0].nm_teknisi == null) {
					$('.modal-body #teknisi_t').addClass('badge badge-danger');
					$('.modal-body #teknisi_t').html('Belum Ada Teknisi yang Merespon Pemasangan');
				} else {
					$('.modal-body #teknisi_t').removeClass('badge badge-danger');
					$('.modal-body #teknisi_t').html(data[0].nm_teknisi);
				}
				if (data[0].tgl_psb == null) {
					$('.modal-body #tgl_psb_t').addClass('text-danger');
					$('.modal-body #tgl_psb_t').html('Belum Terpasang/Aktif');
				} else {
					var date = new Date(data[0].tgl_psb);
					var day = date.getDate();
					var month = date.getMonth() + 1;
					var year = date.getFullYear();
					var bulanIn = [{
						"1": "Januari",
						"2": "February",
						"3": "Maret",
						"4": "April",
						"5": "Mei",
						"6": "Juni",
						"7": "Juli",
						"8": "Agustus",
						"9": "September",
						"10": "Oktober",
						"11": "November",
						"12": "December"
					}];
					var changeMont = bulanIn[0][month];
					$('.modal-body #tgl_psb_t').html(day + ' - ' + changeMont + ' - ' + year);
				}
			}
		});
	});
}

function pelangganDenda() {
	$('.pelangganDenda').on('click', function () {
		const id = $(this).data('id');
		const url = $(this).data('url');

		$.ajax({
			url: url,
			data: {
				id_pelanggan: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_pelanggan_denda').val(data[0].id_pelanggan);
				$('#id_layanan_denda').val(data[0].id_layanan);
				$('#nm_pelanggan_denda').val(data[0].nm_pelanggan);
				$('#paket_denda').val(data[0].paket);
				$('#layanan_denda').val(data[0].nm_layanan);
				$('#odp_denda').val(data[0].odp);
			}
		});
	});
}

function detailsDenda() {
	$('.detailsDenda').on('click', function () {
		const id = $(this).data('id');
		const url = $(this).data('url');
		$.ajax({
			url: url,
			data: {
				id_pelanggan: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				const denda = number_format(data[0].denda);
				$('.modal-body #nm_pelanggan').html(data[0].nm_pelanggan);
				$('.modal-body #paket').html(data[0].paket);
				$('.modal-body #layanan').html(data[0].layanan);
				$('.modal-body #odp').html(data[0].odp);
				$('.modal-body #port').html(data[0].port);
				$('.modal-body #lama_nunggak').html(data[0].lama_nunggak + " Hari");
				$('.modal-body #denda').html("Rp." + denda + ",-");
				$('.modal-body #keterangan').html(data[0].keterangan);
				console.log(data);
			}
		});
	});
}

function editDenda() {
	$('.editDenda').on('click', function () {
		const id = $(this).data('id');
		const url = $(this).data('url');
		$.ajax({
			url: url,
			data: {
				id_denda: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id_pelanggan_denda').val(data[0].id_denda);
				$('#id_denda').val(data[0].id_denda);
				$('#nm_pelanggan_denda').val(data[0].nm_pelanggan);
				$('#paket_denda').val(data[0].paket);
				$('#layanan_denda').val(data[0].layanan);
				$('#jmlh_denda').val(data[0].denda);
				$('#keterangan_denda').val(data[0].keterangan);
			}
		});
	});
}

function cabutPelanggan() {
	$('.cabutPelanggan').on('click', function () {
		const id = $(this).data('id');
		const url = $(this).data('url');
		$.ajax({
			url: url,
			data: {
				id_pelanggan: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				$('#id_layanan_cabut').val(data[0].id_layanan);
				$('#port_cabut').val(data[0].port);
				$('#id_pelanggan_cabut').val(data[0].id_pelanggan);
				$('#id_sto_cabut').val(data[0].id_sto);
				$('#id_datel_cabut').val(data[0].id_datel);
				$('#nm_pelanggan_cabut').val(data[0].nm_pelanggan);
				$('#odp_cabut').val(data[0].odp);
				$('#alamat_cabut').val(data[0].alamat);
				$('#paket_cabut').val(data[0].paket);
				$('#nm_layanan_cabut').val(data[0].nm_layanan);
				$('#label_cabut').val(data[0].label);
			}
		});
	});
}

function detailsPencabutan() {
	$('.detailsPencabutan').on('click', function () {
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		console.log(id);
		$.ajax({
			url: base_url,
			data: {
				id_pelanggan: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				console.log(data);
				$('.modal-body #nm_pelanggan_t').html(data[0].nm_pelanggan);
				$('.modal-body #speedy_t').html(data[0].speedy);
				$('.modal-body #voice_t').html(data[0].voice);
				$('.modal-body #alamat_t').html(data[0].alamat);
				$('.modal-body #odp_t').html(data[0].odp);
				$('.modal-body #port_t').html(data[0].port);
				$('.modal-body #paket_t').html(data[0].paket);
				$('.modal-body #layanan_t').html(data[0].nm_layanan);
				$('.modal-body #keterangan_t').html(data[0].keterangan);
				$('.modal-body #teknisi_t').html(data[0].nm_teknisi);
				if (data[0].tgl_psb == null) {
					$('.modal-body #tgl_psb_t').addClass('text-danger');
					$('.modal-body #tgl_psb_t').html('Belum Terpasang/Aktif');
				} else {
					var date = new Date(data[0].tgl_psb);
					var day = date.getDate();
					var month = date.getMonth() + 1;
					var year = date.getFullYear();
					var bulanIn = [{
						"1": "Januari",
						"2": "February",
						"3": "Maret",
						"4": "April",
						"5": "Mei",
						"6": "Juni",
						"7": "Juli",
						"8": "Agustus",
						"9": "September",
						"10": "Oktober",
						"11": "November",
						"12": "December"
					}];
					var changeMont = bulanIn[0][month];
					$('.modal-body #tgl_psb_t').html(day + ' - ' + changeMont + ' - ' + year);
				}
			}
		});
	});
}

function number_format(nStr) {
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

function tambahOdp() {
	$('.tambahOdp').on('click', function () {
		$('#judulModal').html('Tambah ODP');
		$('.modal-footer #submit').html('Tambah ODP');
		$('select[name=datel_def]').removeAttr('disabled');
		$('select[name=cmb_odc]').removeAttr('disabled');
		const defSto = $('#datel_def option:first-child').val();
		const defodc = $('#cmb_odc option:first-child').val();
		$('#nm_odp').val('');
		$('#datel_def').val(defSto);
		$('#cmb_odc').val(defodc);
	});
}

function detailsOdp() {
	$('.detailsOdp').on('click', function () {
		const id = $(this).data('id');
		const url = $(this).data('url');
		$.ajax({
			url: url,
			data: {
				id_odp: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				const denda = number_format(data[0].denda);
				$('.modal-body #nama_odp').html(data[0].nm_odp);
				$('.modal-body #nama_odc').html(data[0].nm_odc);
				$('.modal-body #nama_datel').html(data[0].nm_datel);
				$('.modal-body #port_terpakai').html(data[0].port_used);
				$('.modal-body #port_tersedia').html(8 - (data[0].port_used));
			}
		});
	});
}

function editodp() {
	$('.modalEditODP').on('click', function () {
		$('#judulModal').html('Edit ODP');
		$('select[name=datel_def]').attr('disabled', 'disabled');
		$('select[name=cmb_odc]').attr('disabled', 'disabled');
		$('.modal-footer button[type=submit]').html('Edit odp');
		$('.modal-body form').attr('action', 'http://localhost/sim-indihome/admin/edit_odp');
		const id = $(this).data('id');
		const base_url = $(this).data('url');
		$.ajax({
			url: base_url,
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#id').val(data[0].id_odp);
				$('#nm_odp').val(data[0].nm_odp);
				$('#datel_def').val(data[0].id_odc);
				$('#cmb_odc').val(data[0].id_odp);
			}
		});
	})
}

// ODP
tambahOdp();
detailsOdp();
editodp();

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

// Lokasi
tambahLokasi();
editLokasi();
detailsLokasi();

// STO
editSto();
tambahSto();

//PELANGGAN
tambahPelanggan();
editPelanggan();
detailsPelanggan();
pelangganDenda();
cabutPelanggan();

// PEMASANGAN INDIHOMe
detailPemasangan();

// DENDA
detailsDenda();
editDenda();

// PENCABUTAN
detailsPencabutan()
