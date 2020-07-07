<?php
function validateClient($client, $ans)
{
    $errors = array();
    if ( empty($client['Country_Name'])) {
        array_push($errors, 'Country name is required');
    }

    if ( empty($client['Email_Id'])) {
        array_push($errors, 'Email ID is required');
    }

    if ( empty($client['Contact_Number'])) {
        array_push($errors, 'Contact number is required');
    }

    if($ans === 1)
    {
        $existingClient = selectOne('client_normalised___client', ['Email_Id' => $client['Email_Id']]);
        if ( $existingClient )
        {
            array_push($errors, 'Email ID already exists');
        }
    }
    return $errors;
}