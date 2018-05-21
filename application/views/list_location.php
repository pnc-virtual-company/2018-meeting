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
          <h2 style="text-align: center;">Location</h2>
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
              <a href="#" class="Pin-location" title="View Location on google map" data-toggle="modal" data-target="#<?php echo $row->loc_id; ?>"><i class="mdi mdi-map-marker"></i></a>
            </td>
            <td><?php echo $row->loc_name; ?></td>
            <td><?php echo $row->description; ?></td>
            <td><?php echo $row->address; ?></td>    
            <div class="modal fade" id="<?php echo $row->loc_id; ?>">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
                 <!-- Modal Header -->
                 <div class="modal-header">
                   <h4 class="modal-title text-center"><?php echo $row->loc_name; ?></h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <!-- Modal body -->
                 <div class="modal-body">
                   <!-- <iframe src="<?php  echo $row->embed_url_map;  ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                   <script async defer
                   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAjaIzPJQY_nrDt5zi2ayk1BfeQOHo7Kk&callback=initMap">
                   </script>
                   <h3>My Google Maps Demo</h3>
                    <div id="map"></div>
                    <!-- Replace the value of the key parameter with your own API key. -->
                      <?php 
                        $lat = $row->lat;
                        $long = $row->long;
                        echo $lat;
                        echo $long;
                       ?>
                    <script>
                      function initMap() {
                        var uluru = {lat: parseFloat('<?php echo $lat;?>'), lng: parseFloat('<?php echo $long;?>')};
                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 4,
                          center: uluru
                        });
                        var marker = new google.maps.Marker({
                          position: uluru,
                          map: map
                        });
                      }
                    </script>
                 </div>
                 <!-- Modal footer -->
                 <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 </div>
               </div>
             </div>
           </div>
         </tr>  
         <?php
          }
       ?>
     </tbody> 
   </table>
 </div>
</div>

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
<!-- pop map -->

<!-- The Modal -->

<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<!-- link datatable -->
<link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>

  $(document).ready(function() {
    //Transform the HTML table in a fancy datatable
    $('#location').dataTable({
      select: true
    });


  });
</script>

