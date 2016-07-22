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

/* Fim do evento do menu em conjunto com o banner */

//$(window).load(function () {
//    if (window.screen.availWidth < 465) {
//        $("h1, h4").remove();
//        $("#id_div_index").append(
//                "<h4>Bem Vindo a NovaLight!</h4>",
//                " <h6>Aqui você controla o seu consumo diário de energia elétrica.</h6>");
//    } 
//})




