<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: hongke
 * Date: 13-1-23
 * Time: 上午9:23
 * To change this template use File | Settings | File Templates.
 */
class manage extends AController{

    public  function  index(){
        $this->load->view('head');
        $this->load->view('body');
        $this->load->view('foot');
    }

}