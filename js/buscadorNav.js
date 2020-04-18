$(document).ready(function(){
  $('.nav .buscar').on('click', function(){
    let modal = '<div class="modal" id="modal2"><input type="text" name="buscador-nav" id="buscador-nav" /><div class="btn-cerrar" id="btnCerrar"><i class="fas fa-times"></i></div></div>'
    $('.galeria').after(modal)
    $('#btnCerrar').on('click', function(){
      $('#modal2').remove()
    })
  })
  $(document).on('keyup', function (e) {
    if(e.which==27) {
      $('#modal2').remove();
    }
  })
})