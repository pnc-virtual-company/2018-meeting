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
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="card ">
          <div class="card-header text-center">
            <h4>Edit Location</h4>
          </div>  
              
          <?php foreach ($listUpdatelocation as $row): ?>


          <div class="card-body">
            <form method="POST"  action="<?php echo base_url(); ?>welcome/update_locations">
              <div class="form-group">
                <input type="hidden" value="<?php echo $row->loc_id; ?>" name="loc_id">
                <label for="">Name</label>
                <input type="text" class="form-control" value="<?php echo $row->loc_name; ?>" id="name" name="name" >
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control"  value="<?php echo $row->description; ?>"  id="des"  name="description">
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" value="<?php echo $row->place; ?>"  id="add"  name="address">
              </div>
          <?php endforeach; ?>
              
              <button type="submit" class="btn btn-success">Update Location</button>
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




  
