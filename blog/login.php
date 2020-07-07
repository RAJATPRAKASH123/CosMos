<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
    
// if (isset($_POST['register-btn'])) {
//     var_dump($_POST);
//     die();
// }
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
    <link rel="stylesheet" href="assets/css/style.css">

    <title>LogIn</title>
</head>
<body class="allinone">
    <?php include(ROOT_PATH . "/app/includes/header.php")?>
    <div class="auth-content">
        <form action="login.php" method="post">
            <h2 class="form-title">LogIn</h2>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php");?>
            <div>
                <label >Username</label>
                <input type="text" name = "username" value = "<?php echo $username; ?>" class ="text-input">
            </div>
            
            <div>
                <label >Password</label>
                <input type="password" name = "password" class ="text-input">
            </div>
           
            <div>
                <button type="submit" name = "login-btn" class="btn btn-big">Log In</button>
            </div>
            <p>Or <a href = "<?php echo BASE_URL . '/register.php'?>">Sign Up</a></p>

        </form>
    </div>
    <!-- page-wrapper -->
    
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
 

    <!-- Custom Script -->
    <script src="assets/js/script.js"></script>
</body>
</html>