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
                        <th>Organisation_ID</th>
                        <th>Organisation_Name</th>
                        <th>Website</th>
                        <th>Founded</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($organisations_details as $key => $organisation): ?>
                            <tr>
                                <td><?php echo $organisation['Organisation_ID'] ?></td>
                                <td><?php echo $organisation['Organisation_Name'] ?></td>
                                <td><?php echo $organisation['Website'] ?></td>
                                <td><?php echo $organisation['Founded'] ?></td>
                                <td><?php echo $organisation['Purpose'] ?></td>
                                <td><?php echo $organisation['Status'] ?></td>
                                <td><?php echo $organisation['Contact'] ?></td>
                                <td><?php echo $organisation['Email'] ?></td>
                                <td><a href="edit.php?id=<?php echo $organisation['Organisation_Name'] ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $organisation['Organisation_Name'] ?>" class="delete">delete</a></td>
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