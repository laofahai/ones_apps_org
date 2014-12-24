<?php

/**
 * @filename StockinDetailViewModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-13  14:35:13
 * @Description
 * 
 */
class StockinDetailViewModel extends CommonViewModel {
    
    protected $viewFields = array(
        "StockinDetail" => array("*", "_type"=>"left"),
        "Goods"  => array("name"=>"goods_name", "pinyin"=>"goods_pinyin", "measure","factory_code", "price", "goods_category_id", "_on" => "Goods.id=StockinDetail.goods_id", "_type"=>"left"),
        "Stock"  => array("name"=>"stock_name", "_on"=>"StockinDetail.stock_id=Stock.id", "_type"=>"left"),
        "StockProductList" => array("num"=>"store_num", "_on"=>"StockinDetail.stock_id=StockProductList.stock_id and StockinDetail.factory_code_all=StockProductList.factory_code_all", "_type"=>"left")
    );
    
}
