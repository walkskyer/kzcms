<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sysconfig extends  MY_Controller{

    protected  $_data=array();
    protected  $_model='sysconfig';
    protected  $_viewPath;
    public   function  __construct(){
        parent::__construct();
        $this->load->model($this->_model.'_model','model');
        $this->_viewPath = $this->_AdminPath.$this->_model.'/';

    }
    public   function infolist(){
        $this->load->library('pagination');
        $pagination['base_url'] = site_url('manage/sysconfig/infolist/page');
        $pagination['total_rows'] = $this->model->count_all_results();
        $pagination['per_page'] = 10;
        $pagination['uri_segment'] = 5;
        $offset = $this->uri->segment(5);
        echo $offset;
        $this->pagination->initialize($pagination);
        $this->_data['links'] = $this->pagination->create_links();
        $this->_data['infolist'] = $this->model->fetchRows('',$pagination['per_page'],$offset);
        $this->load->view($this->_AdminPath."head",$this->_data);
        $this->load->view($this->_viewPath.'infolist');
        $this->load->view($this->_AdminPath."foot");


    }

}