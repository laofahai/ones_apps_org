<?php

/**
 * @filename GoodsCatViewModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-21  14:31:24
 * @Description
 * 
 */
class GoodsCatViewModel extends CommonViewModel {

    public $searchFields = array(
        "factory_code", "Goods.name", "GoodsCategory.name", "Goods.pinyin"
    );

    protected $tableName = "Goods";
    protected $viewFields = array(
        "Goods" => array("*","_type"=>"left"),
        "GoodsCategory" => array("name" => "category_name", "_on"=>"GoodsCategory.id=Goods.goods_category_id")
    );

}

