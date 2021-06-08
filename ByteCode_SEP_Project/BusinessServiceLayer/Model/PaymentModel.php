<?php
require_once '../../libs/database.php';

class PaymentModel{

    public $Quotation_ID, $Cus_ID ,$CustName, $CustPhoneNo, $CustAddress, $DeviceModel, $DeviceColor, $DeviceSymptom, $DeviceDamage, $DateRequest;
    public $Item_ID, $ItemName, $ItemQuantity ,$ItemPrice, $ItemDesc,$Sercharge,$RepairPrice, $ItemNote;

    function viewpay(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID join Item on Item.Quotation_ID =Quotation.Quotation_ID WHERE Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    
    }

    function addPayment(){
        $sql = "insert into payment(Quotation_ID, Cus_ID) values( :Quotation_ID ,:Cus_ID)";
        $args = [':Quotation_ID'=>$this->Quotation_ID, ':Cus_ID'=>$this->Cus_ID];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }



}