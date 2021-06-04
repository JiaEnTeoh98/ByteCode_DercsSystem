<?php
require_once '../../BusinessServiceLayer/model/ManageCustomerRequestModel.php';

class ManageCustomerRequestController{
    
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

    function viewAllQuote(){
        $req = new ManageCustomerRequestModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->viewAllQuotation();
    }

    /* function delete(){
        $req = new manageServiceModel();
        $req->serviceID = $_POST['serviceID'];
        if($req->deleteItem()){
            $message = "Success Delete!";
			echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/manageService/serviceProviderServiceView.php?spID=".$_SESSION['spID']."';</script>";
        }
    }

    

    function viewItem($serviceID){
        $req = new manageServiceModel();
        $req->serviceID = $serviceID;
        return $req->viewPerItem();
    }

    function update(){
        $req = new manageServiceModel();
        $req->serviceID = $_POST['serviceID'];
        $req->reqname = $_POST['reqname'];
        $req->reqprice = $_POST['reqprice'];
	$req->reqdesc = $_POST['reqdesc'];
	$req->reqstock = $_POST['reqstock'];
        $req->servicetype = $_POST['servicetype'];

        if($req->updateItem()){
            $message = "Success Update!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/manageService/serviceProviderServiceView.php?spID=".$_SESSION['spID']."';</script>";
        }
    } */

}

?>
    
