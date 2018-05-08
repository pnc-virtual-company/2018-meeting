
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2>Create A Room</h2>
			<form action="<?php echo base_url();?>Welcome/insert_create_room?loc_id=<?php echo $this->input->get('loc_id'); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control" required="">
				</div>
				<div class="form-group">
          <?php 
          
            $loc_id = $this->input->get('loc_id');
            $this->session->set_userdata('loc_id', $loc_id);
           ?>
					<label for="">Manager Name</label>
					<div class="input-group mb-3">
            <input type="hidden" name="manager_id" value="" id="manager_id">
					  <input type="text" class="form-control" value="" aria-label="Recipient's username" aria-describedby="basic-addon2" id="manager_name" name="manager_name" disabled>
					  <div class="input-group-append">
					    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">Select</button>
					  </div>
					</div>
				</div>
				<div class="form-group">
					<label for="">Floor</label>
					 <input type="text" name="floor" class="form-control" required="">
				</div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="photo">
            <label class="custom-file-label" for="customFile">Upload image floor</label>
            <!-- <input type="file" class="image-upload" accept="image/*" name="profilePic" id="profilePic"/>  -->
          </div>
        </div>
				<div class="form-group">
					<label for="comment">Description</label>
					<textarea class="form-control" rows="5" id="comment" style="resize: none;" name="description" required=""></textarea>
				</div>
				<div class="form-group">
          
					<div>
              <button class="btn btn-primary" type="submit" name="send" value="login">
                <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Create a room</span>
              </button>
               
          <a href="<?php echo base_url(); ?>welcome/list_room?loc_id=<?php echo $this->input->get('loc_id'); ?>" class="btn btn-danger float-right">
          <i class="mdi mdi-cancel "></i>&nbsp;Cancel
          </a>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<?php 
  $room_id = $this->input->get('room_id');
  $this->session->set_userdata('room_id', $room_id);
  $loc_id = $this->input->get('loc_id');
  $this->session->set_userdata('loc_id', $loc_id);
 ?>
<!--Pup up list manager name -->

<div class="modal fade" id="myModal">
	<div class="row">
		
	</div>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="modal-title">Select the manager of the meeting room</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table id="list_room" class="table table-striped table-bordered" style="width: 100%;">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>E-mail</th>
                  <th>Select</th> 
              </tr>
          </thead>
          <tbody>
            <?php   
               foreach ($manager as $row) {
               ?>
                 <tr>
                     <td id="id"><?php echo $row->id; ?></td>
                     <td id="fname"><?php echo $row->firstname; ?></td>
                     <td id="lname"><?php echo $row->lastname; ?></td>
                     <td id="email"><?php echo $row->email; ?></td>
                     <td>
                        <input type="hidden" name="managerid" id="managerid" value="<?php echo $row->id; ?>">
                        <input type="radio" name="manager_name" id="manager" value="<?php echo $row->firstname. "&nbsp;".$row->lastname ?>">
                     </td>
                 </tr>  
              <?php
              }
            ?>
          </tbody>        
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<a class="btn btn-primary" href="#" class="text-center" id="get_m_id">
      	<span style="color: #fff" data-dismiss="modal">&nbsp;OK</span>
      	</a>
        <!-- <button type="button" class="btn btn-success">OK</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>