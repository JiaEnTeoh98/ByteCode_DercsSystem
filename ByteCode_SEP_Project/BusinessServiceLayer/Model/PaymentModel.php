<?php
require_once '../../libs/database.php';

class PaymentModel{

    public $Payment_ID, $PaymentType,$PaymentDate, $PaymentTime, $PaymentTotal, $PaymentStatus;
    public $Quotation_ID, $Cus_ID ,$CustName, $CustPhoneNo, $CustAddress, $DeviceModel, $DeviceColor, $DeviceSymptom, $DeviceDamage, $DateRequest;
    public $Item_ID, $ItemName, $ItemQuantity ,$ItemPrice, $ItemDesc,$Sercharge,$RepairPrice, $ItemNote;

    //Add new payment
    function addPayment(){
        $sql = "insert into payment(Quotation_ID, Cus_ID, PaymentTotal) values( :Quotation_ID ,:Cus_ID,:PaymentTotal)";
        $args = [':Quotation_ID'=>$this->Quotation_ID, ':Cus_ID'=>$this->Cus_ID,':PaymentTotal'=>$this->PaymentTotal];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }

    //Retrieve quotation details
    function viewAll(){
        $sql = "select * from quotation join item on quotation.Quotation_ID = item.Quotation_ID  where quotation.Cus_ID=:Cus_ID ";
        $args = [':Cus_ID'=>$this->Cus_ID];
        return DB::run($sql, $args);
    }

    //Update cart item
    public function updateCartItem(){
        $sql = "update payment set PaymentStatus ='Success' where Cus_ID = :Cus_ID";
        $args = [':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    //Update payment status as success (PayPal & COD done)
    public function updateSuccess(){
        $sql = "update payment set PaymentStatus = 'Success' where Cus_ID = :Cus_ID";
        $args = [':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }

    //Update payment status as pending (COD)
    public function updatePending(){
        $sql = "update payment set PaymentStatus = 'Pending' where Cus_ID = :Cus_ID";
        $args = [':Cus_ID' => $this->Cus_ID];
        return DB::run($sql, $args);
    }



}