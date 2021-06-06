<?php
require_once '../../BusinessServiceLayer/model/PickupandDeliveryModel.php';

class PickupandDeliveryController{
    
    function RviewAllPickupQuote(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->RviewAllPickupQuotation();
    }

    function RviewAllDeliveryQuote(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->RviewAllDeliveryQuotation();
    }

    function SviewAllPickupInv(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->SviewAllPickupInvoice();
    }

    function SviewAllDeliveryInv(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->SviewAllDeliveryInvoice();
    }

    function CviewAllPickupStat($Cus_ID){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->CviewAllPickupStatus();
    }

    function CviewAllDeliveryStat(){
        $req = new PickupandDeliveryModel();
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        return $req->CviewAllDeliveryStatus();
    }

    function viewSpeDel($Quotation_ID){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        return $req->viewSpeDelivery();
    }

    function acceptDel(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->acceptDelivery()){
            $message = "Accepted!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/PickupandDelivery/RiderDeliveryStatus.php?Quotation_ID=".$_SESSION['Quotation_ID']."';</script>";
        }
    }

    function rejectDel(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->rejectDelivery()){
            $message = "Rejected!";
		    echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/PickupandDelivery/RiderDeliveryList.php';</script>";
        }
    }

    function viewSpePick($Quotation_ID){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        return $req->viewSpePickup();
    }

    function acceptPick(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->acceptPickup()){
            $message = "Accepted!";
		    echo "<script type='text/javascript'>alert('$message');
		    window.location = '../../ApplicationLayer/PickupandDelivery/RiderPickupStatus.php?Quotation_ID=".$_SESSION['Quotation_ID']."';</script>";
        }
    }

    function rejectPick(){
        $req = new PickupandDeliveryModel();
        $req->Quotation_ID = $Quotation_ID;
        //$req->Quotation_ID = $_SESSION['Quotation_ID'];
        if($req->rejectPickup()){
            $message = "Rejected!";
		    echo "<script type='text/javascript'>alert('$message');
			window.location = '../../ApplicationLayer/PickupandDelivery/RiderPickupList.php';</script>";
        }
    }


    
}

?>
    













