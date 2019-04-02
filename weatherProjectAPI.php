<?php
$weather ="";
$errorMsg ="";
if($_GET){
    if($_GET['city']){
       $urlContents= @file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=4b6cbadba309b7554491c5dc66401886");
        $weatherArray = json_decode($urlContents,true);
        if(!$urlContents){
            $errorMsg ="City Not Found !";
        }
        else{
        $weather = "The weather in ".$_GET['city']." is currently ".$weatherArray['weather'][0]['description'].".<br>";
        $tempInC = (int)$weatherArray['main']['temp']-273;
        $weather .= "The Temperature is ".$tempInC."&deg;C and the wind speed is ".$weatherArray['wind']['speed']." .";}
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