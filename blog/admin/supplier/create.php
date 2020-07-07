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

    <title>Admin Section - Add Supplier</title>
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
            </div>
            <div class="content">

                <h2 class="page-title">Add Supplier</h2>

                <form action="create.php" method="post">
                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                    <div>
                        <label>Supplier Name</label>
                        <input type="text" name="Supplier_Name" class = "text-input" value = "<?php echo $supplier_name ?>">  
                    </div>
                    <div>
                        <label>Contact Number</label>
                        <input type="text" name="Contact_Number" class = "text-input" value = "<?php echo $supplier_contact ?>">  
                    </div>
                    <div>
                        <label>Email ID</label>
                        <input type="email" name="Email_Id" class = "text-input" value = "<?php echo $supplier_email ?>">  
                    </div>
                    <div>
                        <label>Shipping Address</label>
                        <input type="text" name="Shipping_Address" class = "text-input" value = "<?php echo $supplier_shipping ?>">  
                    </div>
                    <div>
                        <label>Pincode</label>
                        <input type="text" name="Pincode" class = "text-input" value = "<?php echo $supplier_pincode ?>">  
                    </div>
                    <div>
                        <label>Country Name</label>
                        <input type="text" name="Country_Name" class = "text-input" value = "<?php echo $supplier_country ?>">  
                    </div>
                    <div>
                        <label>Exporter</label>
                        <input type="text" name="Exporter" class = "text-input" value = "<?php echo $supplier_exporter ?>">  
                    </div>
                    <div>
                        <label>Supplied Center</label>
                        <input type="text" name="Supplied_Center" class = "text-input" value = "<?php echo $supplier_center ?>">  
                    </div>
                    <div>
                        <button type="submit" name = "add-supplier" class="btn btn-big">Add Supplier</button>
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