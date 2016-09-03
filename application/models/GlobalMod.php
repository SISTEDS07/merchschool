<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlobalMod extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table)	{
		$this->db->from($table);
		return $this->db->count_all_results();
	}


  public function get_list_all($select='',$table=''){
    $this->db->select($select);
    $query=$this->db->get($table);
    return $query->result();
  }

  public function get_list_Where($select='',$table='',$where_array=''){
    $this->db->select($select);
    $this->db->where($where_array);
    $query=$this->db->get($table);
    return $query->result();
  }
 public function get_count_having($select='',$numberpos='',$having='',$table=''){
   $query = $this->db
              ->select($select)
              ->group_by($numberpos)
              ->having($having)
              ->get($table);
   return $query->result();
 }
  public function get_max_where($row,$where,$table){
	  $this->db->select_max($row);
    $this->db->where($where);
    $result = $this->db->get($table);
    return $result->result();

	}
  public function get_list_group($select,$group,$order,$having,$table){
     $this->db->select($select);
     $this->db->group_by($group);
     $this->db->order_by($order);
     $this->db->having($having);
     $query=$this->db->get($table);
     return $query->result();
  }





  public function proc_insert($data='',$table=''){
    $this->db->insert($table,$data);
  }

  public function proc_insert_id($data='',$table=''){
    $this->db->insert($table,$data);
    return $this->db->insert_id();
 }

 public function proc_update($set='',$table='',$where=''){
	$this->db->update($table, $set, $where);
	}


}
