<?php
    include_once "logic.php"
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyBbxsiL5PkHkY4AW48BaLe0cv_5-esp94Q'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var chartData = google.visualization.arrayToDataTable([
          ['Country', 'Critical Cases'],
          <?php foreach($dataWorld as $key => $value) { ?>
              ['<?php echo $value['countryInfo']['iso2'] ?>', <?php echo $value['critical'] ?> ],
          <?php } ?>
           ]);

          var options = {
          colorAxis: {colors: ['#ffffca', '#bc3508']},
			    datalessRegionColor: '#f8bbd0',
			    defaultColor: '#f5f5f5',
          chartArea:{left:0,top:0,width:"100%",height:"100%"},
          height: 600
          };

        var chart = new google.visualization.GeoChart(document.getElementById('world_div'));
        chart.draw(chartData, options);
      }
    </script>