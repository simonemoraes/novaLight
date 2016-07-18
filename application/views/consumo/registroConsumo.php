
<section id="id_sectionRegistroConsumo">
    
    <div class="container">
        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">

            <form method="post" action="<?= base_url("index.php/consumoMes_control/salvaConsumo") ?>">

                <div class="panel panel-default panel_registros" id="panel_registroConsumo">
                    <div class="panel-heading">Registro de Consumo Diário</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <label for="data">Data</label>
                                </div>

                                <div class="col-md-10 col-sm-10 col-xs-8">
                                    <input required="" type="date" class="form-control" name="data" id="data" maxlength="255" placeholder="Data">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <label for="medida">Medida</label>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-8">
                                    <input required="" type="number" class="form-control" name="medida" id="medida" maxlength="255" placeholder="Medida">
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <label for="medida_anterior">Medida Anterior</label>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-8">

                                    <input required="" type="number" value="<?= $consumo["medida_anterior"] ?>" class="form-control" name="medida_anterior" id="medida_anterior" maxlength="255" placeholder="Medida Anterior">

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-2 col-sm-offset-2 col-sm-3 col-xs-offset-4 col-xs-8">
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
                                        <th class="align_th" hidden="true"><strong>id</strong></th>
                                        <th class="align_th"><strong>Data</strong></th>
                                        <th class="align_th"><strong>Medida</strong></th>
                                        <th class="align_th"><strong>Medida Anterior</strong></th>
                                        <th class="align_th"><strong>Kwh Mes</strong></th>
                                    </tr>

                                    <?php foreach ($lista as $value): ?>
                                        <tr>
                                            <td class="align_td" hidden="true"><?= $value['id'] ?></td>
                                            <td class="align_td"><?= dataMysqlParaPtBr($value['data']) ?></td>
                                            <td class="align_td"><?= $value['medida'] ?></td>
                                            <td class="align_td"><?= $value['medida_anterior'] ?></td>
                                            <td class="align_td"><?= $value['total_kwh'] ?></td>
                                                                                      
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

</section>

