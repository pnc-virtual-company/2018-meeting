<br>
<div id="container">
<div class="row-fluid">
<div class="col-12">

<h2>List of room</h2><br>
<table id="list_room" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Manager</th>
            <th>Floor</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
   		<tr>
	        <td data-order="1" data-id="1">
	            1&nbsp;

	            <a href="#" data-toggle="modal" data-target="#myModal" title="Delete this room"><i class="mdi mdi-delete"></i></a>
	            <a href="<?php echo base_url(); ?>welcome/update_room" title="Update this room"><i class="mdi mdi-pencil"></i></a>
	            <a href="<?php echo base_url(); ?>welcome/book_meeting" title="Book a room"><i class="mdi mdi-notebook"></i></a>            
	            <a href="<?php echo base_url(); ?>welcome/fullCalendar" title="Calendar"><i class="mdi mdi-table-large"></i></a>            
	            <a href="<?php echo base_url(); ?>welcome/room_availability" title="View room"><i class="mdi mdi-check"></i></a>        
	           <a href="#" title="View location room" data-toggle="modal" data-target="#location_room"><i class="mdi mdi-source-commit-start"></i></a>

	        </td>
	        <td>B23</td>
	        <td>BALET</td>
	        <td>1</td>
	        <td>B23 Classroom</td>
	    </tr>
	    <tr>
	        <td data-order="1" data-id="1">

	            2&nbsp;

              <a href="#" data-toggle="modal" data-target="#myModal" title="Delete this room"><i class="mdi mdi-delete"></i></a>
              <a href="<?php echo base_url(); ?>welcome/update_room" title="Update this room"><i class="mdi mdi-pencil"></i></a>
              <a href="<?php echo base_url(); ?>welcome/book_meeting" title="Book a room"><i class="mdi mdi-notebook"></i></a>            
              <a href="<?php echo base_url(); ?>welcome/fullCalendar" title="Calendar"><i class="mdi mdi-table-large"></i></a>            
              <a href="<?php echo base_url(); ?>welcome/room_availability" title="View room"><i class="mdi mdi-check"></i></a>        
             <a href="#" title="View location room" data-toggle="modal" data-target="#location_room"><i class="mdi mdi-source-commit-start"></i></a>
	            <!-- <a href="#" title=""><i class="mdi mdi-toggle-switch"></i></a> -->
	        </td>
	        <td>B12</td>
	        <td>BALET</td>
	        <td>3</td>
	        <td>B12 Classroom</td>
	    </tr>
     </tbody>
     </table>
    </div>
    <div class="row">
    	<div class="col-md-1"></div>
    	<div class="col-11">
    	    <button class="btn btn-primary"><a href="<?php echo base_url(); ?>welcome/create_room" class="text-center">
    	      <i style="color: #fff" class="mdi mdi-plus-circle" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Creat a room</span>
    	    </a>
    	    </button>
          <button class="btn btn-primary"><a href="#" class="text-center">
            <i style="color: #fff" class="mdi mdi-file-export" data-toggle="tooltip" title="Export the list of room"></i><span style="color: #fff">&nbsp; Export list</span>
          </a>
          </button>
    	</div>
    </div>
</div>
</div>



<!-- Modol pop up delete -->
  <div class="modal fade" id="myModal">
	<div class="row">
		
	</div>
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <h4 class="modal-title">Are you sure to delete this room!</h4>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal pup up list location room -->
<div class="modal fade" id="location_room">
	<div class="row">
		
	</div>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <img width="100%" src="<?php echo base_url(); ?>assets/images/FloorMap1.png" />
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button> -->
      </div>

    </div>
  </div>
</div>