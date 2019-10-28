

<!DOCTYPE html>
<html lang="en">
<head>
<!--
                 "Time-stamp: <Sun, 05-27-18, 19:34:59 Eastern Daylight Time>"
//-->
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Modification of description.">
    <meta name="author" content="Davud Dautbasic">
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

                        <form id="add_event_form" method="post" class="form-horizontal" action="#">
                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Event Name:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="event" placeholder="Ex: Table Top Tuesday" />
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
                                                <input type="text" class="form-control" name="loction" placeholder="Ex: 101B" />
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
                                                <input type="text" class="form-control" name="vol" placeholder="Ex: 5" />
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

<script type="text/javascript">
//See Regular Expressions: http://www.qcitr.com/usefullinks.htm#lesson7
$(document).ready(function() {

    $('#add_event_form').formValidation({
            message: 'This value is not valid',
            icon: {
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh'
            },
            fields: {
                name: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    type: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    org: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },
                    location: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    stu: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    sta: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    vol: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    length: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    buildingm: {
                            validators: {
                                    notEmpty: {
                                            message: 'Email address is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 100,
                                            message: 'Email no more than 100 characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z0-9\-_\s]+$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },
                       
            }
    });
});
</script>

</body>
</html>
