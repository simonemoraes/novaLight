<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tarifas_model extends CI_Model {
    
    public function salvar($tarifa) {
        return $this->db->insert("tarifas", $tarifa);
    }
    
    public function listarTodos() {
        
        return $this->db->query("select * from tarifas")->result_array();
    }
    
    public function buscaUltimaTarifa() {
        
        return $this->db->query("select * from tarifas order by id desc")->row_array();
    }
}

