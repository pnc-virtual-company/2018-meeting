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
            <form method="POST" action="<?php echo base_url(); ?>welcome/insert_location">
              <div class="form-group">
                <label for="loc_name">Name</label>
                <input type="text" class="form-control" id="loc_name" name="loc_name" required="">
              </div>
              <div class="form-group">
                <label for="pwd">Description</label>
                <input type="text" class="form-control" id="pwd"  name="des" required="">
              </div>
              <div class="form-group">
                <label for="pwd">Address</label>
                <input type="text" class="form-control"  name="address" required="">
              </div>
              <div class="form-group">
                <label for="pwd">Embed URL Map</label>
                <input type="text" class="form-control"  name="embed_url_map" required="">
                <span style="font-size: 12px;" class="text-danger">* you need to copy embed url from gogle map</span>
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




  
