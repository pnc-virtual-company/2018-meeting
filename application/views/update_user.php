<?php
/**
 * This view allows to create a new employee
 * @copyright  Copyright (c) 2014-2017 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-2 col-sm-2"></div>
    <div class="col-lg-6 col-md-8 col-sm-8">
          <h3 style="text-align: center;">Update User information</h3>
          <?php foreach ($updateUser as $row): ?>
            <div class="card-body">
              <form method="POST"  action="<?php echo base_url(); ?>welcome/get_update_user">
                <div class="form-group">
                  <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                  <label for="">Firstname</label>
                  <input type="text" class="form-control" value="<?php echo $row->firstname; ?>" id="name" name="firstname" >
                </div>
                <div class="form-group">
                  <label for="">Lastame</label>
                  <input type="text" class="form-control" value="<?php echo $row->lastname; ?>" id="name" name="lastname" >
                </div>
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" value="<?php echo $row->login; ?>" id="name" name="login" >
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control"  value="<?php echo $row->email; ?>"  id="des"  name="email">
                </div>
                <div class="form-group">
                  <label for="">Role</label>
                  <input type="text" class="form-control" value="<?php echo $row->role; ?>"  id="add"  name="role">
                </div>
              <?php endforeach; ?>
              <button type="submit" class="btn btn-primary">Update User</button>
              <a href="<?php echo base_url(); ?>welcome/listAllUsers" class="btn btn-danger float-right">
                <i class="mdi mdi-cancel "></i>&nbsp;Cancel
              </a>
            </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-2 col-sm-2"></div>
    </div>
  </div>




  
