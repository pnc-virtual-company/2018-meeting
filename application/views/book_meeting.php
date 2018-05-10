<br>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2 class="text-center">Make A Reservation</h2><br>
			<form action="<?php echo base_url();?>Welcome/booking_room" method="post">
				<div class="form-group row">
				  <label for="example-time-input" class="col-2 col-form-label">Date:</label>
				  <div class="col-10">
				    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    	<input type="text" name="sdate" data-toggle="datetimepicker" required="" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
	
                    	<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
                    	</div>
                	</div>
				  </div>
				</div><br>

				<div class="form-group row">
				  <label for="example-time-input" class="col-2 col-form-label">From:</label>
				  <div class="col-10">
				    <input class="form-control" type="time" name="start" value="" id="example-time-input">
				  </div>
				</div><br>
				<div class="form-group row">
				  <label for="example-time-input" class="col-2 col-form-label">To:</label>
				  <div class="col-10">
				    <input class="form-control" type="time" name="end" value="" id="example-time-input">
				  </div>
				</div><br>
				
				<div class="form-group row">
				  <label for="example-time-input" class="col-2 col-form-label">Note:</label>
				  <div class="col-10">
				    <textarea class="form-control" rows="5" id="comment" required="" name="comment" style="resize: none;"></textarea>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-time-input" class="col-2 col-form-label"></label>
				  <div class="col-10">
				    <div>
					    <button class="btn btn-primary" type="submit" name="send" value="login">
					      <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp;Request Room</span>
					    </button>
					   <a href="<?php echo base_url(); ?>welcome/list_room?room_id=<?php echo $this->input->get('room_id'); ?>" class="btn btn-danger float-right">
					   <i class="mdi mdi-cancel "></i>&nbsp;Cancel
					   </a>
					</div>
				  </div>
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
<?php 
	$room_id = $this->input->get('room_id');
	$this->session->set_userdata('room_id', $room_id);
 ?>
