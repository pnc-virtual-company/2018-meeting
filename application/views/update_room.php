<br>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <h1 style="text-align: center;">Update a room</h1>
      <form action="<?php echo base_url();?>Welcome/insert_create_room" method="post" enctype="multipart/form-data">
       <!--  <?php 
          //foreach ($update_room as $row) {
       ?> -->
       <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="<?php //echo $row->room_name; ?>" class="form-control" required="">
      </div>
      <div class="form-group">
        <label for="">Manager</label>
        <div class="input-group mb-3">
          <input type="hidden" name="user_id" value="<?php //echo $row->user_id; ?>">
          <input type="text" value="<?php //echo $row->user_id; ?>" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">Select</button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="">Floor</label>
        <input type="text" value="<?php //echo $row->floor; ?>" name="floor" class="form-control" required="">
      </div>
      <div class="form-group">
        <label for="comment">Description</label>
        <textarea class="form-control" value="<?php //echo $row->description; ?>" rows="5" id="comment" name="description" required="" style="resize: none;"></textarea>
      </div>
      <div class="form-group">

        <div>
          <button class="btn btn-primary" type="submit" name="send" value="login">
            <i style="color: #fff" class="mdi mdi-check" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Create a room</span>
          </button>
          <a href="<?php echo base_url(); ?>welcome/all_room" class="btn btn-danger float-right">
            <i style="color: #fff" class="mdi mdi-close" data-toggle="tooltip" title="Add new room"></i><span style="color: #fff">&nbsp; Cancel</span>
          </a>
        </div>
      </div>

    </form>
  </div>
  <div class="col-md-4"></div>
</div>
</div>

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
        <table id="list_room" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="70%">
          <thead>
            <tr>
             <!--  <th>ID</th> -->
             <th>Firstname</th>
             <th>Lastname</th>
             <th>E-mail</th>
             <th>Action</th> 
           </tr>
         </thead>
         <tbody>
          <?php   
          foreach ($manager as $row) {
           ?>
           <tr>
             <!-- <td><?php echo $row->id; ?></td> -->
             <td><?php echo $row->firstname; ?></td>
             <td><?php echo $row->lastname; ?></td>
             <td><?php echo $row->email; ?></td>

             <td>
              <input type="checkbox" name="" id="">
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
    <a class="btn btn-primary" href="<?php echo base_url(); ?>Welcome/create_room" class="text-center">
      <span style="color: #fff">&nbsp;OK</span>
    </a>
    <!-- <button type="button" class="btn btn-success">OK</button> -->
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  </div>

</div>
</div>
</div>