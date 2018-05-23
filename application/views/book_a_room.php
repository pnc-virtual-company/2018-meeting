<br>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2 class="text-center">Make A Reservation</h2><br>
			
			<form action="<?php echo base_url();?>booking/booking_a_room?loc_id=<?php echo $row->loc_id; ?>&loc_name=<?php echo $row->loc_name; ?>&room_name=<?php echo $this->input->get('room_name'); ?>&room_id=<?php echo $this->input->get('room_id'); ?>" method="post">
				<div class="form-group row">
				  <label  class="col-2 col-form-label">Location:</label>
				  <div class="col-10">
				  	<select class="form-control" name="loc_id" id="">
				  		<?php foreach ($list_location as $row): ?>
							<option value="<?php echo $row->loc_id; ?>"><?php echo $row->loc_name; ?></option>
				  		<?php endforeach ?>
				  	</select>
				  </div>
				</div><br>
				<div class="form-group row">
				  <label  class="col-2 col-form-label">Room:</label>
				  <div class="col-10">
				   	<select class="form-control" name="room_id" id="">
				  		<?php foreach ($allroom as $row): ?>
							<option value="<?php echo $row->room_id; ?>"><?php echo $row->room_name; ?></option>
				  		<?php endforeach ?>
				  	</select>
				  </div>
				</div><br>

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
				
				<div class="form-group row" id="datepairExample">
				  <label for="example-time-input" class="col-2 col-form-label">Start:</label>
				  <div class="col-5">	         
				      <input type="text" name="start" required="" class="time start form-control" />    
				  </div>
				  <label for="example-time-input" class="col-1 col-form-label">End:</label>
				  <div class="col-4">
				   	<input type="text" name="end" required="" class="time end form-control" />
				  </div>
				</div><br>

				<div class="form-group row">
				  <label for="example-time-input" class="col-2 col-form-label">Note:</label>
				  <div class="col-10">
				    <textarea class="form-control" rows="5" id="comment" name="comment" style="resize: none;"></textarea>
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-time-input" class="col-2 col-form-label"></label>
				  <div class="col-10">
				    <div>
					    <button class="btn btn-primary" type="submit" name="send" value="login">
					      <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp;Request Room</span>
					    </button>
					   <a href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $this->input->get('loc_id'); ?>&loc_name=<?php echo $this->input->get('loc_name'); ?>" class="btn btn-danger float-right">
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
 