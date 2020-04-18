//Validando Cliente
//Validando Nombre
var nombreUsu = $("#nombreNuevoCliente");
nombreUsu.click(function(e){
  e.preventDefault();
  alert("Estamos en nombre");
  if(nombreUsu.val() == "" || nombreUsu.val() == null || nombreUsu.val().length<=3){
    nombreUsu.css("border-color", "red");
  }else{
    nombreUsu.css("border-color", "green");
  }
})
//Validando apellido
var meta = $("#meta");
meta.change(function(e){
  e.preventDefault(e);
  alert("Estamos en meta");
  if(meta.val() == "" || meta.val() == null || meta.val().length<=3){
    meta.css("border-color", "red");
  }else{
    meta.css("border-color", "green");
  }
})
//Validando email
var email = $("#email");
email.change(function(e){
  e.preventDefault(e);
  var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
  if(regex.test(email.val().trim())){
    email.css("border-color", "green");
  }else{
    email.css("border-color", "red");
  }
})
//Validando Telefono
var telefonoUsu = $("#numero");
telefonoUsu.change(function(e){
  e.preventDefault(e);
  alert("Estamos en tel");
  if(telefonoUsu.val().length<9 || isNaN(telefonoUsu.val())){
    telefonoUsu.css("border-color", "red");
  }else{
    telefonoUsu.css("border-color", "green");
  }
})
//Form
var submit = $("#submit");
submit.click(function(){
  $bandera=0;
  $siguiente=false;
  if(nombreUsu.val() == "" || nombreUsu.val() == null || nombreUsu.val().length<=3){
    $bandera++;
  }
  if(meta.val() == "" || meta.val() == null || meta.val().length<=3){
    $bandera++;
  }
  var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
  if(!regex.test(email.val().trim())){
    $bandera++;
  }
  if(telefonoUsu.val().length<9 || isNaN(telefonoUsu.val())){
    $bandera++;
  }
  if($bandera==0){
    return true;
  }else{
    alert("Complete todos los campos con los datos necesarios");
    return false;
  }
})