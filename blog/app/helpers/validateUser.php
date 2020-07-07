<?php
function validateUser($user, $ans)
{
    $errors = array();
    if ( empty($user['User_Name'])) {
        array_push($errors, 'User name is required');
    }

    if ( empty($user['Gender'])) {
        array_push($errors, 'Gender is required');
    }

    if ( empty($user['Avg_Use_Time'])) {
        array_push($errors, 'Avg Use Time of user is required');
    }

    if ( empty($user['Last_Seen'])) {
        array_push($errors, 'Last seen is required');
    }

    if ( empty($user['Contact'])) {
        array_push($errors, 'Contact number is required');
    }

    if ( empty($user['Email'])) {
        array_push($errors, 'Email is required');
    }

    if ( empty($user['Project_ID'])) {
        array_push($errors, 'Project ID is required');
    }

    if ( empty($user['Country'])) {
        array_push($errors, 'Country Name is required');
    }

    if($ans === 1)
    {
        $existingUser = selectOne('user_normalised___user_info', ['User_Name' => $user['User_Name']]);
        if ( $existingUser )
        {
            array_push($errors, 'User name already exists');
        }
    }
    return $errors;
}


function validateUser_reg($user)
{
    $errors = array();
    if ( empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if ( empty($user['email'])) {
        array_push($errors, 'email is required');
    }

    if ( empty($user['password'])) {
        array_push($errors, 'Password is required');
    }

    if ( $user['password'] !== $user['passwordConf']) {
        array_push($errors, 'Password do not match');
    }
    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ( $existingUser )
    {
        array_push($errors, 'Email already exists');
    }
    return $errors;
}

function validateLogin($user)
{
    $errors = array();
    if ( empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if ( empty($user['password'])) {
        array_push($errors, 'Password is required');
    }


    return $errors;
}