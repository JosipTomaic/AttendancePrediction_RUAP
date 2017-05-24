<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
    header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$kapacitet;
$vrijeme;
$temperatura;
 
 if ( isset( $_POST['capacity'] ) ) {
        foreach ( $_POST['capacity'] as $value ) {
           
             

        }
        $kapacitet=$value;
        echo "$kapacitet";
    }
     if ( isset( $_POST['weather'] ) ) {
       print_r($_POST);
    }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Bundesliga Attendance Prediction</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!--Include Your Style Sheets next -->
    <link rel="stylesheet" type="text/css" href="prediction_page.css">
    
  </head>
  <body>
    <div class="container-fluid">
        <div class="row" style="background-color: black;">
            <div class="col-md-2">
                <div align="center">
                    <a href="http://www.bundesliga.com/en/" target="_blank"><img src="logo.png" class="img-responsive" alt="Bundesliga" style="width: 30%"></a>
                    hi' <?php echo $userRow['user_firstn']; ?>&nbsp;<a href="logout.php?logout">Odjava</a>
                </div>
            </div>
            <div class="col-md-10 child" align="center">
                <p class="text-center myTitle">Bundesliga Attendance Prediction</p>
            </div>
        </div>
        <div class="row centerNavigation">
                <div class="col-md-3 roundedDiv">
                    <button type="button" data-toggle="collapse" href="#StadiumCapacity" class="btn btn-default">Capacity</button>
                </div>
                <div class="col-md-3 roundedDiv">
                    <button type="button" data-toggle="collapse" href="#Temperature" class="btn btn-default">Temperature</button>
                </div>
                <div class="col-md-3 roundedDiv">
                    <button type="button" data-toggle="collapse" href="#Weather" class="btn btn-default">Weather</button>
                </div>
                <div class="col-md-3 roundedDiv">
                    <button type="button" data-toggle="collapse" href="#Rivalry" class="btn btn-default">Rivalry</button>
                </div>
        </div>
        <form name="capacity_form" method="POST" action="">
            <div class="collapse" id="StadiumCapacity">
                <div class="row" align="center">
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[1]" src="wwk_arena.png" class="card-img-top" value="30660">
                            <h4 class="card-title">WWK Arena</h4>
                            <p class="card-text">Club: FC Augsburg</p>
                            <p class="card-text">30 660</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[2]" src="bayarena.png" class="card-img-top" value="30210">
                            <h4 class="card-title">BayArena</h4>
                            <p class="card-text">Club: Bayer Leverkusen</p>
                            <p class="card-text">30 210</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[3]" src="allianz_arena.png" class="card-img-top" value="75000">
                            <h4 class="card-title">Allianz Arena</h4>
                            <p class="card-text">Club: Bayern Munich</p>
                            <p class="card-text">75 000</p>
                        </div>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[4]" src="signal_iduna_park.png" class="card-img-top" value="81359">
                            <h4 class="card-title">Signal Iduna Park</h4>
                            <p class="card-text">Club: Borussia Dortmund</p>
                            <p class="card-text">81 359</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[5]" src="stadion_im_borussia_park.png" class="card-img-top" value="54010">
                            <h4 class="card-title">Stadion im Borussia-Park</h4>
                            <p class="card-text">Club: Borussia Mönchengladbach</p>
                            <p class="card-text">54 010</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[6]" src="merck_stadion.png" class="card-img-top" value="17000">
                            <h4 class="card-title">Merck-Stadion am Böllenfalltor</h4>
                            <p class="card-text">Club: Darmstadt 98</p>
                            <p class="card-text">17 000</p>
                        </div>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[7]" src="commerzbank_arena.png" class="card-img-top" value="51500">
                            <h4 class="card-title">Commerzbank-Arena</h4>
                            <p class="card-text">Club: Eintracht Frankfurt</p>
                            <p class="card-text">51 500</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[8]" src="volksparkstadion.png" class="card-img-top" value="57000">
                            <h4 class="card-title">Volksparkstadion</h4>
                            <p class="card-text">Club: Hamburger SV</p>
                            <p class="card-text">57 000</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[9]" src="hdi_arena.png" class="card-img-top" value="49000">
                            <h4 class="card-title">HDI-Arena</h4>
                            <p class="card-text">Club: Hannover 96</p>
                            <p class="card-text">49 000</p>
                        </div>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[10]" src="olympiastadion.png" class="card-img-top" value="74475">
                            <h4 class="card-title">Olympiastadion</h4>
                            <p class="card-text">Club: Hertha BSC</p>
                            <p class="card-text">74 475</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[11]" src="wirsol_rhein_neckar_arena.png" class="card-img-top" value="30150">
                            <h4 class="card-title">Wirsol Rhein-Neckar-Arena</h4>
                            <p class="card-text">Club: 1899 Hoffenheim</p>
                            <p class="card-text">30 150</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[12]" src="audi_sportpark.png" class="card-img-top" value="15000">
                            <h4 class="card-title">Audi Sportpark</h4>
                            <p class="card-text">Club: FC Ingolstadt</p>
                            <p class="card-text">15 000</p>
                        </div>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[13]" src="rheinenergiestadion.png" class="card-img-top" value="50000">
                            <h4 class="card-title">RheinEnergieSTADION</h4>
                            <p class="card-text">Club: 1.FC Köln</p>
                            <p class="card-text">50 000</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[14]" src="coface_arena.png" class="card-img-top" value="34000">
                            <h4 class="card-title">Coface Arena</h4>
                            <p class="card-text">Club: Mainz 05</p>
                            <p class="card-text">34 000</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[15]" src="veltins_arena.png" class="card-img-top" value="62271">
                            <h4 class="card-title">Veltins-Arena</h4>
                            <p class="card-text">Club: Schalke 04</p>
                            <p class="card-text">62 271</p>
                        </div>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[16]" src="mercedes_benz_arena.png" class="card-img-top" value="60441">
                            <h4 class="card-title">Mercedes-Benz Arena</h4>
                            <p class="card-text">Club: VfB Stuttgart</p>
                            <p class="card-text">60 441</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[17]" src="weserstadion.png" class="card-img-top" value="42100">
                            <h4 class="card-title">Weserstadion</h4>
                            <p class="card-text">Club: Werder Bremen</p>
                            <p class="card-text">42 100</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-block stadium_block">
                            <input type="image" name="capacity[18]" src="volkswagen_arena.png" class="card-img-top" value="30000">
                            <h4 class="card-title">Volkswagen Arena</h4>
                            <p class="card-text">Club: VfL Wolfsburg</p>
                            <p class="card-text">30 000</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form name="temperature_form" method="POST" action="">
            <div class="collapse" id="Temperature">
                <div class="card card-block temp_and_weather_round">
                    <div class="row" align="center">
                        <div class="col-md-12">
                            <input id="temp_slider" type="range" name="temp_slider" min="-5" max="35" value="15" oninput="temp_slider_output.value = temp_slider.value" />
                            <output style="display: inline-block; font-size: 700%;" id="temp_slider_output"></output><p style="display: inline-block; font-size: 700%;">°C</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form name="weather_form" method="POST" action="">
            <div class="collapse" id="Weather">
                <div class="card card-block" align="center">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="image" name="weather[1]" src="weather_rain.png" class="img-responsive weatherImage" value="1">
                            <p class="rivalText">Rain</p>
                        </div>
                        <div class="col-md-2">
                            <input type="image" name="weather[2]" src="weather_thunderstorm.png" class="img-responsive weatherImage" value="2">
                            <p class="rivalText">Thunderstorm</p>
                        </div>
                        <div class="col-md-2">
                            <input type="image" name="weather[3]" src="weather_cloudy.png" class="img-responsive weatherImage" value="3">
                            <p class="rivalText">Cloudy</p>
                        </div>
                        <div class="col-md-2">
                            <input type="image" name="weather[4]" src="weather_snow.png" class="img-responsive weatherImage" value="4">
                            <p class="rivalText">Snow</p>
                        </div>
                        <div class="col-md-2">
                            <input type="image" name="weather[5]" src="weather_clear.png" class="img-responsive weatherImage" value="5">
                            <p class="rivalText">Clear</p>
                        </div>
                        <div class="col-md-2">
                            <input type="image" name="weather[6]" src="weather_foggy.png" class="img-responsive weatherImage" value="6">
                            <p class="rivalText">Foggy</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form name="rivalry_form" method="POST" action="">
            <div class="collapse" id="Rivalry">
                <div class="card card-block" align="center">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="image" name="rival[0]" src="rivalry_no.png" class="img-responsive rivalImage" value="0">
                            <p class="rivalText">NO</p>
                        </div>
                        <div class="col-md-6">
                            <input type="image" name="rival[0]" src="rivalry_yes.png" class="img-responsive rivalImage" value="1">
                            <p class="rivalText">YES</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-default confirmButton" data-toggle="modal" data-target="#modalPredict">Predict</button>
            </div>
        </div>
        <div class="modal fade" id="modalPredict" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h1 class="modal-title">Attendance:(ovdje ide rezultat)</h1>
                </div>
                <div class="modal-body">
                  <h4>Advices</h4>
                  <p>Ovdje bi trebali ici savjeti ukoliko je stadion pun (to cemo na kraju kad dobijemo rezultat)</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
    </div>
  </body>
</html>