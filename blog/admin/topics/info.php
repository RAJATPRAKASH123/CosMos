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

                <h2 class="page-title">Satellites Information</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php")?>

                <table>
                    <thead>
                        <th>Satellite_ID</th>
                        <th>Name of Satellite</th>
                        <th>Purpose</th>
                        <th>Detailed Purpose</th>
                        <th>Date of Launch</th>
                        <th>Expected Lifetime (yrs.)</th>
                        <th>Country/Org of UN Registry</th>
                        <th>Operator/Owner</th>
                    </thead>
                    <tbody>
                        <?php foreach($satellites_info as $key => $satellite): ?>
                            <tr>
                                <td><?php echo $satellite['Satellite_ID'] ?></td>
                                <td><?php echo $satellite['Name_of_Satellite'] ?></td>
                                <td><?php echo $satellite['Purpose'] ?></td>
                                <td><?php echo $satellite['Detailed_Purpose'] ?></td>
                                <td><?php echo $satellite['Date_of_Launch'] ?></td>
                                <td><?php echo $satellite['Expected_Lifetime_yrs'] ?></td>
                                <td><?php echo $satellite['Country_Org_of_UN_Registry'] ?></td>
                                <td><?php echo $satellite['Operator_Owner'] ?></td>
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