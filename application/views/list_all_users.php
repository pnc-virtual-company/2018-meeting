<br>
<div id="container" >
  <div class="row-fluid">
    <div class="col-12">
      <a href="<?php echo base_url(); ?>users/create" title="Add new User" class="btn btn-primary"><i class="mdi mdi-plus-circle"></i>&nbsp;Add New User</a>
    </div>
  </div>
  <br>
  <div class="row-fluid">
    <div class="row">
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
              <a href="<?php echo base_url(); ?>users/delete_location?id=<?php echo $row->id;?>" class="confirm-delete" title="Delete User <?php echo $row->firstname.'&nbsp;'.$row->lastname;  ?>" data-toggle="modal" data-target="#<?php echo $row->id; ?>"><i class="mdi mdi-delete"></i></a>
              <a href="<?php echo base_url(); ?>users/edit/<?php echo $row->id; ?>" id="edit_location" title="Update user <?php echo $row->firstname.'&nbsp;'.$row->lastname;  ?>"><i class="mdi mdi-pencil"></i></a>
            </td>
            <td><?php echo $row->firstname; ?></td>
            <td><?php echo $row->lastname; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->login; ?></td>
            <td><?php echo $row->role_name; ?></td>    
          </tr>  
          <div id="<?php echo $row->id; ?>" class="modal hide fade" tabindex="-1" role="dialog">
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
                  <a href="<?php echo base_url(); ?>users/delete/<?php echo $row->id;?>" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
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
</div>
<!-- Delete modal pop up -->
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
