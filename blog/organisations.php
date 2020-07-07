<?php include("path.php");
include(ROOT_PATH . '/app/controllers/posts.php');

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

    <title>Satellites</title>
</head>
<body>
    
    <!-- TODO: INCLUDE HEADER HERE -->
    <?php include(ROOT_PATH . "/app/includes/header.php")?>
    <?php include(ROOT_PATH . "/app/includes/messages.php")?>


    <!-- page-wrapper -->
    <div class="page-wrapper">

        <!-- Content -->
        <div class="content clearfix" style='font-size:1.2rem;margin:0px;'>
            <h1 style="font-size:3rem; padding:10px;">Organisations</h1>
            <table style="padding: 7px;">
                <thead>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Organisation ID</th>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Organisation Name</th>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Website</th>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Founded</th>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Purpose</th>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Status</th>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Contact</th>
                    <th style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;">Email</th>
                </thead>
                <tbody>
                    <?php foreach($organisations_details as $key => $organisation): ?>
                        <tr>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Organisation_ID'] ?></td>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Organisation_Name'] ?></td>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Website'] ?></td>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Founded'] ?></td>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Purpose'] ?></td>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Status'] ?></td>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Contact'] ?></td>
                            <td style="border: 1px solid #e0e0e0; border-collapse: collapse;padding:10px;"><?php echo $organisation['Email'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        

        <!-- // Content -->


    </div>
    <!-- // Page wrapper -->

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php")?>
    <!-- //footer -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <!-- Slick Carousal -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

				

    <!-- Custom Script -->
    <script src="assets/js/script.js"></script>
</body>
</html>