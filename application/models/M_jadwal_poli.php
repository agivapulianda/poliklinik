<?php

class M_jadwal_poli extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->order_by('id_jadwal', 'ASC');
        return $this->db->from('tb_jadwal')
            ->join('tb_poliklinik', 'tb_poliklinik.id_poli=tb_jadwal.id_poli')
            ->join('tb_dokter', 'tb_dokter.id_dokter=tb_jadwal.id_dokter')
            ->join('tb_perawat', 'tb_perawat.id_perawat=tb_jadwal.id_perawat')
            ->get();
    }

    public function getPoliklinik()
    //ieu nu diganti
    {
        $query = "SELECT `tb_jadwal`.*, `tb_poliklinik`.`nama_poli`
                  FROM `tb_jadwal` JOIN `tb_poliklinik`
                  ON `tb_jadwal`.`id_poli` = `tb_poliklinik`.`id_poli`
                  ";

        return $this->db->query($query)->result_array();
    }

    public function input_data($data)
    {
        $this->db->insert('tb_jadwal', $data);
    }

    public function hapus_data($where, $table)
    {
        // $query = "DELETE `tb_jadwal`.*, `tb_poliklinik`.`nama_poli`
        //           FROM `tb_jadwal` JOIN `tb_poliklinik`
        //           ON `tb_jadwal`.`id_poli` = `tb_poliklinik`.`id_poli`
        //           ";

        // return $this->db->query($query)->result_array();
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
