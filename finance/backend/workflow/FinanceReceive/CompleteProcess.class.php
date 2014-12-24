<?php

/**
 * @filename CompleteProcess.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-12-8  9:29:25
 * @Description
 * 
 */
class FinanceReceiveCompleteProcess extends WorkflowAbstract {

    public function run() {}


    public function checkAllReceived() {
        $plan = D("FinanceReceivePlan")->find($this->mainrowId);

        if($plan["received"] < $plan["amount"]) {
            return false;
        }
        return true;
    }

    
}