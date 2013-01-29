<?php
/**
 * Created by JetBrains PhpStorm.
 * User: walkskyer
 * Date: 13-1-24
 * Time: 下午9:53
 * To change this template use File | Settings | File Templates.
 */
class Sysconfig_model extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->_tableName='sysconfig';
    }
    public function fetchRows($where = '', $limit = 20, $offset = 0, $order = 'aid DESC')
    {
        $this->count_all_results($where);

        if ($this->total_rows) {
            $this->db->select('*');
            $this->db->from($this->getTable());
          //  $this->where($where);
            $this->db->order_by($order);
          //  $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result();
        }
        return array();
    }
    //将系统变量写入文件
    public   function writeFile(){
        $filename="defined.php";
        if(is_writeable(WEBPATH.'/'.$filename)){
            $data =$this->fetchRows();
            $content="<?php  \n";
            foreach($data as $key){
               $content .="define('".strtoupper($key->varname)."','".$key->value."');\n";
            }

            $content.=" ?>";
            $handle =fopen(WEBPATH.'/'.$filename,'w+');
            fwrite($handle,$content);
            fclose($handle);
        }

    }



}
