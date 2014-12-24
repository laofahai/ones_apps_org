<?php

/**
 * @filename FinancePayPlanModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-12-8  8:59:31
 * @Description
 * 
 */
class FinancePayPlanModel extends CommonModel {
    
    protected $workflowAlias = "financePay";
    
    protected $_auto = array(
        array("create_dateline", CTS),
        array("status", 0),
        array("source_model", ""),
        array("source_id", ""),
        array("user_id", "getCurrentUid", 1, "function"),
    );

    /*
     * 财务收入计划新增接口
     * @param array $data
     *
     * **/
    public function record($data) {
        $data["create_dateline"] = CTS;
        $data["status"] = 0;
        $data["user_id"] = getCurrentUid();

        $lastId = $this->add($data);

        if(!$lastId) {
            Log::write($this->getLastSql(), Log::SQL);
            return false;
        }

        $workflow = new Workflow("financePay");
        $workflow->doNext($lastId, "", true);

        return $lastId;
    }

    public function toRelatedItem($sourceModel, $sourceId) {
        $map = array(
            "source_model" => $sourceModel,
            "source_id"    => $sourceId
        );
        return $this->field(
            "id, id AS bill_id,'FinancePayPlan' AS type,'money' AS icon,'finance/viewDetail/financePayPlan/id/' AS link"
        )->where($map)->order("id ASC")->select();
    }
    
}
