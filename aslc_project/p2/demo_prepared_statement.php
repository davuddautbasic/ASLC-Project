<?php
/*
	 Notes: steps when using prepared statements.
*/

//pull in database connection
require_once "global/connection.php";

//find out which PDO drivers are available
//print_r(PDO::getAvailableDrivers());

/*
Why prepared statements?
1) Prevent SQL injection.
2) Process faster.

Resource (and many others): http://www.php.net/pdo.prepared-statements
*/

//capture cus ID from view_customer_form.php page
//$cus_id_v = $_POST['cus_id'];

//for demo purposes (pretending the value "1" came from user-entered form)
$cus_id_v = 1;

// 1) create named placeholder (:cus_id_v), named placeholders begin with colon (:)
$query = 
"SELECT *
FROM customer
WHERE cus_id = :cus_id_v";

//display query statement, then exit (for testing purposes only)
//exit($query);

// 2) prepare(): Prepares a statement for execution and returns a statement object
//The SQL statement can contain zero or more named (:name) or question mark (?) parameter markers 
//for which real values will be substituted when the statement is executed.
$statement = $db->prepare($query);

// 3) bindValue(): Binds a value to a parameter
$statement->bindValue(':cus_id_v', $cus_id_v);

// 4) Executes a prepared statement
$statement->execute();

/*
NOTE: In general, prepared statements only protect from SQL injection when using bindParam or bindValue option.
However, it is possible to pass an array of values that would also be secured against SQL injection. 
In this case you do not necessarily have to use bindParam() or bindValue().
http://www.php.net/manual/en/pdo.prepare.php
*/

// 5) fetch(): Fetches next row from a result set (best to use fetch() than fetchAll() with large data sets)
//retrieve customer first name associated with $query (also, works well for many rows returned)
$result = $statement->fetch();
while($result != null)
{
  echo $result['cus_lname']. "<br />";
  $result = $statement->fetch();
}

// 6) Closes cursor, enabling statement to be executed again
$statement->closeCursor();

// 7) resource clean-up: close connection, return memory back to server
$db = null; 
?>
