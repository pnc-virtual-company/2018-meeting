<!-- Danet THRONG -->
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-success">
						<div class="card-title"><h4 style="text-align: center;">Reset Password</h4></div>
					</div>
					<div class="card-body">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Enter Your Email"><br>
						<label>New Password</label><br>
						<input type="password" name="newPwd" class="form-control" placeholder="Enter Your New Password"><br>
						<label>Confirm New Password</label><br>
						<input type="password" name="CnewPwd" class="form-control" placeholder="Enter Your Confirm New Password"><br>
					</div>
					<div class="card-footer">
						<a href="<?php base_url(); ?>new_pwd" ><button type="button" class="btn btn-outline-success float-right">Reset Now</button></a>
						<a href="<?php base_url(); ?>login" ><button type="button" class="btn btn-outline-danger float-left">Cancel</button></a>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
<!-- Danet THRONG -->
