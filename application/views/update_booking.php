<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<?php foreach ($request_update as $rows): ?>

		<?php endforeach; ?>
			<h2>Update book meeting</h2>
			<form action="<?php echo base_url(); ?>welcome/update_request" method="post">
				<div class="form-group">
					<label for="">Start Date</label>
					<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    	<input type="text" value="<?php echo $rows->startDate; ?>" class="form-control datetimepicker-input" name="startDate" data-toggle="datetimepicker" data-target="#datetimepicker1"/>
                    	<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
                <input type="hidden" value="<?php echo $rows->book_id; ?>" name="book_id" />
				<div class="form-group">
					<label for="">End Date</label>
					<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    	<input type="text" value="<?php echo $rows->endDate; ?>" name="endDate" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#datetimepicker2"/>
                    	<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
				<div class="form-group">
					<label for="comment">Note</label>
					<textarea class="form-control" rows="5" id="comment" name="comment"><?php echo $rows->book_description; ?></textarea>
				</div>
				<div class="form-group">
					<div>
						<button type="submit" class="btn btn-success">Update Booking</button>
					    <a  class="btn btn-danger float-right"  href="<?php echo base_url(); ?>Welcome/select_room_request" class="text-center">
					      <i style="color: #fff" class="mdi mdi-close" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Cancel</span>
					    </a>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
