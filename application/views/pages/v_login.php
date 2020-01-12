<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-6">
			<div class="card mt-5">
				<div class="card-header">
					<h4 class="m-0">Login</h4>
				</div>
				<div class="card-body">
					<?php echo $this->session->userdata('err'); ?>
					<form method="post" action="<?= base_url('auth/login'); ?>" id="form-login">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" name="username" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["username"])) echo $_COOKIE['username']; ?>">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" name="password" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE['password']; ?>">
						</div>
						<div class="form-group">
                      		<div class="custom-control custom-checkbox small">
                        		<input type="checkbox" class="custom-control-input" id="customCheck">
                        		<label class="custom-control-label" for="customCheck" style="font-size: 14px;">Remember Me</label>
                      		</div>
                    	</div>
						<div class="form-group" style="margin-top: 20px;">
							<input type="submit" class="btn btn-block btn-info" name="masuk" value="MASUK" />
						</div>

						<div class="form-group">
							Belum mempunyai akun? <a href="<?= base_url('auth/register') ?>" class="btn-sign-in">Register</a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>