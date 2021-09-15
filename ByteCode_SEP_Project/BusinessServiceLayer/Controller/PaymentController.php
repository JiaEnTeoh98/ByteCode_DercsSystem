<?php
require_once '../../BusinessServiceLayer/Model/PaymentModel.php';

class PaymentController{

    //Add payment
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

    //Retrieve quotation details from database to display at PaymentInterface
    function viewAll(){
        $req = new PaymentModel();
        $req->Cus_ID = $_SESSION['Cus_ID'];
        return $req->viewAll();
    }

    //update payment status as success into database
    function updateSuccess(){
        $pay = new PaymentModel();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        $pay->updateSuccess();
    }

    //update payment status as pending into database
    function updatePending(){
        $pay = new PaymentModel();
        $pay->Cus_ID = $_SESSION['Cus_ID'];
        $pay->updatePending();
    }
    






}
