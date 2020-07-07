<?php include( "../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");
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
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Admin Section - Add Satellite</title>
</head>
<body>
    <!-- Admin header here -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin page-wrapper -->
    <div class="admin-wrapper">
        
        
        <!-- Left Sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

            <!--// Left Sidebar -->
        
        
        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Satellite</a>
                <a href="index.php" class="btn btn-big">Satellites Details</a>
            </div>
            <div class="content">

                <h2 class="page-title">Add Satellite</h2>

                <form action="create.php" method="post">
                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                    <div>
                        <label>Satellite Name</label>
                        <input type="text" name="Name_of_Satellite" class = "text-input" value = "<?php echo $satellite_name ?>">  
                    </div>
                    <div>
                        <label>Satellite Orbit Class</label>
                        <input type="text" name="Class_of_Orbit" class = "text-input" value = "<?php echo $satellite_orbit_class ?>">  
                    </div>
                    <div>
                        <label>Satellite Orbit Type</label>
                        <input type="text" name="Type_of_Orbit" class = "text-input" value = "<?php echo $satellite_orbit_type ?>">  
                    </div>
                    <div>
                        <label>Longitude of GEO (degrees)</label>
                        <input type="text" name="Longitude_of_GEO_degrees" class = "text-input" value = "<?php echo $satellite_geo ?>">  
                    </div>
                    <div>
                        <label>Perigee (km)</label>
                        <input type="text" name="Perigee_km" class = "text-input" value = "<?php echo $satellite_perigee ?>">  
                    </div>
                    <div>
                        <label>Apogee (km)</label>
                        <input type="text" name="Apogee_km" class = "text-input" value = "<?php echo $satellite_apogee ?>">  
                    </div>
                    <div>
                        <label>Eccentricity</label>
                        <input type="text" name="Eccentricity" class = "text-input" value = "<?php echo $satellite_eccentricity ?>">  
                    </div>
                    <div>
                        <label>Inclination (degrees)</label>
                        <input type="text" name="Inclination_degrees" class = "text-input" value = "<?php echo $satellite_inclination ?>">  
                    </div>
                    <div>
                        <label>Period (minutes)</label>
                        <input type="text" name="Period_minutes" class = "text-input" value = "<?php echo $satellite_period ?>">  
                    </div>
                    <div>
                        <label>Launch Mass (kg.)</label>
                        <input type="text" name="Launch_Mass_kg" class = "text-input" value = "<?php echo $satellite_launch_mass ?>">  
                    </div>
                    <div>
                        <label>Dry Mass (kg.)</label>
                        <input type="text" name="Dry_Mass_kg" class = "text-input" value = "<?php echo $satellite_dry_mass ?>">  
                    </div>
                    <div>
                        <label>Power (watts)</label>
                        <input type="text" name="Power_watts" class = "text-input" value = "<?php echo $satellite_power ?>">  
                    </div>
                    <div>
                        <label>COSPAR Number</label>
                        <input type="text" name="COSPAR_Number" class = "text-input" value = "<?php echo $satellite_cospar ?>">  
                    </div>
                    <div>
                        <label>NORAD Number</label>
                        <input type="text" name="NORAD_Number" class = "text-input" value = "<?php echo $satellite_norad ?>">  
                    </div>
                    <div>
                        <label>Purpose</label>
                        <input type="text" name="Purpose" class = "text-input" value = "<?php echo $satellite_purpose_gen ?>">  
                    </div>
                    <div>
                        <label>Detailed Purpose</label>
                        <input type="text" name="Detailed_Purpose" class = "text-input" value = "<?php echo $satellite_purpose_detail ?>">  
                    </div>
                    <div>
                        <label>Date of Launch</label>
                        <input type="text" name="Date_of_Launch" class = "text-input" value = "<?php echo $satellite_launch_date ?>">  
                    </div>
                    <div>
                        <label>Expected Lifetime (yrs.)</label>
                        <input type="text" name="Expected_Lifetime_yrs" class = "text-input" value = "<?php echo $satellite_lifetime ?>">  
                    </div>
                    <div>
                        <label>Country/Org of UN Registry</label>
                        <input type="text" name="Country_Org_of_UN_Registry" class = "text-input" value = "<?php echo $satellite_registry ?>">  
                    </div>
                    <div>
                        <label>Operator/Owner</label>
                        <input type="text" name="Operator_Owner" class = "text-input" value = "<?php echo $satellite_owner ?>">  
                    </div>
                    <div>
                        <label>Launch Site</label>
                        <input type="text" name="Launch_Site" class = "text-input" value = "<?php echo $satellite_launch_site ?>">  
                    </div>
                    <div>
                        <label>Launch Vehicle</label>
                        <input type="text" name="Launch_Vehicle" class = "text-input" value = "<?php echo $satellite_launch_vehicle ?>">  
                    </div>
                    <div>
                        <label>Contractor</label>
                        <input type="text" name="Contractor" class = "text-input" value = "<?php echo $satellite_contractor ?>">  
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="Image" class = "text-input" value = "<?php echo $satellite_image ?>">  
                    </div>
                    <div>
                        <button type="submit" name = "add-satellite" class="btn btn-big">Add Satellite</button>
                    </div>

                </form>

            </div>
        </div>
        <!--// Admin Content -->

    
        

        


    </div>
    <!-- //Admin Page wrapper -->

  

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    

    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    
				

    <!-- Custom Script -->
    <script src="../../assets/js/script.js"></script>
</body>
</html>