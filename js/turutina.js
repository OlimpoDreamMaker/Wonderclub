$(document).ready(function(){
  $('.btn-mi-rutina').on('click', function (){
    let modal = '<div class="modal" id="modal">'+
                  '<div class="form-mi-rutina">'+
                      '<h2 class="titulo-formulario">Pide tu rutina</h2>'+
                      '<p class="subtitulo-formulario">'+
                        'Dejame tus datos y cuentame tus obetivos y tus metas y me comunicare con vos'+
                      '</p>'+
                      '<form action="./scriptsBack/42-agregarCliente.php" method="POST">'+
                        '<input type="text" name="nombre" id="nombre" placeholder="Nombre*">'+
                        '<input type="email" name="email" id="email" placeholder="E-mail*">'+
                        '<input type="text" name="numero" id="numero" placeholder="Telefono/Celular">'+
                        '<input type="text" name="meta" id="meta" placeholder="Mi meta">'+
                        '<input type="submit" value="ENVIAR">'+
                      '</form>'+
                  '</div>'+
                  '<div class="btn-cerrar" id="btnCerrar"><i class="fas fa-times"></i></div>'+
                '</div>'

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