<?php 
class M_getDiagnosa extends CI_Model {
    public function getDiagnosa()
    {
        $query = "SELECT `tb_medrec`.*, `tb_treatment`.`treatment`
                  FROM `tb_medrec` JOIN `tb_treatment`
                  ON `tb_medrec`.`id_treatment` = `tb_treatment`.`id_treatment`
                  ";

        return $this->db->query($query)->result_array();
    }

}