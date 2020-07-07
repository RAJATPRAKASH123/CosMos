<?php
function validateOrg($organisation, $ans)
{
    $errors = array();
    if ( empty($organisation['Organisation_Name'])) {
        array_push($errors, 'Organisation name is required');
    }

    if ( empty($organisation['Website'])) {
        array_push($errors, 'Website is required');
    }

    if ( empty($organisation['Founded'])) {
        array_push($errors, 'Date of Foundation is required');
    }

    if ( empty($organisation['Purpose'])) {
        array_push($errors, 'Purpose is required');
    }

    if ( empty($organisation['Contact'])) {
        array_push($errors, 'Contact number is required');
    }

    if ( empty($organisation['Email'])) {
        array_push($errors, 'Email is required');
    }

    if ( empty($organisation['Satellite_In_Orbit'])) {
        array_push($errors, 'Information about Satellite is required');
    }

    if ( empty($organisation['Number_of_unsuccessful_missions'])) {
        array_push($errors, 'Unsuccessful Missions is required');
    }

    if ( empty($organisation['Country_Name'])) {
        array_push($errors, 'Country Name is required');
    }

    if($ans === 1)
    {
        $existingOrg = selectOne('organisation_normalised___organisation_details', ['Organisation_Name' => $organisation['Organisation_Name']]);
        if ( $existingOrg )
        {
            array_push($errors, 'Organisation name already exists');
        }
    }
    return $errors;
}