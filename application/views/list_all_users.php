<br>
<div id="container" >
  <div class="row-fluid">
    <div class="col-12">
<table id="allUsers" class="table table-striped table-bordered  " width="100%">
    <thead>
        <tr>
            <th>Options</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
      <?php   
         foreach ($listAllUsers as $row) {
         ?>
           <tr>   
              <td class="text-center">
                  <?php //echo $row->id; ?>
                  <a href="<?php echo base_url(); ?>Welcome/delete_location?id=<?php echo $row->id;?>" class="confirm-delete" title="Delete User <?php echo $row->firstname.'&nbsp;'.$row->lastname;  ?>" data-toggle="modal" data-target="#frmConfirmDelete"><i class="mdi mdi-delete"></i></a>
                  <a href="<?php echo base_url(); ?>welcome/edit_user?id=<?php echo $row->id; ?>" id="edit_location" title="Update user <?php echo $row->firstname.'&nbsp;'.$row->lastname;  ?>"><i class="mdi mdi-pencil"></i></a>
              </td>
               <td><?php echo $row->firstname; ?></td>
               <td><?php echo $row->lastname; ?></td>
               <td><?php echo $row->email; ?></td>
               <td><?php echo $row->login; ?></td>
               <td><?php echo $row->role_name; ?></td>    
           </tr>  
        <?php
        }
      ?>
    </tbody> 
        </table>
    </div>
</div>
  <div class="row-fluid"><div class="col-12">&nbsp;</div></div>
  <!-- button create location -->
  <div class="container">
    <div class="row-fluid">
      <div class="col-12">
        
        &nbsp;
        <a href="<?php echo base_url(); ?>welcome/create_location" class="btn btn-primary"><i class="mdi mdi-plus"></i>&nbsp;Add New User</a>
      </div>
  </div>
  </div>
</div>
<!-- Delete modal pop up -->
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
          <p>You are going to delete a location.</p>
          <p>Are you sure that you want to perform this action?</p>
      </div>
      <div class="modal-footer">
          <a href="<?php echo base_url(); ?>welcome/delete_user?id=<?php echo $row->id;?>" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<!-- pop map -->
  
  <!-- The Modal -->
  
<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<!-- link datatable -->
<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>

$(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#allUsers').dataTable({
        select: true
    });


});
</script>
