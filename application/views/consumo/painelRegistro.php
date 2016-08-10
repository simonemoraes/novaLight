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
                <input required="" min="0" type="number" class="form-control" name="medida" id="medida" maxlength="255" placeholder="Medida">
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="row">

            <div class="col-md-2 col-sm-2 col-xs-4">
                <label for="medida_anterior">Medida Anterior</label>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-8">

                <input required="" readonly="readonly" min="0" type="number" value="<?= $consumo["medida_anterior"] ?>" class="form-control" name="medida_anterior" id="medida_anterior" maxlength="255" placeholder="Medida Anterior">

            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="row">

            <div class="col-md-2 col-sm-offset-2 col-sm-3 col-xs-offset-4 col-xs-8">
                <button style="width: 100%;" class="btn btn-info">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Salvar</button>
            </div>

        </div>
    </div>



</div>
