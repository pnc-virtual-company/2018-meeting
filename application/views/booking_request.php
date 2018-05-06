
<br>
<div id="container">
<div class="row-fluid">
<div class="col-12">

<h2>My Booking Request</h2>

<table id="list_room" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
    
     <thead>
        <tr>
            <th>ID</th>
            <th>Location</th>
            <th>Room</th>
            <th>Status</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Note</th>
        </tr>
    </thead>
     <tbody>
       <?php  
          $i = 1;
          foreach ($book_request as $row) {
          ?>
           <tr>
               <td data-order="1" data-id="1">
                   <?php 
                    echo $i; ?>&nbsp;
                    <input type="hidden" value="<?php echo $row->book_id;  ?>">
                   <a href="<?php echo base_url(); ?>welcome/delete_book_request?book_id=<?php echo $row->book_id; ?>" title="Delete room request" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete"></i></a>
                   <a href="<?php echo base_url(); ?>Welcome/update_booking_room?book_id=<?php echo $row->book_id; ?>" title="Update room Request"><i class="mdi mdi-pencil"></i></a>
               </td>
               <td><?php echo $row->loc_name  ?></td>
               <td><?php echo $row->room_name ?></td>
               <td><?php echo $row->status ?></td>
               <td><?php echo $row->startDate; ?></td>
               <td><?php echo $row->endDate; ?></td>
               <td><?php echo $row->book_description; $i++;?></td>
              <!--  <td>23/04/2018 10:30AM</td>
               <td>Monthly team meeting</td> -->
           </tr>         
         <?php
         }
       ?>
     </tbody>        
     </table>
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
          <p>You are going to delete this room request.</p>
          <p>Are you sure that you want to perform this action?</p>
      </div>
      <div class="modal-footer">
          <a href="<?php echo base_url(); ?>welcome/delete_book_request?book_id=<?php echo $row->book_id;?>" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
