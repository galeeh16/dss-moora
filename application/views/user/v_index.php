<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h3 class="h3 mb-0 text-gray-800">Data User</h3>
				<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
			</div>

			<div class="form-group">
				<a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
			</div>

			<table id="table-user" class="table table-bordered">
				<thead>
					<tr class="text-center bg-secondary text-white">
						<th>No</th>
						<th>Username</th>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $no => $user): ?>
					<tr>
						<td class="text-center" width="5%"><?= $no+=1; ?></td>
						<td><?= $user->username ?></td>
						<td><?= $user->name ?></td>
						<td><?= $user->address ?></td>
						<td><?= $user->handphone ?></td>
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
		$('#table-user').DataTable();
	});
</script>