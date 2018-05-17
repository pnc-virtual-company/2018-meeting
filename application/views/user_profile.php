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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<br>
<div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="">
          <div class="text-center">
            <h3>User Profile</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo base_url(); ?>welcome/insert_location">
              <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" id="name" name="name" required="" placeholder="Enter your firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lname"  name="lname" required="" placeholder="Enter your lastname">
            </div>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control"  name="login" required="" placeholder="Enter login">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control"  name="email" required="" placeholder="Enter Your email">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="text" class="form-control"  name="pwd" required="" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-info">Save</button>
          <!--   <a href="<?php echo base_url(); ?>welcome/location" class="btn btn-danger float-right">
                <i class="mdi mdi-cancel "></i>&nbsp;Cancel -->
            </a>
        </form>
    </div>
</div>
</div>
</div>
</div>





