<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ConsumoMes_control extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('consumomes_model');
        $this->load->model('tarifas_model');
    }

    public function index() {
        $this->load->template('consumo/index.php');
    }

    public function formulario() {

        $consumo = $this->consumomes_model->buscaMedidaAnterior();
        $lista = $this->listarConsumo();

        if (empty($consumo)) {

            $dados = array("consumo" => $consumo, "listas" => $lista);

            $this->load->template('consumo/registroConsumo.php', $dados);
        } else {
            $consumo["medida_anterior"] = $consumo["medida"];
        }

        $dados = array("consumo" => $consumo, "listas" => $lista);

        $this->load->template('consumo/registroConsumo.php', $dados);
    }

    public function salvaConsumo() {

        $consumo = array(
            "data" => $this->input->post("data"),
            "medida" => $this->input->post("medida"),
            "medida_anterior" => $this->input->post("medida_anterior"),
            "total_kwh" => ""
        );

        if ($consumo["medida_anterior"] === "") {
            $totalKwh = $this->calculaKwh($consumo);
            $consumo["total_kwh"] = $totalKwh;
            $this->consumomes_model->salva($consumo);
            $this->session->set_flashdata("success", "Primeiro registro salvo com sucesso!!");

            redirect('consumomes_control/formulario');
        } else {
            $medida = $consumo["medida"];
            $medidaAnt = $consumo["medida_anterior"];

            if ($medida < $medidaAnt) {
                $this->session->set_flashdata("danger", "A medida não pode ser menor que a medida anterior!!");

                redirect('consumomes_control/formulario');
            } else {
                $totalKwh = $this->calculaKwh($consumo);
                $consumo["total_kwh"] = $totalKwh;
                $this->consumomes_model->salva($consumo);
                $this->session->set_flashdata("success", "Registro salvo com sucesso!!");
                redirect('consumomes_control/formulario');
            }
        }
    }

    
    private function listarConsumo() {

        return $this->consumomes_model->listarTodos();
    }

    
    
    
    /* Usado somente para teste */
    public function teste() {
        
    }

}
