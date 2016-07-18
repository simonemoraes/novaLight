<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ConsumoMes_control extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("consumoMes_model");
    }

    public function index() {
        $this->load->template("consumo/index.php");
    }

    public function formulario() {

        $consumo = $this->consumoMes_model->buscaMedidaAnterior();
        $lista = $this->listarConsumo();

        if ($consumo) {
            $consumo["medida_anterior"] = $consumo["medida"];
        } else {
            $consumo["medida_anterior"] = "";
        }

        $dados = array("consumo" => $consumo, "lista" => $lista);

        $this->load->template("consumo/registroConsumo.php", $dados);
    }

    public function salvaConsumo() {

        $consumo = array(
            "id" => $this->input->post("id"),
            "data" => $this->input->post("data"),
            "medida" => $this->input->post("medida"),
            "medida_anterior" => $this->input->post("medida_anterior"),
            "total_kwh" => ""
        );

        $medida = $consumo["medida"];
        $medidaAnt = $consumo["medida_anterior"];

        if ($medida < $medidaAnt) {
            $this->session->set_flashdata("danger", "A medida não pode ser menor que a medida anterior!!");

            redirect("/formulario");
         
        } else {
            $totalKwh = $this->calculaKwh($consumo);
            $consumo["total_kwh"] = $totalKwh;
            $this->consumoMes_model->salva($consumo);
            $this->session->set_flashdata("success", "Registro salvo com sucesso!!");
            redirect("/");
        }
        
        
    }

    private function listarConsumo() {

        return $this->consumoMes_model->listarTodos();
    }

    private function calculaKwh($consumo) {
        $medida = $consumo["medida"];
        $medida_anterior = $consumo["medida_anterior"];

        $totalKwh = $medida - $medida_anterior;

        return $totalKwh;
    }

    /* Usado somente para teste */

    public function teste() {

        $this->load->view("consumo/novo.php");
    }

}
