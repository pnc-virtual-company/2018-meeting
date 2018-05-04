
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
          foreach ($book_request as $row) {
          ?>
           <tr>
               <td data-order="1" data-id="1">
                   1&nbsp;
                   <a href="#" title="" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete"></i></a>
                   <a href="<?php echo base_url(); ?>Welcome/book_meeting" title=""><i class="mdi mdi-pencil"></i></a>
               </td>
               <td><?php echo $row->loc_name  ?></td>
               <td><?php echo $row->room_name ?></td>
               <td><?php echo $row->status ?></td>
               <td><?php echo $row->startDate; ?></td>
               <td><?php echo $row->endDate; ?></td>
               <td><?php echo $row->description; ?></td>
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
      <h3 class="modal-title">Are you sure to delete this item!</h3>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
      </div>

    </div>
  </div>
</div>
