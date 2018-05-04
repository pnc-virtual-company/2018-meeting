<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2>Update book meeting</h2>
			<form action="" method="">
				<div class="form-group">
					<label for="">Start Date</label>
					<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    	<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    	<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
				<div class="form-group">
					<label for="">End Date</label>
					<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    	<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                    	<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
				<div class="form-group">
					<label for="comment">Note</label>
					<textarea class="form-control" rows="5" id="comment"></textarea>
				</div>
				<div class="form-group">
					<div>
					    <a class="btn btn-primary"  href="<?php echo base_url(); ?>Welcome/book_request" class="text-center">
					    <span style="color: #fff">&nbsp; Update Booing</span>
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
