<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$users_info = selectAll('user_normalised___user_info');
$users_project_info = selectAll('user_normalised___user_projects');

$user_id = '';
$user_name = '';
$user_gender = '';
$user_time = '';
$user_seen = '';
$user_contact = '';
$user_email = '';
$user_project_id = '';
$user_country = '';

$errors = array();

if ( isset($_POST['add-user'])) 
{
    $errors = validateUser($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-user']);
        $details=array();
        $sheet2=array();
        $details['User_ID'] = count($users_info) + 1;
        $sheet2['User_ID'] = count($users_info) + 1;
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['Project_ID']);
        unset($details['Country']);
        unset($sheet2['User_Name']);
        unset($sheet2['Gender']);
        unset($sheet2['Avg_Use_Time']);
        unset($sheet2['Last_Seen']);
        unset($sheet2['Contact']);
        unset($sheet2['Email']);
        // dd($details);
        // dd($sheet2);
        create('user_normalised___user_info', $details);
        create('user_normalised___user_projects', $sheet2);
        $_SESSION['message'] = 'User Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    }
    else
    {
        $user_name = $_POST['User_Name'];
        $user_gender = $_POST['Gender'];
        $user_time = $_POST['Avg_Use_Time'];
        $user_seen = $_POST['Last_Seen'];
        $user_contact = $_POST['Contact'];
        $user_email = $_POST['Email'];
        $user_project_id = $_POST['Project_ID'];
        $user_country = $_POST['Country'];
    }
}

if(isset($_GET['id']))
{
    $user_id = $_GET['id'];
    $user_info = selectOne('user_normalised___user_info', ['User_ID' => $user_id])[0];
    $user_project_info = selectOne('user_normalised___user_projects', ['User_ID' => $user_id])[0];

    $user_id = $user_info['User_ID'];
    $user_name = $user_info['User_Name'];
    $user_gender = $user_info['Gender'];
    $user_time = $user_info['Avg_Use_Time'];
    $user_seen = $user_info['Last_Seen'];
    $user_contact = $user_info['Contact'];
    $user_email = $user_info['Email'];
    $user_project_id = $user_project_info['Project_ID'];
    $user_country = $user_project_info['Country'];
}

if(isset($_GET['del_id']))
{
    $user_id = $_GET['del_id'];
    deleteUser('user_normalised___user_info', $user_id);
    deleteUser('user_normalised___user_projects', $user_id);
    $_SESSION['message'] = 'User Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}

if ( isset($_POST['update-user']))
{
    $errors = validateUser($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-user']);
        $details=array();
        $sheet2=array();
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $sheet2[$p] = $value;
        }
        unset($details['User_ID']);
        unset($sheet2['User_ID']);
        unset($details['Project_ID']);
        unset($details['Country']);
        unset($sheet2['User_Name']);
        unset($sheet2['Gender']);
        unset($sheet2['Avg_Use_Time']);
        unset($sheet2['Last_Seen']);
        unset($sheet2['Contact']);
        unset($sheet2['Email']);
        // dd($details);
        // dd($sheet2);
        updateUser('user_normalised___user_info', $_POST['User_ID'], $details);
        updateUser('user_normalised___user_projects', $_POST['User_ID'], $sheet2);
        $_SESSION['message'] = 'User updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    }
    else
    {
        $user_name = $_POST['User_Name'];
        $user_gender = $_POST['Gender'];
        $user_time = $_POST['Avg_Use_Time'];
        $user_seen = $_POST['Last_Seen'];
        $user_contact = $_POST['Contact'];
        $user_email = $_POST['Email'];
        $user_project_id = $_POST['Project_ID'];
        $user_country = $_POST['Country'];
    }
}




$username = '';
$email = '';
$password = '';
$passwordConf = '';
$table = 'users';


function loginUser($user) {

    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';
    
    if ($_SESSION['admin']) {
        header('location: '. BASE_URL . '/admin/users/index.php');
    } else {
        header('location: '. BASE_URL . '/index.php');
    }
    exit();
}

$errors = array();
if (isset($_POST['register-btn'])) {

    $errors = validateUser_reg($_POST);


    // dd($errors);

    if ( count($errors) === 0 ) {

    
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['admin'] = 0; 
        
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
        
        $user_id = create($table, $_POST);
        $user = selectOne_logi($table, ['id' => $user_id]);
       
        // log user in
        loginUser($user);
        

    }else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}


if ( isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);
    if ( count($errors) === 0 ) {
        $user = selectOne_logi($table, ['username' => $_POST['username']]);
        if ( $user && password_verify($_POST['password'], $user['password'])) {
            // login, redirect
            loginUser($user);
        }else {
            array_push($errors, 'Wrong credentials');
        }
    }
    $username = $_POST['username'];
}
