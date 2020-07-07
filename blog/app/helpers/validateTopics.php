<?php
function validateSat($satellite, $ans)
{
    $errors = array();
    if ( empty($satellite['Name_of_Satellite'])) {
        array_push($errors, 'Satellite name is required');
    }

    if ( empty($satellite['Class_of_Orbit'])) {
        array_push($errors, 'Class_of_Orbit is required');
    }

    if ( empty($satellite['Type_of_Orbit'])) {
        array_push($errors, 'Type of Orbit of satellite is required');
    }

    if ( empty($satellite['Longitude_of_GEO_degrees'])) {
        array_push($errors, 'Longitude of GEO (degrees) is required');
    }

    if ( empty($satellite['Perigee_km'])) {
        array_push($errors, 'Perigee (km) of satellite is required');
    }

    if ( empty($satellite['Apogee_km'])) {
        array_push($errors, 'Apogee (km) of satellite is required');
    }

    if ( empty($satellite['Eccentricity'])) {
        array_push($errors, 'Eccentricity is required');
    }

    if ( empty($satellite['Inclination_degrees'])) {
        array_push($errors, 'Inclination (degrees) about Satellite is required');
    }

    if ( empty($satellite['Period_minutes'])) {
        array_push($errors, 'Period (minutes) of satellite is required');
    }

    if ( empty($satellite['Launch_Mass_kg'])) {
        array_push($errors, 'Launch Mass (kg.) of satellite is required');
    }

    if ( empty($satellite['Dry_Mass_kg'])) {
        array_push($errors, 'Dry Mass (kg.) of satellite is required');
    }

    if ( empty($satellite['Power_watts'])) {
        array_push($errors, 'Power (watts) of satellite is required');
    }

    if ( empty($satellite['COSPAR_Number'])) {
        array_push($errors, 'COSPAR Number of satellite is required');
    }

    if ( empty($satellite['NORAD_Number'])) {
        array_push($errors, 'NORAD Number of satellite is required');
    }

    if ( empty($satellite['Purpose'])) {
        array_push($errors, 'Purpose of satellite is required');
    }

    if ( empty($satellite['Detailed_Purpose'])) {
        array_push($errors, 'Detailed Purpose of satellite is required');
    }

    if ( empty($satellite['Date_of_Launch'])) {
        array_push($errors, 'Date of Launch is required');
    }

    if ( empty($satellite['Expected_Lifetime_yrs'])) {
        array_push($errors, 'Expected Lifetime (yrs.) of Satellite is required');
    }

    if ( empty($satellite['Country_Org_of_UN_Registry'])) {
        array_push($errors, 'Country/Org of UN Registry is required');
    }

    if ( empty($satellite['Operator_Owner'])) {
        array_push($errors, 'Operator/Owner of satellite is required');
    }

    if ( empty($satellite['Launch_Site'])) {
        array_push($errors, 'Launch Site of satellite is required');
    }

    if ( empty($satellite['Launch_Vehicle'])) {
        array_push($errors, 'Launch Vehicle of satellite is required');
    }

    if ( empty($satellite['Contractor'])) {
        array_push($errors, 'Contractor of satellite is required');
    }

    if($ans === 1)
    {
        $existingSat = selectOne('sattelite_gen_normalised___sat_info', ['Name_of_Satellite' => $satellite['Name_of_Satellite']]);
        if ( $existingSat )
        {
            array_push($errors, 'Satellite with same Name already exists');
        }
    }
    return $errors;
}