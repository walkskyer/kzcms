<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weijie
 * Date: 13-1-24
 * Time: 上午9:00
 * To change this template use File | Settings | File Templates.
 */
/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Lang $lang
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * @property CI_Javascript $javascript
 * @property CI_Jquery $jquery
 * @property CI_Utf8 $utf8
 * @property CI_Security $security
 */
class MY_Model extends CI_Model
{
    protected $_tableName = '';
    public $where = array();
    public $total_rows = 0;
    protected $_pre = 'rk_';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * 取得表名
     * @return bool|string
     */
    public function getTable()
    {
        if (!empty($this->_tableName)) {
            return $this->_pre . $this->_tableName;
        }
        return false;
    }

    /**
     * 设置查询条件
     * @param bool $where
     */
    public function where($where = false)
    {
        if ($where) {
            $this->where = $where;
        }
        if ($this->where) {
            if (is_array($this->where)) {
                foreach ($this->where as $key => $value) {
                    $this->db->where($key, $value);
                }
            }
            if (is_string($this->where)) {
                $this->db->where($where);
            }
        }
    }

    /**
     * 返回查询结果的对象数组
     * @param string $where
     * @param int $limit
     * @param int $offset
     * @param string $order
     * @return array
     */
    public function fetchRows($where = '', $limit = 10, $offset = 0, $order = 'aid DESC')
    {
        $this->count_all_results($where);

        if ($this->total_rows) {
            $this->db->select('*');
            $this->db->from($this->getTable());
            $this->where();
            $this->db->order_by($order);
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result();
        }
        return array();
    }

    /**
     * 取得一个查询结果
     * @param string $where
     * @return bool| MY_Model
     */
    public function fetchRow($where = '')
    {
        $this->db->select('*');
        $this->db->from($this->getTable());
        $this->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        $rows = $query->result();
        if ($rows) {
            return $rows[0];
        }
        return false;
    }

    /**
     * 统计查询结果数目
     * @param bool $where
     * @return string
     */
    function count_all_results($where = false)
    {
        $this->where($where);
        $this->total_rows = $this->db->count_all_results($this->getTable());
        return $this->total_rows;
    }

    /**
     * 插入数据
     * @param string $value
     * @return bool|object
     */
    public function insert($value = '')
    {
        if ($value) {
            $flag = $this->db->insert($this->getTable(), $value);
            if($flag){
                return $this->db->insert_id();
            }
        }
        return false;
    }

    /**
     * 更新数据
     * @param string $value
     * @param $where
     * @return bool|object
     */
    public function update($value = '', $where)
    {
        if ($value && $where) {
            $this->where($where);
            $flag = $this->db->update($this->getTable(), $value);
            return $flag;
        }
        return false;
    }

    /**
     * 删除数据
     * @param  array|string $where
     * @return bool|object
     */
    public function delete($where = '')
    {
        if ($where) {
            $this->where($where);
            $result = $this->db->delete($this->getTable());
            return $result;
        }
        return false;
    }

    /**
     * 处理输入数据用于存储
     */
    public function toValue(){}
}
