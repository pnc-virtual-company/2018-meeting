<!--We just need a JS file //-->
<script src="<?php echo base_url();?>assets/js/Chart-2.7.1.min.js"></script>

<br>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    
  <h2>Pie chart</h2>
  <div class="col-md-2"></div>
  <div class="col-md-4"></div>
  <div class="col-md-4"></div>
  <div class="col-md-2"></div>
  <br>
  <canvas id="pie-chart" width="800" height="450"></canvas>
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
        text: 'The most Room That popular booked'
      }
    }
});
</script>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <h2>Bar chart</h2>
    <br>
    <canvas id="bar-chart" width="800" height="450"></canvas>
  </div>
  <div class="col-md-1"></div>
</div>

<script type="text/javascript">
// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["B32", "B21", "B11", "A22", "B31"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <hr>
                <div id="calendar" ></div>
          </div>
          <div class="col-md-1"></div>
        </div>