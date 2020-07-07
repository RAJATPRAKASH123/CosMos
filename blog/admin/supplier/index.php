<?php include( "../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/suppliers.php");
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

    <title>Admin Section - Manage Suppliers</title>
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
                <a href="create.php" class="btn btn-big">Add Supplier</a>
                <a href="index.php" class="btn btn-big">Supplier Info</a>
                <a href="country.php" class="btn btn-big">Supplier Country Info</a>
                <a href="exporter.php" class="btn btn-big">Supplier Export Info</a>
            </div>
            <div class="content">

                <h2 class="page-title">Manage Suppliers</h2>

                <?php include(ROOT_PATH . "/app/includes/messages.php")?>

                <table>
                    <thead>
                        <th>Supplier ID</th>
                        <th>Name of Supplier</th>
                        <th>Contact Number</th>
                        <th>Email ID</th>
                        <th>Shipping Address</th>
                        <th>Pincode</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($suppliers_info as $key => $supplier): ?>
                            <tr>
                                <td><?php echo $supplier['Supplier_Id'] ?></td>
                                <td><?php echo $supplier['Supplier_Name'] ?></td>
                                <td><?php echo $supplier['Contact_Number'] ?></td>
                                <td><?php echo $supplier['Email_Id'] ?></td>
                                <td><?php echo $supplier['Shipping_Address'] ?></td>
                                <td><?php echo $supplier['Pincode'] ?></td>
                                <td><a href="edit.php?id=<?php echo $supplier['Supplier_Id'] ?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $supplier['Supplier_Id'] ?>" class="delete">delete</a></td>
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