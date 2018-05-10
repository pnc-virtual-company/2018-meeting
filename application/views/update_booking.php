<br>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<?php foreach ($request_update as $rows): ?>

		<?php endforeach; ?>
			<h2 class="text-center">Update Book Meeting</h2><br>
			
				<form action="<?php echo base_url(); ?>welcome/update_request" method="post">
					<div class="form-group row">
					  <label for="example-time-input" class="col-2 col-form-label">Date:</label>
					  <div class="col-10">
					    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
	                    	<input type="text" value="<?php echo $rows->Date; ?>" name="sdate" data-toggle="datetimepicker" required="" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
		
	                    	<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
	                    	    <div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
	                    	</div>
	                	</div>
					  </div>
					</div><br>
					<input type="hidden" value="<?php echo $rows->book_id; ?>" name="book_id" />
					<div class="form-group row">
					  <label for="example-time-input" class="col-2 col-form-label">From:</label>
					  <div class="col-10">
					    <input class="form-control" type="time" name="start" value="<?php echo substr($rows->Start,0,-10) ?>" required="" id="example-time-input">
					  </div>
					</div><br>
					<div class="form-group row">
					  <label for="example-time-input" class="col-2 col-form-label">To:</label>
					  <div class="col-10">
					    <input class="form-control" type="time" required="" name="end" value="<?php echo substr($rows->End,0,-10) ?>" id="example-time-input">
					  </div>
					</div><br>
					
					<div class="form-group row">
					  <label for="example-time-input" class="col-2 col-form-label">Note:</label>
					  <div class="col-10">
					    <textarea class="form-control" rows="5" id="comment" required="" name="comment" style="resize: none;"><?php echo $rows->book_description; ?></textarea>
					  </div>
					</div>
					
					<div class="form-group row">
					  <label for="example-time-input" class="col-2 col-form-label"></label>
					  <div class="col-10">
					    <div>
					    	<button type="submit" class="btn btn-primary">Update Request</button>
					        <a  class="btn btn-danger float-right"  href="<?php echo base_url(); ?>Welcome/select_room_request" class="text-center">
					          <i style="color: #fff" class="mdi mdi-close" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Cancel</span>
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
