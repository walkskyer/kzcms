<?php
/**
 * Created by JetBrains PhpStorm.
 * User: walkskyer
 * Date: 13-1-24
 * Time: 下午9:53
 * To change this template use File | Settings | File Templates.
 */
class Link_model extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->_tableName='link';
    }
}
