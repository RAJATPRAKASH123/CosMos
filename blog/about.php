<?php include("path.php");
include(ROOT_PATH . '/app/controllers/topics.php');

$purposes = selectDistinct('sattelite_gen_normalised___sat_info', 'Purpose');
// dd($satellites);

$satellites = array();
$satellites_title = 'Satellites';

if(isset($_POST['search-term']))
{
    $satellites_title = "You searched for '" . $_POST['search-term'] ."'";
    $satellites = searchSat($_POST['search-term']);
    // dd($satellites);
}
else if(isset($_GET['pur']))
{
    $satellites_title = "You searched for '" . $_GET['pur'] ."'";
    $satellites = selectAll('sattelite_gen_normalised___sat_info', ['Purpose' => $_GET['pur']]);
}
else
{
    $satellites = array_slice(selectAll('sattelite_gen_normalised___sat_info'),0,5);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/7d1231b7b0.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento&display=swap" rel="stylesheet">
    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Satellites</title>
</head>
<body>
    
    <!-- TODO: INCLUDE HEADER HERE -->
    <?php include(ROOT_PATH . "/app/includes/header.php")?>
    <?php include(ROOT_PATH . "/app/includes/messages.php")?>


    <!-- page-wrapper -->
    <div class="page-wrapper">

        <!-- Content -->
        <div class="content clearfix" style='font-size:1.2rem;'>
            <img src="assets/images/sat2.jpg" alt="" style="display:block;width:50%;height:auto;margin:0px auto;">
                <h1 class="recent-post-title">Introduction</h1>
                <p>
                    Satellites are man-made objects put into orbit. They often affect our lives without our realizing it: they make us safer, provide modern conveniences, and broadcast entertainment. From television signals to telecom communication, Navigation to business and finance, Weather monitoring to Space science and most importantly for other safety purposes, satellites play an integral role in data collection and monitoring over time.
                    There are a number of artificial satellites in the earth's orbit that are placed for a variety of purposes. The information regarding these can be searched individually but unfortunately, any interactive application software is not present today for satellite data which can be easily navigated through by students or a layman to get insights on their working.
                    We aim to build a Satellite database with its variety of attributes that can be used to easily understand the various aspects like owner country, places satellite monitors, purpose, type, orbit specification, organization associated and multiple other aspects easily.
                    In the later part of the project, we will aim to connect our application with live data to get satellite captured images in real-time.
                </p>
                &nbsp;
                &nbsp;
                <h1>Requirement</h1>
                <p>
                    This application can be used by students or individuals at home with a keen interest in space science, satellite technology and it’s working. Apart from that, it can be used by professors for teaching the same at institutes of astronomy clubs. The database can be maintained by officials in the space organization which can use the database to have quick access to current satellite information and update it when needed. This can play an integral role in connecting the experts of the area to the general enthusiasts with less technical knowledge so that newbies can understand the basics for the satellite concepts.
                </p>
        </div>
        

        <!-- // Content -->


    </div>
    <!-- // Page wrapper -->

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php")?>
    <!-- //footer -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <!-- Slick Carousal -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

				

    <!-- Custom Script -->
    <script src="assets/js/script.js"></script>
</body>
</html>