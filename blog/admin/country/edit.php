<?php include( "../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/countries.php");
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

    <title>Admin Section - Update Country</title>
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
                <a href="create.php" class="btn btn-big">Add Country</a>
                <a href="index.php" class="btn btn-big">Manage Countries</a>
            </div>
            <div class="content">

                <h2 class="page-title">Update Country</h2>

                <form action="create.php" method="post">
                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                    <input type="hidden" name="Country" value = '<?php echo $country_name ?>'>
                    <!-- <div>
                        <label>Country Name</label>
                        <input type="text" name="Country" class = "text-input" value = '<?php echo $country_name ?>'>  
                    </div> -->
                    <div>
                        <label>Satellite Count</label>
                        <input type="text" name="Satellite_count" class = "text-input" value = '<?php echo $country_satellites ?>'>  
                    </div>
                    <div>
                        <label>Active Satellites</label>
                        <input type="text" name="Active_satellites" class = "text-input" value = '<?php echo $country_active ?>'>  
                    </div>
                    <div>
                        <label>Total Launches</label>
                        <input type="text" name="Total_launches" class = "text-input" value = '<?php echo $country_launches ?>'>  
                    </div>
                    <div>
                        <label>Launching Centers</label>
                        <input type="text" name="Launching_centres" class = "text-input" value = '<?php echo $country_centers ?>'>  
                    </div>
                    <div>
                        <button type="submit" name = "update-country" class="btn btn-big">Update country</button>
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