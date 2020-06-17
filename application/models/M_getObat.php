<?php 
class M_getObat extends CI_Model {
    public function getObat()
    {
        $query = "SELECT `tb_medrec`.*, `tb_drugs`.`nama_drugs`
                  FROM `tb_medrec` JOIN `tb_drugs`
                  ON `tb_medrec`.`id_drugs` = `tb_drugs`.`id_drugs`
                  ";

        return $this->db->query($query)->result_array();
    }
}