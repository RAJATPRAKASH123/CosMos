<?php
function validateCenter($center, $ans)
{
    $errors = array();
    if ( empty($center['Center_name'])) {
        array_push($errors, 'Center name is required');
    }

    if ( empty($center['Purpose'])) {
        array_push($errors, 'Purpose is required');
    }

    if ( empty($center['Formation_date'])) {
        array_push($errors, 'Date of Formation is required');
    }

    if ( empty($center['CONTACT_ID'])) {
        array_push($errors, 'Contact ID is required');
    }

    if ( empty($center['Location'])) {
        array_push($errors, 'Location is required');
    }

    if ( empty($center['Country_name'])) {
        array_push($errors, 'Country Name is required');
    }

    if ( empty($center['Number_of_Employees'])) {
        array_push($errors, 'Number of Employees is required');
    }

    if ( empty($center['Organisation_ID'])) {
        array_push($errors, 'Organisation ID is required');
    }

    if ( empty($center['Project_ID'])) {
        array_push($errors, 'Project ID is required');
    }

    if($ans === 1)
    {
        $existingCenter = selectOne('organisationcenter_normalised___organisationcenter', ['CONTACT_ID' => $center['CONTACT_ID']]);
        if ( $existingCenter )
        {
            array_push($errors, 'Email ID already exists');
        }
    }
    return $errors;
}