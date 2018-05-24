
<br>
<div id="container">
<div class="row-fluid">
<div class="col-12">

<h2 style="text-align: center;">My Reservations</h2>

<table id="list_room" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
    
     <thead>
        <tr>
            <th>Action</th>
            <th>Status</th>
            <th>Location</th>
            <th>Room</th>
            <th>Date</th>
            <th>Start</th>
            <th>End</th>
            <th>Note</th>
        </tr>
    </thead>
     <tbody>
       <?php  
          foreach ($book_request as $row) {
          ?>
           <tr>
               <td data-order="1" data-id="1">
                  &nbsp;
                    <input type="hidden" value="<?php echo $row->book_id; ?>">
                   <a href="<?php echo base_url(); ?>booking/delete_book_request?book_id=<?php echo $row->book_id; ?>" title="Delete room request" data-toggle="modal" data-target="#<?php echo $row->book_id; ?>"><i class="mdi mdi-delete"></i></a>
                   <a href="<?php echo base_url(); ?>booking/update_booking_room?book_id=<?php echo $row->book_id; ?>" title="Update room Request"><i class="mdi mdi-pencil"></i></a>
               </td>
               <td><span class="badge badge-success"><?php echo $row->status; ?></span></td>
               <td><?php echo $row->loc_name  ?></td>
               <td><?php echo $row->room_name ?></td>
               <td><?php echo $row->Date; ?></td>
               <td><?php echo $row->Start = date("H:i A", strtotime($row->Start)); ?></td>
               <td><?php echo $row->End = date("H:i A", strtotime($row->End)); ?></td>
               <td><?php echo $row->book_description;?></td>
              <!--  <td>23/04/2018 10:30AM</td>
               <td>Monthly team meeting</td> -->
           </tr>    

           <!-- Delete modal pop up -->
           <div id="<?php echo $row->book_id; ?>" class="modal hide fade" tabindex="-1" role="dialog">
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
                   <input type="hidden" value="<?php echo $row->book_id; ?>">
                     <a href="<?php echo base_url(); ?>booking/delete_book_request?book_id=<?php echo $row->book_id; ?>" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
        <input type="hidden" value="<?php echo $row->book_id; ?>">
          <a href="<?php echo base_url(); ?>booking/delete_book_request?book_id=<?php echo $row->book_id; ?>" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
