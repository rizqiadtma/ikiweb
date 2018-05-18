<?php
class m_kursus extends CI_Model{
  function selectAll()
  {
	$this->db->order_by("id","asc");
	return $this->db->get('internet')->result();
  }
  function get_lock()
{	  		
	return $this->db->get('internet')->row();
}
  function all_peserta() 
  {
	$this->db->order_by("id","asc");
	return $this->db->get('peserta')->result();
  }
  function tambah_peserta($npm,$nama,$nama_kursus,$kelas,$jurusan) {
	$data = array(
			'npm'=>$npm,
			'nama'=>$nama,
			'nm_kursus'=>$nama_kursus,
			'kelas'=>$kelas,
			'jurusan'=>$jurusan,
			'id_user'=>$this->session->userdata('id_user')
			);
	$this->db->insert('peserta',$data);
	$this->db->set('kuota', 'kuota-1', FALSE);
	$this->db->where('nama_kursus', $nama_kursus);
	$this->db->update('internet');
 }	
 function delete($id) 
 {
	 $this->db->delete('peserta', array('id'=>$id));
 }
 function update($id,$npm,$nama,$nama_kursus,$kelas,$jurusan)
 {
	$data = array(
			'npm'=>$npm,
			'nama'=>$nama,
			'nm_kursus'=>$nama_kursus,
			'kelas'=>$kelas,
			'jurusan'=>$jurusan,
			);
	$this->db->where('id',$id)->update('peserta', $data);
 }
 function select($id) 
 {
	 return $this->db->get_where('peserta', array('id'=>$id))->row();
 }

 function ambil()
{
 	$query="SELECT tb_pengguna.id_user, peserta.id_user, peserta.id, peserta.npm, peserta.nama,peserta.nm_kursus,
 			peserta.periode, peserta.kelas, peserta.jurusan
 			FROM peserta
 			JOIN tb_pengguna ON peserta.id_user=tb_pengguna.id_user
 			WHERE peserta.id_user='".$this->session->userdata('id_user')."'";
 	return $this->db->query($query);
 }
 function count_all(){
        $this->db->select('id');
        $this->db->distinct();
        $this->db->from('internet');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
?>
