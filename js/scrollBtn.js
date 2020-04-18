$(document).ready(function(){
  //Mostrar y oculatar botón "Volver arriba"

  let btnVolverArriba = $('.btn-scroll')
  $(window).on('scroll', function(){

    let nuestrosProgramarOffsetTop = $('.nuestros-programas').offset().top

    if($(window).scrollTop() >= nuestrosProgramarOffsetTop){
      btnVolverArriba.css('opacity', 1)
    }else if($(window).scrollTop() <= nuestrosProgramarOffsetTop){
      btnVolverArriba.css('opacity', 0)
    }

  })

  //Volver suave de scroll
  $('.volver-suave').on('click', function (e){
    e.preventDefault()

    if($(window).scrollTop() != 0){
      $('html, body').stop().animate({scrollTop:0}, 1000)
    }
  })

  //Mov de scroll a opciones del menu
  $('a.scroll-suave').on('click', function (e){
    e.preventDefault()
    let seccionOffsetTop = $($(this).attr('href')).offset().top
    $('html, body').stop().animate({scrollTop:seccionOffsetTop}, 1000)
  })

  



})
