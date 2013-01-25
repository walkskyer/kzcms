<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-1-24
 * Time: 下午10:25
 * To change this template use File | Settings | File Templates.
 */
class admin extends  MY_Controller
{
    private $_data = array();
    public  function index(){

        $this->_data['menuList']= $this->menuList();
        $this->load->view("manage/head",$this->_data);
        $this->load->view("manage/body");
        $this->load->view("manage/foot");
    }

}
