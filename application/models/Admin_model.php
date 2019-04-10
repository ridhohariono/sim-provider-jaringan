<?php 

class Admin_model extends CI_Model
{

    public function getUserByMail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

// TEKNISI

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

    public function TeknisiJoinDatel($id)
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

// DATEL

    public function getDatel()
    {
        return $this->db->get('datel')->result_array();
    }

    public function addDatel($data)
    {
        return $this->db->insert('datel', $data);
    }

    public function deleteDatel($id)
    {
        return $this->db->delete('datel', ['id_datel' => $id]);
    }

    public function getDatelById($id)
    {
        return $this->db->get_where('datel', ['id_datel' => $id])->result_array();
    }

    public function updateDatel($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_datel', $id);
        $this->db->update('datel');
    }

    public function DatelJoinTeknisi($id)
    {
        $this->db->select('*');
        $this->db->from('datel');
        $this->db->where('teknisi.id_datel', $id);
        $this->db->join('teknisi', 'teknisi.id_datel = datel.id_datel');
        return $this->db->get();
    }

    // LAYANAN

    public function getLayanan()
    {
        return $this->db->get('layanan')->result_array();
    }

    public function addLayanan($data)
    {
        return $this->db->insert('layanan', $data);
    }

    public function deleteLayanan($id)
    {
        return $this->db->delete('layanan', ['id_layanan' => $id]);
    }

    public function getLayananById($id)
    {
        return $this->db->get_where('layanan', ['id_layanan' => $id])->result_array();
    }

    public function updateLayanan($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_layanan',$id);
        $this->db->update('layanan');
    }

    // STO
    public function getStoJoinDatel()
    {
       $this->db->select('*');
       $this->db->from('sto');
       $this->db->join('datel', 'datel.id_datel = sto.id_datel');
       return $this->db->get()->result_array();
    }

    public function getSto()
    {
        return $this->db->get('sto')->result_array();
    }

    public function getStoById($id)
    {
        return $this->db->get_where('sto', ['id_sto' => $id])->result_array();
    }

    // PELANGGAN
    public function getPelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }

    // LOKASI
    public function getLokasi(){
        return $this->db->get('lokasi')->result();
    }
}
