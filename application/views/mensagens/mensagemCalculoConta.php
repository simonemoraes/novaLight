<div id="div_mensagem">
    <?php if ($status == "erroData") { ?> 
        <p style="margin-bottom: 0;" class='alert alert-danger text-center' id="erroData">
            <strong>A data inicial não pode ser maior do que a data final. Entre com uma data válida!</strong></p>
    <?php } ?>
    <?php if ($status == "danger") { ?> 
        <p style="margin-bottom: 0;" class='alert alert-danger text-center' id="danger">
            <strong>Não existe dados para esse período!</strong></p>
    <?php } ?>
    <?php if ($status == "success") { ?> 
        <p style="margin-bottom: 0;" class='alert alert-success text-center' id="sucesso">
            <strong>Click nas abas e conheça seus valores para o período informado.</strong></p>
    <?php } ?>
    <?php if ($status == "warning") { ?> 

        <p style="margin-bottom: 0;" class='alert alert-warning text-center' id="warning">
            <strong>Entre com o período a ser calculado.</strong></p>
    <?php } ?>
</div>