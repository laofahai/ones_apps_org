<?php

/**
 * @filename SaveReturnsPaper.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-30  13:53:35
 * @Description
 * 
 */
class ReturnsSaveReturnsPaper extends WorkflowAbstract {
    /**
     * 保存退货单，生成入库单
     */
    public function run() {
        $returns = D("Returns");
        $returns->where("id=".$this->mainrowId)->save(array("status" => 1));
    }
    
}

?>
