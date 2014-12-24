<?php

/**
 * @filename ShipmentViewModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-12-6  13:48:36
 * @Description
 * 
 */
class ExpressViewModel extends CommonViewModel {
    
    protected $viewFields = array(
        "Express" => array("*", "_type"=>"left"),
        "Types" => array("name" => "express_type_label", "alias" => "expressTypeAlias", "_on"=>"Express.express_type=Types.id", "_type"=>"left")
    );

    public $searchFields = array(
        "from_name","from_company","from_address","from_phone","to_name","to_company","to_address","to_phone", "Types.name"
    );
    
}
