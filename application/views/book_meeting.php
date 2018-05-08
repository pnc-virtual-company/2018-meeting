<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2>Make A Reservation</h2>
			<form action="<?php echo base_url();?>Welcome/booking_room" method="post">
				<div class="form-group">
					<label for="">Start Date</label>
					<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    	<input type="text" name="startDate" required="" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
	
                    	<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
				<div class="form-group">
					<label for="">End Date</label>
					<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    	<input type="text" name="endDate" required="" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                    	<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				</div>
				<div class="form-group">
					<label for="comment">Note</label>
					<textarea class="form-control" rows="5" id="comment" required="" name="comment" style="resize: none;"></textarea>
				</div>
				<div class="form-group">
					<div>
					    <button class="btn btn-primary" type="submit" name="send" value="login">
					      <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Book Meeting</span>
					    </button>
					   <a href="<?php echo base_url(); ?>welcome/list_room?room_id=<?php echo $this->input->get('room_id'); ?>" class="btn btn-danger float-right">
					   <i class="mdi mdi-cancel "></i>&nbsp;Cancel
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