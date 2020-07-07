<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePosts.php");

$organisations_details = selectAll('organisation_normalised___organisation_details');
$organisations_gen = selectAll('organisation_normalised___sheet2');

$organisation_id = '';
$organisation_name = '';
$organisation_website = '';
$organisation_founded = '';
$organisation_purpose = '';
$organisation_status = '';
$organisation_contact = '';
$organisation_email = '';
$organisation_satellites = '';
$organisation_unsuccessful = '';
$organisation_country = '';

$errors = array();

if ( isset($_POST['add-org'])) 
{
    $errors = validateOrg($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-org']);
        $details=array();
        $sheet2=array();
        $details['Organisation_ID'] = count($organisations_gen) + 1;
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['Satellite_In_Orbit']);
        unset($details['Number_of_unsuccessful_missions']);
        unset($details['Country_Name']);
        unset($sheet2['Website']);
        unset($sheet2['Founded']);
        unset($sheet2['Purpose']);
        unset($sheet2['Status']);
        unset($sheet2['Contact']);
        unset($sheet2['Email']);
        // dd($details);
        // dd($sheet2);
        $org_details_id = create('organisation_normalised___organisation_details', $details);
        $org_gen_id = create('organisation_normalised___sheet2', $sheet2);
        $_SESSION['message'] = 'Organisation Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    }
    else
    {
        $organisation_name = $_POST['Organisation_Name'];
        $organisation_website = $_POST['Website'];
        $organisation_founded = $_POST['Founded'];
        $organisation_purpose = $_POST['Purpose'];
        $organisation_status = $_POST['Status'];
        $organisation_contact = $_POST['Contact'];
        $organisation_email = $_POST['Email'];
        $organisation_satellites = $_POST['Satellite_In_Orbit'];
        $organisation_unsuccessful = $_POST['Number_of_unsuccessful_missions'];
        $organisation_country = $_POST['Country_Name'];
    }
}

if(isset($_GET['id']))
{
    $organisation_name = $_GET['id'];
    $organisation_details = selectOne('organisation_normalised___organisation_details', ['Organisation_Name' => $organisation_name])[0];
    $organisation_gen = selectOne('organisation_normalised___sheet2', ['Organisation_Name' => $organisation_name])[0];
    // dd($organisation_gen);
    $organisation_name = $organisation_details['Organisation_Name'];
    $organisation_id = $organisation_details['Organisation_ID'];
    $organisation_website = $organisation_details['Website'];
    $organisation_founded = $organisation_details['Founded'];
    $organisation_purpose = $organisation_details['Purpose'];
    $organisation_status = $organisation_details['Status'];
    $organisation_contact = $organisation_details['Contact'];
    $organisation_email = $organisation_details['Email'];
    $organisation_satellites = $organisation_gen['Satellite_In_Orbit'];
    $organisation_unsuccessful = $organisation_gen['Number_of_unsuccessful_missions'];
    $organisation_country = $organisation_gen['Country_Name'];
}

if(isset($_GET['del_id']))
{
    $organisation_name = $_GET['del_id'];
    deleteOrg('organisation_normalised___organisation_details', $organisation_name);
    deleteOrg('organisation_normalised___sheet2', $organisation_name);
    $_SESSION['message'] = 'Organisation Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
}

if ( isset($_POST['update-org']))
{
    $errors = validateOrg($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-org']);
        $details=array();
        $sheet2=array();
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['Organisation_Name']);
        unset($details['Satellite_In_Orbit']);
        unset($details['Number_of_unsuccessful_missions']);
        unset($details['Country_Name']);
        unset($sheet2['Organisation_Name']);
        unset($sheet2['Organisation_ID']);
        unset($sheet2['Website']);
        unset($sheet2['Founded']);
        unset($sheet2['Purpose']);
        unset($sheet2['Status']);
        unset($sheet2['Contact']);
        unset($sheet2['Email']);
        // dd($details);
        // dd($sheet2);
        $org_details_id = updateOrg('organisation_normalised___organisation_details', $_POST['Organisation_Name'], $details);
        $org_gen_id = updateOrg('organisation_normalised___sheet2', $_POST['Organisation_Name'], $sheet2);
        $_SESSION['message'] = 'Organisation Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/posts/index.php');
        exit();
    }
    else
    {
        $organisation_name = $_POST['Organisation_Name'];
        $organisation_website = $_POST['Website'];
        $organisation_founded = $_POST['Founded'];
        $organisation_purpose = $_POST['Purpose'];
        $organisation_status = $_POST['Status'];
        $organisation_contact = $_POST['Contact'];
        $organisation_email = $_POST['Email'];
        $organisation_satellites = $_POST['Satellite_In_Orbit'];
        $organisation_unsuccessful = $_POST['Number_of_unsuccessful_missions'];
        $organisation_country = $_POST['Country_Name'];
    }
}