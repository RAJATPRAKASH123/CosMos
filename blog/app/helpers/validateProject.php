<?php
function validatePro($project, $ans)
{
    $errors = array();
    if ( empty($project['Project_name'])) {
        array_push($errors, 'Project name is required');
    }

    if ( empty($project['Description'])) {
        array_push($errors, 'Description is required');
    }

    if ( empty($project['Status'])) {
        array_push($errors, 'Status of Project is required');
    }

    if ( empty($project['Start_date'])) {
        array_push($errors, 'Start date is required');
    }

    if ( empty($project['Country_working'])) {
        array_push($errors, 'Country name is required');
    }

    if($ans === 1)
    {
        $existingProject = selectOne('projects_normalised___projects_det', ['Project_name' => $project['Project_name']]);
        if ( $existingProject )
        {
            array_push($errors, 'Project name already exists');
        }
    }
    return $errors;
}