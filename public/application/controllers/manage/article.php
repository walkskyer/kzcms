<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-2-22
 * Time: 下午11:09
 * To change this template use File | Settings | File Templates.
 */
class article extends  MY_Controller
{

   public  function __construct(){

       parent::__construct();
       $this->_model = 'article';
       $this->_viewPath = $this->_AdminPath.$this->_model.'/';
       $this->load->model($this->_model.'_model','model');

   }
  public  function info($offset=0){

      //分页设置
      $limit = $this->pagination->per_page = 10;
      $this->pagination->uri_segment = 4;
      $this->pagination->total_rows = $this->model->count_all_results();
      $this->pagination->base_url = site_url(CFG_CMSPATH.'article/info/');

      //查询数据
      $this->_data['infolist'] = $this->model->fetchRows('',$limit,$offset,'aid');
      $this->render($this->_viewPath.'infolist',$this->_data);
  }
  public  function delrow(){

  }
  public  function add(){

  }


}
