    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url();?>assets/js/popper-1.12.9..min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.datepair.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datepair.min.js"></script>

    <script src="<?php echo base_url(); ?>/assets/js/front.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
    
    <script src='<?php echo base_url(); ?>assets/fullcalendar-3.8.2/lib/moment.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/fullcalendar-3.8.2/fullcalendar.js'></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
     <script>
       
        $('#getUpdateAdd').click(function(){
            var address = $('#us3-address').val();
            $('#update_address').attr('value',address);
        });

         $('#update_address').click(function(){
            var update = $('#update_address').val();
            $('#us3-address').attr('value',update);
        });
        $('#getaddress').click(function(){
            var address = $('#us3-address').val();
            $('#address').attr('value',address);
        });

        
        $(window).resize(function() {
          if ($(window).width() < 768) {
            $("#hide_menu").show();
          }
         else {
           $("#hide_menu").hide();
         }
        });



        $(function(){
            $('#btn-primary').click(function(){
                var sdate = $('#sdate').val();
                var hiddenvalue = $('#hiddenvalue').val();

                if (sdate == hiddenvalue ) {
                   alert("You can not book aroom");
                }else{
                   alert("you can count");
                }

            });
        });
      $(function () {
               $("tr").on( "click", function() {
                    var mid = $( "#manager:checked" ).val();
                    var managerid = $("#managerid").val();
                    $( "#manager_name" ).attr('value',mid);
                    $( "#manager_id" ).attr('value',managerid);
               });
               
            var url = window.location.pathname,
                    urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
                $('#menu_leftsidebar a').each(function () {
                    if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                            $(this).addClass('active');
                            $(this).parent().siblings().find('a').removeClass('active');
                    }          
                });
          
         // initialize input widgets first
            $('#datepairExample .time').timepicker({
                'showDuration': true,
                'timeFormat': 'G:ia',
                'minTime': '7:00am',
                'maxTime': '7:00pm',
                'showDuration': true
            });

            

            // initialize datepair
            $('#datepairExample').datepair();     
        $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD',

                // icons: {
                //     time: "mdi mdi-clock mdi-36px ",
                //     date: "mdi mdi-calendar-clock mdi-36px",
                //     up: "mdi mdi-arrow-up-bold mdi-24px",
                //     down: "mdi mdi-arrow-down-bold mdi-24px"
                // }
               

        });
        $('#datetimepicker2').datetimepicker({
                format: 'YYYY-MM-DD',

        });
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.form-inline').length>0 ? $('.form-inline').parent() : "body";
      date_input.datepicker({
       format: 'mm/dd/yyyy',
       container: container,
       todayHighlight: true,
       autoclose: true,
      });
     });
    </script>

    <!-- script src='<?php //echo base_url(); ?>assets/fullcalendar-3.8.2/lib/jquery.min.js'></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
   

    
    <link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        //Transform the HTML table in a fancy datatable

        $('#list_room').dataTable({
            select: 'single'
        });
         $('#request_validate').dataTable({
            language: {
                select: {
                   rows: "%d rows selected"
                }
            },
            select: true
        });
    });
    </script>
  </body>
</html>