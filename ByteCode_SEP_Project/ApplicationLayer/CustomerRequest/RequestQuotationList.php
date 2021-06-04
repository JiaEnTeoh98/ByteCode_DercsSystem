<?php
    require_once '../../BusinessServiceLayer/Controller/CustomerRequestController.php';
    

    session_start();

    $req = new ManageCustomerRequestController();
    $data = $req->viewAllQuote();

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>REQUEST QUOTATION LIST</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
             th, td {
        padding: 5px;
        vertical-align: top;
        text-align: left;
        border:1px solid black;    
        }

        

        .Rbutton{
            background-color:#279EFC ;
            color:white;
            border-radius:4px;
            border-width:1px;
            height:25px;
            width:100px;
            font-family:Times New Roman;
        }
        </style>
    </head>
    <body>
        <!-- <div class="topnav">
            <a href="./serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
            
            <div class="topnav-right">
                <a href="../../ApplicationLayer/manageUserProfile/serviceproviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>
        </div> -->

        <div class="logout"><a href="../manageLoginAndRegister/userLogin.php">Logout</a></div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">REQUEST QUOTATION LIST</h3>
        <br><br>


                <table border="1">
                <thead>
                    <th>Quotation ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Date Request</th>
                    <th></th>
                    <?php foreach($data as $row){ ?>
                    <tr>
                        
                        <td><?=$row['Quotation_ID']?></td>
                        <td><?=$row['CustName']?></td>
                        <td><?=$row['CustPhoneNo']?></td>
                        <td><?=$row['DateRequest']?></td>
                        <form action="" method="POST">
                            <td style="text-align: center;">
                            <td><button type="submit" name="ViewDetails" value="ViewDetails" class="Rbutton" onclick="location.href='AcceptDetails.php?Quotation_ID=<?=$row['Quotation_ID']?>'">View Deatils</td>
                            </td>
                        </form>
                    <?php } ?>
                    </tr>
                </table>
            </div>
           
        </center>
    </body>
</html>
