<?php

/**
 * @filename SavePurchase.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-12-7  10:50:21
 * @Description
 * 
 */
class PurchaseSavePurchase extends WorkflowAbstract {
    
    public function run() {
        D("Purchase")->where("id=".$this->mainrowId)->save(array("status" => 1));

        //财务
        if(isModuleEnabled("Finance")) {

        }

    }
    
}

?>
