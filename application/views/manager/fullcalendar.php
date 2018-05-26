    <br>
    <div class="container-fluid">
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
      <?php foreach ($getDate as $row): ?>
      
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
    defaultDate: '<?php echo $row->Date; ?>',
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events:[
             <?php foreach($getDate as $row): ?>
                {   
               title: '<?php echo $row->Start = date("H:i A", strtotime($row->Start)).' to '.$row->Start = date("H:i A", strtotime($row->End)).' at '.$row->room_name; ?>',
              start: '<?php echo $row->Date; ?>'
              
                }, 
              <?php endforeach; ?>
         ],

  });
$('#calendar').fullCalendar('changeView','basicDay')
});
</script>
