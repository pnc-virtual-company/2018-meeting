<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1>Book a meeting room</h1>
			<form action="" method="">
				<div class="form-group">
					<label for="">Start Date</label>
					<input type="text" name="startDate" class="form-control">
				</div>
				<div class="form-group">
					<label for="">End Date</label>
					<input type="text" name="endDate" class="form-control">
				</div>
				<div class="form-group">
					<label for="comment">Note</label>
					<textarea class="form-control" rows="5" id="comment"></textarea>
				</div>
				<div class="form-group">
					<div>
					    <a class="btn btn-primary"  href="<?php echo base_url(); ?>Welcome/book_request" class="text-center">
					      <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Book a room</span>
					    </a>
					    <a  class="btn btn-danger"  href="<?php echo base_url(); ?>Welcome/list_room" class="text-center">
					      <i style="color: #fff" class="mdi mdi-close" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Cancel</span>
					    </a>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>