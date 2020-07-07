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

    <title>Admin Section - Manage Satellites</title>
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
                <a href="info.php" class="btn btn-big">Satellite Info</a>
                <a href="launch.php" class="btn btn-big">Satellite Launch Info</a>
            </div>
            <div class="content">

                <h2 class="page-title">Manage Satellites</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php")?>

                <table>
                    <thead>
                        <th>Satellite_ID</th>
                        <th>Name of Satellite</th>
                        <th>Class of Orbit</th>
                        <th>Type of Orbit</th>
                        <th>Longitude of GEO (degrees)</th>
                        <th>Perigee (km)</th>
                        <th>Apogee (km)</th>
                        <th>Eccentricity</th>
                        <th>Inclination (degrees)</th>
                        <th>Period (minutes)</th>
                        <th>Launch Mass (kg.)</th>
                        <th>Dry Mass (kg.)</th>
                        <th>Power (watts)</th>
                        <th>COSPAR Number</th>
                        <th>NORAD Number</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($satellites_details as $key => $satellite): ?>
                            <tr>
                                <td><?php echo $satellite['Satellite_ID'] ?></td>
                                <td><?php echo $satellite['Name_of_Satellite'] ?></td>
                                <td><?php echo $satellite['Class_of_Orbit'] ?></td>
                                <td><?php echo $satellite['Type_of_Orbit'] ?></td>
                                <td><?php echo $satellite['Longitude_of_GEO_degrees'] ?></td>
                                <td><?php echo $satellite['Perigee_km'] ?></td>
                                <td><?php echo $satellite['Apogee_km'] ?></td>
                                <td><?php echo $satellite['Eccentricity'] ?></td>
                                <td><?php echo $satellite['Inclination_degrees'] ?></td>
                                <td><?php echo $satellite['Period_minutes'] ?></td>
                                <td><?php echo $satellite['Launch_Mass_kg'] ?></td>
                                <td><?php echo $satellite['Dry_Mass_kg'] ?></td>
                                <td><?php echo $satellite['Power_watts'] ?></td>
                                <td><?php echo $satellite['COSPAR_Number'] ?></td>
                                <td><?php echo $satellite['NORAD_Number'] ?></td>
                                <td><a href="edit.php?id=<?php echo $satellite['Satellite_ID'] ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $satellite['Satellite_ID'] ?>" class="delete">delete</a></td>
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