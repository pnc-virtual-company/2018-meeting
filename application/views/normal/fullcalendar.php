    <br>
    <div class="container-fluid">
        <div class="row">
            <br>
            <a href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $this->input->get('loc_id'); ?>&loc_name=<?php echo $this->input->get('loc_name'); ?>" class="btn btn-primary float-right">
                <i class="mdi mdi-backspace"></i>&nbsp;Cancel
            </a>&nbsp;
            <a href="<?php echo base_url(); ?>booking/book_meeting?loc_id=<?php error_reporting(0); echo $this->input->get('loc_id'); ?>&loc_name=<?php echo  $this->input->get('loc_name'); ?>&room_id=<?php echo $this->input->get('room_id'); ?>" class="btn btn-primary float-right">
            </i>&nbsp;Make a reservation
        </a>
        <div class="col-md-12">
          <hr>
          <div id="calendar" ></div>
      </div>
  </div>
</div>
