<br>
<style>
  #map {
    height: 400px;
    width: 100%;
   }
</style>
<div id="container" >
	<div class="row-fluid">
		<div class="col-12">
      <div class="row-fluid">
          <h2 style="text-align: center;">Location Management</h2>
          <a href="<?php echo base_url(); ?>location/create_location" class="btn btn-primary"><i class="mdi mdi-plus"></i>&nbsp;Create Location</a>
          <br> <br>
      </div>
      <table id="location" class="table table-striped table-bordered  " width="100%">
        <thead>
          <tr>
            <th>Action</th>
            <th>Name</th>
            <th>Description</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php   
          foreach ($list_location as $row) {
            $lat = $row->lat;
            $long = $row->long;
           ?>
           <tr>   
            <td>
              <!-- <?php echo $row->loc_id; ?> -->
              <a href="<?php echo base_url(); ?>location/edit_location?loc_id=<?php echo $row->loc_id; ?>" id="edit_location" title="Update Location"><i class="mdi mdi-pencil"></i></a>
              <a href="<?php echo base_url(); ?>location/delete_location?loc_id=<?php echo $row->loc_id;?>" class="confirm-delete" title="Delete Location" data-toggle="modal" data-target="#frmConfirmDelete"><i class="mdi mdi-delete"></i></a>
              <a href="#" onclick="showMap('<?php echo $row->loc_id; ?>')" class="Pin-location" title="View Location on google map" data-toggle="modal" data-target="#mapModal"><i class="mdi mdi-map-marker"></i></a>
            </td>
            <td><?php echo $row->loc_name; ?></td>
            <td><?php echo $row->description; ?></td>
            <td><?php echo $row->address; ?></td>    
         </tr>  
         <?php
          }
       ?>
     </tbody> 
   </table>
 </div>
</div>
<!-- pop up map -->
 <div class="modal fade" id="mapModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-center" id="loc_title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
         <div id="map"></div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end pop up map -->
</div>
<!-- Delete modal pop up -->
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
     <p>You are going to delete a location.</p>
     <p>Are you sure that you want to perform this action?</p>
   </div>
   <div class="modal-footer">
     <a href="<?php echo base_url(); ?>location/delete_location?loc_id=<?php echo $row->loc_id;?>" class="btn btn-danger" id="lnkDeleteUser">Yes</a>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
   </div>
 </div>
</div>
</div>
<!--end pop map delete -->
<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<!-- link datatable -->
<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBAjaIzPJQY_nrDt5zi2ayk1BfeQOHo7Kk&sensor=false&libraries=places"></script>
<script src="<?php echo base_url();?>assets/js/popper-1.12.9..min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
<script>
    var map;
    var lat;
    var longt;
    var loc_title;
    function initMap(latitude,longtitude){
      console.log("lat "+latitude);
      console.log("lt "+longtitude);
          var marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitude, longtitude)
            });
          var mapProp = {
                center: new google.maps.LatLng(latitude, longtitude),
                zoom: 20,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map'), mapProp);
            marker.setMap(map);
    }
    function showMap(id){
        $.ajax({
          url: "<?php echo base_url(); ?>location/getLocationById/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(data){
            $('#loc_title').html('');
            lat = data[0].lat;
            longt = data[0].long;
            loc_title = data[0].loc_name;
            $('#loc_title').html(loc_title+" Location");
            $('#mapModal').modal('show');
          },
          error: function(){
            alert("error showMap");
          }
        });
        $('#mapModal').on('shown.bs.modal', function() {
            initMap(lat,longt);            
        });
    }
     




  $(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#location').dataTable({
      select: true
    });


  });
</script>


