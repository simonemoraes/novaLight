<section id="id_sectionCalculoConta">

    <div class="container">

        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">

            <form method="post" id="form_calculo" action="<?= base_url("index.php/calculaconta_control/calculoContaLuz") ?>">

                <div class="panel panel-default panel_registros" id="panel_registroConsumo">
                    <div class="panel-heading text-center"><h4><strong>Calculo da Conta por Período</strong></h4></div>
                    <div class="panel-body">

                        <div class="form-group">
                            <div class="row">
                                <div  class="col-md-2 col-sm-2 col-xs-4 text-right">
                                    <label for="data">Data Inicial:</label>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-8">
                                    <input required="" type="date" class="form-control" value="" name="dataInicial" id="dataInicial" maxlength="255" >
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                                    <label for="data">Data Final:</label>
                                </div>



                                <div class="col-md-4 col-sm-4 col-xs-8">
                                    <input required="" type="date" class="form-control" step="" value="" name="dataFinal" id="dataFinal" maxlength="255" placeholder="Data Final">
                                </div>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-offset-2 col-sm-3 col-xs-offset-4 col-xs-8" id="div_btnCalcular">
                                    <button style="width: 100%;" class="btn btn-info" id="btn_calcular">
                                        <i class="fa fa-calculator" aria-hidden="true"></i> &nbsp;Calcular</button>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-8">
                                    <button style="width: 100%; display: none;" class="btn btn-info" id="btn_novoCalculo">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp;Novo Calculo</button>
                                </div>

                            </div>
                        </div>


                        <div>
                            
                            <?php if ($calculos["data"]) { ?>
                                <div class="row">
                                    <h6 class=" col-md-offset-2 col-md-6" id="msg_incial">
                                        <?= $calculos["html_mensagem"] ?>
                                    </h6>
                                </div>
                            <?php } else { ?>
                                <div class="row">
                                    <h6 class=" col-md-offset-2 col-md-6" id="msg_incial">
                                        <?= $calculos["html_mensagem"] ?>
                                    </h6>
                                </div>
                            <?php } ?>

                            <?php if ($calculos["totalKwh"]) : ?>
                                <div style="margin-bottom: 0;" class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div style="background-color: #4FC3F7" class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="id_accordion">
                                                    Calculo Tarifa Normal</a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                            <div class="panel-body">

                                                <?php include ('tabelaTarifaNormal.php'); ?> 

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div style="background-color: #FFEB3B" class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="id_accordion">
                                                    Calculo Tarifa Amarela
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body">

                                                <?php include ('tabelaTarifaAmarela.php'); ?> 

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div style="background-color: #F4511E" class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="id_accordion">
                                                    Calculo Tarifa Vermelha
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                            <div class="panel-body">

                                                <?php include ('tabelaTarifaVermelha.php'); ?> 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
