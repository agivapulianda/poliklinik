<?php

class M_regis_poli extends CI_Model{
    public function tampil_data()
    {
        $this->db->order_by('id_registrasi','ASC');
        return $this->db->from('tb_registrasi')
        ->join('tb_pasien','tb_pasien.id_pasien=tb_registrasi.id_pasien')
        ->join('tb_jadwal','tb_jadwal.id_jadwal=tb_registrasi.id_jadwal')
        //->join('tb_perawat','tb_perawat.id_perawat=tb_registrasi.id_perawat')
        ->get();
    }

    public function getPasien()
    {
        $query = "SELECT `tb_registrasi`.*, `tb_pasien`.`nama_pasien`
                  FROM `tb_registrasi` JOIN `tb_pasien`
                  ON `tb_registrasi`.`id_pasien` = `tb_pasien`.`id_pasien`
                  ";

        return $this->db->query($query)->result_array();
    }

    public function input_data($data)
    {
        $this->db->insert('tb_registrasi', $data);
    }

    public function hapus_data($where, $table) 
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$table,$data)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}