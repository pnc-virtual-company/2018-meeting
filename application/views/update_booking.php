 <br>
 <div class="container">
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">
 			<?php foreach ($request_update as $rows): ?>
 			<?php endforeach; ?>
 			<h2 class="text-center">Update A Reservation</h2><br>
 			<form action="<?php echo base_url();?>booking/update_request" method="post">
 				<div class="form-group row">
 				  <label for="example-time-input" class="col-2 col-form-label">Location:</label>
 				  <div class="col-10">
 				   	<select name="" id="" class="time start form-control" disabled="">
 				   		<option value=""><?php echo $rows->loc_name; ?></option>
 				   	</select> 	
 				  </div>
 				</div><br>
 				<div class="form-group row">
 				  <label for="example-time-input" class="col-2 col-form-label">Room:</label>
 				  <div class="col-10">
 				   	<select name="" id="" class="time start form-control" disabled="">
 				   		<option value=""><?php echo $rows->room_name; ?></option>
 				   	</select> 			
 				  </div>
 				</div><br>
 				<div class="form-group row">
 					<label for="example-time-input" class="col-2 col-form-label">Date:</label>
 					<div class="col-10">
 						<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
 							<input type="text" name="sdate" value="<?php echo $rows->Date; ?>" data-toggle="datetimepicker" required="" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
 							
 							<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
 								<div class="input-group-text"><i class="mdi mdi-calendar-clock"></i></div>
 							</div>
 						</div>
 					</div>
 				</div><br>
 				<input type="hidden" value="<?php echo $rows->book_id; ?>" name="book_id">
 				<div class="form-group row" id="datepairExample">
 				  <label for="example-time-input" class="col-2 col-form-label">Start:</label>
 				  <div class="col-5">	         
 				      <input type="text" name="start" class="time start form-control" value="<?php echo substr($rows->Start,0,-13) ?>" />    
 				  </div>
 				  <label for="example-time-input" class="col-1 col-form-label">End:</label>
 				  <div class="col-4">
 				   	<input type="text" name="end" class="time end form-control" value="<?php echo substr($rows->End,0,-13) ?>"/>
 				  </div>
 				</div><br><br>
 				<div class="form-group row">
 					<label for="example-time-input" class="col-2 col-form-label">Note:</label>
 					<div class="col-10">
 						<textarea class="form-control" rows="5" id="comment" name="comment" style="resize: none;"><?php echo $rows->book_description; ?></textarea>
 					</div>
 				</div>
 				
 				<div class="form-group row">
 					<label for="example-time-input" class="col-2 col-form-label"></label>
 					<div class="col-10">
 						<div>
 							<button class="btn btn-primary" type="submit" name="send" value="login">
 								<i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Update Request</span>
 							</button>
 							<a  class="btn btn-danger float-right"  href="<?php echo base_url(); ?>booking/select_room_request" class="btn btn-danger float-right" class="text-center">
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
