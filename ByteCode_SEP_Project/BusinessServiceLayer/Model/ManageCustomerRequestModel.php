<?php
require_once '../../libs/database.php';

class ManageCustomerRequestModel{

    public $Quotation_ID, $Cus_ID ,$CustName, $CustPhoneNo, $CustAddress, $DeviceModel, $DeviceColor, $DeviceSymptom, $DeviceDamage, $DateRequest;

    function RequestQuotation(){
        $sql = "insert into quotation(Cus_ID, DeviceModel, DeviceColor,DeviceSymptom, DeviceDamage, DateRequest) values(:Cus_ID, :DeviceModel, :DeviceColor, :DeviceSymptom, :DeviceDamage, :DateRequest)";
        $args = [':Cus_ID'=>$this->Cus_ID, ':DeviceModel'=>$this->DeviceModel, ':DeviceColor'=>$this->DeviceColor, ':DeviceSymptom'=>$this->DeviceSymptom, ':DeviceDamage'=>$this->DeviceDamage, ':DateRequest'=>$this->DateRequest];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    //
    function viewAllQuotation(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE QuotationStatus LIKE '%Pending%'";
        //"select quotation.Quotation_ID, quotation.DateRequest,Customer.CustName, Customer.CustPhoneNo from quotation join customer on Quotation.Cus_ID=Customer.Cus_ID where quotation.Quotation_ID=:Quotation_ID AND QuotationStatus LIKE '%Pending%'";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    function viewSpeQuotation(){
        $sql = "select * from quotation join customer on quotation.Cus_ID = customer.Cus_ID WHERE Quotation_ID=Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql, $args);
    }

    function acceptQuotation(){
        $sql = "update quotation set QuotationStatus='Accepted' where Quotation_ID=:Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql,$args);
    }

    function rejectQuotation(){
        $sql = "update quotation set QuotationStatus='Rejected' where Quotation_ID=:Quotation_ID";
        $args = [':Quotation_ID'=>$this->Quotation_ID];
        return DB::run($sql,$args);
    }

    /* function deleteItem(){
        $sql = "delete from service where serviceID=:serviceID";
        $args = [':serviceID'=>$this->serviceID];
        return DB::run($sql,$args);
    }

    
    function viewPerItem(){
        $sql = "select * from service where serviceID=:serviceID";
        $args = [':serviceID'=>$this->serviceID];
        return DB::run($sql,$args);
    }
    
     */
}
?>
