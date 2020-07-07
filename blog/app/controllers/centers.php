<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateCenter.php");

$centers_info = selectAll('organisationcenter_normalised___organisationcenter');
$centers_project_info = selectAll('organisationcenter_normalised___center_project');
$centers_org_info = selectAll('organisationcenter_normalised___center_org');

$center_id = '';
$center_name = '';
$center_purpose = '';
$center_date = '';
$center_contact = '';
$center_location = '';
$center_country = '';
$center_employees = '';
$center_project = '';
$center_org = '';

$errors = array();

if ( isset($_POST['add-center'])) 
{
    $errors = validateCenter($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-center']);
        $details=array();
        $info_1=array();
        $info_2=array();
        $details['Center_ID'] = count($centers_org_info) + 1;
        $info_1['Center_ID'] = count($centers_org_info) + 1;
        $info_2['Center_ID'] = count($centers_org_info) + 1;
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
        }
        unset($details['Project_ID']);
        unset($details['Organisation_ID']);
        $info_1['Project_ID'] = $_POST['Project_ID'];
        $info_2['Organisation_ID'] = $_POST['Organisation_ID'];
        // dd($details);
        create('organisationcenter_normalised___organisationcenter', $details);
        create('organisationcenter_normalised___center_project', $info_1);
        create('organisationcenter_normalised___center_org', $info_2);
        $_SESSION['message'] = 'Center Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/centers/index.php');
        exit();
    }
    else
    {
        $center_name = $_POST['Center_name'];
        $center_purpose = $_POST['Purpose'];
        $center_date = $_POST['Formation_date'];
        $center_contact = $_POST['CONTACT_ID'];
        $center_location = $_POST['Location'];
        $center_country = $_POST['Country_name'];
        $center_employees = $_POST['Number_of_Employees'];
        $center_project = $_POST['Project_ID'];
        $center_org = $_POST['Organisation_ID'];
    }
}

if(isset($_GET['id']))
{
    $center_id = $_GET['id'];
    $center_info = selectOne('organisationcenter_normalised___organisationcenter', ['Center_ID' => $center_id])[0];
    $center_project_info = selectOne('organisationcenter_normalised___center_project', ['Center_ID' => $center_id])[0];
    $center_org_info = selectOne('organisationcenter_normalised___center_org', ['Center_ID' => $center_id])[0];

    $center_id = $center_org_info['Center_ID'];
    $center_name = $center_info['Center_name'];
    $center_purpose = $center_info['Purpose'];
    $center_date = $center_info['Formation_date'];
    $center_contact = $center_info['CONTACT_ID'];
    $center_location = $center_info['Location'];
    $center_country = $center_info['Country_name'];
    $center_employees = $center_info['Number_of_Employees'];
    $center_project = $center_project_info['Project_ID'];
    $center_org = $center_org_info['Organisation_ID'];
}

if(isset($_GET['del_id']))
{
    $center_id = $_GET['del_id'];
    deleteCenter('organisationcenter_normalised___organisationcenter', $center_id);
    deleteCenter('organisationcenter_normalised___center_project', $center_id);
    deleteCenter('organisationcenter_normalised___center_org', $center_id);
    $_SESSION['message'] = 'Center Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/centers/index.php');
    exit();
}

if ( isset($_POST['update-center']))
{
    $errors = validateCenter($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-center']);
        $details=array();
        $info_1=array();
        $info_2=array();
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
        }
        unset($details['Center_ID']);
        unset($details['Project_ID']);
        unset($details['Organisation_ID']);
        $info_1['Project_ID'] = $_POST['Project_ID'];
        $info_2['Organisation_ID'] = $_POST['Organisation_ID'];
        // dd($details);
        updateCenter('organisationcenter_normalised___organisationcenter', $_POST['Center_ID'], $details);
        updateCenter('organisationcenter_normalised___center_project', $_POST['Center_ID'], $info_1);
        updateCenter('organisationcenter_normalised___center_org', $_POST['Center_ID'], $info_2);
        $_SESSION['message'] = 'Center Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/centers/index.php');
        exit();
    }
    else
    {
        $center_name = $_POST['Center_name'];
        $center_purpose = $_POST['Purpose'];
        $center_date = $_POST['Formation_date'];
        $center_contact = $_POST['CONTACT_ID'];
        $center_location = $_POST['Location'];
        $center_country = $_POST['Country_name'];
        $center_employees = $_POST['Number_of_Employees'];
        $center_project = $_POST['Project_ID'];
        $center_org = $_POST['Organisation_ID'];
    }
}