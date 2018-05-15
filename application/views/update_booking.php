 <br>
 <div class="container">
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">
 			<?php foreach ($request_update as $rows): ?>
 			<?php endforeach; ?>
 			<h2 class="text-center">Update A Reservation</h2><br>
 			<form action="<?php echo base_url();?>Welcome/update_request" method="post">
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
 				<div class="form-group row">
 					<label for="example-time-input" class="col-2 col-form-label">From:</label>
 					<div class="col-5">
 						<select class="custom-select" name="startHour">
 							<option value="<?php echo substr($rows->Start,0,-13) ?>"><?php echo substr($rows->Start,0,-13) ?></option>
 							<option value="7">7</option>
 							<option value="8">8</option>
 							<option value="9">9</option>
 							<option value="10">10</option>
 							<option value="11">11</option>
 							<option value="12">12</option>
 							<option value="13">13</option>
 							<option value="14">14</option>
 							<option value="15">15</option>
 							<option value="16">16</option>
 							<option value="17">17</option>
 							<option value="18">18</option>
 							<option value="19">19</option>
 							<option value="20">20</option>
 							<option value="21">21</option>
 							<option value="22">22</option>
 						</select>
 					</div>
 					<label for="example-time-input" class="col-1 col-form-label">:</label>
 					<div class="col-4">
 						<select class="custom-select" name="startMin">
 							<option value="<?php echo substr($rows->Start,3,-10) ?>"><?php echo substr($rows->Start,3,-10) ?></option>
 							<option value="00">00</option>
 							<option value="15">15</option>
 							<option value="30">30</option>
 							<option value="45">45</option>
 						</select>
 					</div>
 				</div><br>
 				<div class="form-group row">
 					<label for="example-time-input" class="col-2 col-form-label">To:</label>
 					<div class="col-5">
 						<select class="custom-select" name="endHour">
 							<option value="<?php echo substr($rows->End,0,-13) ?>"><?php echo substr($rows->End,0,-13) ?></option>
 							<option value="7">7</option>
 							<option value="8">8</option>
 							<option value="9">9</option>
 							<option value="10">10</option>
 							<option value="11">11</option>
 							<option value="12">12</option>
 							<option value="13">13</option>
 							<option value="14">14</option>
 							<option value="15">15</option>
 							<option value="16">16</option>
 							<option value="17">17</option>
 							<option value="18">18</option>
 							<option value="19">19</option>
 							<option value="20">20</option>
 							<option value="21">21</option>
 							<option value="22">22</option>
 						</select>
 					</div>
 					<label for="example-time-input" class="col-1 col-form-label">:</label>
 					<div class="col-4">
 						<select class="custom-select" name="endMin">
 							<option value="<?php echo substr($rows->End,3,-10) ?>"><?php echo substr($rows->End,3,-10) ?></option>
 							<option value="00">00</option>
 							<option value="15">15</option>
 							<option value="30">30</option>
 							<option value="45">45</option>
 						</select>
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
 							<button class="btn btn-primary" type="submit" name="send" value="login">
 								<i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp;Request Room</span>
 							</button>
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
