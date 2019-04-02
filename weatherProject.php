<?php
$weather ="";
$errorMsg ="";
if($_GET){
    if($_GET['city']){
        $city= str_replace(" ","",$_GET['city']);
        $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        if($file_headers[0] != 'HTTP/1.1 404 Not Found'){
        $weatherPage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        $startSection=explode('Weather Today </h2>(1&ndash;3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">',$weatherPage);
            if(sizeof($startSection)>1){
        $endSection=explode("</span></p>",$startSection[1]);
            if(sizeof($endSection)>1){
        $weather = $endSection[0];    }  
                else{
                    $errorMsg = "Sorry , We Are Running Maintenance :( </br> Will be right back";
                }
        }
            else{
            $errorMsg = "Sorry , We Are Running Maintenance :( </br> Will be right back";
            }
        }
        else{
            $errorMsg = "Location Not Found !";
        }
        
    }
}
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<style>
    body{
        background-image: url("aoraki-mt-cook.jpg");
        background-size: cover;  
    }
    #main{
        text-align: center;
        margin-top: 130px;
        width: 500px;
    }
</style>


<body>
    
<div class="container" id="main">
    <h1>What's The Weather?</h1>
    <h4>Enter the name of a city.</h4>
    <br>
    <form>
    <input type="text" class="form-control" name="city" placeholder="Eg. Cairo" value="<?php if($_GET){ echo $_GET['city'];} ?>">
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div id="weather" ><?php
    if($weather !=""){
    echo '<div class="alert alert-success">'.$weather.'</div>';}
           elseif($errorMsg != ""){
               echo '<div class="alert alert-danger">'.$errorMsg.'</div>';
           }
        ?>
    </div>
    </div>
    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script>
        
    </script>
    
</body>