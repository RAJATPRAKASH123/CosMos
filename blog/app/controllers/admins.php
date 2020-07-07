<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateAdmin.php");

$admins_info = selectAll('admin_normalised___admin');
$admins_org = selectAll('admin_normalised___admin_org');

$admin_id = '';
$admin_name = '';
$admin_gender = '';
$admin_contact = '';
$admin_country = '';
$admin_org_id = '';

$errors = array();

if ( isset($_POST['add-admin'])) 
{
    $errors = validateAdmin($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-admin']);
        $details=array();
        $sheet2=array();
        $details['Admin_ID'] = count($admins_info) + 1;
        $sheet2['Admin_ID'] = count($admins_info) + 1;
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['Organization_ID']);
        unset($sheet2['Admin_Name']);
        unset($sheet2['Gender']);
        unset($sheet2['Contact']);
        unset($sheet2['Country_Name']);
        // dd($details);
        // dd($sheet2);
        create('admin_normalised___admin', $details);
        create('admin_normalised___admin_org', $sheet2);
        $_SESSION['message'] = 'Admin Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/admins/index.php');
        exit();
    }
    else
    {
        $admin_name = $_POST['Admin_Name'];
        $admin_gender = $_POST['Gender'];
        $admin_contact = $_POST['Contact'];
        $admin_country = $_POST['Country_Name'];
        $admin_org_id = $_POST['Organization_ID'];
    }
}

if(isset($_GET['id']))
{
    $admin_id = $_GET['id'];
    $admin_info = selectOne('admin_normalised___admin', ['Admin_ID' => $admin_id])[0];
    $admin_org_info = selectOne('admin_normalised___admin_org', ['Admin_ID' => $admin_id])[0];

    $admin_id = $admin_info['Admin_ID'];
    $admin_name = $admin_info['Admin_Name'];
    $admin_gender = $admin_info['Gender'];
    $admin_contact = $admin_info['Contact'];
    $admin_country = $admin_info['Country_Name'];
    $admin_org_id = $admin_org_info['Organization_ID'];
}

if(isset($_GET['del_id']))
{
    $admin_id = $_GET['del_id'];
    deleteAdmin('admin_normalised___admin', $admin_id);
    deleteAdmin('admin_normalised___admin_org', $admin_id);
    $_SESSION['message'] = 'Admin Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/admins/index.php');
    exit();
}

if ( isset($_POST['update-admin']))
{
    $errors = validateAdmin($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-admin']);
        $details=array();
        $sheet2=array();
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['Admin_ID']);
        unset($sheet2['Admin_ID']);
        unset($details['Organization_ID']);
        unset($sheet2['Admin_Name']);
        unset($sheet2['Gender']);
        unset($sheet2['Contact']);
        unset($sheet2['Country_Name']);
        // dd($details);
        // dd($sheet2);
        updateAdmin('admin_normalised___admin', $_POST['Admin_ID'], $details);
        updateAdmin('admin_normalised___admin_org', $_POST['Admin_ID'], $sheet2);
        $_SESSION['message'] = 'Admin Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/admins/index.php');
        exit();
    }
    else
    {
        $admin_id = $_POST['Admin_ID'];
        $admin_name = $_POST['Admin_Name'];
        $admin_gender = $_POST['Gender'];
        $admin_contact = $_POST['Contact'];
        $admin_country = $_POST['Country_Name'];
        $admin_org_id = $_POST['Organization_ID'];
    }
}