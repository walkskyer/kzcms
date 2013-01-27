<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-1-24
 * Time: 下午10:25
 * To change this template use File | Settings | File Templates.
 */
class admin extends MY_Controller
{
    private $_data = array();

   public function index(){
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

    /*
         * 返回后台menu相关数组
         */
    protected function menuList()
    {
        $data = array(
            array(
                'itemname' => '常用操作',
                'class' => 'thisclass',
                '_for' => 'common',
                'href' => '',
                'display' => "block",
                'childs' => array(
                    array('url' => site_url('manage/sysconfig/infolist'), 'name' => '网站设置'),
                    array('url' => '', 'name' => '网站设置'),
                )
            ),
            array(
                'itemname' => '内容管理',
                'class' => '',
                '_for' => 'content',
                'href' => '',
                'display' => "none",
                'childs' => array(
                    array('url' => '', 'name' => '网站设置'),
                    array('url' => '', 'name' => '网站设置'),
                )
            ),
            array(
                'itemname' => '产品管理',
                'class' => '',
                '_for' => 'product',
                'href' => '',
                'display' => "none",
                'childs' => array(
                    array('url' => '', 'name' => '网站设置'),
                    array('url' => '', 'name' => '网站设置'),
                )
            )
        );

        return $data;
    }
}
