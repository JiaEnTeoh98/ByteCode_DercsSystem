<?php
require_once '../../BusinessServiceLayer/Model/PaymentModel.php';

class PaymentController{

    function viewpay($Quotation_ID){
        $pay = new PaymentModel();
        $pay->Quotation_ID = $Quotation_ID;
        return $pay->viewpay();
    }

    function add(){
        $pay = new PaymentModel();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        $pay->Quotation_ID = $_POST['Quotation_ID'];
    
        if($pay->addPayment()){
            $message = "Success Insert!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/managePayment/paymentCheckout.php?custID=".$_SESSION['custID']."';</script>";
        }
    }



}
