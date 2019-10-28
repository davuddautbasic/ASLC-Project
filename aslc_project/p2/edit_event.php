<!DOCTYPE html>
<html lang="en">
<head>
<!--
				 "Time-stamp: <Sun, 05-27-18, 19:34:59 Eastern Daylight Time>"
//-->
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Edits content for the online ASLC Database">
	<meta name="author" content="Davud Dautbasic and Christopher Mell">
	<link rel="icon" href="images/favicon.ico">

	<title>ASLC Events Database</title>
		<?php include_once("../css/include_css.php"); ?>
</head>
<body>

	<?php include_once("/global/nav.php"); ?>

	<div class="container">
		<div class="starter-template">
					
					<div class="page-header">
						<?php include_once("global/header.php"); ?>	
					</div>

					<h2>Events</h2>

						<form id="edit_events" method="post" class="form-horizontal" action="edit_event_process.php">

                        <?php

                        require_once "global/connection.php";

                        $evn_id_v = $_POST['evn_id'];

                        $query = 
                        "SELECT *
                        FROM events
                        WHERE evn_id = :evn_id_p";

                        $statement = $db->prepare($query);
                        $statement->bindParam(':evn_id_p', $evn_id_v);
                        $statement->execute();
                        $result = $statement->fetch();
                        while($result != null)
                        {
                        ?>
                            <input type="hidden" name="evn_id" value="<?php echo $result['evn_id']; ?>" />
                            
                            <div class="form-group">
										<label class="col-sm-4 control-label">Event Name:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="name" value="<?php echo $result['evn_name']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Type:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="type" value="<?php echo $result['evn_type']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Organization:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="org" value="<?php echo $result['evn_org']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Location:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="location" value="<?php echo $result['evn_location']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Number of Students:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="stu" value="<?php echo $result['evn_stu']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Number of Staff:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="sta" value="<?php echo $result['evn_sta']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Date of Event:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="vol" value="<?php echo $result['evn_vol']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Length of Event:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" name="length" value="<?php echo $result['evn_length']; ?>" />
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Building Manager:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" nmaxlength="21" name="buildingm" value="<?php echo $result['evn_buildingm']; ?>"/>
										</div>
								</div>

								<div class="form-group">
										<label class="col-sm-4 control-label">Notes:</label>
										<div class="col-sm-4">
												<input type="text" class="form-control" maxlength="255" name="notes" value="<?php echo $result['evn_notes']; ?>"/>
										</div>
								</div>

                                <?php
                                $result = $statement->fetch();
                        }
                        $db = null;
                        ?>

								<div class="form-group">
									<div class="col-sm-6 col-sm-offset-3">
									<button type="submit" class="btn btn-primary" name="edit" value="edit">Update</button>
										</div>
								</div>
						</form>

			<?php include_once "global/footer.php"; ?>
			
		</div> <!-- end starter-template -->
 </div> <!-- end container -->
                        }


	
	<!-- Bootstrap JavaScript
	================================================== -->
	<!-- Placed at end of document so pages load faster -->
			<?php include_once("../js/include_js.php"); ?>
