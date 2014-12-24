<?php

/**
 * @filename MakeStockinPaper.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-30  14:08:05
 * @Description
 * 
 */
class ReturnsMakeStockin extends WorkflowAbstract {
    
    public function run() {
        $returns = D("Returns");
        $theReturns = $returns->find($this->mainrowId);
        $returnDetail = D("ReturnsDetail");
        $theReturnsDetail = $returnDetail->where("returns_id=".$theReturns["id"])->select();
        
        $data = array(
            "subject" => "退货入库",
            "dateline"=> CTS,
            "total_num" => $theReturns["total_num"],
            "status"  => 1,
            "user_id" => getCurrentUid(),
            "source_model" => "Returns",
            "source_id"    => $this->mainrowId,
            "stock_manager"=> 0,
            "memo" => $theReturns["memo"]
        );
        
        $stockin = D("Stockin");
//        $stockinDetail = D("StockinDetail");
//        
//        $stockin->startTrans();
//        
//        $lastId = $stockin->add($data);
//        echo $lastId;exit;
//        var_dump($thePurchaseDetail);exit;
        foreach($theReturnsDetail as $trd) {
            $items[] = array(
                "goods_id"   => $trd["goods_id"],
                "num"        => $trd["num"],
                "factory_code_all" => $trd["factory_code_all"],
                "stock_id"   => 0,
                "memo"       => $trd["memo"]
            );
//            print_r($data);exit;
//            if(!$stockinDetail->add($data)) {
//                $stockin->rollback();
//                return false;
//            }
            
        }
        
        if(!$stockin->newBill($data, $items)) {
            $this->response(array(
                "error"=> 1
            ));
        }
//        exit;
    }
    
}

?>
