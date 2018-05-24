   <style>
     #map {
       height: 400px;
       width: 100%;
      }
     
   </style>
   <h2 class="text-center">Location Managements</h2><br>
        <div class="container">
         <div class="row">
   <?php foreach ($list_location as $row): ?>
           <div class="col-md-4">
             <div class="card border-primary mb-3 text-white" style="max-width: 45rem; background-color:#026aab;">
               <!-- <div class="card-header text-center "><i class="mdi mdi-map-marker mdi-36px"></i></div> -->
               <div class="card-body">
                 <br>
                 <h2 class="card-title text-center text-white"><a href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $row->loc_id; ?>&loc_name=<?php echo $row->loc_name; ?>"  class="text-white"><?php echo $row->loc_name; ?></a></h2><br>
               </div>
               <div class="card-footer text-center "><h3><a href="#" class="Pin-location" title="View Location on google map" onclick="showMap('<?php echo $row->loc_id; ?>')" data-toggle="modal"  style="color:#f7bb24;" data-target="#mapModal"><i class="mdi mdi-map-marker"></i></a></i></h3></div>
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
  <?php endforeach ?>
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


