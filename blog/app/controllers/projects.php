<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateProject.php");

$projects_info = selectAll('projects_normalised___projects_det');
$projects_country_info = selectAll('projects_normalised___project_country');

$project_id = '';
$project_name = '';
$project_description = '';
$project_status = '';
$project_start = '';
$project_country = '';

$errors = array();

if ( isset($_POST['add-project'])) 
{
    $errors = validatePro($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-project']);
        $details=array();
        $sheet2=array();
        $details['Project_id'] = count($projects_country_info) + 1;
        $sheet2['Project_id'] = count($projects_country_info) + 1;
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['Country_working']);
        unset($sheet2['Project_name']);
        unset($sheet2['Description']);
        unset($sheet2['Status']);
        unset($sheet2['Start_date']);
        // dd($details);
        // dd($sheet2);
        create('projects_normalised___projects_det', $details);
        create('projects_normalised___project_country', $sheet2);
        $_SESSION['message'] = 'Project Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/projects/index.php');
        exit();
    }
    else
    {
        $project_name = $_POST['Project_name'];
        $project_description = $_POST['Description'];
        $project_status = $_POST['Status'];
        $project_start = $_POST['Start_date'];
        $project_country = $_POST['Country_working'];
    }
}

if(isset($_GET['id']))
{
    $project_id = $_GET['id'];
    $project_info = selectOne('projects_normalised___projects_det', ['Project_id' => $project_id])[0];
    $project_country_info = selectOne('projects_normalised___project_country', ['Project_id' => $project_id])[0];
    // dd($organisation_gen);
    $project_id = $project_info['Project_id'];
    $project_name = $project_info['Project_name'];
    $project_description = $project_info['Description'];
    $project_status = $project_info['Status'];
    $project_start = $project_info['Start_date'];
    $project_country = $project_country_info['Country_working'];
}

if(isset($_GET['del_id']))
{
    $project_id = $_GET['del_id'];
    deletePro('projects_normalised___projects_det', $project_id);
    deletePro('projects_normalised___project_country', $project_id);
    $_SESSION['message'] = 'Project Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/projects/index.php');
    exit();
}

if ( isset($_POST['update-project']))
{
    $errors = validatePro($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-project']);
        $details=array();
        $sheet2=array();
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['Project_id']);
        unset($sheet2['Project_id']);
        unset($details['Country_working']);
        unset($sheet2['Project_name']);
        unset($sheet2['Description']);
        unset($sheet2['Status']);
        unset($sheet2['Start_date']);
        // dd($details);
        // dd($sheet2);
        updatePro('projects_normalised___projects_det', $_POST['Project_id'], $details);
        updatePro('projects_normalised___project_country', $_POST['Project_id'], $sheet2);
        $_SESSION['message'] = 'Project updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/projects/index.php');
        exit();
    }
    else
    {
        $project_id = $_POST['Project_id'];
        $project_name = $_POST['Project_name'];
        $project_description = $_POST['Description'];
        $project_status = $_POST['Status'];
        $project_start = $_POST['Start_date'];
        $project_country = $_POST['Country_working'];
    }
}