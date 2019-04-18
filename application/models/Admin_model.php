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

    public function getTeknisiByEmail($email)
    {
        return $this->db->get_where('teknisi', ['email' => $email])->num_rows();
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
        $this->db->where('id_layanan', $id);
        $this->db->update('layanan');
    }

    // STO
    public function getStoJoinDatel()
    {
        $this->db->select('*');
        $this->db->from('datel');
        $this->db->join('sto', 'sto.id_datel = datel.id_datel');
        return $this->db->get()->result_array();
    }

    public function getStoJoinDatelById($id)
    {
        $this->db->select('*');
        $this->db->from('datel');
        $this->db->where('sto.id_datel', $id);
        $this->db->join('sto', 'sto.id_datel = datel.id_datel');
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

    public function updateSto($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_sto', $id);
        $this->db->update('sto');
    }

    public function deleteSto($id)
    {
        return $this->db->delete('sto', ['id_sto' => $id]);
    }

    public function AddSto($data)
    {
        return $this->db->insert('sto', $data);
    }

    // PELANGGAN
    public function getPelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan AS P');
        $this->db->join('sto AS S', 'S.id_sto = P.id_sto');
        $this->db->join('layanan AS L', 'L.id_layanan = P.id_layanan');
        $this->db->order_by('P.nm_pelanggan');
        return $this->db->get()->result_array();
    }

    public function getIdPelanggan()
    {
        $this->db->select('id_pelanggan');
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'DESC');
        return $this->db->get()->result_array();
    }

    public function AddPelanggan($data)
    {
        return $this->db->insert('pelanggan', $data);
    }

    public function getPelangganById($id_pelanggan)
    {
        return $this->db->get_where('pelanggan', ['id_pelanggan' => $id_pelanggan])->result_array();
    }

    public function getPByIdJsonJoin($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->join('layanan', 'layanan.id_layanan = pelanggan.id_layanan');
        return $this->db->get()->result_array();
    }

    public function editPelanggan($data, $id_pelanggan)
    {
        $this->db->set($data);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan');
    }

    public function deletePelanggan($id_pelanggan)
    {
        return $this->db->delete('pelanggan', ['id_pelanggan' => $id_pelanggan]);
    }

    public function updatePelangganDenda($id_pelanggan, $val)
    {
        $this->db->set($val);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan');
    }

    public function updateStatusCabut($status, $id_pelanggan)
    {
        $this->db->set($status);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan');
    }

    // DENDA
    public function insertDenda($data)
    {
        return $this->db->insert('denda', $data);
    }

    public function updateDenda($data, $id_denda)
    {
        $this->db->set($data);
        $this->db->where('id_denda', $id_denda);
        $this->db->update('denda');
    }

    public function deleteDende($id_denda)
    {
        return $this->db->delete('denda', ['id_denda' => $id_denda]);
    }

    public function getDenda()
    {
        return $this->db->get('denda')->result_array();
    }

    public function getDendaById($id_denda)
    {
        return $this->db->get_where('denda', ['id_denda' => $id_denda])->result_array();
    }

    public function dendaJoinPelanggan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('pelanggan.id_pelanggan', $id_pelanggan);
        $this->db->join('denda', 'denda.id_pelanggan = pelanggan.id_pelanggan');
        return $this->db->get()->result_array();
    }

    // ODP
    public function getOdcByDatelId($id)
    {
        $this->db->select('*');
        $this->db->from('odp');
        $this->db->where('id_datel', $id);
        $this->db->order_by('id_odp', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function getOdpByName($name)
    {
        return $this->db->get_where('odp', ['nm_odp' => $name], 1)->result_array();
    }

    public function UpdatePortOdp($col_port, $id_odp)
    {
        $this->db->set($col_port, 1);
        $this->db->where('id_odp', $id_odp);
        $this->db->update('odp');
    }

    // LOKASI
    public function getLokasi()
    {
        return $this->db->get('lokasi')->result();
    }

    public function addLokasi($data)
    {
        return $this->db->insert('lokasi', $data);
    }

    public function deleteLokasi($id)
    {
        return $this->db->delete('lokasi', ['id_lokasi' => $id]);
    }

    public function updateLokasi($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi');
    }

    public function getLokasiDetails($id)
    {
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->join('sto', 'sto.id_sto = lokasi.id_sto');
        $this->db->where('id_lokasi', $id);
        return $this->db->get()->result();
    }

    public function getLokasiById($id)
    {
        return $this->db->get_where('lokasi', ['id_lokasi' => $id])->result_array();
    }

    public function getLokasiBySto($id_sto)
    {
        return $this->db->get_where('lokasi', ['id_sto' => $id_sto])->result_array();
    }

    // PEMASANGAN INDIHOME

    public function getPIndihome()
    {
        $this->db->select('*');
        $this->db->from('datel');
        $this->db->join('pemasangan_indihome', 'datel.id_datel = pemasangan_indihome.id_datel');
        $this->db->order_by('id_transaksi', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getPIdLokasiIndihome($id_transaksi)
    {
        $this->db->select('id_lokasi');
        $this->db->from('pemasangan_indihome');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->result_array();
    }

    public function getPIdLokasiDatin($id_transaksi)
    {
        $this->db->select('id_lokasi');
        $this->db->from('pemasangan_datin');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->result_array();
    }

    public function insertIndihome($dataIndihome)
    {
        return $this->db->insert('pemasangan_indihome', $dataIndihome);
    }

    public function UpdateIndihome($dataIndihome, $id_pelanggan)
    {
        $this->db->set($dataIndihome);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pemasangan_indihome');
    }

    public function updateStatusPasangIndihome($dataPelanggan, $id_pelanggan, $dataPIndihome, $id_transaksi)
    {
        // Update Status Pelanggan
        $this->db->set($dataPelanggan);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan');

        // Update Status Indihome
        $this->db->set($dataPIndihome);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('pemasangan_indihome');
    }

    public function deletePemasanganSelesai($table, $id)
    {
        return $this->db->delete($table, ['id_transaksi' => $id]);
    }

    public function updateStatusCabutIndihome($dataPelanggan, $id_pelanggan, $dataPIndihome, $id_transaksi)
    {
        // Update Status Pelanggan
        $this->db->set($dataPelanggan);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan');

        // Update Status Indihome
        $this->db->set($dataPIndihome);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('pencabutan_indihome');
    }

    public function deletePencabutanIndihome($id)
    {
        return $this->db->delete('pemasangan_indihome', ['id_transaksi' => $id]);
    }

    // PEMASANGAN DATIN
    public function updateStatusPasangDatin($dataPelanggan, $id_pelanggan, $dataPIndihome, $id_transaksi)
    {
        // Update Status Pelanggan
        $this->db->set($dataPelanggan);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan');

        // Update Status Indihome
        $this->db->set($dataPIndihome);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('pemasangan_datin');
    }

    public function getPDatin()
    {
        $this->db->select('*');
        $this->db->from('datel');
        $this->db->join('pemasangan_datin', 'datel.id_datel = pemasangan_datin.id_datel');
        $this->db->order_by('id_transaksi', 'DESC');
        return $this->db->get()->result_array();
    }

    public function insertDatin($dataDatin)
    {
        return $this->db->insert('pemasangan_datin', $dataDatin);
    }

    public function getAll_odp(){
        $this->db->select('odp.id_odp, odp.nm_odp, odc.nm_odc, datel.nm_datel');
        $this->db->from('odp');
        $this->db->join('odc', 'odc.id_odc = odp.id_odc');
        $this->db->join('datel', 'datel.id_datel = odp.id_datel');
        return $this->db->get()->result_array();
    }

    public function getAll_odc(){
        return $this->db->get('odc')->result();
    }

    public function Addodp($data)
    {
        return $this->db->insert('odp', $data);
    }

    public function del_odp($id)
    {
        return $this->db->delete('odp', ['id_odp' => $id]);
    }

    public function getAll_odpbyId($id){
        $this->db->select('odp.*, odc.nm_odc, datel.nm_datel, (port_1+port_2+port_3+port_4+port_5+port_6+port_7+port_8) as port_used');
        $this->db->from('odp');
        $this->db->join('odc', 'odc.id_odc = odp.id_odc');
        $this->db->join('datel', 'datel.id_datel = odp.id_datel');
        $this->db->where('odp.id_odp', $id);
        return $this->db->get()->result_array();
    }

    public function updateODP($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_odp', $id);
        $this->db->update('odp');
    }
    
    // PENCABUTAN INDIHOME
    public function insertPencabutan($table, $dataCabut)
    {
        return $this->db->insert($table, $dataCabut);
    }

    public function getCDatin()
    {
        $this->db->select('*');
        $this->db->from('datel');
        $this->db->join('pencabutan_indihome', 'pencabutan_indihome.id_datel = datel.id_datel');
        return $this->db->get()->result_array();
    }
}
