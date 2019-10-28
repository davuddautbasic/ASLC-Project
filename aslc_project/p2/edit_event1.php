

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

    <title>ASLC Events Database/title>
        <?php include_once("/css/include_css.php"); ?>
</head>
<body>

    <?php include_once("/global/nav.php"); ?>

    <div class="container">
        <div class="starter-template">
                   
                    <div class="page-header">
                        <?php include_once("global/header.php"); ?>
                    </div>

                    <h2>ASLC Events</h2>

                        <form id="add_event_form" method="post" class="form-horizontal" action="#">
                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Event Name:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="event" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Type:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="type" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Organization:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="org" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Location:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="location" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Number of Students:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="stu" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Number of Staff:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="sta" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of Event:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="vol" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Length of Event:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="length" />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Building Manager:</label>
                                        <div class="col-sm-5">
                                                <input type="text" class="form-control" name="buildingm" />
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
                                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Signup</button>
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

                    street: {
                            validators: {
                                    notEmpty: {
                                            message: 'Street required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 30,
                                            message: 'Street no more than 30 characters'
                                    },
                                    regexp: {
                                        //street: only letters, numbers, commas, hyphens, space character, and periods
                                        regexp: /^[a-zA-Z0-9,\-\s\.]+$/,       
                                    message: 'Street can only contain letters, numbers, commas, hyphens, or periods'
                                    },                                 
                            },
                    },

                    city: {
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
                                        regexp: /^[a-zA-Z0-9\s]+$/,    
                                    message: 'City can only contain letters, numbers'
                                    },                                 
                            },
                    },

                    state: {
                            validators: {
                                    notEmpty: {
                                            message: 'State required'
                                    },
                                    stringLength: {
                                            min: 2,
                                            max: 2,
                                            message: 'State must be two characters'
                                    },
                                    regexp: {
                                        regexp: /^[a-zA-Z]+$/,     
                                    message: 'State can only contain letters'
                                    },                                 
                            },
                    },

                    zip: {
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
                                        regexp: /^[0-9]+$/,    
                                    message: 'Zip can only contain numbers'
                                    },                                 
                            },
                    },

                    phone: {
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
                                        regexp: /^[0-9]+$/,    
                                    message: 'Phone can only contain numbers'
                                    },                                 
                            },
                    },

                    email: {
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
                                        regexp: /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/, 
                                    message: 'Must include valid email'
                                    },                                 
                            },
                    },

                    url: {
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
                                        regexp: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/,  
                                    message: 'Must include valid URL'
                                    },                                 
                            },
                    },

                    ytdsales: {
                            validators: {
                                    notEmpty: {
                                            message: 'YTD sales is required'
                                    },
                                    stringLength: {
                                            min: 1,
                                            max: 11,
                                            message: 'YTD sales can be no more than 10 digits, including decimal point'
                                    },
                                    regexp: {
                                        regexp: /^[0-9\.]+$/,      
                                    message: 'YTD sales can only contain numbers and decimal point'
                                    },                                 
                            },
                    },
                       
            }
    });
});
</script> 

</body>
</html>
