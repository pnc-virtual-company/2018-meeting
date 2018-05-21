<?php
/**
 * This view allows to create a new employee
 * @copyright  Copyright (c) 2014-2017 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
?>
<!-- need this style for autocomplete search -->
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
               <button type="submit" class="btn btn-danger" style="margin-left: 17px; ">Cancel</button>
               <br><br>
         <h4 style="margin-left: 17px;">General Information</h4>
        <div class="card-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" id="name" name="name" required="">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname"  name="lname" required="">
            </div>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control"  name="login" required="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control"  name="email" required="">
            </div>
            <button type="submit" class="btn btn-primary">Validate</button>
        </form>
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
        <div class="card-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="name">Current Password</label>
                <input type="text" class="form-control" id="name" name="name" required="">
            </div>
            <div class="form-group">
                <label for="lname">New Password</label>
                <input type="text" class="form-control" id="lname"  name="lname" required="">
            </div>
            <div class="form-group">
                <label for="login">Confirm New Password</label>
                <input type="text" class="form-control"  name="login" required="">
            </div>
            <button type="submit" class="btn btn-primary">Validate</button>
        </form>
    </div>
</div>
</div>
</div>
</div>





