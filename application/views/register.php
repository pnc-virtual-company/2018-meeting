	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<div class="card-title"><h3 style="text-align: center; color: green;">Register</h3></div>
					</div>
					<div class="card-body">
						<label>First Name</label>
						<input type="text" name="firstname" class="form-control" placeholder="Enter Your First Name"><br>
						<label>Last Name</label>
						<input type="text" name="lastnme" class="form-control" placeholder="Enter Your Last Name"><br>
						<label>Email Address</label>
						<input type="text" name="username" class="form-control" placeholder="Enter Your Email Address"><br>
						<label>PassWord</label>
						<input type="password" name="password" class="form-control" placeholder="Enter Your Password"><br>
					</div>
				<div class="card-footer">
					<button type="button" class="btn btn-outline-success float-right">Register Now</button>
					<a href="<?php base_url(); ?>login" ><button type="button" class="btn btn-outline-danger float-left">Cancel</button></a>
				</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>		
