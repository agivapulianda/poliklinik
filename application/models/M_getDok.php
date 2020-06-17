<?php 
class M_getDok extends CI_Model{
    public function getDokter()
    {
        $query = "SELECT `tb_jadwal`.*, `tb_dokter`.`nama_dok`
                  FROM `tb_jadwal` JOIN `tb_dokter`
                  ON `tb_jadwal`.`id_dokter` = `tb_dokter`.`id_dokter`
                  ";

        return $this->db->query($query)->result_array();
    }
}