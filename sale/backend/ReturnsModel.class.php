<?php

/**
 * @filename ReturnsModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-30  11:13:09
 * @Description
 * 
 */
class ReturnsModel extends CommonModel {
    protected $workflowAlias = "returns";
    
    protected $_auto = array(
        array("dateline", CTS),
        array("status", 0),
        array("total_num", 0),
        array("bill_code", "makeBillCode", 1, "function"),
        array("saler_id", "getCurrentUid", 1, "function"),
    );
    
    
    public function newReturns($data) {
        if(!$data["rows"]) {
            return false;
        }

        if(!$this->checkFactoryCodeAll($data["rows"])) {
            $this->error = "factory_code_not_full";
            return false;
        }
        
        $this->startTrans();
        
        $returnsId = $this->add($data);

        if(!$returnsId) {
            Log::write("SQL Error:".$this->getLastSql(), Log::SQL);
            $this->rollback();
            return false;
        }
//        print_r($data["rows"]);exit;
        $detail = D("ReturnsDetail");


        foreach($data["rows"] as $row) {
            $row["returns_id"] = $returnsId;
            if(!$detail->add($row)) {
                Log::write("SQL Error:".$this->getLastSql(), Log::SQL);
                $this->rollback();
                break;
            }
        }
        
        $this->commit();
        
        return $returnsId;
    }
}

?>
