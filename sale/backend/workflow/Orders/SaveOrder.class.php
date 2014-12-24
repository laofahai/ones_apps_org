<?php

/**
 * @filename SaveOrder.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-16  10:25:41
 * @Description
 *  新建订单保存
 */
class OrdersSaveOrder extends WorkflowAbstract {
    
    /**
     * 新建订单保存
     */
    public function run() {
        $order = D("Orders");
        $order->where("id=".$this->mainrowId)->save(array("status" => 1));
//        echo $order->getLastSql();exit;
    }
    
}

?>
