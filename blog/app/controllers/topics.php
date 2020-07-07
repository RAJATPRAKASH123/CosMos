<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateTopics.php");

$satellites_details = selectAll('satellite_det_normalised___sheet1');
$satellites_info = selectAll('sattelite_gen_normalised___sat_info');
$satellites_launch_info = selectAll('sattelite_gen_normalised___sat_launch_detail');

$satellite_ID = '';
$satellite_name = '';
$satellite_orbit_class = '';
$satellite_orbit_type = '';
$satellite_geo = '';
$satellite_perigee = '';
$satellite_apogee = '';
$satellite_eccentricity = '';
$satellite_inclination = '';
$satellite_period = '';
$satellite_launch_mass = '';
$satellite_dry_mass = '';
$satellite_power = '';
$satellite_cospar = '';
$satellite_norad = '';

$satellite_purpose_gen = '';
$satellite_purpose_detail = '';
$satellite_launch_date = '';
$satellite_lifetime = '';
$satellite_registry = '';
$satellite_owner = '';
$satellite_image = '';

$satellite_launch_site = '';
$satellite_launch_vehicle = '';
$satellite_contractor = '';

$errors = array();

if ( isset($_POST['add-satellite'])) 
{
    $errors = validateSat($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-satellite']);
        $details=array();
        $info=array();
        $launch_info=array();
        $details['Satellite_ID'] = count($satellites_info) + 1;
        $info['Satellite_ID'] = count($satellites_info) + 1;
        $launch_info['Satellite_ID'] = count($satellites_info) + 1;
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $info[$p] = $value;
            $launch_info[$p] = $value;
        }
        unset($details['Purpose']);
        unset($details['Image']);
        unset($details['Detailed_Purpose']);
        unset($details['Date_of_Launch']);
        unset($details['Expected_Lifetime_yrs']);
        unset($details['Country_Org_of_UN_Registry']);
        unset($details['Operator_Owner']);
        unset($details['Launch_Site']);
        unset($details['Launch_Vehicle']);
        unset($details['Contractor']);
        unset($info['Launch_Site']);
        unset($info['Launch_Vehicle']);
        unset($info['Contractor']);
        unset($info['Class_of_Orbit']);
        unset($info['Type_of_Orbit']);
        unset($info['Longitude_of_GEO_degrees']);
        unset($info['Perigee_km']);
        unset($info['Apogee_km']);
        unset($info['Eccentricity']);
        unset($info['Inclination_degrees']);
        unset($info['Period_minutes']);
        unset($info['Launch_Mass_kg']);
        unset($info['Dry_Mass_kg']);
        unset($info['Power_watts']);
        unset($info['COSPAR_Number']);
        unset($info['NORAD_Number']);
        unset($launch_info['Class_of_Orbit']);
        unset($launch_info['Image']);
        unset($launch_info['Type_of_Orbit']);
        unset($launch_info['Longitude_of_GEO_degrees']);
        unset($launch_info['Perigee_km']);
        unset($launch_info['Apogee_km']);
        unset($launch_info['Eccentricity']);
        unset($launch_info['Inclination_degrees']);
        unset($launch_info['Period_minutes']);
        unset($launch_info['Launch_Mass_kg']);
        unset($launch_info['Dry_Mass_kg']);
        unset($launch_info['Power_watts']);
        unset($launch_info['COSPAR_Number']);
        unset($launch_info['NORAD_Number']);
        unset($launch_info['Purpose']);
        unset($launch_info['Detailed_Purpose']);
        unset($launch_info['Date_of_Launch']);
        unset($launch_info['Expected_Lifetime_yrs']);
        unset($launch_info['Country_Org_of_UN_Registry']);
        unset($launch_info['Operator_Owner']);
        unset($launch_info['Name_of_Satellite']);
        // dd($details);
        create('satellite_det_normalised___sheet1', $details);
        create('sattelite_gen_normalised___sat_info', $info);
        create('sattelite_gen_normalised___sat_launch_detail', $launch_info);
        $_SESSION['message'] = 'Satellite Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    }
    else
    {
        $satellite_name = $_POST['Name_of_Satellite'];
        $satellite_orbit_class = $_POST['Class_of_Orbit'];
        $satellite_orbit_type = $_POST['Type_of_Orbit'];
        $satellite_geo = $_POST['Longitude_of_GEO_degrees'];
        $satellite_perigee = $_POST['Perigee_km'];
        $satellite_apogee = $_POST['Apogee_km'];
        $satellite_eccentricity = $_POST['Eccentricity'];
        $satellite_inclination = $_POST['Inclination_degrees'];
        $satellite_period = $_POST['Period_minutes'];
        $satellite_launch_mass = $_POST['Launch_Mass_kg'];
        $satellite_dry_mass = $_POST['Dry_Mass_kg'];
        $satellite_power = $_POST['Power_watts'];
        $satellite_cospar = $_POST['COSPAR_Number'];
        $satellite_norad = $_POST['NORAD_Number'];

        $satellite_purpose_gen = $_POST['Purpose'];
        $satellite_purpose_detail = $_POST['Detailed_Purpose'];
        $satellite_launch_date = $_POST['Date_of_Launch'];
        $satellite_lifetime = $_POST['Expected_Lifetime_yrs'];
        $satellite_registry = $_POST['Country_Org_of_UN_Registry'];
        $satellite_owner = $_POST['Operator_Owner'];
        $satellite_image = $_POST['Image'];

        $satellite_launch_site = $_POST['Launch_Site'];
        $satellite_launch_vehicle = $_POST['Launch_Vehicle'];
        $satellite_contractor = $_POST['Contractor'];
    }
}

