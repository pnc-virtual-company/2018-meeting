
<br>
<div id="container">
<div class="row-fluid">
<div class="col-12">

<h2>Booking Request Validate</h2>

<table id="request_validate" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Location</th>
            <th>Room</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Creator</th>
            <th>Note</th>
        </tr>
    </thead>
    <tbody>
   		<tr>
	        <td data-order="1" data-id="1">
	            1&nbsp;
	            <!-- <a href="#" title="" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete"></i></a> -->
	            <a href="<?php echo base_url(); ?>Welcome/book_meeting" title=""><i class="mdi mdi-pencil"></i></a>          
              <a href="#" title="" data-toggle="modal" data-target="#accept"><i class="mdi mdi-check"></i></a>
              <a href="#" title="" data-toggle="modal" data-target="#reject"><i class="mdi mdi-window-close"></i></a> 
	        </td>
	        <td>PNC</td>
	        <td>B23</td>
	        <td>23/04/2018 9:30AM</td>
	        <td>23/04/2018 10:30AM</td>
          <td>Bajament BALET</td>
	        <td>Monthly team meeting</td>
	    </tr>
	    <tr>
	        <td data-order="1" data-id="1">
              2&nbsp;
              <!-- <a href="#" title="" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete"></i></a> -->
              <a href="<?php echo base_url(); ?>Welcome/book_meeting" title=""><i class="mdi mdi-pencil"></i></a>          
              <a href="#" title="" data-toggle="modal" data-target="#accept"><i class="mdi mdi-check"></i></a>
              <a href="#" title="" data-toggle="modal" data-target="#reject"><i class="mdi mdi-window-close"></i></a> 
          </td>
          <td>PNC</td>
          <td>B23</td>
          <td>23/04/2018 9:30AM</td>
          <td>23/04/2018 10:30AM</td>
          <td>Bajament BALET</td>
          <td>Monthly team meeting</td>
	    </tr>
     </tbody>
     </table>
    </div>
</div>
</div>

<!-- Modol pop up delete -->
<!-- <div class="modal fade" id="myModal">
	<div class="row">
		
	</div>
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
      <h3 class="modal-title">Are you sure to delete this item!</h3>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
      </div>

    </div>
  </div>
</div> -->

<!-- Modol pop up Accept -->
<div class="modal fade" id="accept">
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
      <h3 class="modal-title">Are you sure to accept this request!</h3>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- Modol pop up reject -->
<div class="modal fade" id="reject">
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
      <h3 class="modal-title">Are you sure to reject this request!</h3>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
