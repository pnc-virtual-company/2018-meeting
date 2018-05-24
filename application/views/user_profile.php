<?php
/**
 * This view allows to create a new employee
 * @copyright  Copyright (c) 2014-2017 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
?>
<style>
.pac-container {
    z-index: 99999;
}
</style>
<br>
<div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">
        <div class="">
          <div class="text-center">
            <h3>Edit My Profile</h3>
        </div>
        <hr>
        <a href="<?php echo base_url();?>users/index" class="btn btn-danger" style="margin-left: 19px;"><i class="mdi mdi-cancel"></i>&nbsp;Cancel</a>
        <br><br>
        <h4 style="margin-left: 18px;">General Information</h4>
        <?php foreach ($listUsers as $row): ?>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url(); ?>Users/update_profile">
                  <div class="form-group">
                    <input type="hidden" value="<?php echo $row->id; ?>" name="id">
                    <label for="name">First Name</label>
                    <input type="text" class="form-control" value="<?php echo $row->firstname; ?>" id="firstname" name="firstname" required="">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" value="<?php echo $row->lastname; ?>" id="lastname"  name="lastname" required="">
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" value="<?php echo $row->login; ?>" name="login" id="login" required="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" value="<?php echo $row->email; ?>" name="email" id="email" required="">
                </div>
                <button type="submit" class="btn btn-primary">Validate</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">
        <div class="">
          <div class="text-center">
          </div>
          <h4 style="margin-left: 17px;" >Change Password</h4>
          <form method="POST" action="<?php echo base_url(); ?>Users/change_password">
            <div class="card-body">
              <div class="form-group">
                <label for="">Current Password</label>
                <input type="password" class="form-control" id="old_password" name="current_password" required="">
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" class="form-control" id="newpassword"  name="new_password" required="">
            </div>
            <div class="form-group">
                <label for="">Confirm New Password</label>
                <input type="password" class="form-control"  id= "re_password" name="password_confirm" required="">
            </div>
            <button type="submit" class="btn btn-primary">Validate</button>
        </form>
    </div>
</div>
</div>
</div>
</div>





