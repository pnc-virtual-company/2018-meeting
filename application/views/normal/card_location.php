  <h2 class="text-center">Location Managerment</h2><br>
       <div class="container">
       	<div class="row">
  <?php foreach ($list_location as $row): ?>
       		<div class="col-md-4">
       			<div class="card border-primary mb-3" style="max-width: 45rem;">
       			  <div class="card-header text-center bg-primary"><br></div>
       			  <div class="card-body">
       			  	<br>
       			    <h2 class="card-title text-center"><a href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $row->loc_id; ?>&loc_name=<?php echo $row->loc_name; ?>"><?php echo $row->loc_name; ?></a></h2><br>
       			  </div>
       			</div>
       		</div>
 <?php endforeach ?>
       	</div>
       </div>