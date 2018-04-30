
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2>Update a room</h2>
			<form action="" method="">
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Manager</label>
					<div class="input-group mb-3">
					  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>
					  <div class="input-group-append">
					    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">Select</button>
					  </div>
					</div>
				</div>
				<div class="form-group">
					<label for="">Floor</label>
					<select class="form-control" id="exampleSelect1">
               <option>1</option>
               <option>2</option>
               <option>3</option>
               <option>4</option>
             </select>
				</div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose floor</label>
          </div>
        </div>
				<div class="form-group">
					<label for="comment">Description</label>
					<textarea class="form-control" rows="5" id="comment"></textarea>
				</div>
				<div class="form-group">
					<div>
					    <a class="btn btn-primary"  href="<?php echo base_url(); ?>Welcome/list_room" class="text-center">
					      <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Create a room</span>
					    </a>
					    <a  class="btn btn-danger"  href="<?php echo base_url(); ?>Welcome/list_room" class="text-center">
					      <i style="color: #fff" class="mdi mdi-close" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Cancel</span>
					    </a>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<!-- Button to Open the Modal -->
<!-- The Modal -->

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
        <table id="list_room" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>E-mail</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <tbody>
           		<tr>
        	        <td data-order="1" data-id="1">
        	            1&nbsp;
        	        </td>
        	        <td>Rady</td>
        	        <td>Y</td>
        	        <td>rady@gmail.com</td>
        	        <td>
        	        	<input type="checkbox" name="" id="">
        	        </td>
        	    </tr>
        		<tr>
        	        <td data-order="2" data-id="2">
        	            2&nbsp;
        	        </td>
        	        <td>Channak</td>
        	        <td>Chun</td>
        	        <td>Channak@gmail.com</td>
        	        <td>
        	        	<input type="checkbox" name="" id="">
        	        </td>
        	    </tr>
        	    	<tr>
        	            <td data-order="3" data-id="3">
        	                3&nbsp;
        	            </td>
        	            <td>Rith</td>
        	            <td>Nhel</td>
        	            <td>Rith@gmail.com</td>
        	            <td>
        	            	<input type="checkbox" name="" id="">
        	            </td>
        	        </tr>
             </tbody>
             </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<a class="btn btn-primary"  href="<?php echo base_url(); ?>Welcome/list_room" class="text-center">
      	<span style="color: #fff">&nbsp;OK</span>
      	</a>
        <!-- <button type="button" class="btn btn-success">OK</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>