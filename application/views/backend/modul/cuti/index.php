<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" media="screen">

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- jquery datatable js -->
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<h1>Form Pengajuan Cuti</h1>

<button data-bs-toggle="modal" data-bs-target="#modal-cuti" class="btn btn-flat btn-sm btn-primary mb-3">Tambah cuti</button>

<table id="table-cuti" class="table table-responsive display">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jenis Cuti</th>
			<th>Awal Cuti</th>
			<th>Akhir Cuti</th>
			<th>Lama Cuti</th>
			<th>Deskripsi Cuti</th>
			<th>Opsi</th>
		</tr>
	</thead>
</table>

<div id="modal-cuti" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Cuti</h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="form-cuti" method="post">
					<input type="hidden" name="id" id="id">
					<div class="mb-3">
						<label for="nama" class="form-label">Nama Karyawan</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="budi" required="1" pattern="[a-zA-Z\s]{3,15}" minlength="3" maxlength="15">
					</div>
					<div class="mb-3">
						<label for="jenis" class="form-label">Jenis Cuti</label>
						<input type="text" class="form-control" name="jenis" id="jenis" placeholder="Melahirkan" required="1">
					</div>
					<div class="mb-3">
						<label for="awal" class="form-label">Awal Cuti</label>
						<input type="date" name="awal" id="awal" class="form-control">
					</div>
					<div class="mb-3">
						<label for="akhir" class="form-label">Akhir Cuti</label>
						<input type="date" name="akhir" id="akhir" class="form-control">
					</div>
					<div class="mb-3">
						<label for="lama" class="form-label">Lama Cuti</label>
						<input type="text" name="lama" class="form-control" id="lama" placeholder="2 Hari" required="1" pattern="[a-zA-Z\s]{4-15" minlength="4" maxlength="15" >
					</div>
					<div class="mb-3">
						<label for="deskripsi" class="form-label">Deskripsi Cuti</label>
						<textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
					</div>
					<button type="submit" id="sbtcuti" hidden="1">
					</button>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismis="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="$('#sbtcuti').click()">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		
		let table;
		table = $("#table-cuti").DataTable({
			responsive: true,
			ajax: {
				url: "<?= site_url('cuti/datatable');?>"
			}
		});

	});

</script>