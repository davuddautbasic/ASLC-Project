<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="MySQL Database Server Information.">
	<meta name="author" content="Davud Dautbasic and Christopher Mell">
	<link rel="icon" href="images/favicon.ico">

	<title>MySQL Database Server Information</title>

<!-- Include FontAwesome CSS to use feedback icons provided by FontAwesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Bootstrap for responsive, mobile-first design. -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Starter template for your own custom styling. -->
<link href="css/starter-template.css" rel="stylesheet">

<!-- jQuery DataTables: http://www.datatables.net/ //-->
<link rel="stylesheet" type=""text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type=""text/css" href="//cdn.datatables.net/responsive/1.0.7/css/dataTables.responsive.css"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<?php include_once("/global/nav.php"); ?>
	<div class="container">
			<div class="row">
					<div class=".col-xs-12 col-sm-offset-2">
						<div class="page-header">
							<h2>MySQL Database Server Information</h2>
						</div>

<!-- Responsive table.  -->						
<div class="table-responsive">
<table id="myTable" class="table table-striped table-condensed" >

<?php
require_once "./global/connection.php";

//find out which PDO drivers are available
//print_r(PDO::getAvailableDrivers());

$attributes = 
array("AUTOCOMMIT", "CLIENT_VERSION", "CONNECTION_STATUS", "SERVER_INFO", "SERVER_VERSION");
		
foreach ($attributes as $val) 
{
		echo "<tr><th>$val:</th></tr>";
?>

<?php
		echo "<tr><td>" . $db->getAttribute(constant("PDO::ATTR_$val")) . "</td></tr>";
?>

  <?php
	}
    $db = null; 
  ?>

	 </table>
 </div> <!-- end table-responsive -->

<?php
include_once "global/footer.php";
?>
					</div>
			</div>
	</div>

	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
