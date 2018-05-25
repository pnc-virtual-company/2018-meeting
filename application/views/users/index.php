<?php
/**
 * This view displays the list of users.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */
?>
<div class="row-fluid"><div class="col-12">&nbsp;</div></div>
<div class="row-fluid"><div class="col-12"><h2 class="text-center">Users Management</h2></div></div><br>
<div class="row-fluid">
    <div class="col-12">
      <a href="<?php echo base_url();?>users/create" class="btn btn-primary"><i class="mdi mdi-account-plus"></i>&nbsp;Create a new user</a>
      &nbsp;
      <a href="<?php echo base_url();?>users/export" class="btn btn-primary"><i class="mdi mdi-file-excel"></i>&nbsp;Export this list</a>
  </div>
</div>
<div class="row-fluid"><div class="col-12">&nbsp;</div></div>
<div id="container">
	<div class="row-fluid">
		<div class="col-12">
            <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user):?>
                        <tr>
                            <td data-order="<?php echo $user['id']; ?>" data-id="<?php echo $user['id'];?>">
                                <a href="<?php echo base_url();?>users/edit/<?php echo $user['id'] ?>" title="Edit user"><i class="mdi mdi-pencil"></i></a>
                                <a href="<?php echo base_url();?>users/delete/<?php echo $user['id'] ?>" class="confirm-delete" title="Delete user" data-toggle="modal" data-target="#frmConfirmDelete"><i class="mdi mdi-delete"></i></a>
                                <a href="<?php echo base_url();?>users/reset/<?php echo $user['id'] ?>" class="reset-password" title="Reset user's password" data-toggle="modal" data-target="#frmResetPwd"><i class="mdi mdi-lock"></i></a>
                            </td>
                            <td><?php echo $user['firstname']; ?></td>
                            <td><?php echo $user['lastname']; ?></td>
                            <td><?php echo $user['login']; ?></td>
                            <td><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
                            <td><?php echo $user['role_name']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
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
           <a href="<?php echo base_url();?>users/delete/<?php echo $user['id'] ?>" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
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
        <form id="formResetPwd" method="POST">
       <div class="modal-body">
                  <label class="control-label" for="password">Password</label>
                  <div class="input-group">
                      <input type="password" id="password" required disabled />
                      <input type="hidden" name="password" id="hiddenpwd" required />
                      <div class="input-group-append">
                        <a class="btn btn-primary" id="cmdGeneratePassword"><i class="mdi mdi-refresh"></i>&nbsp;Generate password</a>
                      </div>
                  </div>
      </div>
      <div class="modal-footer">
        <button type="send" class="btn btn-primary">Reset</button>
        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div>
      </form>
  </div>
</div>
</div>
</div>
<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $("#cmdGeneratePassword").click(function() {
      $("#password,#hiddenpwd").val(password_generator(<?php echo $this->config->item('password_length');?>));
  });
    $(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#users').dataTable({
        stateSave: true,
    });
    //$("#frmResetPwd").alert();
    //$("#frmConfirmDelete").alert();

    //On showing the confirmation pop-up, add the user id at the end of the delete url action
    /*$('#frmConfirmDelete').on('show', function() {
        var link = "<?php echo base_url();?>users/delete/" + $(this).data('id');
        $("#lnkDeleteUser").attr('href', link);
    });*/

    //Display a modal pop-up so as to confirm if a user has to be deleted or not
    //We build a complex selector because datatable does horrible things on DOM...
    //a simplier selector doesn't work when the delete is on page >1
    $("#users tbody").on('click', '.confirm-delete',  function(){
        var id = $(this).parent().data('id');
        var link = "<?php echo base_url();?>users/delete/" + id;
        $("#lnkDeleteUser").attr('href', link);
        $('#frmConfirmDelete').modal('show');
    });

    $("#users tbody").on('click', '.reset-password',  function(){
        var id = $(this).parent().data('id');
        var link = "<?php echo base_url();?>users/reset/" + id;
        $("#formResetPwd").prop("action", link);
        $('#frmResetPwd').modal('show');
    });

    //Prevent to load always the same content (refreshed each time)
    /*$('#frmConfirmDelete').on('hidden', function() {
        $(this).removeData('modal');
    });
    $('#frmResetPwd').on('hidden', function() {
        $(this).removeData('modal');
    });*/
});
    function password_generator(len) {
        var length = (len)?(len):(10);
        var string = "abcdefghijklnopqrstuvwxyz";
        var numeric = '0123456789';
        var punctuation = '!@?/=';
        var password = "";
        var character = "";
        while(password.length < length) {
            entity1 = Math.ceil(string.length * Math.random() * Math.random());
            entity2 = Math.ceil(numeric.length * Math.random() * Math.random());
            entity3 = Math.ceil(punctuation.length * Math.random() * Math.random());
            hold = string.charAt(entity1);
            hold = (entity1 % 2 == 0)?(hold.toUpperCase()):(hold);
            character += hold;
            character += numeric.charAt( entity2 );
            character += punctuation.charAt( entity3 );
            password = character;
        }
        return password;
    }
</script>
