<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_login extends CI_Model{
    public $table = 'tb_pengguna';
    function __construct()
    {
        
    }
 
    function cek_user($username,$npm)
    {
        $query = $this->db->get_where($this->tbl,array('username' => $username, 'npm' => $npm));
        $query = $query->result_array();
        return $query;
    }
    function ambil_user($username)
        {
        $query = $this->db->get_where($this->tbl, array('username' => $username));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }
    function ambil($id){
        return $this->db->get_where('tb_pengguna', array('id_user'=>$id));
    }   

        public function getPengguna($username, $npm){
            $this->db->select('*');
            $this->db->from('tb_pengguna');
            $this->db->where('username', $username);
            $this->db->where('npm', $npm);
            $query = $this->db->get();
            return $query;
        }

        public function data($username){
            $this->db->select('*');
            $this->db->where('username', $username);
            $query = $this->db->get('tb_pengguna');
            return $query->row();
        }
        
        function updateProfile($data,$id_user){
            
            $this->db->where('id_user',$id_user);
            $this->db->update('user',$data);
        }
}