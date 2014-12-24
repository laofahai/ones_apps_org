<?php

/**
 * @filename ConfirmStockin.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-30  14:31:21
 * @Description
 * 
 */
class ReturnsConfirmStockin extends WorkflowAbstract {
    
    public function run() {
        
        $stockin = D("Stockin");
        $map = array(
            "source_model" => "Returns",
            "source_id"    => $this->mainrowId
        );
        $theStockin = $stockin->where($map)->find();
        
        $map = array(
            "stockin_id" => $theStockin["id"]
        );
        $stockinDetailView = D("StockinDetailView");
        $data = $stockinDetailView->where($map)->select();
//        echo $stockinDetailView->getLastSql();exit;
        $stockin = D("Stockin");
        $stockid = $stockin->where("id=".$theStockin["id"])->getField("stock_id");
//        var_dump($data);exit;
        $stockProductListModel = D("StockProductList");
        $stockProductListModel->startTrans();
        $rs = $stockProductListModel->updateStoreList($data, $stockid);
        
        if($rs) {
            $stockProductListModel->commit();
            $this->updateStatus("Stockin", $theStockin["id"], 2);
        } else {
            Log::write("SQL Error:".$stockProductListModel->getLastSql(), Log::SQL);
            $stockProductListModel->rollback();
            return false;
            $this->action->error("operate_failed");
        }
    }
    
}

?>
