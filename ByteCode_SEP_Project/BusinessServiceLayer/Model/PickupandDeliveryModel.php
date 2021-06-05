<?php
require_once '../../libs/database.php';

class PickupandDeliveryModel{

    public $Quotation_ID, $Cus_ID ,$CustName, $CustPhoneNo, $CustAddress, $DeviceModel, $DeviceColor, $DeviceSymptom, $DeviceDamage, $DateRequest, $PickupStatus, $DeliveryStatus, $TrackPickup, $TrackDelivery;
    public $Item_ID, $ItemName, $ItemQuantity ,$ItemPrice, $ItemDesc,$Sercharge,$RepairPrice, $ItemNote;

    
    //
    function RviewAllPickupQuotation(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE QuotationStatus LIKE '%Accepted%' and ServiceType LIKE '%Pickup%'";
        //"select quotation.Quotation_ID, quotation.DateRequest,Customer.CustName, Customer.CustPhoneNo from quotation join customer on Quotation.Cus_ID=Customer.Cus_ID where quotation.Quotation_ID=:Quotation_ID AND QuotationStatus LIKE '%Pending%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //
    function RviewAllDeliveryQuotation(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE QuotationStatus LIKE '%Accepted%' and ServiceType LIKE '%Delivery%'";
        //"select quotation.Quotation_ID, quotation.DateRequest,Customer.CustName, Customer.CustPhoneNo from quotation join customer on Quotation.Cus_ID=Customer.Cus_ID where quotation.Quotation_ID=:Quotation_ID AND QuotationStatus LIKE '%Pending%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    function SviewAllPickupInvoice(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE PickupStatus LIKE '%Accepted%'";
        //"select quotation.Quotation_ID, quotation.DateRequest,Customer.CustName, Customer.CustPhoneNo from quotation join customer on Quotation.Cus_ID=Customer.Cus_ID where quotation.Quotation_ID=:Quotation_ID AND QuotationStatus LIKE '%Pending%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //
    function SviewAllDeliveryInvoice(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE DeliveryStatus LIKE '%Accepted%'";
        //"select quotation.Quotation_ID, quotation.DateRequest,Customer.CustName, Customer.CustPhoneNo from quotation join customer on Quotation.Cus_ID=Customer.Cus_ID where quotation.Quotation_ID=:Quotation_ID AND QuotationStatus LIKE '%Pending%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    function CviewAllPickupStatus(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE Cus_ID=Cus_ID";
        //"select quotation.Quotation_ID, quotation.DateRequest,Customer.CustName, Customer.CustPhoneNo from quotation join customer on Quotation.Cus_ID=Customer.Cus_ID where quotation.Quotation_ID=:Quotation_ID AND QuotationStatus LIKE '%Pending%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //
    function CviewAllDeliveryStatus(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE WHERE Cus_ID=Cus_ID";
        //"select quotation.Quotation_ID, quotation.DateRequest,Customer.CustName, Customer.CustPhoneNo from quotation join customer on Quotation.Cus_ID=Customer.Cus_ID where quotation.Quotation_ID=:Quotation_ID AND QuotationStatus LIKE '%Pending%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    
}
?>
