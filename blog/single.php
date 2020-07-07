<?php include("path.php"); 
include("app/controllers/topics.php");
$satellite_info = selectOne('sattelite_gen_normalised___sat_info', ['Satellite_ID' => $_GET['id']])[0];
$satellite_details = selectOne('satellite_det_normalised___sheet1', ['Satellite_ID' => $_GET['id']])[0];
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

    <title>The Post</title>
</head>
<body>
<?php include(ROOT_PATH . "/app/includes/header.php")?>
    <!-- page-wrapper -->
    <div class="page-wrapper">

        <!-- Post Slider -->

        <!-- // Post Slider -->

        <!-- Content -->
        <div class="content clearfix">

                <!-- Main Content -->
                <img src="assets/images/<?php echo  $satellite_info['Image']?>" alt="" style='display: block; width: 50%; height: auto;margin: 0px auto;'>
                &nbsp;
                &nbsp;
                <div class="post-content">
                    <table style="margin: 0px auto;">
                        <tr>
                            <th style="border: 2px solid #e0e0e0;">
                                <h1 style="font-size:2.5rem;text-decoration:underline;">Feature</h1>
                            </th>
                            <th style="border: 2px solid #e0e0e0;">
                                <h1 style="font-size:2.5rem;text-decoration:underline;">Information</h1>
                            </th>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Name of Satellite</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_info['Name_of_Satellite'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Purpose of Satellite</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_info['Purpose'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Detailed Purpose of Satellite</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_info['Detailed_Purpose'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Date of Launch</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_info['Date_of_Launch'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Expected Lifetime (yrs)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_info['Expected_Lifetime_yrs'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Country/Organisation of UN registry</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_info['Country_Org_of_UN_Registry'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Operator/Owner of Satellite</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_info['Operator_Owner'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Class of Orbit</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Class_of_Orbit'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Type of Orbit</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Type_of_Orbit'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Longitude of GEO (degrees)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Longitude_of_GEO_degrees'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Perigee (km)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Perigee_km'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Apogee (km)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Apogee_km'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Eccentricity</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Eccentricity'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Inclination (degrees)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Inclination_degrees'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Period (minutes)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Period_minutes'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Launch Mass (kg)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Launch_Mass_kg'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Dry Mass (kg)</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Dry_Mass_kg'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>Power</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['Power_watts'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>COSPAR Number</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['COSPAR_Number'] ?></h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1>NORAD Number</h1>
                            </td>
                            <td style="border: 2px solid #e0e0e0;">
                                <h1><?php echo $satellite_details['NORAD_Number'] ?></h1>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--// Main Content -->
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