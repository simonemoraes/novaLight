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


