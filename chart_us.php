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
          ['State', 'Cases'],
          <?php foreach($data as $key => $value) { ?>
              ['<?php echo states::$database[$value['state']] ?>', <?php if(is_null($value['hospitalizedCurrently'])){?>
                                    <?php echo "0";?>
                                <?php } else {?>
                                    <?php echo $value['hospitalizedCurrently'];?>
                                    <?php }?> ],
          <?php } ?>
          // ['Nevada', 1000]
           ]);


        var options = {
            region: "US",
            displayMode: "regions",
            resolution: "provinces",
            colorAxis: {colors: ['#ffffca', '#bc3508']},
            chartArea:{left:0,top:0,width:"100%",height:"100%"},
            height: 550
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        chart.draw(chartData, options);
      }
    </script>