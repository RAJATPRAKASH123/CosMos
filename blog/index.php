<?php include("path.php");
include(ROOT_PATH . '/app/controllers/topics.php');

$purposes = selectDistinct('sattelite_gen_normalised___sat_info', 'Purpose');
// dd($satellites);

$satellites = array_slice(selectAll('sattelite_gen_normalised___sat_info'),0,5);
$satellites_title = 'Satellites';
$sorted_by = 'Satellite ID';
$str = '';
$val = '';

if(isset($_GET['sat']))
{
    if(isset($_POST['search-term']))
    {
        $satellites_title = "You searched for '" . $_POST['search-term'] ."'";
        $satellites = searchSat($_POST['search-term']);
        // dd($satellites);
    }
    elseif(isset($_GET['term']))
    {
        $str = 'term';
        $val = $_GET['term'];
        $satellites_title = "You searched for '" . $_GET['term'] ."'";
        $satellites = searchSat($_GET['term']);
    }
    elseif(isset($_GET['pur']))
    {
        $str = 'pur';
        $val = $_GET['pur'];
        $satellites_title = "You searched for '" . $_GET['pur'] ."'";
        $satellites = selectAll('sattelite_gen_normalised___sat_info', ['Purpose' => $_GET['pur']]);
    }
}
if(isset($_GET['sort']))
{
    $sorted_by = $_GET['sort'];
    $satellites = selectSat($satellites, $_GET['sort']);
}

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

        <!-- Post Slider -->

        


        <div class = "post-slider">
            <h1 class = "slider-title">Trending Satellites</h1>
            <i class="fas fac-chevron-left prev"></i>
            <i class="fas fac-chevron-right next"></i>
            
            <div class="post-wrapper">

                <?php foreach($satellites as $satellite): ?>
                    <div class="post">
                        <img src="assets/images/<?php echo  $satellite['Image']?>" alt="" class="slider-image">
                        <div class = "post-info">
                            <h4><a href="<?php echo BASE_URL . '/single.php?id=' . $satellite['Satellite_ID']?>"><?php echo $satellite['Name_of_Satellite'] ?></a></h4>
                            <i class="far fa-user"><?php echo $satellite['Operator_Owner'] ?></i>
                            &nbsp;
                            <i class="far fa-calendar"><?php echo $satellite['Date_of_Launch'] ?></i>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>

        </div>
        <!-- // Post Slider -->

        <!-- Content -->
        <div class="content clearfix">
                <!-- Main Content -->
                <div class="main-content">
                    <span style="font-size:1.5rem;margin-left:20px;">Sorted by: <?php echo $sorted_by ?></span>
                    <a class="btn btn-big" style="margin-left:20px;" href="<?php echo BASE_URL . '/index.php?sat=1&sort=Satellite_ID&' . $str . '=' . $val ?>">Satellite ID</a>
                    <a class="btn btn-big" style="margin-left:20px;" href="<?php echo BASE_URL . '/index.php?sat=1&sort=Name_of_Satellite&' . $str . '=' . $val ?>">Satellite Name</a>
                    <a class="btn btn-big" style="margin-left:20px;" href="<?php echo BASE_URL . '/index.php?sat=1&sort=Date_of_Launch&' . $str . '=' . $val ?>">Satellite Date</a>
                    <h1 class="recent-post-title"><?php echo $satellites_title ?></h1>
                    
                    <?php foreach($satellites as $satellite): ?>
                        <div class="post">
                            <img src="assets/images/<?php echo $satellite['Image'] ?>" alt="" class = "post-image">
                            <div class="post-preview">
                                <h2><a href="<?php echo BASE_URL . '/single.php?id=' . $satellite['Satellite_ID']?>"><?php echo $satellite['Name_of_Satellite'] ?></a></h2>
                                <i class="far fa-user"><?php echo $satellite['Operator_Owner'] ?></i>
                                &nbsp;
                                <i class="far calendar"><?php echo $satellite['Date_of_Launch'] ?></i>
                                <p class="preview-text">
                                    <?php echo $satellite['Purpose'] ?>
                                </p>
                                <a href="<?php echo BASE_URL . '/single.php?id=' . $satellite['Satellite_ID']?>" class = "btn read-more">Read More</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!--// Main Content -->

                <div class="sidebar">



                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="index.php?sat=1" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search...">
                        </form>
                    </div>

                    <div class="section topics">
                        <h2 class="section-title">Purpose</h2>
                        <ul>
                            <?php foreach($purposes as $purpose): ?>
                                <li><a href="index.php?sat=1&pur=<?php echo $purpose['Purpose'] ?>"><?php echo $purpose['Purpose'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>


                </div>
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