<?php
require_once '../../BusinessServiceLayer/Controller/PaymentController.php';
$pay = new PaymentController();

$Quotation_ID=$_GET['Quotation_ID'];

if(isset($_POST['pay'])){
    $pay->viewpay('Quotation_ID');
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>pay</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/logo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style>
            p {
                font-size: 20px;
                text-align: center;
            } 

            .loginBtn {
                background-color: rgb(140, 140, 175);
                color: white;
                padding: 10px 10px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .loginBtn:hover {
                opacity: 1;
            }

            .showPwd {
                font-size: medium;
                padding-top: 5px;
                text-align: right;
            }

            .register {
                color: blue;
            }

            .register:hover {
                color : rgb(0, 81, 255);
                text-decoration: none; 
                cursor: pointer;
                opacity: 0.9;
            }
        </style>
    </head>


    <body>

        <br>
        <p><strong>Pay</strong>:</p>
        <br>

        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="Quotation_ID" placeholder="Quotation ID" required>
                    </div>
                    <br>
                    <button name="pay" class="btn btn-primary"><a href="../PaymentInterface/PaymentInterface.php?Quotation_ID=<?=$_SESSION['Quotation_ID']?>" style="text-decoration: none; color: white;">Pay</a></button>
                </div>  
            </div>
        </form>
        <br>
    </body>
</html>