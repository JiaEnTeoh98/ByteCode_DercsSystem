<?php include '../../src/navbar1.php';?>
<?php
    require_once '../../BusinessServiceLayer/controller/CustomerRequestController.php';

    $Quotation_ID = $_GET['Quotation_ID'];

    $req = new ManageCustomerRequestController();
    if(isset($_POST['generate'])){
    $req->generateQuote($Quotation_ID); 
    }

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fill In Acceptance Details</title>
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


        .rbutton{
            background-color:#279EFC ;
            color:black;
            border-color:#C9CCC8;
            border-width:1px;
            height:25px;
            width:100px;
            font-family:Times New Roman;
        }
        </style>
    </head>
    <body>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Please Fill In Acceptance Details</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
            <form action="" method="POST" enctype="multipart/form-data">
            
                <table>
                    <tr>
                        <td>Item</td>
                        <td>Quantity</td>
                        <td>Price (RM)</td>
                        <td>Decsription</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="ItemName" placeholder="ItemName" required></td>
                        <td><input type="number" name="ItemQuantity" placeholder="Item Quantity" required></td>
                        <td><input type="text" name="ItemPrice" placeholder="Item Price" required></td>
                        <td><input type="text" name="ItemDesc" placeholder="Item Desc" required></td>
                    </tr>
                    </table>
                    <br><br>
                    <table>
                    <tr>
                        <td>Service Charge (RM):</td>
                        <td><input type="text" name="Sercharge" placeholder="Service charge" required></td>
                    </tr>
                    <tr>
                        <td>Total Need to Pay:</td>
                        <td><input type="text" name="RepairPrice" placeholder="Repair Price" required></td>
                    </tr>
                    <tr>
                        <td>Additional Notes:</td>
                        <td><input type="text" name="ItemNote" placeholder="Item Note" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;">
                        <br>
                        <input type="hidden" name="Quotation_ID" value="<?=$row['Quotation_ID']?>">
                            <button type="submit" name="generate" class="rbutton">Generate</button>&emsp;
                            <button type="reset"  name="cancel" class="rbutton">Cancel</button>

                            
                        </td>
                        
                    </tr>
                </table>
                      
            </form>
        </div>
    </center>
    </body>
</html>