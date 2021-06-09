<?php include '../../src/navbar1.php';?>
<?php
    require_once '../../BusinessServiceLayer/Controller/CustomerRequestController.php';
    require_once '../../BusinessServiceLayer/Controller/PaymentController.php';

    session_start();

    //To retrieve the quotation details
    $req = new PaymentController();
    $data = $req->viewAll();

    //Update payment as "Success" (PayPal)
    $pay = new PaymentController();
    if(isset($_POST['add'])){
        $pay->add();
    }

    //Update payment as "Pending" (Cash On Delivery)
    $pay = new PaymentController();
    if(isset($_POST['updatePending'])){
        $pay->updatePending();
    }

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Customer Checkout</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <script src="https://www.paypal.com/sdk/js?client-id=AZtgi4JKNGstpcXVtVQHlc2rwZuZ8-2D43ImgD4TTzwLpcM82dUgnG4D4DdmGX_cMJAZoA3LVs859h6z&currency=MYR"></script>
        
        <script>paypal.Buttons().render('body');</script>

        <style>
            td {
                text-align: center;
            }
            input {
                text-align: center;
            }
        </style>
    </head>
    <body>

        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Payment Page</h3>
        <br><br>

            <div style="margin-left: 1.5em;">
                <!--Retrieve the quotation details form begin-->
                <table border="1">
                    <tr>
                        <td width="150"><center><b>Device Model</b></center></td>
                        <td width="150" ><center><b>Device Color</b></center></td>
                        <td width="130"><center><b>Device Damage</b></center></td>
                        <td width="100"><center><b>Device Symptom</b></center></td>
                        <td colspan="2" width="100"><center><b>Action</b></center></td>
                    </tr>
                    <?php 
                    foreach($data as $row){ ?>
                    <form action="" method="POST">
                    <tr>
                    
                        <td><input type="text" name="DeviceModel" value="<?=$row['DeviceModel']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceColor" value="<?=$row['DeviceColor']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceDamage" value="<?=$row['DeviceDamage']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceSymptom" value="<?=$row['DeviceSymptom']?>" class="noborder" readonly></td>
                        
                                <?php
                                    $PaymentTotal =$row['Sercharge']+$row["ItemPrice"];

                                ?>
                        <td><input type="text" name="PaymentTotal" value="<?=number_format($PaymentTotal,2); ?>"></td>
                        <td style="text-align: center;">
                        <input type="hidden" name="Quotation_ID" value="<?=$row['Quotation_ID']?>">
                                <input type="button" onclick="window.location.href='PaymentPending.php';" name="updatePending" value="COD">
                        </td>
                    <?php } ?>
                    </tr>
                </table>
                <!--Retrieve the quotation details form end-->
                <br><br><br><br><br>

                <!-- PAYPAL BUTTON START -->
                <div id="paypal-button-container" style="padding-left: 570px"></div>
                    <script>
                      paypal.Buttons({
                        createOrder: function(data, actions) {
                  // This function sets up the details of the transaction, including the amount and line item details.
                  return actions.order.create({
                    purchase_units: [{
                      amount: {
                        currency_code: 'MYR',
                        value: '<?= $PaymentTotal ?>'
                      }
                    }]
                  });
                },
                onError: function(error) {
                  console.log(error);                      
                },
                onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                  // This function shows a transaction success message to your buyer.
                  alert('Transaction completed by ' + details.payer.name.given_name);
                  window.location.href = "../../ApplicationLayer/PaymentInterface/PaymentSuccesful.php?CUS_ID=<?=$_SESSION['CUS_ID']?>"                  
                });
              }
            }).render('#paypal-button-container');
          </script>
            </div>
            <!-- PAYPAL BUTTON END -->
            </form>
            </center>
    </body>
</html>