      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>PNC Group D &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="#" class="external">Group D</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper-1.12.9..min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>/assets/js/front.js"></script>


    <link href="<?php echo base_url();?>assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTable//DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        //Transform the HTML table in a fancy datatable

        $('#list_room').dataTable({
            stateSave: true,
        });
         $('#request_validate').dataTable({
            stateSave: true,
        });
        //$("#frmResetPwd").alert();
        $('#location').dataTable({
            stateSave: true,
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


        
    });
    </script>
  </body>
</html>