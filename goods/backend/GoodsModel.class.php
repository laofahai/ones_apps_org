<?php

/**
 * @filename GoodsViewModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-12  17:16:27
 * @Description
 * 
 * CREATE VIEW x_goods_view AS 
 *  SELECT g.*,gc.name AS goods_category_name,go.id AS color_id,go.name as color_name
 *  gs.id as standard_id, gs.name as standard_name
 *  FROM x_goods g
 *  x_goods_category gc
 *  x_goods_color go
 *  x_goods_standard gs
 *  WHERE gc.id = g.goods_category_id
 *  
 */
class GoodsModel extends CommonModel {

    public $searchFields = array(
        "factory_code", "name", "pinyin"
    );
    
}
