

<!DOCTYPE html>
<html lang="en">
<head>
<!--
                 "Time-stamp: <Sun, 05-27-18, 19:34:59 Eastern Daylight Time>"
//-->
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Allows users to add events to the database.">
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

                    <h2>Add Event</h2>

                        <form id="add_store_form" method="post" class="form-horizontal" action="add_event_process.php">
                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Event Name:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="name" placeholder="Ex: Table Top Tuesday" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Type:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="type" placeholder="Ex: Special Events" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Organization:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="org" placeholder="Ex: University Housing" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Location:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="location" placeholder="Ex: 101B" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Number of Students:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="stu" placeholder="Ex: 110" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Number of Staff:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="sta" placeholder="Ex: 10"/>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of Event:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="vol" placeholder="Ex: 04-27-2019" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Length of Event:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="length" placeholder="Ex: 8:00pm - 10::pm" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Building Manager:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="buildingm" placeholder="Ex: Josh Carbee" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Notes:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="notes" />
                                        </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5 col-sm-offset-3">
                                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add</button>
                                        </div>
                                </div>
                        </form>

            <?php include_once "global/footer.php"; ?>
           
        </div> <!-- end starter-template -->
</div> <!-- end container -->

   
    <!-- Bootstrap JavaScript
    ================================================== -->
    <!-- Placed at end of document so pages load faster -->
            <?php include_once("js/include_js.php"); ?>

</body>
</html>
