<?php
//show errors: at least 1 and 4...
ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
// error_reporting(E_ALL);

//use for inital test of form inputs
//exit(print_r($_POST));

//code to process inserts goes here
// Get Item data 
$evn_name_v = $_POST ['name'];
$evn_type_v = $_POST['type'];
$evn_org_v = $_POST['org'];
$evn_location_v = $_POST['location'];
$evn_stu_v = $_POST['stu'];
$evn_sta_v = $_POST ['sta'];
$evn_vol_v = $_POST['vol'];
$evn_length_v = $_POST['length'];
$evn_buildingm_v = $_POST['buildingm'];
$evn_notes_v = $_POST['notes'];

// Regular Expressions 
//name: letters, numbers, hypens, and underscore
$pattern='(...)';
$valid_name = preg_match($pattern, $evn_name_v);
//echo $valid_name; //test output: should be 1 (i.e., valid)
//exit();

//type: only letters, numbers, comma, space character, and period
$pattern='/^[a-zA-Z0-9,\s\.^[0-9,;]+$/';
$valid_type = preg_match($pattern, $evn_type_v);
//echo $valid_type; //test output: should be 1 (i.e., valid)
//exit();

//org: only letters and space characters
$pattern='/^[a-zA-Z0-9,\s\.^[0-9,;]+$/';
$valid_org = preg_match($pattern, $evn_org_v);
//echo $valid_org; //test output: should be 1 (i.e., valid)
//exit();

//state: must include two letters (min 2, max 2)
$pattern='/^[a-zA-Z0-9,\s\.^[0-9,;]+$/';
$valid_location = preg_match($pattern, $evn_location_v);
//echo $valid_state; //test output: should be 1 (i.e., valid)
//exit();


//stu: must include 5-9 digits
$pattern='/^[a-zA-Z0-9,\s\.^[0-9,;]+$/';
$valid_stu= preg_match($pattern, $evn_stu_v);
//echo $valid_stu; //test output: should be 1 (i.e., valid)
//exit();

//sta: must be 10 digits 
$pattern='/^[a-zA-Z0-9,\s\.^[0-9,;]+$/';
$valid_sta = preg_match($pattern, $evn_sta_v);
//echo $valid_sta; //test output: should be 1 (i.e., valid)
//exit();

//vol:  
$pattern='(...)';
$valid_vol = preg_match($pattern, $evn_vol_v);
//echo $valid_vol; //test output: should be 1 (i.e., valid)
//exit();

//length: 
$pattern='(...)';
$valid_length = preg_match($pattern, $evn_length_v);
//echo $valid_length; //test output: should be 1 (i.e., valid)
//exit();

//buildingm: max 10 digits, including optional decimal points with two digits
$pattern='/^[a-zA-Z0-9,\s\.^[0-9,;]+$/';
$valid_buildingm = preg_match($pattern, $evn_buildingm_v);
//echo $valid_buildingm; //test output: should be 1 (i.e., valid)
//exit();

//validate inputs - must contain all required fields 
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
    $error = "All fields require data, except <b>notes</b>. Check all fields and try again.";
    include('global/error.php');
}

//ytd Sales: must contain numbers and be equal to or greater than 0
else if ($valid_name === false)
{
    echo 'error in pattern!';
}

else if ($valid_name === 0)
{
    $error = 'names can only contain  letters, numbers, hypens, and underscores';
    include('global/error.php');
}

else if ($valid_type === false)
{
    echo 'error in pattern!';
}
else if ($valid_type === 0)
{
    $error = 'type can only contain  letters, numbers, hypens, and underscores';
    include('global/error.php');
}

else if ($valid_org === false)
{
    echo 'error in pattern!';
}

else if ($valid_org === 0)
{
    $error = 'org can only contain numbers, letters, commas, and periods';
    include('global/error.php');
}

else if ($valid_location === false)
{
    echo 'error in pattern!';
}

else if ($valid_location === 0)
{
    $error = 'location can only contain letters';
    include('global/error.php');
}

else if ($valid_stu === false)
{
    echo 'error in pattern!';
}

else if ($valid_stu === 0)
{
    $error = 'student must contain two letters';
    include('global/error.php');
}

else if ($valid_sta === false)
{
    echo 'error in pattern!';
}

else if ($valid_sta === 0)
{
    $error = 'staff must contain 5-9 digits';
    include('global/error.php');
}

else if ($valid_vol === false)
{
    echo 'error in pattern!';
}

else if ($valid_vol === 0)
{
    $error = 'vol must contain ten digits, and no other characters';
    include('global/error.php');
}

else if ($valid_length === false)
{
    echo 'error in pattern!';
}

else if ($valid_length === 0)
{
    $error = 'length must contain ten digits, and no other characters';
    include('global/error.php');
}

else if ($valid_buildingm === false)
{
    echo 'error in pattern!';
}

else if ($valid_buildingm === 0)
{
    $error = 'buildingm must contain ten digits, and no other characters';
    include('global/error.php');
}

else 
{
    require_once('global/connection.php');


$query =
"INSERT INTO events
(evn_name, evn_type, evn_org, evn_location, evn_stu, evn_sta, evn_vol, evn_length, evn_buildingm, evn_notes)
VALUES 
(:evn_name_p, :evn_type_p, :evn_org_p, :evn_location_p, :evn_stu_p, :evn_sta_p, :evn_vol_p, :evn_length_p, :evn_buildingm_p, :evn_notes_p)";

try
{
    $statement = $db->prepare($query);
    $statement->bindParam(':evn_name_p', $evn_name_v);
    $statement->bindParam(':evn_type_p', $evn_type_v);
    $statement->bindParam(':evn_org_p', $evn_org_v);
    $statement->bindParam(':evn_location_p', $evn_location_v);
    $statement->bindParam(':evn_stu_p', $evn_stu_v);
    $statement->bindParam(':evn_sta_p', $evn_sta_v);
    $statement->bindParam(':evn_vol_p', $evn_vol_v);
    $statement->bindParam(':evn_length_p', $evn_length_v);
    $statement->bindParam(':evn_buildingm_p', $evn_buildingm_v);
    $statement->bindParam(':evn_notes_p', $evn_notes_v);
    $statement->execute();
    $statement->closeCursor();

    // Get the last product ID that was automatically generated 
    $last_auto_increment_id = $db->lastInsertId();

    //test last auto increment id value, comment when done testing
    // exit ($last_auto_increment_id);



//include('index.php'); //forwarding is faster, one trip to server
header('Location: index.php'); //sometimes, redirecting is needed (two trips to server)
}

catch (PDOException $e)
    {
    $error = $e->getMessage();
    echo $error;  
    }
}
?>
