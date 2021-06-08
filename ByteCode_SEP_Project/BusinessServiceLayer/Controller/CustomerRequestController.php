<?php
require_once '../../BusinessServiceLayer/model/ManageCustomerRequestModel.php';

class ManageCustomerRequestController{
    
    //to save customer request in database
    function RequestQuote(){
        $req = new ManageCustomerRequestModel();
        $req->Cus_ID = $_SESSION['Cus_ID'];
	    $req->DeviceColor = $_POST['DeviceColor'];
        $req->DeviceModel = $_POST['DeviceModel'];
	    $req->DeviceSymptom = $_POST['DeviceSymptom'];
        $req->DeviceDamage = $_POST['DeviceDamage'];
        $req->DateRequest = $_POST['DateRequest'];

        if($req->RequestQuotation() > 0){
            $message = "Success Insert!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/CustomerRequest/CustomerRequest.php?Cus_ID=".$_SESSION['Cus_ID']."';</script>";
        }
    }

    //view all the quotation waiting for staff to accept
    function viewAllQuote(){
        $req = new ManageCustomerRequestModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->viewAllQuotation();
    }

    //customer can view their quotation
    function CviewQuote($Cus_ID){
        $req = new ManageCustomerRequestModel();
        $req->Cus_ID = $_SESSION['Cus_ID'];
        return $req->CviewAllQuotation();
        
    }

    //for staff to view the specific quotation from the list
    function viewSpeQuote($Quotation_ID){
        $req = new ManageCustomerRequestModel();
        $req->Quotation_ID = $Quotation_ID;
        return $req->viewSpeQuotation();
    }

    //for staff to accept quotation
    function acceptQuote(){
        $req = new ManageCustomerRequestModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->acceptQuotation()){
            $message = "Accepted!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/CustomerRequest/AcceptDetails.php?Quotation_ID=".$_SESSION['Quotation_ID']."';</script>";
        }
    }

    //for staff to reject quotation
    function rejectQuote(){
        $req = new ManageCustomerRequestModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->rejectQuotation()){
            $message = "Rejected!";
		    echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/HomePage/StaffHomePage.php';</script>";
        }
    }

    //staff will need to generate a quotation (item details and price)
    function generateQuote($Quotation_ID){
        $req = new ManageCustomerRequestModel();
        $req->Quotation_ID = $_POST['Quotation_ID'];
	    $req->ItemName = $_POST['ItemName'];
        $req->ItemQuantity = $_POST['ItemQuantity'];
	    $req->ItemPrice = $_POST['ItemPrice'];
        $req->ItemDesc = $_POST['ItemDesc'];
        $req->Sercharge = $_POST['Sercharge'];
        $req->RepairPrice = $_POST['RepairPrice'];
        $req->ItemNote = $_POST['ItemNote'];
        if($req->generateQuotation()){
            $message = "Quotation sucessfully generated and has been send to the customer!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/HomePage/StaffHomePage.php';</script>";
        }
    }

    function viewAll(){
        $req = new ManageCustomerRequestModel();
        $req->Cus_ID = $_SESSION['Cus_ID'];
        return $req->viewAll();
    }

   


    
}

?>
    
