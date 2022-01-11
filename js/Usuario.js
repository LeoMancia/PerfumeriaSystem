$(document).ready(function(){
  var funcion='';
  var id_usuario = $('#id_usuario').val();
  var edit=false;
  buscar_usuario(id_usuario);
  function buscar_usuario(dato){
  funcion='buscar_usuario';
  $.post('../controlador/UsuarioController.php',{dato, funcion},(response)=>{
      let nombre='';
      let apellidos='';
      let edad='';
      let dui='';
      let tipo='';
      let telefono='';
      let residencia='';
      let correo='';
      let sexo='';
      let adicional='';
      const usuario = JSON.parse(response);
      nombre+=`${usuario.nombre}`;
      apellidos+=`${usuario.apellidos}`;
      edad+=`${usuario.edad}`;
      dui+=`${usuario.dui}`;
      tipo+=`${usuario.tipo}`;
      telefono+=`${usuario.telefono}`;
      residencia+=`${usuario.residencia}`;
      correo+=`${usuario.correo}`;
      sexo+=`${usuario.sexo}`;
      adicional+=`${usuario.adicional}`;
      $('#nombre_us').html(nombre);
      $('#apellido_us').html(apellidos);
      $('#edad_us').html(edad);
      $('#dui_us').html(dui);
      $('#telefono_us').html(telefono);
      $('#residencia_us').html(residencia);
      $('#correo_us').html(correo);
      $('#sexo_us').html(sexo);
      $('#adicional_us').html(adicional);
      $('#us_tipo').html(tipo);
      $('#fotoPerfil1').attr('src',usuario.foto);
      $('#fotoPerfil2').attr('src',usuario.foto);
      $('#fotoPerfil3').attr('src',usuario.foto);
      $('#fotoPerfil4').attr('src',usuario.foto);
  })
} 

$(document).on('click', '.edit',(e)=>{
    funcion='capturar_datos';
    edit=true;
    $.post('../controlador/UsuarioController.php',{funcion,id_usuario},(response)=>{
      const usuario = JSON.parse(response);
      $('#telefono').val(usuario.telefono);
      $('#residencia').val(usuario.residencia);
      $('#correo').val(usuario.correo);
      $('#sexo').val(usuario.sexo);
      $('#adicional').val(usuario.adicional);
    })
});

$('#form-usuario').submit(e=>{
  if (edit==true) {
    let telefono=$('#telefono').val();
    let residencia=$('#residencia').val();
    let correo=$('#correo').val();
    let sexo=$('#sexo').val();
    let adicional=$('#adicional').val();
    funcion='editar_usuario';
    $.post('../controlador/UsuarioController.php',{id_usuario,funcion,telefono,residencia,correo,sexo,adicional},(response)=>{
        if (response=='editado') {
          $('#editado').hide('slow');
          $('#editado').show(200);
          $('#editado').hide(5000);
          $('#form-usuario').trigger('reset');
        } 
        edit=false;
        buscar_usuario(id_usuario); 
    });
  } else {
    $('#noeditado').hide('slow');
    $('#noeditado').show(200);
    $('#noeditado').hide(5000);
    $('#form-usuario').trigger('reset');
  }
  e.preventDefault();

});

$('#form-pass').submit(e=>{
  let oldpass=$('#oldpass').val();
  let newpass=$('#newpass').val();
  funcion='cambiar_contra';
  $.post('../controlador/UsuarioController.php', {id_usuario,funcion,oldpass,newpass},(response)=>{
    if (response=='update') {
      $('#update').hide('slow');
      $('#update').show(200);
      $('#update').hide(5000);
      $('#form-pass').trigger('reset');
    } else {
      $('#noupdate').hide('slow');
      $('#noupdate').show(200);
      $('#noupdate').hide(5000);
      $('#form-pass').trigger('reset');
    }
  })
  e.preventDefault();
})

$('#form-photo').submit(e=>{
let formData = new FormData($('#form-photo')[0]);
  $.ajax({
      url:'../controlador/UsuarioController.php',
      type:'POST',
      data:formData,
      cache:false,
      processData:false,
      contentType:false
    }).done(function(response){
      const json = JSON.parse(response);
      if (json.alert=='edit') {
        $('#fotoPerfil1').attr('src',json.ruta);
        $('#edit').hide('slow');
        $('#edit').show(200);
        $('#edit').hide(5000);
        $('#form-photo').trigger('reset');   
        buscar_usuario(id_usuario);   
      } else {
        $('#noedit').hide('slow');
        $('#noedit').show(200);
        $('#noedit').hide(5000);
        $('#form-photo').trigger('reset');
      }
    });
    e.preventDefault();
  })
  
})