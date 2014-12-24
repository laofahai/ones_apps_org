<?php

/**
 * @filename StockoutStockTransferRelationModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-17  17:29:15
 * @Description
 * 
 */
class StockoutStockTransferRelationModel extends RelationModel {
    
    protected $_link = array(
//        "StockoutDetail" => HAS_MANY,
//        "StockoutDetailOrdersView" => HAS_MANY
        "StockTransfer" => array(
            "mapping_type" => BELONGS_TO,
            "class_name" => "StockTransfer",
            "foreign_key" => "source_id",
            "mapping_name"=> "source_row"
        ),
        "Stock" => BELONGS_TO
    );
    
    protected $workflowAlias = "stockout";
    
    protected $workflowMainRowField = "source_id";
    
    protected $tableName = "Stockout";
    
    public function find($options=array()) {
        $data = parent::find($options);
        if(!$data) {
            return $data;
        }
        /**
         * 工作流
         */
        if($this->workflowAlias) {
            import("@.Workflow.Workflow");
            $workflow = new Workflow($this->workflowAlias);
//            var_dump($workflow);exit;
            $processData = $workflow->getCurrentProcess($data["id"]);
            $data["processes"] = $processData;
        }
        
        return $data;
    }
    
}

?>
