<div class="container">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-7">
			<div class="card">
				<div class="card-header">
					<h4 class="m-0">Buat Akun</h4>
				</div>
				<div class="card-body">
					<form class="form-auth-small" method="POST" action="<?php echo base_url('auth/proses_register') ?>" id="form-daftar">
						<div class="form-group">
							<label for="name" control-label>Nama Lengkap</label>
							<input type="text" name="name" id="name" class="form-control" autocomplete="off" required="true">
						</div>
						<div class="form-group">
							<label class="control-label">Username</label>
							<input type="text" name="username" id="username" class="form-control" required="true" autocomplete="off">
						</div>
						<div class="form-group">
							<label control-label>Password</label>
							<input type="password" name="password" id="password" class="form-control" required="true" autocomplete="off">
						</div>
						<div class="form-group">
							<label control-label>Konfirmasi Password</label>
							<input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" required="true" autocomplete="off">
						</div>
						<div class="form-group">
							<label control-label>Nomor Handphone</label>
							<input type="text" name="handphone" id="handphone" class="form-control open" required="true" autocomplete="off">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-info btn-block" value="Daftar" name="daftar"  />
						</div>
					</form>

					<div class="form-group">
						Sudah mempunyai akun? <a href="<?= base_url('/') ?>" class="btn-sign-in">Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {

		$('#form-daftar').on('submit', function(e) {
			e.preventDefault();
			var form = $(this);
			var data = form.serialize();

			$.ajax({
				url: form.attr('action'),
				type: 'post',
				data: data,
				dataType: 'json',
				beforeSend: function() {
					$.blockUI({
						message: 'Please wait...'
					});
				},
				success: (result) => {
					console.log(result);

					if(result.success == true) {
						Swal.fire({
							title: '',
							text: 'Berhasil mendaftar',
							icon: 'success'
						})
						.then(result => {
							if(result.value) {
								window.location.href = "<?php echo base_url('/') ?>";
							}
						});
					} else {
						$('.form-control').removeClass('is-invalid');
						$.each(result.messages, (key, val) => {
							var el = $('#' + key);

							el.addClass(val.length > 0 ? 'is-invalid' : '');

							el.closest('div.form-group')
							// .removeClass('is-invalid')
							// .addClass(val.length > 0 ? 'is-invalid' : '')
							.find('.help-block')
							.remove();

							el.after(val);
						});
					}
				},
				complete: function() {
					$.unblockUI();
				},
				error: (xhr, stat, err) => {
					console.log(err);
				}
			});
		});
	});

	function resetForm() {
		$('#form-daftar')[0].reset();

		$('div.form-group')
		.removeClass('has-error')
		.removeClass('has-success')
		.find('.help-block')
		.remove();
	}

</script>

</body>
</html>