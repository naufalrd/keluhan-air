<?php
class Direktur_model extends CI_Model{
    public function search_keluhan(){
        $this->db->select('*');
		$this->db->from('keluhan');
		$this->db->join('user', 'user.id_user = keluhan.id_user');
        //$this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.status !=', 'Ditolak');
        $this->db->or_where('keluhan.status !=', '');
        $this->db->order_by('keluhan.tanggal_keluhan', 'asc');
        return $this->db->get()->result_array();
    }

    public function monitor_feedback($id){
        $this->db->select('*');
		$this->db->from('feedback');
        $this->db->join('keluhan', 'feedback.id_keluhan = keluhan.id_keluhan');
		$this->db->join('user', 'user.id_user = keluhan.id_user');
        $this->db->join('bidang', 'bidang.id_bidang = keluhan.id_bidang');
        $this->db->where('keluhan.id_keluhan', $id);
        $this->db->order_by('feedback.id_feedback', 'asc');
        return $this->db->get()->result_array();
    }

    public function monitor_keluhan($id){
        $this->db->select('*');
		$this->db->from('keluhan');
        $this->db->where('keluhan.id_keluhan', $id);
        return $this->db->get()->result_array();
    }
}