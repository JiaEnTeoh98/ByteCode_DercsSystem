<?php
    require_once '../../BusinessServiceLayer/Controller/CustomerRequestController.php';
    require_once '../../BusinessServiceLayer/Controller/PaymentController.php';

    session_start();

    $req = new ManageCustomerRequestController();
    $data = $req->viewAll();

    $pay = new PaymentController();
    if(isset($_POST['add'])){
        $pay->add();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Payment Payment Interface</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                text-align: center;
            }

            .logout {
            position: fixed;
            right: 0;
            margin-right: 5px;
            margin-top: 5px;
            }

            .gotocart {
                position: fixed;
                right: 25px;
                bottom: 15px;
                background-color: red;
                border-radius: 50%;
            }

            input {
                text-align: center;
            }
        </style>
    </head>
    <body>

        <center>
        <h3 style="margin-left: 1em; margin-top: 1em; text-decoration: underline;">Customer View Food Service</h3>
        <br><br>

            <div style="margin-left: 1.5em;">

                <table border="1">
                    <tr>
                        <td width="150"><center><b>Device Model</b></center></td>
                        <td width="150" ><center><b>Device Color</b></center></td>
                        <td width="130"><center><b>Device Damage</b></center></td>
                        <td width="100"><center><b>Device Symptom</b></center></td>
                        <td colspan="2" width="100"><center><b>Action</b></center></td>
                    </tr>
                    <?php foreach($data as $row){ ?>
                    <form action="" method="POST">
                    <tr>
                    
                        <td><input type="text" name="DeviceModel" value="<?=$row['DeviceModel']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceColor" value="<?=$row['DeviceColor']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceDamage" value="<?=$row['DeviceDamage']?>" class="noborder" readonly></td>
                        <td><input type="text" name="DeviceSymptom" value="<?=$row['DeviceSymptom']?>" class="noborder" readonly></td>
                        <td style="text-align: center;">
                        <input type="hidden" name="Quotation_ID" value="<?=$row['Quotation_ID']?>">
                                <button type="submit" name="add"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Confirm </button>
                        </td>
                    </form>
                    <?php } ?>
                    </tr>
                </table>
                <p>Pay By:</p>
            <div class="payment-method" data-bind="css: {'_active': (getCode() == isChecked())}">
    <div class="payment-method-title field choice">
        <input type="radio"
               name="payment[method]"
               class="radio"
               data-bind="attr: {'id': getCode()}, value: getCode(), checked: isChecked, click: selectPaymentMethod, visible: isRadioButtonVisible()" />
        <label data-bind="attr: {'for': getCode()}" class="label"><span data-bind="text: getTitle()"></span></label>
    </div>

    <div class="payment-method-content">
        <p data-bind="html: getInstructions()"></p>   
    <fieldset data-bind="attr: {class: 'fieldset payment items ' + getCode(), id: 'payment_form_' + getCode()}"> 
    <div class="field _required">
        <label data-bind="attr: {for: getCode() + '_codfield1'}" class="label">
        </label>
        <div class="control">
            <input data-validate="{'required-entry':true}" type="text" name="payment[codfield1]" class="input-text" value=""
                   data-bind="attr: {
                                    id: getCode() + '_codfield1',
                                    title: $t('COD Field'),
                                    'data-container': getCode() + '-codfield1',
                                    'data-validate': JSON.stringify({'required':true})},
                                    valueUpdate: 'keyup' "/>
        </div>

        <div class="control">
             <select  data-validate="{'required-entry':true}" 
                    data-bind="attr: {
                       id: getCode() + '_codfield2',
                      },
                      options: optionsList(),
                      optionsText: 'name',
                      optionsValue:'id',
                     optionsCaption: 'Choose...'">
             </select>   
        </div>
    </div>
    </fieldset>

        <div class="payment-method-billing-address">
        </div>      
        <div class="checkout-agreements-block">
        </div>
        <div class="actions-toolbar">
            <div class="primary">
                <button class="action primary checkout"
                        type="submit"
                        data-bind="
                        click: placeOrder,
                        attr: {'title': $t('Place Order')},
                        enable: (getCode() == isChecked()),
                        css: {disabled: !isPlaceOrderActionAllowed()}
                        "
                        disabled>
                    <span data-bind="i18n: 'Place Order'"></span>
                </button>
            </div>
        </div>
    </div>
</div>
        <div id="paypal-button-container"></div>
        </div>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: 'MYR',
                                value: '<?= $totalpricedelivery ?>',
                            },
                            shipping: {
                                name: {
                                    full_name: '<?= $address["custusername"]; ?>'
                                },
                                address: {
                                    address_line_1: '<?= $address["custaddress1"]; ?>',
                                    address_line_2: '<?= $address["custaddress2"]; ?>',
                                    admin_area_2: '<?= $address["custaddress3"]; ?>',
                                    admin_area_1: '<?= $address["custaddress4"]; ?>',
                                    postal_code: '',
                                    country_code: 'MY'
                                }
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction Successful!');
                        window.location.href = "./paymentSuccessful.php?custID=<?=$_SESSION['custID']?>";


                    });
                }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
        </script>
            </div>
    </center> 
    </body>
</html>