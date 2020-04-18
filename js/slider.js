$(document).ready(function(){
  const slider = $('.slider')
  const btnSiguiente = $('#der')
  const btnAnterior = $('#izq')

  //Se asa el ultimo slide al primer lugar
  $('.slider .equipamento-slider:last').insertBefore('.slider .equipamento-slider:first');

  //Con margen negativo se vuelve a mostrar el pirmer slide
  slider.css('margin-left', '-100%');
  //Funcion para que el slider se mueva a la deracha
  function moverDerecha(){
    slider.animate({
      marginLeft: '-200%'
    }, 700, function (){
      $('.slider .equipamento-slider:first').insertAfter('.slider .equipamento-slider:last');
      slider.css('margin-left', '-100%');
    })
  }
  btnSiguiente.on('click', moverDerecha);

  //Funcion para que el slide se mueva a la izquierda
  function moverIzquierda(){
    $('.slider .equipamento-slider:last').insertBefore('.slider .equipamento-slider:first');
    slider.css('margin-left', '-200%');
    slider.animate({
      marginLeft: '-100%'
    }, 700)
  }

  btnAnterior.on('click', moverIzquierda);

})