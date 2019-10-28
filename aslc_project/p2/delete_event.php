<?php
//show errors: atleast 1 and 4...
ini_set('display_errors', 1);
//ini set logs
//ono set error
//error_reporting(E_ALL);

//Get item ID
$evn_id_v = $_POST['evn_id'];
require_once('global/connection.php');

//delete from database
$query = 
"DELETE FROM events 
WHERE evn_id = :evn_id_p";

try
{
    $statement = $db->prepare($query);
    $statement->bindParam(':evn_id_p', $evn_id_v);
    $row_count = $statement->execute();
    $statement->closeCursor();

    header('Location: index.php');
}

catch (PDOException $e)
{
    $error = $e->getMessage();
    echo $error;
}
?>