<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-body">
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h3 class="h3 mb-0 text-gray-800">Data Nilai</h3>
				<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
			</div>

			<table class="table table-hover table-bordered" id="table-kriteria">
				<thead>
					<tr class="text-center bg-secondary text-white">
						<th>No</th>
						<th>Kriteria</th>
						<th>Alternatif</th>
						<th>Bobot</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data_nilai as $no => $nilai): ?>
					<tr>
						<td class="text-center" width="5%"><?= $no += 1 ?></td>
						<td><?= $nilai->kriteria ?></td>
						<td><?= $nilai->alternatif ?></td>
						<td><?= $nilai->bobot ?></td>
						<td width="15%">
							<div class="d-flex justify-content-center">
								<a href="" class="btn btn-sm btn-dark mr-3"><i class="fa fa-edit"></i> Ubah</a>
								<button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Hapus</button>
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#table-kriteria').DataTable();
	});
</script>