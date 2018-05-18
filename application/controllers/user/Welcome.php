<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
  public function __construct() 
  {
	parent::__construct();
	$this->load->model(array('m_kursus','m_login'));
  	$this->load->database();
  }

  public function index()
  {
       if($this->session->userdata('level') != 1){
            redirect('login');
        }else{
            $this->load->model('m_login');
            $user = $this->session->userdata('username');
            $this->data['level'] = $this->session->userdata('level');        
            $this->data['pengguna'] = $this->m_login->data($user);
            $total = $this->m_kursus->count_all();
            $this->load->view('user/header',$this->data);
            $this->load->view('user/index',array('total' => $total),$this->data);
            $this->load->view('user/footer');
        }      
  }
//membuat fungsi crud kursus
	function kursus()
	{
	  $id=$this->uri->segment(7);
    $query = $this->m_kursus->selectAll();
   	$data['internet'] = $this->m_kursus->selectAll($id);
    $data['lock'] = $this->m_kursus->get_lock();
   	$user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
      if($query){
        $data['internet'] = $query;
        $this->load->view('user/header',$this->data);
        $this->load->view('user/kursus',$data);
        $this->load->view('user/footer');
       }
  }
  function daftar($nm_kursus)
  {
        $nm_kursus=str_replace('%20',' ',$nm_kursus);
        $data['nm_kursus']= $nm_kursus;
        $user = $this->session->userdata('username');
                $this->data['pengguna'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/daftar_peserta', $data);
        $this->load->view('user/footer');
  }
  function daftar_peserta()
  {
        $data['title']="Pendaftaran Kursus dan Workshop"; 
        $npm=$this->input->post('npm');
        $nama=$this->input->post('nm_peserta');
        $kursus=$this->input->post('nm_kursus');
        $kelas=$this->input->post('kelas');
        $jurusan=$this->input->post('jurusan');
        $periode=$this->input->post('periode');
        $this->m_kursus->tambah_peserta($npm,$nama,$kursus,$kelas,$jurusan,$periode); 
        redirect('user/welcome/daftar_peserta_kursus'); 
  }
 function daftar_peserta_kursus()
  {
        $data['title']="Data Peserta Kursus"; 
        $data['d_peserta']=$this->m_kursus->ambil();  
        $user = $this->session->userdata('username');
        $this->data['pengguna'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/form_daftar', $data);
        $this->load->view('user/footer');     
  }
  function hapus($id)
  {
        $this->m_kursus->delete($id);
        redirect('user/welcome/daftar_peserta_kursus');
  }
  function ubah($id) 
  {
        if($_POST==NULL) {
            $data['title']="Edit Data Peserta";
            $data['dt_peserta'] = $this->m_kursus->select($id);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('user/header',$this->data);
            $this->load->view('user/form_edit_peserta',$data);
            $this->load->view('user/footer');
        }else {
            //$id=$this->input->post('id'); error
            $npm=$this->input->post('npm');
            $nama=$this->input->post('nm_peserta');
            $kursus=$this->input->post('nm_kursus');
            $periode=$this->input->post('periode');
            $kelas=$this->input->post('kelas');
            $jurusan=$this->input->post('jurusan');
            $this->m_kursus->update($id,$npm,$nama,$kursus,$kelas,$jurusan,$periode);
            redirect('user/welcome/daftar_peserta_kursus');
        }
  }
  function login()
  {
    $session = $this->session->userdata('isLogin');
      if($session == FALSE)
      {
          $this->load->view('user/index');
      }else
      {
          redirect('user/welcome');
      }
  }
  function logout()
  {
    $this->session->unset_userdata('Login');
    redirect('user/login','refresh');
  }
}
?>