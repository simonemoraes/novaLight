<section id="id_sectionCalculoConta">

    <div class="container">

        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">

            <form method="post" action="<?= base_url("index.php/consumomes_control/calculoContaLuz") ?>">


                <?php if (!$calculos["data"]) : ?>
                    <?= $calculos["html_mensagem"] ?>
                <?php endif; ?>


                <div class="panel panel-default panel_registros" id="panel_registroConsumo">
                    <div class="panel-heading">Calculo da Conta por Período</div>
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

                                <div class="col-md-2 col-sm-offset-2 col-sm-3 col-xs-offset-4 col-xs-8">
                                    <button style="width: 100%;" class="btn btn-info">Calcular</button>
                                </div>

                            </div>
                        </div>

                        <div>
                            
                            <?php if ($calculos["data"]) : ?>
                                <?= $calculos["html_mensagem"] ?>
                            <?php endif; ?>
                            
                            <ul class="nav nav-tabs">

                                <li><a data-toggle="tab" href="#menu2">Calculo Tarifa Normal</a></li>
                                <li><a data-toggle="tab" href="#menu3">Calculo Tarifa Amarela</a></li>
                                <li><a data-toggle="tab" href="#menu4">Calculo Tarifa Vermelha</a></li>

                            </ul>


                            <div class="tab-content">

                                <div id="menu2" class="tab-pane fade">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <?php if ($calculos["totalKwh"]) : ?>
                                                <?php include ('tabelaTarifaNormal.php'); ?> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <?php if ($calculos["totalKwh"]) : ?>
                                                <?php include ('tabelaTarifaAmarela.php'); ?> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu4" class="tab-pane fade">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <?php if ($calculos["totalKwh"]) : ?>
                                                <?php include ('tabelaTarifaVermelha.php'); ?> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
