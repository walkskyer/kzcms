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
        if($this->input->post()){
            $aidArray = $this->input->post('aid');
            $valArray = $this->input->post('val');
            foreach($aidArray as $key=>$aid){
               $where['aid'] = $aid;
               $this->model->update(array('value'=>$valArray[$key]),$where);
               // echo $this->db->last_query();
            }
            $this->model->writeFile();
            $this->_data['msg']='更新成功';
        }
        $this->_data['infolist'] = $this->model->fetchRows();
        $this->load->view($this->_AdminPath."head",$this->_data);
        $this->load->view($this->_viewPath.'infolist');
        $this->load->view($this->_AdminPath."foot");


    }
    public  function add(){
        if($this->input->post()){
            $in=array(
                'varname'=>trim($this->input->post('varname')),
                'info'=>trim($this->input->post('info')),
                'type'=>$this->input->post('type'),
                'value'=>$this->input->post('value'),
            );
            $this->model->insert($in);
            $this->model->writeFile();
            $this->_data['msg']='添加成功!';
        }
        $this->load->view($this->_AdminPath."head",$this->_data);
        $this->load->view($this->_viewPath.'add');
        $this->load->view($this->_AdminPath."foot");
    }

}