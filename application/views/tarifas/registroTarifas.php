

<section id="id_sectionRegistroTarifas">
  
    <div class="container">
        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">

            <form method="post" action="<?= base_url("index.php/tarifas_control/atualizaTarifas") ?>">

                <div class="panel panel-default panel_registros" id="panel_registroTarifas">
                    <div class="panel-heading">Registro das Tarifas</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-5">
                                    <label for="tarifaNormal">Tarifa Normal</label>
                                </div>

                                <div class="col-md-10 col-sm-10 col-xs-7">
                                    <input step="any" min="0" required="" type="number" class="form-control" name="tarifaNormal" id="tarifaNormal" maxlength="255" placeholder="Tarifa Normal">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-2 col-xs-5">
                                    <label for="tarifaAmarela">Tarifa Amarela</label>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-7">
                                    <input step="any" required="" min="0" type="number" class="form-control" name="tarifaAmarela" id="medida" maxlength="255" placeholder="Tarifa Amarela">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-2 col-xs-5">
                                    <label for="tarifaVermelha">Tarifa Vermelha</label>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-7">

                                    <input step="any" required="" min="0" type="number" value="" class="form-control" name="tarifaVermelha" id="tarifaVermelha" maxlength="255" placeholder="Tarifa Vermelha">

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-2 col-xs-5">
                                    <label for="taxaIluminacao">Taxa de Iluminação</label>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-7">
                                    <input step="any" min="0" required="" type="number" class="form-control" name="taxaIluminacao" id="taxaIluminacao" maxlength="255" placeholder="Taxa de Iluminação">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-offset-2 col-sm-3 col-xs-offset-5 col-xs-7">
                                    <button style="width: 100%;" class="btn btn-info">Salvar</button>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="align_th" id="campoId"><strong>Id</strong></th>
                                        <th class="align_th" id="tr_normal"><strong>Tarifa Normal</strong></th>
                                        <th class="align_th" id="tr_amarela"><strong>Tarifa Amarela</strong></th>
                                        <th class="align_th" id="tr_vermelha"><strong>Tarifa Vermelha</strong></th>
                                        <th class="align_th" id="tx_iluminacao"><strong>Taxa Iluminação</strong></th>
                                    </tr>

                                    <?php foreach ($listatarifas as $value): ?>
                                        <tr>
                                            <td class="align_td"><?= $value["id"] ?></td>
                                            <td class="align_td"><?= number_format($value["tarifaNormal"],4) ?></td>
                                            <td class="align_td"><?= number_format($value["tarifaAmarela"],4) ?></td>
                                            <td class="align_td"><?= number_format($value["tarifaVermelha"],4) ?></td>
                                            <td class="align_td"><?= number_format($value["taxaIluminacao"],2) ?></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

</section>



