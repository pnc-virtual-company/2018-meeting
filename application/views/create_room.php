
<br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h1>Create a room</h1>
			<form action="" method="">
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Manager</label>
					 <input type="text" name="name" class="form-control">
					 <span>
					 	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
					 	 Select
					 	</button>
					 </span>
					
				</div>
				<div class="form-group">
					<label for="">Floor</label>
					<input type="text" name="floor" class="form-control" >
				</div>
				<div class="form-group">
					<label for="comment">Description</label>
					<textarea class="form-control" rows="5" id="comment"></textarea>
				</div>
				<div class="form-group">
					<div>
					    <button class="btn btn-primary"><a href="#" class="text-center">
					      <i style="color: #fff" class="mdi mdi-plus-circle" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Creat a room</span>
					    </a>
					    </button>
					    <button class="btn btn-danger"><a href="#" class="text-center">
					      <i style="color: #fff" class="mdi mdi-close" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Cancel</span>
					    </a>
					    </button>
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
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Floor</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
           		<tr>
        	        <td data-order="1" data-id="1">
        	            1&nbsp;
        	            <a href="#" title=""><i class="mdi mdi-delete"></i></a>
        	            <a href="#" title=""><i class="mdi mdi-pencil"></i></a>
        	        </td>
        	        <td>B23</td>
        	        <td>BALET</td>
        	        <td>1</td>
        	        <td>B23 Classroom</td>
        	    </tr>
        	    <tr>
        	        <td data-order="1" data-id="1">
        	            2&nbsp;
        	            <a href="#" class="confirm-delete" title="Delete user"><i class="mdi mdi-delete"></i></a>
        	            <a href="#" title="Edit user"><i class="mdi mdi-pencil"></i></a>
        	        </td>
        	        <td>B12</td>
        	        <td>BALET</td>
        	        <td>3</td>
        	        <td>B12 Classroom</td>
        	    </tr>
             </tbody>
             </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success">OK</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>