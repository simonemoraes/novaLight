

<section id="id_sectionRegistroConsumo">

    <div class="container">
        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">

            <form method="post" action="<?= base_url("index.php/consumomes_control/salvaConsumo") ?>">

                <div class="panel panel-default panel_registros" id="panel_registroConsumo">
                    <div class="panel-heading">Registro de Consumo Diário</div>
                    <?php if ($consumo == NULL) : ?>
                        <?php include ('painelNovoRegistro.php'); ?>
                    <?php else : ?>
                        <?php include ('painelRegistro.php'); ?>
                    <?php endif; ?>

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

                                    <?php foreach ($listas as $value): ?>
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

