<br>
<div id="container">
  <div class="row-fluid">

    <h2 style="text-align: center;"><?php echo $this->input->get('loc_name'); ?>&nbsp;Meeting Rooms</h2>
    <table id="list_room" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
     <thead>
       <tr>
         <th>Action</th>
         <th>Name</th>
         <th>Manager</th>
         <th>Floor</th>
         <th>Description</th>
       </tr>
     </thead>
     <tbody>
       <?php  
       foreach ($list_room as $row) {
        ?>
        <tr>
          <td>
           &nbsp;
           <a href="<?php echo base_url(); ?>booking/book_meeting?loc_id=<?php error_reporting(0); echo $this->input->get('loc_id'); ?>&loc_name=<?php echo  $this->input->get('loc_name'); ?>&room_id=<?php echo $row->room_id;?>&room_name=<?php echo $row->room_name; ?>" title="Make a reservation"><i class="mdi mdi-notebook"></i></a>            
           <a href="<?php echo base_url(); ?>room/fullCalendar?loc_id=<?php error_reporting(0); echo $this->input->get('loc_id'); ?>&loc_name=<?php echo  $this->input->get('loc_name'); ?>&room_id=<?php echo $row->room_id;?>&room_name=<?php echo $row->room_name; ?>" title="Room calendar"><i class="mdi mdi-table-large"></i></a>            
           <a href="<?php echo base_url(); ?>room/room_availability?loc_id=<?php error_reporting(0); echo $this->input->get('loc_id'); ?>&loc_name=<?php echo  $this->input->get('loc_name'); ?>&room_id=<?php echo $row->room_id;?>&room_name=<?php echo $row->room_name; ?>" title="Room availability"><i class="mdi mdi-check"></i></a>
           <a href="<?php echo base_url(); ?>room/list_room?room_id=<?php echo $row->room_id; ?>" title="View room location" data-toggle="modal" data-target="#location<?php echo $row->room_id; ?>"><i class="mdi mdi-source-commit-start"></i></a>
         </td>
         <td><?php echo $row->room_name; ?></td>
         <td><?php echo $row->firstname; ?></td>
         <td><?php echo $row->floor; ?></td>
         <td><?php echo $row->description; ?></td>    
       </tr>  
       <!-- Delete modal pop up -->
       <div id="<?php echo $row->room_id; ?>" class="modal hide fade" tabindex="-1" role="dialog">
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
              <a href="<?php echo base_url(); ?>room/delete_room?room_id=<?php echo $row->room_id; ?>" class="btn btn-danger">OK </a>

              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal pup up list location room -->
      <div class="modal fade" id="location<?php echo $row->room_id; ?>">
        <div class="row">
        </div>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h3 style="text-align: center;"><?php echo $this->input->get('loc_name'); ?>&nbsp;Room Location</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             <img width="100%" src="<?php echo base_url(); ?>assets/images/room/<?php echo $row->room_image ?>" alt="a">
           </div>
           <div class="modal-footer">
           </div>
         </div>
       </div>
     </div>
     <?php
   }
   ?>
 </tbody>        
</table>
</div>

</div>
</div>







