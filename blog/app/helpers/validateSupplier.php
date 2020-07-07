<?php
function validateSup($supplier, $ans)
{
    $errors = array();
    if ( empty($supplier['Supplier_Name'])) {
        array_push($errors, 'Supplier name is required');
    }

    if ( empty($supplier['Email_Id'])) {
        array_push($errors, 'Email ID is required');
    }

    if ( empty($supplier['Contact_Number'])) {
        array_push($errors, 'Contact number is required');
    }

    if ( empty($supplier['Shipping_Address'])) {
        array_push($errors, 'Shipping Address is required');
    }

    if ( empty($supplier['Pincode'])) {
        array_push($errors, 'Pincode is required');
    }

    if ( empty($supplier['Country_Name'])) {
        array_push($errors, 'Country Name is required');
    }

    if ( empty($supplier['Exporter'])) {
        array_push($errors, 'Exporter is required');
    }

    if ( empty($supplier['Supplied_Center'])) {
        array_push($errors, 'Supplied Center is required');
    }

    if($ans === 1)
    {
        $existingSupplier = selectOne('supplier_normalised___supplier_info', ['Email_Id' => $supplier['Email_Id']]);
        if ( $existingSupplier )
        {
            array_push($errors, 'Email ID already exists');
        }
    }
    return $errors;
}