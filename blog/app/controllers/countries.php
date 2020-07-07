<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateCountry.php");

$countries = selectAll('country_normalised___country_stats');

$country_name = '';
$country_satellites = '';
$country_active = '';
$country_launches = '';
$country_centers = '';

$errors = array();

if ( isset($_POST['add-country'])) 
{
    $errors = validateCountry($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-country']);
        // dd($details);
        // dd($sheet2);
        create('country_normalised___country_stats', $_POST);
        $_SESSION['message'] = 'Country Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/country/index.php');
        exit();
    }
    else
    {
        $country_name = $_POST['Country'];
        $country_satellites = $_POST['Satellite_count'];
        $country_active = $_POST['Active_satellites'];
        $country_launches = $_POST['Total_launches'];
        $country_centers = $_POST['Launching_centres'];
    }
}

if(isset($_GET['id']))
{
    $country_name = $_GET['id'];
    $country = selectOne('country_normalised___country_stats', ['Country' => $country_name])[0];
    $country_name = $country['Country'];
    $country_satellites = $country['Satellite_count'];
    $country_active = $country['Active_satellites'];
    $country_launches = $country['Total_launches'];
    $country_centers = $country['Launching_centres'];
}

if(isset($_GET['del_id']))
{
    $country_name = $_GET['del_id'];
    deleteCountry('country_normalised___country_stats', $country_name);
    $_SESSION['message'] = 'Country Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/country/index.php');
    exit();
}

if ( isset($_POST['update-country']))
{
    $errors = validateCountry($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-country']);
        $name = $_POST['Country'];
        unset($_POST['Country']);
        // dd($details);
        // dd($sheet2);
        updateCountry('country_normalised___country_stats', $name, $_POST);
        $_SESSION['message'] = 'Country updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/country/index.php');
        exit();
    }
    else
    {
        $country_name = $_POST['Country'];
        $country_satellites = $_POST['Satellite_count'];
        $country_active = $_POST['Active_satellites'];
        $country_launches = $_POST['Total_launches'];
        $country_centers = $_POST['Launching_centres'];
    }
}