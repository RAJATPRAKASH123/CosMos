<?php
function validateAdmin($admin, $ans)
{
    $errors = array();
    if ( empty($admin['Admin_Name'])) {
        array_push($errors, 'Admin name is required');
    }

    if ( empty($admin['Gender'])) {
        array_push($errors, 'Gender is required');
    }

    if ( empty($admin['Contact'])) {
        array_push($errors, 'Contact number is required');
    }

    if ( empty($admin['Organization_ID'])) {
        array_push($errors, 'Organisation ID is required');
    }

    if ( empty($admin['Country_Name'])) {
        array_push($errors, 'Country Name is required');
    }

    if($ans === 1)
    {
        $existingAdmin = selectOne('admin_normalised___admin', ['Admin_Name' => $admin['Admin_Name']]);
        if ( $existingAdmin )
        {
            array_push($errors, 'Admin name already exists');
        }
    }
    return $errors;
}