<!--
<script type="text/javascript">
 //See Regular Expressions: http://www.qcitr.com/usefullinks.htm#lesson7
 $(document).ready(function() {

	$('#edit_petstore').formValidation({
			message: 'This value is not valid',
			icon: {
					valid: 'fa fa-check',
					invalid: 'fa fa-times',
					validating: 'fa fa-refresh'
			},
			fields: {
					evn_name: {
							validators: {
									notEmpty: {
									 message: 'Name required'
									},
									stringLength: {
											min: 1,
											max: 30,
									 message: 'Name no more than 30 characters'
									},
									regexp: {
										//alphanumeric, hyphens, underscores, and spaces
										//regexp: /^[a-zA-Z0-9\-_\s]+$/,										
										//similar to: (though, \w supports other Unicode characters)
										regexp: /^[\w\-\s]+$/,
										message: 'Name can only contain letters, numbers, hyphens, and underscore'
									},									
							},
					},

					evn_Type: {
							validators: {
									notEmpty: {
											message: 'Type required'
									},
									stringLength: {
											min: 1,
											max: 30,
											message: 'Type no more than 30 characters'
									},
									regexp: {
										//Type: only letters, numbers, commas, space character, and periods
										regexp: /^[a-zA-Z0-9,\s\-\.]+$/,		
									message: 'Type can only contain letters, numbers, commas, or periods'
									},									
							},
					},
					
					evn_city: {
							validators: {
									notEmpty: {
											message: 'City required'
									},
									stringLength: {
											min: 1,
											max: 30,
											message: 'City no more than 30 characters'
									},
									regexp: {
										//city: only letters, numbers, hyphens, and space character.
										regexp: /^[a-zA-Z0-9,\-\s]+$/,		
									message: 'City can only contain letters, numbers and space character (29 Palms)'
									},									
							},
					},
					
					evn_state: {
							validators: {
									notEmpty: {
											message: 'State required'
									},
									stringLength: {
											min: 2,
											max: 2,
											message: 'State must be 2 characters'
									},
									regexp: {
										//state: only letters.
										regexp: /^[a-zA-Z]+$/,		
									message: 'State can only contain letters.'
									},									
							},
					},
					
					evn_zip: {
							validators: {
									notEmpty: {
											message: 'Zip required, only numbers'
									},
									stringLength: {
											min: 5,
											max: 9,
											message: 'Zip must be 5, and no more than 9 digits'
									},
									regexp: {
										//zip: only numbers.
										regexp: /^[0-9]+$/,		
									message: 'Zip can only contain numbers'
									},									
							},
					},
					
					evn_phone: {
							validators: {
									notEmpty: {
											message: 'Phone required, including area code, only numbers'
									},
									stringLength: {
											min: 10,
											max: 10,
											message: 'Phone must be 10 digits'
									},
									regexp: {
										//phone: only numbers.
										regexp: /^[0-9]+$/,		
									message: 'Phone can only contain numbers'
									},									
							},
					},
					
					evn_email: {
							validators: {
									notEmpty: {
											message: 'Email address is required'
									},
									
									/*
									//built in email validator, comes with formvalidation.min.js
									//using regexp instead
									emailAddress: {
										message: 'Must include valid email address'
									},
									*/

									stringLength: {
											min: 1,
											max: 100,
											message: 'Email no more than 100 characters'
									},
									regexp: {
										//email: only letters, numbers, hyphens, and space character.
										regexp: /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/,					
									message: 'Must include valid email'
									},									
							},
					},
					evn_url: {
							validators: {
									notEmpty: {
											message: 'URL required'
									},
									stringLength: {
											min: 1,
											max: 100,
											message: 'URL no more than 100 characters'
									},
									regexp: {
										//url: only letters, numbers, hyphens, and space character.
										regexp: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/,		
									message: 'Must include valid URL'
									},									
							},
					},
					evn_ytdsales: {
							validators: {
									notEmpty: {
											message: 'YTD Sales required'
									},
									stringLength: {
											min: 1,
											max: 11,
											message: 'YTD sales can be no more than 10 digits, including decimal point'
									},
									regexp: {
										//YTD Sales: only numbers, and decimal points.
										regexp: /^[0-9\.]+$/,		
									message: 'YTD sales can only contain numbers and decimal point'
									},									
							},
					},
					evn_notes: {
                        validators: {
                            stringLength: {
                                min: 0,
                                max: 255,
                                message: 'Notes'
                            },
                            regexp: {
                                //Type: only letters, numbers, comma, space character, and period
                                regexp: /^[a-zA-Z0-9,\s\.]+$/,
							},									
						},
					},
			}
	});
});
</script>
-->

</body>
</html>