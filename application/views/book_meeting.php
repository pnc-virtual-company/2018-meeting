<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1>Book a meeting room</h1>
			<form action="<?php echo base_url();?>Welcome/booking_room" method="post">
				<div class="form-group">
					<label for="">Start Date</label>
					<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    	<input type="text" name="startDate" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
	
                    	<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
				<div class="form-group">
					<label for="">End Date</label>
					<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    	<input type="text" name="endDate" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                    	<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
				<div class="form-group">
					<label for="comment">Note</label>
					<textarea class="form-control" rows="5" id="comment" name="comment" style="resize: none;"></textarea>
				</div>
				<div class="form-group">
					<div>
					    <button class="btn btn-primary" type="submit" name="send" value="login">
					      <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Book Meeting</span>
					    </button>
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
<?php 
	$room_id = $this->input->get('room_id');
	$this->session->set_userdata('room_id', $room_id);
 ?>