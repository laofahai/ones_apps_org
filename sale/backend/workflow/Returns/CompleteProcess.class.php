<?php

/**
 * @filename CompleteProcess.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-30  14:32:37
 * @Description
 * 
 */
class ReturnsCompleteProcess extends WorkflowAbstract {
    
    public function run() {
        $this->updateStatus("Returns", $this->mainrowId, 2);
        
        //财务
        if(isModuleEnabled("Finance")) {
            $returns = D("Returns");
            $theReturns = $returns->find($this->mainrowId);
            $financeModel = D("FinancePayPlan");
            $data = array(
                "source_model" => "Returns",
                "source_id" => $this->mainrowId,
                "subject" => $theReturns["subject"],
                "supplier_id" => $theReturns["customer_id"],
                "amount" => $theReturns["total_price_real"],
                "create_dateline" => CTS,
                "status" => 0,
                "type_id" => getTypeIdByAlias("pay", "returns"),
                "user_id" => getCurrentUid()
            );
            
            $lastId = $financeModel->add($data);
//            echo $lastId;exit;
//            echo $financeModel->getLastSql();exit;
        
            import("@.Workflow.Workflow");
            $workflow = new Workflow("financePay");
            $node = $workflow->doNext($lastId, "", true);
//            var_dump($node);
        }
        
    }
    
}

?>
