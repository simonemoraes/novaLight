<?php if ($status == "erroData") { ?> 
    <p class='alert alert-danger text-center'>
    <strong>A data inicial não pode ser maior do que a data final. Entre com uma data válida!</strong></p>
<?php } ?>
<?php if ($status == "danger") { ?> 
    <p class='alert alert-danger text-center'>
        <strong>Não existe dados para esse período!</strong></p>
<?php } ?>
<?php if ($status == "success") { ?> 
    <p class='alert alert-success text-center'>
        <strong>Click nas abas e conheça seus valores para o período informado.</strong></p>
<?php } ?>
<?php if ($status == "warning") { ?> 
    <p class='alert alert-warning text-center'>
        <strong>Entre com o período a ser calculado.</strong></p>
<?php } ?>
