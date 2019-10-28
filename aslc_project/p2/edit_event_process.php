<?php
//show errors: at least 1 and 4...
ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

//use for inital test of form inputs
//exit(print_r($_POST));

//code to process inserts goes here

$evn_id_v = $_POST['evn_id'];
$evn_name_v = $_POST['name'];
$evn_type_v = $_POST['type'];
$evn_org_v = $_POST['org'];
$evn_location_v = $_POST['location'];
$evn_stu_v = $_POST['stu'];
$evn_sta_v = $_POST['sta'];
$evn_vol_v = $_POST['vol'];
$evn_length_v = $_POST['length'];
$evn_buildingm_v = $_POST['buildingm'];
$evn_notes_v = $_POST['notes'];

//exit($evn_name_v . ", " . $evn_type_v . ", " . $evn_org_v . ", etc.");

$pattern='/^[a-zA-Z0-9\-_\s]+$/';
    $valid_name = preg_match($pattern, $evn_name_v);
//echo $valid_name;
//exit();
$pattern='/^[a-zA-Z0-9\-_\s]+$/';
    $valid_type = preg_match($pattern, $evn_type_v);

$pattern='/^[a-zA-Z0-9\-_\s]+$/';
    $valid_org = preg_match($pattern, $evn_org_v);

$pattern='/^[a-zA-Z0-9\-_\s]+$/';
    $valid_location = preg_match($pattern, $evn_location_v);

$pattern='/^[a-zA-Z0-9\-_\s]+$/';
    $valid_stu = preg_match($pattern, $evn_stu_v);

$pattern='/^[a-zA-Z0-9\-_\s]+$/';
    $valid_sta = preg_match($pattern, $evn_sta_v);

$pattern='(...)';
    $valid_vol = preg_match($pattern, $evn_vol_v);

$pattern='/^[a-zA-Z0-9\-_\s]+$/';
    $valid_length = preg_match($pattern, $evn_length_v);

$pattern='/^\d{1,8}(?:\.\d{0,2})?$/';
    $valid_buildingm = preg_match($pattern, $evn_buildingm_v);

    if
    (
    
        empty($evn_name_v) || 
        empty($evn_type_v) || 
        empty($evn_org_v) || 
        empty($evn_location_v) || 
        empty($evn_stu_v) || 
        empty($evn_sta_v) || 
        empty($evn_vol_v) || 
        empty($evn_length_v) || 
        !isset($evn_buildingm_v)
    )
    
        {
            $error = "All fields require data, except <b>Notes</b>. Check all fields and try again.";
            include('global/error.php');
        }
    /*
    else if (!is_numeric($evn_buildingm_v) || $evn_buildingm_v <= 0)
        {
            $error = 'YTD Sales can only contain numbers (other than a decimal point); and must be equal to or greater than zero.';
            include('global/error.php');
        }
    
    else if ($valid_name === false)
        {
            echo 'Error in pattern!';
        }
    
    else if ($valid_name === 0)
        {
            $error = 'Name can only contain numbers, letters, hyphens, and underscores.';
            include('global/error.php');
        }
    
    else if ($valid_type === false)
        {
            echo 'Error in pattern!';
        }
    
    else if ($valid_type === 0)
        {
            $error = 'type can only contain numbers, letters, commas, and periods.';
            include('global/error.php');
        }
    
    else if ($valid_org === false)
        {
            echo 'Error in pattern!';
        }
    
    else if ($valid_org === 0)
        {
            $error = 'org can only contain letters.';
            include('global/error.php');
        }
    
    else if ($valid_location === false)
        {
            echo 'Error in pattern!';
        }
    
    else if ($valid_location === 0)
        {
            $error = 'location can only contain letters.';
            include('global/error.php');
        }
    
    else if ($valid_stu === false)
        {
            echo 'Error in pattern!';
        }
    
    else if ($valid_stu === 0)
        {
            $error = 'stu code can only numbers (5-9 digits).';
            include('global/error.php');
        }
    
    else if ($valid_sta === false)
        {
            echo 'Error in pattern!';
        }
    
    else if ($valid_sta === 0)
        {
            $error = 'sta must contain 10 digits.';
            include('global/error.php');
        }
    else if ($valid_buildingm === false)
        {
            echo 'Error in pattern!';
        }
    
    else if ($valid_buildingm === 0)
        {
            $error = 'YTD Sales must be no more than 10 digits and a decimal point.';
            include('global/error.php');
        }
    */
    
    else
        {
            require_once('global/connection.php');
            
            $query = 
            "UPDATE events
            SET
            evn_name = :evn_name_p,
            evn_type = :evn_type_p,
            evn_org = :evn_org_p, 
            evn_location = :evn_location_p, 
            evn_stu = :evn_stu_p, 
            evn_sta = :evn_sta_p, 
            evn_vol = :evn_vol_p, 
            evn_length = :evn_length_p, 
            evn_buildingm = :evn_buildingm_p, 
            evn_notes = :evn_notes_p
            WHERE evn_id = :evn_id_p";
            

        try
            {
                $locationment= $db->prepare($query);
                $locationment->bindParam(':evn_id_p', $evn_id_v);
                $locationment->bindParam(':evn_name_p', $evn_name_v);
                $locationment->bindParam(':evn_type_p', $evn_type_v);
                $locationment->bindParam(':evn_org_p', $evn_org_v);
                $locationment->bindParam(':evn_location_p', $evn_location_v);
                $locationment->bindParam(':evn_stu_p', $evn_stu_v);
                $locationment->bindParam(':evn_sta_p', $evn_sta_v);
                $locationment->bindParam(':evn_vol_p', $evn_vol_v);
                $locationment->bindParam(':evn_length_p', $evn_length_v);
                $locationment->bindParam(':evn_buildingm_p', $evn_buildingm_v);
                $locationment->bindParam(':evn_notes_p', $evn_notes_v);
                $locationment->execute();
                $locationment->closeCursor();
                

            }

        catch (PDOExeception $e)
            {
                $error = $e->getMessage();
                //echo $error;
            }
            
            //include('index.php');
            header('Location: index.php');

    }

?>
