<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calculaconta_control extends CI_Controller {
    
    var $html_mensagem = "";
    var $status = "";


    public function __construct() {
        parent::__construct();

        $this->load->model('calculaconta_model');
        $this->load->model('tarifas_model');
    }

    public function index() {
        $this->load->template("calculoConta/calculaConta.php");
    }

    public function calculoContaLuz() {

        $dtInic = $this->input->post("dataInicial");
        $dtFinal = $this->input->post("dataFinal");

        $totalKwh = "";
        $calculo = array();
        $retornoDescricao = array();

        $dados = array(
            "calculos" => array(
                "calculo" => $calculo,
                "descricao" => $retornoDescricao,
                "data" => "",
                "totalKwh" => $totalKwh,
                "html_mensagem" => $this->html_mensagem
            )
        );

        $mensagem = array(
            "status" => $this->status
        );


        $data = array(
            "dataInicial" => $dtInic,
            "dataFinal" => $dtFinal
        );

        if ($data["dataInicial"] > $data["dataFinal"]) {
            $this->status = "erroData";
            $mensagem["status"] = $this->status;

            $this->html_mensagem = $this->load->view("mensagens/mensagemCalculoConta.php", $mensagem, true);

            $dados['calculos']['html_mensagem'] = $this->html_mensagem;

            $this->load->template("calculoConta/calculoConta.php", $dados);
        } else {

            if ($data['dataInicial'] == false || $data['dataFinal'] == false) {

                $this->status = "warning";
                $mensagem["status"] = $this->status;

                $this->html_mensagem = $this->load->view("mensagens/mensagemCalculoConta.php", $mensagem, true);

                $dados['calculos']['html_mensagem'] = $this->html_mensagem;

                $this->load->template("calculoConta/calculoConta.php", $dados);
            } else {

                $data_valida = $this->calculaconta_model->retorna_dataValida($data["dataInicial"], $data["dataFinal"]);
                $dados['calculos']['data'] = $data_valida;

                $totalKwh = $this->totalKwhPorPeriodo($dtInic, $dtFinal);

                $calculo = $this->calculoPorTarifa($totalKwh);
                $retornoDescricao = $this->criaDescricao();
                $dados['calculos']['calculo'] = $calculo;
                $dados['calculos']['descricao'] = $retornoDescricao;
                $dados['calculos']['totalKwh'] = $totalKwh;

                if (empty($data_valida)) {

                    $this->status = "danger";
                    $mensagem["status"] = $this->status;

                    $this->html_mensagem = $this->load->view("mensagens/mensagemCalculoConta.php", $mensagem, true);

                    $dados['calculos']['html_mensagem'] = $this->html_mensagem;

                    $this->load->template('calculoConta/calculoConta.php', $dados);
                } else {

                    $this->status = "success";
                    $mensagem["status"] = $this->status;

                    $this->html_mensagem = $this->load->view("mensagens/mensagemCalculoConta.php", $mensagem, true);

                    $dados['calculos']['html_mensagem'] = $this->html_mensagem;

                    $this->load->template('calculoConta/calculoConta.php', $dados);
                }
            }
        }
    }

    private function calculaKwh($consumo) {
        $medida = $consumo["medida"];
        $medida_anterior = $consumo["medida_anterior"];

        $totalKwh = $medida - $medida_anterior;

        return $totalKwh;
    }

    /* Função privada que retorna o total de kwh dentro de um periodo */

    private function totalKwhPorPeriodo($dataInicial, $dataFinal) {
        $maior = $this->maiorMedida($dataInicial, $dataFinal);
        $menor = $this->menorMedida($dataInicial, $dataFinal);

        return $totalKwh = $maior["medida"] - $menor["medida"];
    }

    /* Função privada que retorna a maior medida */

    private function maiorMedida($dataInicial, $dataFinal) {
        return $this->calculaconta_model->retornaMaiorMedida($dataInicial, $dataFinal);
    }

    /* Função privada que retorna a menor medida */

    private function menorMedida($dataInicial, $dataFinal) {
        return $this->calculaconta_model->retornaMenorMedida($dataInicial, $dataFinal);
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

    /* Cria a descrição que aparecerá na tabela de calculo de conta */

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

}
