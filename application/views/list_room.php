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
       <?php  
            $i=1;
          foreach ($list_room as $row) {
          ?>
            <tr>
                <td>
                  <?php echo $i;; ?>&nbsp;
                   <a href="<?php echo base_url(); ?>welcome/delete_room?$room_id=<?php echo $row->room_id; ?>" data-toggle="modal" data-target="#myModal" title="Delete this room"><i class="mdi mdi-delete"></i></a>
                   <a href="<?php echo base_url(); ?>welcome/update_room?room_id=<?php echo $row->room_id; ?>" title="Update room information"><i class="mdi mdi-pencil"></i></a>
                   <a href="<?php echo base_url(); ?>welcome/book_meeting?room_id=<?php echo $row->room_id; ?>" title="Make a reservation"><i class="mdi mdi-notebook"></i></a>            
                   <a href="<?php echo base_url(); ?>welcome/fullCalendar" title="Room calendar"><i class="mdi mdi-table-large"></i></a>            
                   <a href="<?php echo base_url(); ?>welcome/room_availability?room_id=<?php echo $row->room_id; ?>" title="Room availability"><i class="mdi mdi-check"></i></a>        
                  <a href="#" title="View room location" data-toggle="modal" data-target="#location_room"><i class="mdi mdi-source-commit-start"></i></a>
                </td>
                <td><?php echo $row->room_name; ?></td>
                <td><?php echo $row->firstname; ?></td>
                <td><?php echo $row->floor; ?></td>
                <td><?php echo $row->description; $i++;?></td>    
            </tr>  
         <?php
         }
       ?>
     </tbody>        
     </table>
    </div>
  

<div class="row-fluid"><div class="col-12">&nbsp;</div></div>
  <!-- button create location -->
  <div class="container">
    <div class="row-fluid">
      <div class="col-12">
        
        &nbsp;
        <button class="btn btn-primary"><a href="<?php echo base_url(); ?>welcome/create_room?loc_id=<?php error_reporting(0); echo $row->loc_id; ?>" class="text-center">
            <i style="color: #fff" class="mdi mdi-plus-circle" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Create a room</span>
          </a>
          </button>&nbsp;
          <button class="btn btn-primary"><a href="#" class="text-center">
            <i style="color: #fff" class="mdi mdi-file-export" data-toggle="tooltip" title="Export the list of room"></i><span style="color: #fff">&nbsp; Export list</span>
          </a>
          </button>
      </div>
  </div>
  </div>







</div>
</div>

<!-- Delete modal pop up -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>You are going to delete this room.</p>
          <p>Are you sure that you want to perform this action?</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url(); ?>welcome/delete_room?room_id=<?php echo $row->room_id; ?>" class="btn btn-danger">OK </a>
        
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