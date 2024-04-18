<?php
namespace App\Models;

use CodeIgniter\Model;

class Goods extends Model {
    protected $db;

    function __construct() {
        parent::__construct();
        $this->db = db_connect();
    }

    public function get_goods($start_page, $perPage) {
        $sql = "select *,(select ca_name from gs_category as gc where gt.gs_category = gc.idx ) as ca_name from gs_tb as gt where is_deleted = 'n' limit $start_page , $perPage";
        return $this->db->query($sql)->getResultArray();
    }

    public function gets($tb ,$start_page, $perPage) {
        $builder = $this->db->table($tb);
        $builder->where('is_deleted', 'n');
        $builder->limit($perPage, $start_page);
        return $builder->get()->getResultArray();
    }

    public function getBdAllCount($tb_name){
        return $this->db->table($tb_name)->where('is_deleted', 'n')->countAll();
    }

    public function get($id) {            
        return $this->db->table('gs_tb')->where('idx', $id)->where('is_deleted', 'n')->get()->getRowArray();
    }

    public function reply_get($id){
        $sql = "SELECT * FROM reply_tb where bd_idx=? and is_deleted='n'";
        return $this->db->query($sql, [$id])->getResultArray();
    }

    public function insertData($tb,$data){
        return $this->db->table($tb)->insert($data);
    }

    public function updateData($tb, $data, $key){
        $builder = $this->db->table($tb);
        $builder->set($data);
        $builder->where('idx', $key);
        $builder->update();
    }

    public function get_categories()
    {
        $builder = $this->db->table("gs_category");
        $builder->where('is_deleted', 'n');
        return $builder->get()->getResultArray();
    }

    public function get_category($idx)
    {
        return $this->db->table('gs_category')->where('idx', $idx)->where('is_deleted', 'n')->get()->getRowArray();
    }
}
?>