<?php include( "../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/centers.php");
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

    <title>Admin Section - Update Organisation Center</title>
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
                <a href="create.php" class="btn btn-big">Add Organisation Center</a>
                <a href="index.php" class="btn btn-big">Organisation Centers</a>
            </div>
            <div class="content">

                <h2 class="page-title">Update Center</h2>

                <form action="edit.php" method="post">
                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                    <input type="hidden" name="Center_ID" value = "<?php echo $center_id ?>">
                    <div>
                        <label>Organisation Center Name</label>
                        <input type="text" name="Center_name" class = "text-input" value = "<?php echo $center_name ?>">  
                    </div>
                    <div>
                        <label>Purpose</label>
                        <input type="text" name="Purpose" class = "text-input" value = "<?php echo $center_purpose ?>">  
                    </div>
                    <div>
                        <label>Date of Formation</label>
                        <input type="text" name="Formation_date" class = "text-input" value = "<?php echo $center_date ?>">  
                    </div>
                    <div>
                        <label>Contact ID</label>
                        <input type="email" name="CONTACT_ID" class = "text-input" value = "<?php echo $center_contact ?>">  
                    </div>
                    <div>
                        <label>Location</label>
                        <input type="text" name="Location" class = "text-input" value = "<?php echo $center_location ?>">  
                    </div>
                    <div>
                        <label>Country Name</label>
                        <input type="text" name="Country_name" class = "text-input" value = "<?php echo $center_country ?>">  
                    </div>
                    <div>
                        <label>Number of Employees</label>
                        <input type="text" name="Number_of_Employees" class = "text-input" value = "<?php echo $center_employees ?>">  
                    </div>
                    <div>
                        <label>Organisation ID</label>
                        <input type="text" name="Organisation_ID" class = "text-input" value = "<?php echo $center_org ?>">  
                    </div>
                    <div>
                        <label>Project ID</label>
                        <input type="text" name="Project_ID" class = "text-input" value = "<?php echo $center_project ?>">  
                    </div>
                    <div>
                        <button type="submit" name = "update-center" class="btn btn-big">Update Center</button>
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