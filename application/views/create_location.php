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
<div class="container" style="background: url();">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="card ">
          <div class="card-header text-center">
            <h4>Create A New Location</h4>
          </div>
          <div class="card-body">
            <form action="/action_page.php">
              <div class="form-group">
                <label for="email">Name</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="pwd">Description</label>
                <input type="password" class="form-control" id="pwd"  name="pswd">
              </div>
              <div class="form-group">
                <label for="pwd">Address</label>
                <input type="password" class="form-control" id="pwd"  name="pswd">
              </div>
              
              <button type="submit" class="btn btn-success">Create Location</button>
              <a href="<?php echo base_url(); ?>welcome/location" class="btn btn-danger float-right">
          <i class="mdi mdi-cancel "></i>&nbsp;Cancel
        </a>
            </form>
          </div>
          
          

        </div>
      </div>
      <div class="col-md-4"></div>
      
    </div>
    
  </div>




  
