<?php
require_once '../../libs/database.php';

class PickupandDeliveryModel{

    public $Quotation_ID, $Cus_ID ,$CustName, $CustPhoneNo, $CustAddress, $DeviceModel, $DeviceColor, $DeviceSymptom, $DeviceDamage, $DateRequest, $PickupStatus, $DeliveryStatus, $TrackPickup, $TrackDelivery;
    public $Item_ID, $ItemName, $ItemQuantity ,$ItemPrice, $ItemDesc,$Sercharge,$RepairPrice, $ItemNote;

    
    //for rider to view all pick quotation waiting to accpet
    function RviewAllPickupQuotation(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE QuotationStatus LIKE '%Accepted%' and ServiceType LIKE '%Pickup%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //for rider to view all delivery quotation waiting to accpet
    function RviewAllDeliveryQuotation(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE QuotationStatus LIKE '%Accepted%' and ServiceType LIKE '%Delivery%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

     //for staff to view all pickup invoice waiting for printing
    function SviewAllPickupInvoice(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE PickupStatus LIKE '%Accepted%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //for staff to view all delivery invoice waiting for printing
    function SviewAllDeliveryInvoice(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE DeliveryStatus LIKE '%Accepted%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //for customer to view pickup status
    function CviewAllPickupStatus(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE Cus_ID=Cus_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //for customer to view delivery status
    function CviewAllDeliveryStatus(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE WHERE Cus_ID=Cus_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //for rider to view specific delivery quotation
    function viewSpeDelivery(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //for rider to accept delivery
    function acceptDelivery(){
        $sql = "update quotation set DeliveryStatus='Accepted' where Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql,$args);
    }

    //for rider to reject delivery
    function rejectDelivery(){
        $sql = "update quotation set DeliveryStatus='Rejected' where Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql,$args);
    }

    //for rider to view specific pickup quottaion details
    function viewSpePickup(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    //for rider to accept pickup
    function acceptPickup(){
        $sql = "update quotation set PickupStatus='Accepted' where Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql,$args);
    }

    //for rider to reject pickup
    function rejectPickup(){
        $sql = "update quotation set PickupStatus='Rejected' where Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql,$args);
    }

    //for rider to upload delivery Evidence and COD evidence after successful delivered to customer
    function UploadDelEvidence(){
        $sql = "update quotation set DeliveryEvidence=:DeliveryEvidence,CODEvidence=:CODEvidence,TrackDelivery='Done'  where Quotation_ID=Quotation_ID";
        $args = [':DeliveryEvidence'=>$this->DeliveryEvidence,':CODEvidence'=>$this->CODEvidence];
        return DB::run($sql,$args);
    }

    //for rider to upload pickup Evidence after successful pick up from customer
    function UploadPickEvidence(){
        $sql = "update quotation set PickupEvidence=:PickupEvidence ,TrackPickup='Done' where Quotation_ID=Quotation_ID";
        $args = [':PickupEvidence'=>$this->PickupEvidence];
        return DB::run($sql,$args);
    }
    
    
}
?>
