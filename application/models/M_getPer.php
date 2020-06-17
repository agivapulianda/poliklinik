<?php 
class M_getPer extends CI_Model{
    public function getPer()
    {
        $query = "SELECT `tb_jadwal`.*, `tb_perawat`.`nama`
                  FROM `tb_jadwal` JOIN `tb_perawat`
                  ON `tb_jadwal`.`id_perawat` = `tb_perawat`.`id_perawat`
                  ";

        return $this->db->query($query)->result_array();
    }
}