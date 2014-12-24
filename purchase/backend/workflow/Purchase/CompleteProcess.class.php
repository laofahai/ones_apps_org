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
class PurchaseCompleteProcess extends WorkflowAbstract {
    
    public function run() {
        $this->updateStatus("Purchase", $this->mainrowId, 2);
    }
    
}

?>
