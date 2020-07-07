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

    <title>Admin Section - Manage Users</title>
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
                <a href="view.php" class="btn btn-big">Users Project Info</a>
            </div>
            <div class="content">

                <h2 class="page-title">Manage Users</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php")?>

                <table>
                    <thead>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Gender</th>
                        <th>Avg Use Time (Hrs)</th>
                        <th>Last Seen</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($users_info as $key => $user): ?>
                            <tr>
                                <td><?php echo $user['User_ID'] ?></td>
                                <td><?php echo $user['User_Name'] ?></td>
                                <td><?php echo $user['Gender'] ?></td>
                                <td><?php echo $user['Avg_Use_Time'] ?></td>
                                <td><?php echo $user['Last_Seen'] ?></td>
                                <td><?php echo $user['Contact'] ?></td>
                                <td><?php echo $user['Email'] ?></td>
                                <td><a href="edit.php?id=<?php echo $user['User_ID'] ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $user['User_ID'] ?>" class="delete">delete</a></td>
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