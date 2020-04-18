$(document).ready(function(){
  $('.galeria-foto').on('click', function (){
    let rutaImagen = $(this).find('img').attr('src')
    let modal = '<div class="modal" id="modal"><img src="'+ rutaImagen + '" alt=""><div class="btn-cerrar" id="btnCerrar"><i class="fas fa-times"></i></div></div>'

    $('.galeria').after(modal)

    $('#btnCerrar').on('click', function(){
      $('#modal').remove()
    })
  })
  $(document).on('keyup', function (e) {
    if(e.which==27) {
      $('#modal').remove();
    }
  })
})