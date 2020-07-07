<?php include( "../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
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

    <title>Admin Section - Edit Organisation</title>
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
                <a href="create.php" class="btn btn-big">Add Organisation</a>
                <a href="index.php" class="btn btn-big">Manage Organisations</a>
            </div>
            <div class="content">

                <h2 class="page-title">Edit Organisations</h2>

                <form action="edit.php" method="post">
                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                    <input type="hidden" name="Organisation_ID" value = '<?php echo $organisation_id ?>'>
                    <div>
                        <label>Organisation Name</label>
                        <input type="text" name="Organisation_Name" class = "text-input" value = '<?php echo $organisation_name ?>'>  
                    </div>
                    <div>
                        <label>Organisation Website</label>
                        <input type="text" name="Website" class = "text-input" value = '<?php echo $organisation_website ?>'>  
                    </div>
                    <div>
                        <label>Founded Year</label>
                        <input type="text" name="Founded" class = "text-input" value = '<?php echo $organisation_founded ?>'>  
                    </div>
                    <div>
                        <label>Organisation Purpose</label>
                        <input type="text" name="Purpose" class = "text-input" value = '<?php echo $organisation_purpose ?>'>  
                    </div>
                    <div>
                        <label>Organisation Status</label>
                        <input type="text" name="Status" class = "text-input" value = '<?php echo $organisation_status ?>'>  
                    </div>
                    <div>
                        <label>Number of Satellites in Orbit</label>
                        <input type="text" name="Satellite_In_Orbit" class = "text-input" value = '<?php echo $organisation_satellites ?>'>  
                    </div>
                    <div>
                        <label>Number of Unsuccessful Missions</label>
                        <input type="text" name="Number_of_unsuccessful_missions" class = "text-input" value = '<?php echo $organisation_unsuccessful ?>'>  
                    </div>
                    <div>
                        <label>Organisation Country</label>
                        <input type="text" name="Country_Name" class = "text-input" value = '<?php echo $organisation_country ?>'>  
                    </div>
                    <div>
                        <label>Organisation Contact</label>
                        <input type="text" name="Contact" class = "text-input" value = '<?php echo $organisation_contact ?>'>  
                    </div>
                    <div>
                        <label>Organisation Email</label>
                        <input type="email" name="Email" class = "text-input" value = '<?php echo $organisation_email ?>'>  
                    </div>
                    <div>
                        <button type="submit" name='update-org' class="btn btn-big">Update Organisation</button>
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