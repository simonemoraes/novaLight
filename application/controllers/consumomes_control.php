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

    private function calculaKwh($consumo) {
        $medida = $consumo["medida"];
        $medida_anterior = $consumo["medida_anterior"];

        $totalKwh = $medida - $medida_anterior;

        return $totalKwh;
    }

    public function calculoContaLuz() {

        $dtInic = $this->input->post("dataInicial");
        $dtFinal = $this->input->post("dataFinal");

        $totalKwh = $this->totalKwhPorPeriodo($dtInic, $dtFinal);

        echo $totalKwh;

        $calculo = $this->calculoPorTarifa($totalKwh);
        $retornoDescricao = $this->criaDescricao();

        $dados = array(
            "calculos" => array(
                "calculo" => $calculo,
                "descricao" => $retornoDescricao)
        );

        if ($totalKwh != 0) {

            $this->load->template("consumo/calculoConta.php", $dados);
        } else {
//            echo "<h1 class='alert alert-danger'>Favor informar um período válido!!</h1>";
            $this->load->template("consumo/calculoConta.php", $dados);
        }
        
    }

    /* Função privada que retorna o total de kwh dentro de um periodo */

    private function totalKwhPorPeriodo($dataInicial, $dataFinal) {
        $maior = $this->maiorMedida($dataInicial, $dataFinal);
        $menor = $this->menorMedida($dataInicial, $dataFinal);



        return $totalKwh = $maior["medida"] - $menor["medida"];
    }

    /* Função privada que retorna a maior medida */

    private function maiorMedida($dataInicial, $dataFinal) {
        return $this->consumomes_model->retornaMaiorMedida($dataInicial, $dataFinal);
    }

    /* Função privada que retorna a menor medida */

    private function menorMedida($dataInicial, $dataFinal) {
        return $this->consumomes_model->retornaMenorMedida($dataInicial, $dataFinal);
    }

    private function calculoPorTarifa($totalKwh) {
        $ultimaTarifaInserida = $this->tarifas_model->buscaUltimaTarifa();

        $valores = array(
            "vlNormal" => $totalKwh * $ultimaTarifaInserida["tarifaNormal"],
            "vlAmarela" => $totalKwh * $ultimaTarifaInserida["tarifaAmarela"],
            "vlVermelha" => $totalKwh * $ultimaTarifaInserida["tarifaVermelha"],
            "taxaIluminacao" => $ultimaTarifaInserida["taxaIluminacao"],
            "totalKwh" => $totalKwh
        );

        $contas = array(
            "totalNormal" => $valores["vlNormal"] + $valores["taxaIluminacao"],
            "totalAmarela" => $valores["vlNormal"] + $valores["vlAmarela"] + $valores["taxaIluminacao"],
            "totalVermelha" => $valores["vlNormal"] + $valores["vlVermelha"] + $valores["taxaIluminacao"]
        );

        $dados = array(
            "valores" => $valores,
            "contas" => $contas,
            "ultimaTarifaInserida" => $ultimaTarifaInserida
        );

        return $dados;
    }

    private function criaDescricao() {
        $descricao = array(
            "calculoTarifaNormal" => "Calculo Tarifa Normal",
            "calculoTarifaAmarela" => "Calculo Tarifa Amarela",
            "calculoTarifaVermelha" => "Calculo Tarifa Vermelha",
            "contribIlumPublica" => "Contrib. Ilum. Publica",
            "total" => "Total da Conta"
        );

        return $descricao;
    }

    /* Usado somente para teste */

    public function teste() {
        $dataInicial = "2016/07/17";
        $dataFinal = "2016/07/19";

        $total = $this->totalKwhPorPeriodo($dataInicial, $dataFinal);

        $maior = $this->maiorMedida($dataInicial, $dataFinal);
        $menor = $this->menorMedida($dataInicial, $dataFinal);

        echo $total . "<br />";

        var_dump($menor["medida"]);
        var_dump($maior["medida"]);
    }

}
