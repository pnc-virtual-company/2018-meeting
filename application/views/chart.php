<!--We just need a JS file //-->
<script src="<?php echo base_url();?>assets/js/Chart-2.7.1.min.js"></script>

<br>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    
  <h2 style="text-align: center;">Booked Hours Per Meeting Rooms</h2>
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
           <input class="form-control" id="date" name="date" placeholder="MM/DD" type="text"/>
          </div>
         </div>
        </div>
       </form>
      </div>
    </div>
    <div class="col-md-5">
       <div class="col-sm-9">
          <select name="location" class="form-control">
              <option value="pnc">PNC</option>
              <option value="pnv">PNV</option>
              <option value="pnp">PNP</option>
          </select>
       </div>
     </div>
    <div class="col-md-1"></div>
  </div>
  <canvas id="pie-chart" width="850" height="400"></canvas>
  </div>
  <div class="col-md-1"></div>
</div>

<script type="text/javascript">
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["B32", "B21", "B11", "A22", "B31"], 
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }]
    },
    options: {
      title: {
        display: true,
        // text: 'Distribution of booked hours per meeting room, in PNC'
      }
    }
});
</script>