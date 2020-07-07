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

    <title>Admin Section - Manage Organisation Centers</title>
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
                <a href="project.php" class="btn btn-big">Project Info</a>
                <a href="org.php" class="btn btn-big">Organisation Info</a>
            </div>
            <div class="content">

                <h2 class="page-title">Manage Organisation Centers</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php")?>

                <table>
                    <thead>
                        <th>Center ID</th>
                        <th>Name of Center</th>
                        <th>Purpose</th>
                        <th>Date of Formation</th>
                        <th>Contact ID</th>
                        <th>Location</th>
                        <th>Country Name</th>
                        <th>Number_of_Employees</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($centers_info as $key => $center): ?>
                            <tr>
                                <td><?php echo $center['Center_ID'] ?></td>
                                <td><?php echo $center['Center_name'] ?></td>
                                <td><?php echo $center['Purpose'] ?></td>
                                <td><?php echo $center['Formation_date'] ?></td>
                                <td><?php echo $center['CONTACT_ID'] ?></td>
                                <td><?php echo $center['Location'] ?></td>
                                <td><?php echo $center['Country_name'] ?></td>
                                <td><?php echo $center['Number_of_Employees'] ?></td>
                                <td><a href="edit.php?id=<?php echo $center['Center_ID'] ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $center['Center_ID'] ?>" class="delete">delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

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