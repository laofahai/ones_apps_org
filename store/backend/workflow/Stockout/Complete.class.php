<?php

/**
 * @filename CompleteStockout.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-12-1  14:07:44
 * @Description
 * 
 */
class StockoutComplete extends WorkflowAbstract {
    
    public function run() {

        $model = D("Stockout");
        
        $theStockout = $model->find($this->mainrowId);
        
        $model->where("id=".$this->mainrowId)->save(array("status"=>2));

        if($this->context["sourceModel"]) {
            $sourceNode = $this->getNodeByAlias(lcfirst($this->context["sourceModel"]), "Complete");
            $workflow = new Workflow($this->context["sourceWorkflow"], $this->context);
            $workflow->doNext($theStockout["source_id"], $sourceNode["id"], true, 3);
        }
    }

    public function isAllComplete() {
        $theStockout = D("Stockout")->find($this->mainrowId);
        return $theStockout["outed_num"] >= $theStockout["total_num"];
    }
    
}

?>
