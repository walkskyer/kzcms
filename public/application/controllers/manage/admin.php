<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
        $this->load->view($this->_AdminPath."head",$this->_data);
        $this->load->view($this->_AdminPath."body");
        $this->load->view($this->_AdminPath."foot");
    }

    public  function indexmain(){
        $this->load->view($this->_AdminPath."head");
        $this->load->view($this->_AdminPath."index");
        $this->load->view($this->_AdminPath."foot");
    }

}
