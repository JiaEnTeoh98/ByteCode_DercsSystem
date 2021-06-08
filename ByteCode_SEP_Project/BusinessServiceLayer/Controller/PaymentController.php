<?php
require_once '../../BusinessServiceLayer/Model/PaymentModel.php';

class PaymentController{

    function add(){
        $pay = new PaymentModel();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        $pay->Quotation_ID = $_POST['Quotation_ID'];
        $pay->PaymentTotal = $_POST['PaymentTotal'];
    
        if($pay->addPayment()){
            $message = "Success Insert!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/managePayment/paymentCheckout.php?custID=".$_SESSION['custID']."';</script>";
        }
    }

    function viewAll(){
        $req = new PaymentModel();
        $req->Cus_ID = $_SESSION['Cus_ID'];
        return $req->viewAll();
    }

    //update the cart status
    function updateSuccess(){
        $notification = new PaymentModel();
        $notification->Cus_ID = $_SESSION['Cus_ID'];
        $notification->updateSuccess();
    }

    function updatePending(){
        $notification = new PaymentModel();
        $notification->Cus_ID = $_SESSION['Cus_ID'];
        $notification->updatePending();
    }
    






}