if(isset($_GET['id']))
{
    $satellite_ID = $_GET['id'];
    $satellite_details = selectOne('satellite_det_normalised___sheet1', ['Satellite_ID' => $satellite_ID])[0];
    $satellite_info = selectOne('sattelite_gen_normalised___sat_info', ['Satellite_ID' => $satellite_ID])[0];
    $satellite_launch_info = selectOne('sattelite_gen_normalised___sat_launch_detail', ['Satellite_ID' => $satellite_ID])[0];

    $satellite_ID = $satellite_details['Satellite_ID'];
    $satellite_name = $satellite_details['Name_of_Satellite'];
    $satellite_orbit_class = $satellite_details['Class_of_Orbit'];
    $satellite_orbit_type = $satellite_details['Type_of_Orbit'];
    $satellite_geo = $satellite_details['Longitude_of_GEO_degrees'];
    $satellite_perigee = $satellite_details['Perigee_km'];
    $satellite_apogee = $satellite_details['Apogee_km'];
    $satellite_eccentricity = $satellite_details['Eccentricity'];
    $satellite_inclination = $satellite_details['Inclination_degrees'];
    $satellite_period = $satellite_details['Period_minutes'];
    $satellite_launch_mass = $satellite_details['Launch_Mass_kg'];
    $satellite_dry_mass = $satellite_details['Dry_Mass_kg'];
    $satellite_power = $satellite_details['Power_watts'];
    $satellite_cospar = $satellite_details['COSPAR_Number'];
    $satellite_norad = $satellite_details['NORAD_Number'];

    $satellite_purpose_gen = $satellite_info['Purpose'];
    $satellite_purpose_detail = $satellite_info['Detailed_Purpose'];
    $satellite_launch_date = $satellite_info['Date_of_Launch'];
    $satellite_lifetime = $satellite_info['Expected_Lifetime_yrs'];
    $satellite_registry = $satellite_info['Country_Org_of_UN_Registry'];
    $satellite_owner = $satellite_info['Operator_Owner'];
    $satellite_image = $satellite_info['Image'];

    $satellite_launch_site = $satellite_launch_info['Launch_Site'];
    $satellite_launch_vehicle = $satellite_launch_info['Launch_Vehicle'];
    $satellite_contractor = $satellite_launch_info['Contractor'];
}

if(isset($_GET['del_id']))
{
    $satellite_ID = $_GET['del_id'];
    deleteSat('satellite_det_normalised___sheet1', $satellite_ID);
    deleteSat('sattelite_gen_normalised___sat_info', $satellite_ID);
    deleteSat('sattelite_gen_normalised___sat_launch_detail', $satellite_ID);
    $_SESSION['message'] = 'Satellite Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/topics/index.php');
    exit();
}

