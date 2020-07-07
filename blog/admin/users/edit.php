<?php include( "../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
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

    <title>Admin Section - Update User</title>
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
                <a href="create.php" class="btn btn-big">Add User</a>
                <a href="index.php" class="btn btn-big">Users Info</a>
            </div>
            <div class="content">

                <h2 class="page-title">Update User</h2>

                <form action="edit.php" method="post">
                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                    <input type="hidden" name="User_ID" value = '<?php echo $user_id ?>'>
                    <div>
                        <label>User Name</label>
                        <input type="text" name="User_Name" class = "text-input" value = '<?php echo $user_name ?>'>  
                    </div>
                    <div>
                        <label>Gender (M/F)</label>
                        <input type="text" name="Gender" class = "text-input" value = '<?php echo $user_gender ?>'>  
                    </div>
                    <div>
                        <label>Avg Use Time</label>
                        <input type="text" name="Avg_Use_Time" class = "text-input" value = '<?php echo $user_time ?>'>  
                    </div>
                    <div>
                        <label>Last seen</label>
                        <input type="text" name="Last_Seen" class = "text-input" value = '<?php echo $user_seen ?>'>  
                    </div>
                    <div>
                        <label>User Contact</label>
                        <input type="text" name="Contact" class = "text-input" value = '<?php echo $user_contact ?>'>  
                    </div>
                    <div>
                        <label>User Email</label>
                        <input type="email" name="Email" class = "text-input" value = '<?php echo $user_email ?>'>  
                    </div>
                    <div>
                        <label>Project ID</label>
                        <input type="text" name="Project_ID" class = "text-input" value = '<?php echo $user_project_id ?>'>  
                    </div>
                    <div>
                        <label>User Country</label>
                        <input type="text" name="Country" class = "text-input" value = '<?php echo $user_country ?>'>  
                    </div>
                    <div>
                        <button type="submit" name = "update-user" class="btn btn-big">Update User</button>
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