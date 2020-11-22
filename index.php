<?php
    include_once "logic.php";
    include_once "chart_us.php";
?>

<!-- <?php
    include "chart_us.php";
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/9ec0cb617a.js" crossorigin="anonymous"></script>
    
    <!-- My stylesheet -->
    <link rel="stlesheet" href="style.css">
    
     <!-- Map stylesheet -->
    <link rel="mapsheet" href="Map.css">

    <title>Covid-19 Tracker</title>
</head>
<body>

    <div class="container-fluid bg-light p-5 text-center my-3">
        <h1>Covid-19 Tracker</h1>
        <h5 class="text-muted">Tracking COVID-19 in the USA</h5>

    </div>

    <div id="dataUS">
        <div class="container my-5">
           <div class="row text-center">
               <div class="col-3">
                   <h5>Total Confirmed</h5>
                   <?php echo $dataUS[0]['positive'];?>
                </div>
                <div class="col-3">
                    <h5>Hospitalized Currently</h5>
                    <?php echo $dataUS[0]['hospitalizedCurrently'];?>
                </div>
                <div class="col-3">
                    <h5>In ICU Currently</h5>
                    <?php echo $dataUS[0]['inIcuCurrently'];?>
                </div>
                 <div class="col-3">
                    <h5>Total Deaths</h5>
                    <?php echo $dataUS[0]['death'];?>
                </div>
            </div>
        </div>

        <div class="container my-5">
           <div class="row text-center">
        <div id="regions_div" style="text-align:center; background-color:grey; width: 100%; height: 550px;"></div>
        </div>
        </div>

        <div class="container-fluid">
       <div class="table-responsive">
       <table class="table" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">State</th>
                    <th scope="col">Confirmed</th> 
                    <th scope="col">Recovered</th> 
                    <th scope="col">Hospitalized Currently</th>  
                    <th scope="col">In ICU Currently</th>      
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($data as $key => $value) {
                ?>  
                        <tr>
                            <th width="20%"><?php echo states::$database[$value['state']];?></th>
                            <td width="20%">
                                <div class="row text-center">
                                <div class="col-2">
                                     <?php echo $value['positive'];?>
                                 </div>
                                 <div class="col-4" align="left"> 
                                    <?php if($value['positiveIncrease'] != 0){?>
                                         <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i><?php echo $value['positiveIncrease'];?></small>
                                      <?php }?> 
                                 </div>
                                 </div>                                
                            </td>
                            <td width="20%">
                            <?php if(is_null($value['recovered'])){?>
                                    <?php echo "Not available";?>
                                <?php } else {?>
                                    <?php echo $value['recovered'];?>
                                <?php }?>
                            </td>
                            <td width="20%">
                            <div class="row text-center">
                                <div class="col-1">
                                <?php if(is_null($value['hospitalizedCurrently'])){?>
                                    <?php echo "Not available";?>
                                <?php } else {?>
                                    <?php echo $value['hospitalizedCurrently'];?>
                                    <?php }?>
                                 </div>
                                 <div class="col-4" align="left"> 
                                 <?php if($value['hospitalizedIncrease'] != 0){?>
                                         <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i> <?php echo $value['hospitalizedIncrease'];?></small>
                                     <?php }?> 
                                 </div>
                                 </div> 
                            </td>
                            <td width="20%"> 
                            <?php if(is_null($value['inIcuCurrently'])){?>
                                    <?php echo "Not available";?>
                                <?php } else {?>
                                    <?php echo $value['inIcuCurrently'];?>
                                <?php }?>
                            
                                
                                <!-- <?php echo $value['death'];?>
                                <?php if($value['deathIncrease'] != 0){?>
                                    <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i> <?php echo $value['deathIncrease'];?></small>
                                <?php }?> -->
                            </td>
                        </tr>
                  
                  <?php  }?>
                
            </tbody>
            
         </table>
       </div>
    </div>
    </div>

</body>
</html>