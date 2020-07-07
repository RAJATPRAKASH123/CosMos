<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateClient.php");

$clients = selectAll('client_normalised___client');

$client_id = '';
$client_country = '';
$client_email = '';
$client_contact = '';

$errors = array();

if ( isset($_POST['add-client'])) 
{
    $errors = validateClient($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-client']);
        $_POST['Client_Id'] = count($clients) + 1;
        // dd($details);
        // dd($sheet2);
        create('client_normalised___client', $_POST);
        $_SESSION['message'] = 'Client Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/clients/index.php');
        exit();
    }
    else
    {
        $client_country = $_POST['Country_Name'];
        $client_email = $_POST['Email_Id'];
        $client_contact = $_POST['Contact_Number'];
    }
}

if(isset($_GET['id']))
{
    $client_id = $_GET['id'];
    $client = selectOne('client_normalised___client', ['Client_Id' => $client_id])[0];

    $client_id = $client['Client_Id'];
    $client_country = $client['Country_Name'];
    $client_email = $client['Email_Id'];
    $client_contact = $client['Contact_Number'];
}

if(isset($_GET['del_id']))
{
    $client_id = $_GET['del_id'];
    deleteClient('client_normalised___client', $client_id);
    $_SESSION['message'] = 'Client Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/clients/index.php');
    exit();
}

if ( isset($_POST['update-client']))
{
    $errors = validateClient($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-client']);
        $id = $_POST['Client_Id'];
        unset($_POST['Client_Id']);
        // dd($_POST);
        // dd($sheet2);
        updateClient('client_normalised___client', $id, $_POST);
        $_SESSION['message'] = 'Client Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/clients/index.php');
        exit();
    }
    else
    {
        $client_country = $_POST['Country_Name'];
        $client_email = $_POST['Email_Id'];
        $client_contact = $_POST['Contact_Number'];
    }
}