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


    
}

?>
    













