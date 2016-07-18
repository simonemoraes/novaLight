<?php

class ConsumoMes_model extends CI_Model {
    
    public function salva($consumo) {
        return $this->db->insert("consumomes", $consumo);
    }
    
    public function listarTodos() {
        
        return $this->db->query("select * from consumomes")->result_array();
    }
    
    public function buscaMedidaAnterior() {
        
        return $this->db->query("select * from consumomes order by id desc")->row_array();
    }
}
