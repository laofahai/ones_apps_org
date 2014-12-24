<?php

/**
 * @filename RelationshipCompanyLinkmanModel.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-12-14  15:59:26
 * @Description
 * 
 */
class RelationshipCompanyLinkmanModel extends CommonModel {

    public function select($options = array()) {

        $data = parent::select($options);

        foreach($data as $k=>$v) {
            $data[$k]["is_primary_label"];
        }
        return $data;

    }

}

?>
