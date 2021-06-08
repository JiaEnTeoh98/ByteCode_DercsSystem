<?php
    require_once '../../libs/database.php';

    class ItemUpdateModel{

        public $Cus_ID, $CustUName, $CustPhoneNo, $CustEmail, $CustAddress,$CustName, $CustPass;
        public $Rider_ID, $RiderUName, $RiderMyKad, $RiderEmail, $RiderName, $RiderPass, $RiderPhoneNo;
        public $Staff_ID, $StaffUName, $StaffPass;
        public $Quotation_ID, $id, $DateRequest, $QuotationStatus, $QuotationNote, $ServiceType, $PickupStatus, 
                $DeliveryStatus, $PickupEvidence, $DeliveryEvidence, $CODEvidecence, $DeviceModel, $RepairPrice, $DeviceColor, $DveviceDamage, $DeviceSymptom, $RepairStatus, $RepairDetails, $TrackPickup, $TrackDelivery;

        function quotationlist()
        {
            $sql = "select * from quotation inner join customer on quotation.id=customer.Cus_ID";
            return DB::run($sql);
        }
        
        function searchcust(){
            $sql = "select * from quotation inner join customer on quotation.id=customer.Cus_ID where id=:id";
            $args = [':id' => $this->id];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

        function searchquotation(){
            $sql = "select * from quotation inner join customer on quotation.id=customer.Cus_ID where Quotation_ID=:Quotation_ID";
            $args = [':Quotation_ID' => $this->Quotation_ID];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

    }

?>