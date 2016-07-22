<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tarifas_control extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->model("tarifas_model");
    }

    public function index() {
        $this->load->template("consumo/index.php");
    }
    
    public function formulario() {
        $tarifas = $this->tarifas_model->buscaUltimaTarifa();
        $lista = $this->listarTarifas();
        $dados = array("tarifas" => $tarifas, "listatarifas" => $lista);
        
        
                
        if($dados) {           
            $this->load->template("tarifas/registroTarifas.php", $dados);
        } else {
            $this->load->template("tarifas/registroTarifas.php");
        }
                
    }
    
    public function atualizaTarifas() {
        $this->salvaTarifas();
    }
    
    private function salvaTarifas() {

        $tarifas = array(
            "id" => $this->input->post("id"),
            "tarifaNormal" => $this->input->post("tarifaNormal"),
            "tarifaAmarela" => $this->input->post("tarifaAmarela"),
            "tarifaVermelha" => $this->input->post("tarifaVermelha"),
            "taxaIluminacao" => $this->input->post("taxaIluminacao")
        );
 
            $this->tarifas_model->salvar($tarifas);
            $this->session->set_flashdata("success", "Registro salvo com sucesso!!");
            redirect("/");        
    }
    
     private function listarTarifas() {

        return $this->tarifas_model->listarTodos();
    }
}

