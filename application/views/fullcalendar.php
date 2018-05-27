    <br>
    <div class="container-fluid">
      <h3 class="text-center"><?php echo $this->input->get('room_name'); ?> Room Calendar</h3>
      <p class="text-center" style="text-align: center;"><span class="badge badge-success">Accepted</span><span class="badge badge-danger">Rejected</span><span class="badge badge-info">Requested</span></p>
        <div class="row">
            <br>
            <a href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $this->input->get('loc_id'); ?>&loc_name=<?php echo $this->input->get('loc_name'); ?>" class="btn btn-primary float-right">
                <i class="mdi mdi-backspace"></i>&nbsp;Cancel
            </a>&nbsp;
            <a href="<?php echo base_url(); ?>booking/book_meeting?loc_id=<?php error_reporting(0); echo $this->input->get('loc_id'); ?>&loc_name=<?php echo  $this->input->get('loc_name'); ?>&room_id=<?php echo $this->input->get('room_id'); ?>&room_name=<?php echo $this->input->get('room_name'); ?>" class="btn btn-primary float-right">
            </i>&nbsp;Make a reservation
        </a>

        <div class="col-md-12">
          <hr>
          <div id="calendar" ></div>
      </div>
      <?php foreach ($book_request as $row): ?>
      
      <?php endforeach ?>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'basicDay,basicWeek,month'
    },
    //2018-95-25T13:50
    /*themeSystem: 'bootstrap3',*/
    defaultDate: '<?php echo date("Y-m-d"); ?>',
    navLinks: true, // can click day/week names to navigate views
    editable: false,
    eventLimit: true, // allow "more" link when too many events
    events:[
             <?php foreach($getDate as $row): ?>
                {   
               title: '<?php echo $row->Start = date("H:i A", strtotime($row->Start)).' to '.$row->Start = date("H:i A", strtotime($row->End)).' at '.$row->room_name; ?>',
              start: '<?php echo $row->Date; ?>',

              color:'<?php if($row->status == 'Requested'){echo '#06909e';}else if ($row->status == 'Accepted'){echo '#017f2b';}else{echo '#d12f23';}?>'
                }, 
              <?php endforeach; ?>
         ],

  });
$('#calendar').fullCalendar('changeView','basicDay')
});
</script>
