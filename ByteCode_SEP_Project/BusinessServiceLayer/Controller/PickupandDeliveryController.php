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


    
}

?>
    













