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
            
            <a href="#" title="Edit Location"><i class="mdi mdi-pencil"></i></a>
            <a href="#" class="confirm-delete" title="Delete user"><i class="mdi mdi-delete"></i></a>
            <a href="#" class="Pin-location" title="Pin Location"><i class="mdi mdi-map-marker"></i></a>
            &nbsp;
            <a href="<?php echo base_url(); ?>">Room</a>
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

  <div class="row-fluid">
      <div class="col-12">
        
        &nbsp;
        <a href="#" class="btn btn-primary"><i class="mdi mdi-plus"></i>&nbsp;Create Location</a>
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
