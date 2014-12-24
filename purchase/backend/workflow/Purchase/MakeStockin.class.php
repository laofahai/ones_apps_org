<?php

/**
 * @filename MakeStockin.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-30  14:08:05
 * @Description
 *  根据采购单生成入库单
 */
class PurchaseMakeStockin extends WorkflowAbstract {
    
    public function run() {
        $purchase = D("Purchase");
        $thePurchase = $purchase->find($this->mainrowId);
        $purchaseDetail = D("PurchaseDetail");
        $thePurchaseDetail = $purchaseDetail->where("purchase_id=".$thePurchase["id"])->select();
        
//        $purchase->startTrans();
        $data = array(
            "subject" => "采购入库",
            "dateline"=> CTS,
            "total_num" => $thePurchase["total_num"],
            "status"  => 0,
            "user_id" => getCurrentUid(),
            "source_model" => "Purchase",
            "source_id"    => $this->mainrowId,
            "stock_manager"=> 0,
            "memo" => $thePurchase["memo"]
        );
        
        $stockin = D("Stockin");

        foreach($thePurchaseDetail as $trd) {
            $items[] = array(
                "goods_id"   => $trd["goods_id"],
                "num"        => $trd["num"],
                "factory_code_all" => $trd["factory_code_all"],
                "stock_id"   => 0,
                "memo"       => $trd["memo"]
            );
            
        }
        
        if(!$stockin->newBill($data, $items)) {
            $this->response(array(
                "error"=> 1,
                "msg" => $stockin->getError()
            ));
        }
        
//        $stockin->commit();
//        
//        //新建入库流程
//        import("@.Workflow.Workflow");
//        $workflow = new Workflow("stockin");
//        $rs = $workflow->doNext($lastId, "", true, true); //新建
//        $rs = $workflow->doNext($lastId, "", true, true); //保存
//        $rs = $workflow->doNext($lastId, "", true, true); //提交确认
//        var_dump($rs);exit;
        
        
        
//        exit;
    }
    
}

?>
