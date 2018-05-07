<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php foreach ($view_room as $row): ?>
					
				<div class="card">
					<div class="card-header">
						<h4 class="text-center text-info">Room Availability</h4>
					</div>
					<div class="card-body">
						<h1>Room Status<span style="color:green"><?php echo $row->room_name; ?></span> </h1>
				<p>The room is free. <br>But next timeslot start at <?php echo $row->startDate; ?></p>
				<br>
				<div class="form-group">
					<a href="<?php echo base_url(); ?>normal/list_room" class="btn btn-info float-left">
						<i class="mdi mdi-arrow-left-bold "></i>&nbsp;Back to the list of room
					</a>

					<a href="<?php echo base_url(); ?>normal/location" class="btn btn-info  float-right" data-toggle="modal" data-target="#popupcalendar">
						<i class="mdi mdi-table-large"></i>&nbsp;Calendar of the room
					</a>
				</div>
					</div>
				</div>
				
				<hr>
				<?php endforeach ?>
			</div>
			
			<div class="col-md-3"></div>
		</div>
		
	</div>
	<!-- Created by Chhunhak -->
	<!-- The Modal -->
	<div class="modal fade" id="popupcalendar">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Modal Heading</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	      
	      <!-- Modal body -->
	      <div class="modal-body">
	            <div class="container">
	                <div class="row">
	                	<div class="col-md-1"></div>
	                	<div class="col-md-10">
	                		<hr>
	        	            	<div id="calendar" ></div>
	                	</div>
	                	<div class="col-md-1"></div>
	                </div>
	            </div>
	      </div>
	      
	      <!-- Modal footer -->
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
	      
	    </div>
	  </div>
	</div>
	