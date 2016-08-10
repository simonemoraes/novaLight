/* Eventos no menu em conjunto com o banner
 * 
 * Arrasta o banner para baixo quando o menu é aberto */
$('#id_navbarCollapse').on('show.bs.collapse', function () {
    $('#id_div_index').css(
            'transform: translate(-50%, -10%)');
});

/* Arrasta o banner para cima quando o menu é fechado */
$('#id_navbarCollapse').on('hide.bs.collapse', function () {
    $('#id_div_index').css(
            'transform: translate(-50%, -50%)');
});





$('#div_mensagem').find('p').each(function () {

    var id = $(this).attr('id');

    if (id == "sucesso") {

        $("#btn_novoCalculo").show();
    }
});

$('.id_accordion').click(function () {
    $('#div_mensagem').find('p').fadeOut(1000);
});


$("#btn_novoCalculo").click(function () {
    $("#dataInicial").prop('disabled', true);
    $("#dataFinal").prop('disabled', true);

    $("#form_calculo").each(function (e) {
        e.preventDefault();
        $(this).reset();
    });
});
