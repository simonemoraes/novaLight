<!DOCTYPE html>

<html>
    <head>

        <title>NovaLight</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.min.css") ?>" media = "all">
        <link rel="stylesheet" href="<?= base_url("css/estilo.css") ?>" media = "all">

    </head>

    <body>

        <header id="id_header"></header>

        <nav class="navbar navbar-default" role="navigation" id="navPrincipal">
            <div class="container-fluid" id="id_containerFluid">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#id_navbarCollapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?= base_url() ?>"><img src="<?= base_url("img/logo4.png") ?>"/></a>

                </div>



                <div class="collapse navbar-collapse" id="id_navbarCollapse">

                    <ul class="nav navbar-nav" id="id_ulNavbar">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li><a href="<?= base_url("index.php/consumomes_control/formulario") ?>">Consumo</a></li>
                        <li><a href="<?= base_url("index.php/tarifas_control/formulario") ?>">Tarifa</a></li>
                        <li><a href="<?= base_url("index.php/consumomes_control/calculoContaLuz") ?>">Calculo Conta</a></li>
                    </ul>
                </div>

            </div>
        </nav>