if ( isset($_POST['update-satellite']))
{
    $errors = validateSat($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-satellite']);
        $details=array();
        $info=array();
        $launch_info=array();
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $info[$p] = $value;
            $launch_info[$p] = $value;
        }
        unset($details['Satellite_ID']);
        unset($info['Satellite_ID']);
        unset($launch_info['Satellite_ID']);
        unset($details['Purpose']);
        unset($details['Image']);
        unset($details['Detailed_Purpose']);
        unset($details['Date_of_Launch']);
        unset($details['Expected_Lifetime_yrs']);
        unset($details['Country_Org_of_UN_Registry']);
        unset($details['Operator_Owner']);
        unset($details['Launch_Site']);
        unset($details['Launch_Vehicle']);
        unset($details['Contractor']);
        unset($info['Launch_Site']);
        unset($info['Launch_Vehicle']);
        unset($info['Contractor']);
        unset($info['Class_of_Orbit']);
        unset($info['Type_of_Orbit']);
        unset($info['Longitude_of_GEO_degrees']);
        unset($info['Perigee_km']);
        unset($info['Apogee_km']);
        unset($info['Eccentricity']);
        unset($info['Inclination_degrees']);
        unset($info['Period_minutes']);
        unset($info['Launch_Mass_kg']);
        unset($info['Dry_Mass_kg']);
        unset($info['Power_watts']);
        unset($info['COSPAR_Number']);
        unset($info['NORAD_Number']);
        unset($launch_info['Class_of_Orbit']);
        unset($launch_info['Image']);
        unset($launch_info['Type_of_Orbit']);
        unset($launch_info['Longitude_of_GEO_degrees']);
        unset($launch_info['Perigee_km']);
        unset($launch_info['Apogee_km']);
        unset($launch_info['Eccentricity']);
        unset($launch_info['Inclination_degrees']);
        unset($launch_info['Period_minutes']);
        unset($launch_info['Launch_Mass_kg']);
        unset($launch_info['Dry_Mass_kg']);
        unset($launch_info['Power_watts']);
        unset($launch_info['COSPAR_Number']);
        unset($launch_info['NORAD_Number']);
        unset($launch_info['Purpose']);
        unset($launch_info['Detailed_Purpose']);
        unset($launch_info['Date_of_Launch']);
        unset($launch_info['Expected_Lifetime_yrs']);
        unset($launch_info['Country_Org_of_UN_Registry']);
        unset($launch_info['Operator_Owner']);
        unset($launch_info['Name_of_Satellite']);
        // dd($launch_info);
        updateSat('satellite_det_normalised___sheet1', $_POST['Satellite_ID'], $details);
        updateSat('sattelite_gen_normalised___sat_info', $_POST['Satellite_ID'], $info);
        updateSat('sattelite_gen_normalised___sat_launch_detail', $_POST['Satellite_ID'], $launch_info);
        $_SESSION['message'] = 'Satellite updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    }
    else
    {
        $satellite_ID = $_POST['Satellite_ID'];
        $satellite_name = $_POST['Name_of_Satellite'];
        $satellite_orbit_class = $_POST['Class_of_Orbit'];
        $satellite_orbit_type = $_POST['Type_of_Orbit'];
        $satellite_geo = $_POST['Longitude_of_GEO_degrees'];
        $satellite_perigee = $_POST['Perigee_km'];
        $satellite_apogee = $_POST['Apogee_km'];
        $satellite_eccentricity = $_POST['Eccentricity'];
        $satellite_inclination = $_POST['Inclination_degrees'];
        $satellite_period = $_POST['Period_minutes'];
        $satellite_launch_mass = $_POST['Launch_Mass_kg'];
        $satellite_dry_mass = $_POST['Dry_Mass_kg'];
        $satellite_power = $_POST['Power_watts'];
        $satellite_cospar = $_POST['COSPAR_Number'];
        $satellite_norad = $_POST['NORAD_Number'];

        $satellite_purpose_gen = $_POST['Purpose'];
        $satellite_purpose_detail = $_POST['Detailed_Purpose'];
        $satellite_launch_date = $_POST['Date_of_Launch'];
        $satellite_lifetime = $_POST['Expected_Lifetime_yrs'];
        $satellite_registry = $_POST['Country_Org_of_UN_Registry'];
        $satellite_owner = $_POST['Operator_Owner'];
        $satellite_image = $_POST['Image'];

        $satellite_launch_site = $_POST['Launch_Site'];
        $satellite_launch_vehicle = $_POST['Launch_Vehicle'];
        $satellite_contractor = $_POST['Contractor'];
    }
}