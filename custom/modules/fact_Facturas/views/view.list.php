<?php
require_once('include/json_config.php');
require_once('include/MVC/View/views/view.list.php');
class fact_FacturasViewList extends ViewList 
{
    function fact_FacturasViewList()
    {
        parent::ViewList();
    }
    function Display()
    {
        //$this->lv->quickViewLinks = false;
        parent::Display();
    }
}
?>