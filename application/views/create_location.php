<?php
/**
 * This view allows to create a new employee
 * @copyright  Copyright (c) 2014-2017 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      0.1.0
 */
?>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDfX9vIQIDd8hKzMklGdZKlIaBouSGUoek&callback=places'></script>
<br>
<div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="">
          <div class="text-center">
            <h3>Create A New Location</h3>
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
                <input type="button" class="form-control"  data-target="#us6-dialog" data-toggle="modal" name="embed_url_map" required="">
            </div>
            <button type="submit" class="btn btn-info">Create Location</button>
            <a href="<?php echo base_url(); ?>welcome/location" class="btn btn-danger float-right">
                <i class="mdi mdi-cancel "></i>&nbsp;Cancel
            </a>
        </form>
    </div>
</div>
</div>
<div class="col-md-3"></div>
<div id="us6-dialog" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Location:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="us3-address" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Radius:</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="us3-radius" />
                    </div>
                </div>
                <div id="us3" style="width: 100%; height: 400px;"></div>
                <div class="clearfix">&nbsp;</div>
                <div class="m-t-small">
                    <label class="p-r-small col-sm-1 control-label">Lat.:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" style="width: 110px" id="us3-lat" />
                    </div>
                    <label class="p-r-small col-sm-2 control-label">Long.:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" style="width: 110px" id="us3-lon" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <script src="<?php echo base_url(); ?>assets/map-plugin/dist/locationpicker.jquery.js"></script>
                <script>
                    $('#us3').locationpicker({
                        location: {
                            latitude: 46.15242437752303,
                            longitude: 2.7470703125
                        },
                        radius: 300,
                        inputBinding: {
                            latitudeInput: $('#us3-lat'),
                            longitudeInput: $('#us3-lon'),
                            radiusInput: $('#us3-radius'),
                            locationNameInput: $('#us3-address')
                        },
                        enableAutocomplete: true,
                        markerIcon: 'http://www.iconsdb.com/icons/preview/tropical-blue/map-marker-2-xl.png'
                    });
                    $('#us6-dialog').on('shown.bs.modal', function () {
                        $('#us3').locationpicker('autosize');
                    });
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>

</div>





