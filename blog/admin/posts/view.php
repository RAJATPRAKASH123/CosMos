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

    <title>Admin Section - Manage Organisations</title>
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
                <a href="create.php" class="btn btn-big">Add Organization</a>
                <a href="index.php" class="btn btn-big">Manage Organizations</a>
                <a href="view.php" class="btn btn-big">Less Info</a>
            </div>
            <div class="content">

                <h2 class="page-title">Manage Organizations</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php")?>

                <table>
                    <thead>
                        <th>Organisation_Name</th>
                        <th>Number of Satellites in Orbit</th>
                        <th>Number of Unsuccessful Missions</th>
                        <th>Country of Origin</th>
                    </thead>
                    <tbody>
                    <?php foreach($organisations_gen as $key => $organisation): ?>
                            <tr>
                                <td><?php echo $organisation['Organisation_Name'] ?></td>
                                <td><?php echo $organisation['Satellite_In_Orbit'] ?></td>
                                <td><?php echo $organisation['Number_of_unsuccessful_missions'] ?></td>
                                <td><?php echo $organisation['Country_Name'] ?></td>
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