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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBAjaIzPJQY_nrDt5zi2ayk1BfeQOHo7Kk&sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/map-plugin/dist/locationpicker.jquery.js"></script>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="">
        <div class="text-center">
          <h3>Edit Location</h3>
        </div>  
        <?php foreach ($listUpdatelocation as $row): ?>
          <div class="card-body">
            <form method="POST"  action="<?php echo base_url(); ?>location/update_locations">
              <div class="form-group">
                <input type="hidden" value="<?php echo $row->loc_id; ?>" name="loc_id">
                <label for="">Name</label>
                <input type="text" class="form-control" value="<?php echo $row->loc_name; ?>" id="name" name="name" required="" >
              </div>
              <br>
              <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control"  value="<?php echo $row->description; ?>"  id="des"  name="description" required="">
              </div>
              <br>
              <div class="form-group">
                <label for="pwd">Address</label>
                <input type="text" class="form-control"  data-target="#us6-dialog" data-toggle="modal" name="update_address" id="update_address" value="<?php echo $row->address; ?>" required="">
              </div>
              <br>
              <div class="modal"  id="us6-dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Location:</label>
                        <div class="col-sm-10">
                          <input type="text" name="address" class="form-control" id="us3-address" />
                        </div>
                      </div>
                      <input type="hidden" class="form-control" id="us3-radius" />
                      <div id="us3" style="width: 100%; height: 400px;"></div>
                      <div class="clearfix">&nbsp;</div>
                      <div class="m-t-small">
                        <div class="col-sm-3">
                          <input type="hidden" class="form-control" name="lat" style="width: 110px" id="us3-lat" />
                        </div>
                        <div class="col-sm-3">
                          <input type="hidden" class="form-control" name="long" style="width: 110px" id="us3-lon" />
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <script src="<?php echo base_url(); ?>assets/map-plugin/dist/locationpicker.jquery.js"></script>
                      <script>
                        $('#us3').locationpicker({
                          location: {
                            latitude: <?php echo $row->lat; ?>,
                            longitude: <?php echo $row->long; ?>
                          },
                          inputBinding: {
                            latitudeInput: $('#us3-lat'),
                            longitudeInput: $('#us3-lon'),
                            radiusInput: $('#us3-radius'),
                            locationNameInput: $('#us3-address')
                          },
                          enableAutocomplete: true,
                        });
                        $('#us6-dialog').on('shown.bs.modal', function () {
                          $('#us3').locationpicker('autosize');
                        });
                      </script>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="getUpdateAdd">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Update Location</button>
            <a href="<?php echo base_url(); ?>location" class="btn btn-danger float-right">
              <i class="mdi mdi-cancel "></i>&nbsp;Cancel
            </a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>