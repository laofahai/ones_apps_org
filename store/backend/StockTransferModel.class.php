<?php

/**
 * @filename StockTransferModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-12-15  9:11:28
 * @Description
 * 
 */
class StockTransferModel extends CommonModel {
    
    protected $workflowAlias = "stocktransfer";
    
    protected $_auto = array(
        array("dateline", CTS),
        array("status", 0),
        array("total_num", 0),
        array("user_id", "getCurrentUid", 1, "function"),
    );
    
}

?>
