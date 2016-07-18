<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>">
    </head>
    <body>
        <div class="container">

            <h1>Consumo Mes</h1>
            <?php
            echo form_open("consumoMes_control/salvaConsumo");

            echo form_label("Data", "data");
            echo form_input(array(
                "name" => "data",
                "id" => "data",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label("Medida", "medida");
            echo form_input(array(
                "name" => "medida",
                "id" => "medida",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label("Medida_anterior", "medida_anterior");
            echo form_input(array(
                "name" => "medida_anterior",
                "id" => "medida_anterior",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_label("Total_kwh", "total_kwh");
            echo form_input(array(
                "name" => "total_kwh",
                "id" => "total_kwh",
                "class" => "form-control",
                "maxlength" => "255"
            ));

            echo form_button(array(
                "class" => "btn btn-primary",
                "content" => "Salvar",
                "type" => "submit"
            ));

            echo form_close();
            ?>    
        </div>
    </body>
</html>