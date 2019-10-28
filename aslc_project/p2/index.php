<?php
//database connection code goes here...
require_once "global/connection.php";

//get events sortd by cus id
$query = "SELECT * FROM events ORDER BY evn_id";

//because no user entered data, no need to bind values
$statement = $db -> prepare($query);
$statement -> execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="An online database that helsp keep track of Events at the ASLC.">
	<meta name="author" content="Davud Dautbasic and Christopher Mell">
	<link rel="icon" href="images/favicon.ico">

		<title>ASLC Events Database</title>
		<?php include_once("../css/include_css_data_tables.php"); ?>
</head>
<body>

	<?php include_once("/global/nav.php"); ?>
	
	<div class="container-fluid">
		 <div class="starter-template">
						<div class="page-header">
							<?php include_once("global/header.php"); ?>	
						</div>

						<h2>ASLC Events</h2>

<a href="add_event.php">Add an Event</a>
<br />

 <div class="table-responsive">
	 <table id="myTable" class="table table-striped table-condensed" >

		 <!-- Code displaying event data with Edit/Delete buttons goes here // -->
		<thead>
		<tr>
		<th>Name</th>
		<th>Type</th>
		<th>Organization</th>
		<th>Location</th>
		<th>Number of Students</th>
		<th>Number of Staff</th>
		<th>Date of Event</th>
		<th>Length of Event</th>
		<th>Building Manager</th>
		<th>Notes</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
		</tr>
		<thead>
		
		<?php
		$result = $statement ->fetch();
		while($result !=null)
		{
			?>
			<!-- event info -->
			<tr>
			<td><?php echo htmlspecialchars($result['evn_name']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_type']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_org']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_location']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_stu']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_sta']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_vol']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_length']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_buildingm']); ?></td>
			<td><?php echo htmlspecialchars($result['evn_notes']); ?></td>

			<!-- create form button and hidden input to pass event info to delete event. //-->
			<td>
				<form 
				onsubmit="return confirm('Do you really want to delete record?');"
				action="delete_event.php"
				method="post"
				id="delete_event">
					<input type="hidden" name="evn_id" value="<?php echo $result['evn_id']; ?>"/>
					<input type="submit" value="Delete"/>
				</form>
			</td>
			<!-- Create form button and hidden input fields to pass event and category info to edit event. //-->
			<td>
				<form action="edit_event.php" method="post" id="edit_event">

				<input type="hidden" name="evn_id" value="<?php echo $result['evn_id']; ?>"/>
				<input type=submit value="Edit" />
				</form>
			</td>

			</tr>

			<?php
				$result = $statement -> fetch();
		}
		$statement -> closeCursor();
		$db = null;
		?>

	 </table>
 </div> <!-- end table-responsive -->
 	
<?php
include_once "global/footer.php";
?>

			</div> <!-- end starter-template -->
  </div> <!-- end container -->

	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
		<?php include_once("../js/include_js_data_tables.php"); ?>	

		<script type="text/javascript">
	 $(document).ready(function(){
		 $('#myTable').DataTable({
				 responsive: true,				 
				 //https://datatables.net/reference/option/lengthMenu
				 //1st inner array: number of actual records displayed
				 //2nd inner array: number listed in the drop-down menu
				 //Note: -1 is used to disable pagination (i.e., display all rows), use with "All"
				 //Note: pageLength property automatically set to first value given in array: here, 10
				 "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
	 //permit sorting (i.e., no sorting on last two columns: delete and edit)
    "columns":
		[
      null,
      null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
		null,
     { "orderable": false },
     { "orderable": false }			
    ]
		 });
});
	</script>

</body>
</html>
