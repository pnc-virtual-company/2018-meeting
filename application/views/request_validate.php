<br>
<div id="container">
  <div class="row-fluid">
    <div class="col-12">
      <h2 style="text-align: center;">Booking Request Validation</h2>
      <br>
      <table id="request_validate" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
        <thead>
          <tr>
            <th>Action</th>
            <th>Status</th>
            <th>Location</th>
            <th>Room</th>
            <th>Date</th>
            <th>Start</th>
            <th>End</th>
            <th>Creator</th>
            <th>Note</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          error_reporting(0);
          foreach ($request as $row) {
            ?>
            <tr>
              <td data-order="1" data-id="1">
                &nbsp;
                <a href="#" title="Accept request" data-toggle="modal" data-target="#accept"><i class="mdi mdi-check"></i></a>
                <a href="#" title="Reject request" data-toggle="modal" data-target="#reject"><i class="mdi mdi-window-close"></i></a> 
              </td>
              <td><?php echo $row->status; ?></td>
              <td><?php echo $row->loc_name; ?></td>
              <td><?php echo $row->room_name; ?></td>
              <td><?php echo $row->Date; ?></td>
              <td><?php echo $row->Start = date("H:i A", strtotime($row->Start)); ?></td>
              <td><?php echo $row->End = date("H:i A", strtotime($row->End)); ?></td>
              <td><?php echo $row->firstname;?></td>
              <td><?php echo $row->book_description;?></td>
              <!-- Modol pop up Accept request -->
              <div id="accept" class="modal hide fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Accept confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>You are going to accept this request.</p>
                      <p>Are you sure that you want to perform this action?</p>
                    </div>
                    <div class="modal-footer">
                      <a href="<?php echo base_url(); ?>/booking/acceptRequest/<?php echo $row->book_id; ?>" class="btn btn-danger" id="accept">Yes</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </div>
                  </div>
                </div>
              </div>
              <div id="reject" class="modal hide fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Reject confirmation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>You are going to reject this request.</p>
                      <p>Are you sure that you want to perform this action?</p>
                    </div>
                    <div class="modal-footer">
                      <a href="<?php echo base_url(); ?>/booking/rejectRequest/<?php echo $row->book_id; ?>" class="btn btn-danger" id="accept">Yes</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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

