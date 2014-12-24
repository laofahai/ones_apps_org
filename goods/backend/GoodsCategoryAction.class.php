<?php

/**
 * @filename GoodsCategoryAction.class.php 
 * @encoding UTF-8 
 * @author 闫志鹏 <a href="mailto:dk_nemo@163.com">dk_nemo@163.com</a>
 *
 *
 * @datetime 2013-11-12  17:22:38
 * @Description
 * 
 */
class GoodsCategoryAction extends NetestCategoryAction {

    protected function pretreatment() {
        switch($this->_method) {
            case "post":
            case "put":
                $_POST["pinyin"] = $_POST["pinyin"] ? $_POST["pinyin"] : Pinyin($_POST["name"]);
                break;
        }
    }
    
}
