<br>

<div id="container" >
	<div class="row-fluid">
		<div class="col-12">
<table id="location" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Address</th>
           
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            
            <a href="<?php base_url(); ?>welcome/edit_location" title="Edit Location"><i class="mdi mdi-pencil"></i></a>
            <a href="#" class="confirm-delete" title="Delete user" data-toggle="modal" data-target="#frmConfirmDelete"><i class="mdi mdi-delete"></i></a>
            <a href="#" class="Pin-location" title="Pin Location" data-toggle="modal" data-target="#map"><i class="mdi mdi-map-marker"></i></a>
            &nbsp;
            <a href="<?php echo base_url(); ?>welcome/list_room">Room</a>
        </td>
        <td>PNC</td>
        <td>PNC Canteen</td>
        <td>PP</td>
        
    </tr>
            </tbody>
        </table>
    </div>
</div>

  <div class="row-fluid"><div class="col-12">&nbsp;</div></div>
	<div class="container">
		<div class="row-fluid">
      <div class="col-12">
        
        &nbsp;
        <a href="<?php base_url(); ?>create_location" class="btn btn-primary"><i class="mdi mdi-plus"></i>&nbsp;Create Location</a>
      </div>
  </div>
	</div>
  

</div>

<div id="frmConfirmDelete" class="modal hide fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
	    <div class="modal-header">
				<h5 class="modal-title">Delete confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
	    </div>
	    <div class="modal-body">
	        <p>You are going to delete a user.</p>
	        <p>Are you sure that you want to perform this action?</p>
	    </div>
	    <div class="modal-footer">
	        <a href="#" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
	    </div>
		</div>
	</div>
</div>
<!-- pop map -->

 

  <!-- The Modal -->
  <div class="modal fade" id="map">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.014193350545!2d104.88086341438076!3d11.550839347580931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951add5e2cd81%3A0x171e0b69c7c6f7ba!2sPasserelles+num%C3%A9riques+Cambodia+(PNC)!5e0!3m2!1sen!2skh!4v1524639253160" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  





<div id="frmResetPwd" class="modal hide fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	    <div class="modal-header">
				<h5 class="modal-title">Reset a password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
	    </div>
	    <div class="modal-body">
				<form id="formResetPwd" method="POST">
				    <label for="password">Password</label>
						<div class="input-group">
					    <input type="password" name="password" id="password" required />
							<div class="input-group-append">
					    	<button type="send" class="btn btn-primary">Reset</button>
							</div>
						</div>
				</form>
	    </div>
	    <div class="modal-footer">
	       <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	    </div>
		</div>
	</div>
</div>

<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#location').dataTable({
        stateSave: true,
    });
    
    
</script>
