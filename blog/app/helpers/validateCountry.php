<?php
function validateCountry($country, $ans)
{
    $errors = array();
    if ( empty($country['Country'])) {
        array_push($errors, 'Country name is required');
    }

    if ( empty($country['Satellite_count'])) {
        array_push($errors, 'Number of Satellites are required');
    }

    if ( empty($country['Active_satellites'])) {
        array_push($errors, 'Number of active satellites is required');
    }

    if ( empty($country['Total_launches'])) {
        array_push($errors, 'Number of satellite launches is required');
    }

    if ( empty($country['Launching_centres'])) {
        array_push($errors, 'Number of satellitec launch centers is required');
    }

    if($ans === 1)
    {
        $existingCountry = selectOne('country_normalised___country_stats', ['Country' => $country['Country']]);
        if ( $existingCountry )
        {
            array_push($errors, 'Country already exists');
        }
    }
    return $errors;
}