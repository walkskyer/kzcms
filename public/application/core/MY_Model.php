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
    protected $_pre='';

    function __construct(){
        parent::__construct();
    }
    public function getTable(){
        if(!empty($this->_tableName)){
            return $this->_pre.$this->_tableName;
        }
        return false;
    }
    public function where($where = false)
    {
        if ($where) {
            $this->where = $where;
        }

        if ($this->where) {
            if (is_array($this->where)) {
                foreach ($this->where as $key => $value) {
                    switch ($key) {
                        case 'txtKeyWords':
                            $this->db->like('username', $value);
                            break;

                        default:
                            $this->db->where($key,$value);
                            break;
                    }
                }
            }

            if (is_string($this->where)) {
                $this->db->where($where);
            }
        }
    }



    public function fetchRows($where = '',$limit = 20,$offset = 0, $order = 'pkey DESC')
    {
        $this->count_all_results($where);

        if ($this->total_rows) {

            $this->db->select('*');
            $this->db->from($this->_tableName);

            $this->where();

            $this->db->order_by($order);

            $this->db->limit($limit,$offset);

            $query = $this->db->get();

            return $query->result() ;
        }
        return array();
    }


    public function fetchRow($where = '')
    {

        $this->db->select('*');
        $this->db->from($this->_tableName);

        $this->where($where);

        $this->db->limit(1);

        $query = $this->db->get();

        $rows = $query->result() ;

        if ($rows) {
            return $rows[0];
        }

        return false;
    }

    function count_all_results($where = false){
        $this->where($where);
        $this->total_rows = $this->db->count_all_results($this->_tableName);
        return $this->total_rows;
    }

    public function insert($value='')
    {
        if ($value) {

            $pkey = $this->db->insert($this->_tableName, $value);

            return $pkey;
        }

        return false;
    }
    public function isValid($username, $password)
    {

        $query = $this->db->get_where($this->_tableName,array('userid'=>$username));

        foreach ($query->result() as $row)
        {
            if ($row->password == $password) {
                return true;
            }
            break;
        }

        return false;
    }


    public function update($value='',$pkey)
    {
        if ($value && $pkey) {

            $pkey = $this->db->update($this->_tableName, $value,array('pkey'=>$pkey));

            return $pkey;
        }

        return false;
    }
    public function delete($pkey='')
    {
        if ($pkey) {

            $result = $this->db->delete($this->_tableName, array('pkey'=>$pkey));

            return $result;
        }

        return false;
    }

    public function fetchRowArr($where = '')
    {

        $this->db->select('*');
        $this->db->from($this->_tableName);

        $this->where($where);

        $this->db->limit(1);

        $query = $this->db->get();

        $rows = $query->result_array() ;

        if ($rows) {
            return $rows[0];
        }

        return false;
    }
}
