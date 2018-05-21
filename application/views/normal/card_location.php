  <h2 class="text-center">Location Managerment</h2><br>
       <div class="container">
       	<div class="row">
  <?php foreach ($list_location as $row): ?>
       		<div class="col-md-4">
       			<div class="card border-primary mb-3 text-white" style="max-width: 45rem; background-color:#026aab;">
       			  <!-- <div class="card-header text-center "><i class="mdi mdi-map-marker mdi-36px"></i></div> -->
       			  <div class="card-body">
       			  	<br>
       			    <h2 class="card-title text-center text-white"><a href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $row->loc_id; ?>&loc_name=<?php echo $row->loc_name; ?>" class="text-white"><?php echo $row->loc_name; ?></a></h2><br>
       			  </div>
       			  <div class="card-footer text-center "><h3><a href="#" class="Pin-location" title="View Location on google map" data-toggle="modal" style="color:#f7bb24;" data-target="#<?php echo $row->loc_id; ?>"><i class="mdi mdi-map-marker"></i></a></i></h3></div>
       			</div>
       			<!-- pop up location -->
       			 <div class="modal fade" id="<?php echo $row->loc_id; ?>">
       			  <div class="modal-dialog modal-lg">
       			    <div class="modal-content">
       			      <!-- Modal Header -->
       			      <div class="modal-header">
       			        <h4 class="modal-title text-center"><?php echo $row->loc_name; ?> Location</h4>
       			        <button type="button" class="close" data-dismiss="modal">&times;</button>
       			      </div>
       			      <!-- Modal body -->
       			      <div class="modal-body">
       			        <iframe src="<?php  echo $row->embed_url_map;  ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
       			      </div>
       			      <!-- Modal footer -->
       			      <div class="modal-footer">
       			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       			      </div>
       			    </div>
       			  </div>
       			</div>
       			<!-- end of pup up location -->
       		</div>
 <?php endforeach ?>
       	</div>
       </div>