<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Staff Home Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }
            
        </style>
    </head>
    <body>

        <div class="logout"><a href="../ManageRegistration/StaffLogout.php">Logout</a></div>

        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Staff Home Page</h3>

    </body>
</html>