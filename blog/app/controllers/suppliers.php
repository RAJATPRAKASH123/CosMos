<?php


include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateSupplier.php");

$suppliers_info = selectAll('supplier_normalised___supplier_info');
$suppliers_country_info = selectAll('supplier_normalised___supply_country');
$suppliers_exporter_info = selectAll('supplier_normalised___supply_exporter');

$supplier_id = '';
$supplier_name = '';
$supplier_contact = '';
$supplier_email = '';
$supplier_shipping = '';
$supplier_pincode = '';
$supplier_country = '';
$supplier_exporter = '';
$supplier_center = '';

$errors = array();

if ( isset($_POST['add-supplier'])) 
{
    $errors = validateSup($_POST, 1);

    if(count($errors) === 0)
    {
        unset($_POST['add-supplier']);
        $details=array();
        $info_1=array();
        $info_2=array();
        $details['Supplier_Id'] = count($suppliers_info) + 1;
        $info_1['Supplier_Id'] = count($suppliers_info) + 1;
        $info_2['Supplier_Id'] = count($suppliers_info) + 1;
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $info_1[$p] = $value;
            $info_2[$p] = $value;
        }
        unset($details['Country_Name']);
        unset($details['Exporter']);
        unset($details['Supplied_Center']);
        unset($info_1['Exporter']);
        unset($info_1['Supplied_Center']);
        unset($info_1['Supplier_Name']);
        unset($info_1['Contact_Number']);
        unset($info_1['Email_Id']);
        unset($info_1['Shipping_Address']);
        unset($info_1['Pincode']);

        unset($info_2['Supplier_Name']);
        unset($info_2['Contact_Number']);
        unset($info_2['Email_Id']);
        unset($info_2['Shipping_Address']);
        unset($info_2['Pincode']);
        unset($info_2['Country_Name']);
        // dd($details);
        create('supplier_normalised___supplier_info', $details);
        create('supplier_normalised___supply_country', $info_1);
        create('supplier_normalised___supply_exporter', $info_2);
        $_SESSION['message'] = 'Supplier Created Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/supplier/index.php');
        exit();
    }
    else
    {
        $supplier_name = $_POST['Supplier_Name'];
        $supplier_contact = $_POST['Contact_Number'];
        $supplier_email = $_POST['Email_Id'];
        $supplier_shipping = $_POST['Shipping_Address'];
        $supplier_pincode = $_POST['Pincode'];
        $supplier_country = $_POST['Country_Name'];
        $supplier_exporter = $_POST['Exporter'];
        $supplier_center = $_POST['Supplied_Center'];
    }
}

if(isset($_GET['id']))
{
    $supplier_id = $_GET['id'];
    $supplier_info = selectOne('supplier_normalised___supplier_info', ['Supplier_Id' => $supplier_id])[0];
    $supplier_country_info = selectOne('supplier_normalised___supply_country', ['Supplier_Id' => $supplier_id])[0];
    $supplier_exporter_info = selectOne('supplier_normalised___supply_exporter', ['Supplier_Id' => $supplier_id])[0];

    $supplier_id = $supplier_info['Supplier_Id'];
    $supplier_name = $supplier_info['Supplier_Name'];
    $supplier_contact = $supplier_info['Contact_Number'];
    $supplier_email = $supplier_info['Email_Id'];
    $supplier_shipping = $supplier_info['Shipping_Address'];
    $supplier_pincode = $supplier_info['Pincode'];
    $supplier_country = $supplier_country_info['Country_Name'];
    $supplier_exporter = $supplier_exporter_info['Exporter'];
    $supplier_center = $supplier_exporter_info['Supplied_Center'];
}

if(isset($_GET['del_id']))
{
    $supplier_id = $_GET['del_id'];
    deleteSup('supplier_normalised___supplier_info', $supplier_id);
    deleteSup('supplier_normalised___supply_country', $supplier_id);
    deleteSup('supplier_normalised___supply_exporter', $supplier_id);
    $_SESSION['message'] = 'Supplier Deleted Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/supplier/index.php');
    exit();
}

if ( isset($_POST['update-supplier']))
{
    $errors = validateSup($_POST, 0);

    if(count($errors) === 0)
    {
        unset($_POST['update-supplier']);
        $details=array();
        $info_1=array();
        $info_2=array();
        foreach($_POST as $p=>$value)
        {
            $details[$p] = $value;
            $info_1[$p] = $value;
            $info_2[$p] = $value;
        }
        unset($details['Supplier_Id']);
        unset($info_1['Supplier_Id']);
        unset($info_2['Supplier_Id']);
        unset($details['Country_Name']);
        unset($details['Exporter']);
        unset($details['Supplied_Center']);
        unset($info_1['Exporter']);
        unset($info_1['Supplied_Center']);
        unset($info_1['Supplier_Name']);
        unset($info_1['Contact_Number']);
        unset($info_1['Email_Id']);
        unset($info_1['Shipping_Address']);
        unset($info_1['Pincode']);

        unset($info_2['Supplier_Name']);
        unset($info_2['Contact_Number']);
        unset($info_2['Email_Id']);
        unset($info_2['Shipping_Address']);
        unset($info_2['Pincode']);
        unset($info_2['Country_Name']);
        // dd($details);
        updateSup('supplier_normalised___supplier_info', $_POST['Supplier_Id'], $details);
        updateSup('supplier_normalised___supply_country', $_POST['Supplier_Id'], $info_1);
        updateSup('supplier_normalised___supply_exporter', $_POST['Supplier_Id'], $info_2);
        $_SESSION['message'] = 'Supplier Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/supplier/index.php');
        exit();
    }
    else
    {
        $supplier_name = $_POST['Supplier_Name'];
        $supplier_contact = $_POST['Contact_Number'];
        $supplier_email = $_POST['Email_Id'];
        $supplier_shipping = $_POST['Shipping_Address'];
        $supplier_pincode = $_POST['Pincode'];
        $supplier_country = $_POST['Country_Name'];
        $supplier_exporter = $_POST['Exporter'];
        $supplier_center = $_POST['Supplied_Center'];
    }
}