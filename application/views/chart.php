<!--We just need a JS file //-->
<script src="<?php echo base_url();?>assets/js/Chart-2.7.1.min.js"></script>
<br>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
  <h2 style="text-align: center;">Booked Hours Per Meeting Room</h2>
  <br><br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">
      <div class="form-inline">
       <form action="" class="form-horizontal">
        <div class="form-group">
         <label class="control-label col-sm-3 requiredField" for="date">
          Month
         </label>
         <div class="col-sm-9">
          <div class="input-group">
           <div class="input-group-addon" >
            <i class="fa fa-calendar" >
            </i>
           </div>
           <input class="form-control" id="date" name="date" placeholder="MM-DD-YY" type="text"/>
          </div>
         </div>
        </div>
       </form>
      </div>
    </div>
    <div class="col-md-5">
       <div class="col-sm-9">
            <select class="form-control" name="location" id="">
              <?php foreach ($list_location as $row): ?>
              <option value="<?php echo $row->loc_id; ?>"><?php echo $row->loc_name; ?></option>
              <?php endforeach ?>
            </select>
       </div>
     </div>
    <div class="col-md-1"></div>
  </div><br><br>
  <canvas id="pie-chart" width="850" height="400"></canvas>
  </div>
  <div class="col-md-1"></div>
</div>
 <script type="text/javascript">
 new Chart(document.getElementById("pie-chart"), {
     type: 'pie',
     data: {

       labels: [
         <?php 
          foreach($allroom as $row)
          { 
             echo "'".$row->room_name."',";
          }
          ?>
       ],
       datasets: [{
         label: "Population (millions)",
         backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","green","red","blue"],
          data: [
            <?php 
                 foreach($allbook as $row){ 
                 echo $row->count.",";
            }
            ?>
          ]
       }]
     },
 });
 </script>     

      