<?php

class Calculaconta_model extends CI_Model {

    public function retorna_dataValida($dtInic, $dtFinal) {
        return $this->db->query("select * from consumomes "
                        . "where data between '$dtInic' and '$dtFinal'")->result_array();
    }

    public function retornaMaiorMedida($dataInicial, $dataFinal) {

        return $this->db->query("select max(medida) as medida from consumomes "
                        . "where data between '$dataInicial' and '$dataFinal'")->row_array();
    }

    public function retornaMenorMedida($dataInicial, $dataFinal) {

        return $this->db->query("select min(medida) as medida from consumomes "
                        . "where data between '$dataInicial' and '$dataFinal'")->row_array();
    }

}
