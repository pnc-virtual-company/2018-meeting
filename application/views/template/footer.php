
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
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

        $('#getaddress').click(function(){
            var address = $('#us3-address').val();
            $('#address').attr('value',address);
        });
        $('#getUpdateAdd').click(function(){
            var address = $('#us3-address').val();
            $('#update_address').attr('value',address);
        });

         $('#update_address').click(function(){
            var update = $('#update_address').val();
            $('#us3-address').attr('value',update);
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
                            e.preventDefault();
                    }          
                });
          
         // initialize input widgets first
            $('#datepairExample .time').timepicker({
                'showDuration': true,
                'timeFormat': 'g:ia'
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
    <script>
        $(document).ready(function(){
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                /*themeSystem: 'bootstrap3',*/
                defaultDate: Date(),
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
                    {
                        title: 'All Day Event',
                        start: '2017-11-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2017-11-07',
                        end: '2017-11-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2017-11-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2017-11-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2017-11-11',
                        end: '2017-11-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2017-11-12T10:30:00',
                        end: '2017-11-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2017-11-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2017-11-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2017-11-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2017-11-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2017-11-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2017-11-28'
                    }
                    ]
            });
            $('#calendar').fullCalendar('changeView', 'agendaDay');
        });
    </script>
    

    
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
        
        $("#users tbody").on('click', '.confirm-delete',  function(){
            var id = $(this).parent().data('id');
            var link = "<?php echo base_url();?>users/delete/" + id;
            $("#lnkDeleteUser").attr('href', link);
            $('#frmConfirmDelete').modal('show');
        });

        $("#users tbody").on('click', '.reset-password',  function(){
            var id = $(this).parent().data('id');
            var link = "<?php echo base_url();?>users/reset/" + id;
            $("#formResetPwd").prop("action", link);
            $('#frmResetPwd').modal('show');
        });
    });
    </script>
  </body>
</html>