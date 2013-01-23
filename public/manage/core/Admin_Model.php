<?php
/**
 * FileName:  Admin_Model.php.
 * User:  hongke
 * Date:  13-1-23
 * Time:  上午11:45
 * Just Do It !!   QQ:759396426
 */
class Admin_Model extends  CI_Model
{
    protected   $_tableName;
    public      $_where=array();
    public      $total_rows;
   //查询条件
    public  function where($where=false){
        if($where){
            $this->where= $where;
        }
        if($this->_where){
            if(is_array($where)){
                foreach($where as $value){
                    $this->db->where($this->_tableName,$value);
                }

            }
            if(is_string($where)){
                $this->db->where($where);
            }
        }


    }
    //计算条件的总数
    public  function getCountNums($where=false){
        $this->where($where);
        $this->total_rows = $this->db->count_all_results($this->_tableName);
    }
    //得到指定条数的数据
    public  function  getFetchRows($where,$pkey='aid DESC',$offset='0',$limit='20'){

        $this->getCountNums($where);

        if($this->total_rows){

            $this->db->select('*');

            $this->db->from($this->_tableName);

            $this->where($where);

            $this->db->order_by($pkey);

            $this->db->limit($offset,$limit);

            $query =  $this->db->get();

            return $query->result();
        }
    }
    //得到一条数据
    public  function getFetchRow($where=''){

        $this->db->select('*');

        $this->db->from($this->_tableName);

        $this->where($where);

        $query = $this->db->get();

        return $query->row();
    }
    //删除一条数据
    public  function delRow($aid){
        if(intval($aid)){
          $this->db->delete($this->_tableName,array('aid'=>$aid));
          return true;
        }
    }

}
