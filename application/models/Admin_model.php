<?php 

class Admin_model extends CI_Model
{

    public function getUserByMail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function getTeknisi()
    {
        $this->db->select('*');
        $this->db->from('teknisi');
        $this->db->join('datel', 'datel.id_datel = teknisi.id_datel');
        return $this->db->get()->result_array();
    }

    public function addTeknisi($data)
    {
        return $this->db->insert('teknisi', $data);
    }

    public function updateTeknisi($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_teknisi', $id);
        $this->db->update('teknisi');
    }

    public function getTeknisiById($id)
    {
        return $this->db->get_where('teknisi', ['id_teknisi' => $id])->result_array();
    }

    public function TeknisiJoin($id)
    {
        $this->db->select('*');
        $this->db->from('teknisi');
        $this->db->where('id_teknisi', $id);
        $this->db->join('datel', 'datel.id_datel = teknisi.id_datel');
        return $this->db->get()->result_array();
    }

    public function DeleteTeknisi($id)
    {
        return $this->db->delete('teknisi', ['id_teknisi' => $id]);
    }
}
