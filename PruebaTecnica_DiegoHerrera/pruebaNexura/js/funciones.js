function mostrarEmpleado() {
    $.ajax({
        url: "php/mostrarEmpleado.php",
        success: function (datos) {
            $('#infoBase').html(datos);
        }
    });
}

function nuevoEmpleado() {
    if ($('#nombre').val() == "") {
        swal("Debes ingresar el nombre completo");
        return false;
    } else if ($('#correo').val() == "") {
        swal("Debes ingresar un correo electrónico");
        return false;
    } else if ($('input[name="sexo"]').is(':checked')) {
        
    } else{
        swal("Debes seleccionar un tipo de sexo");
        return false;
    }
    if ($('#descripcion').val() == "") {
        swal("Debes ingresar una descripción de tu experiencia");
        return false;
    } else if ($('input[name="rol"]').is(':checked')) {

    } else {
        swal("Debes seleccionar un rol");
        return false;
    }
    $.ajax({
        type: "POST",
        data: $('#frmnuevoEmpleado').serialize(),
        url: "php/nuevoEmpleado.php",
        success: function (datos) {
            console.log(datos);

            if (datos == 1) {
                swal("Empleado registrado con éxito!", "", "success");
                $('#frmnuevoEmpleado')[0].reset();
                mostrarEmpleado();
            } else {
                swal("Hubo un error al registrar el empleado", "", "error");
            }
        }
    });
}

function nuevoEmpleado_rol() {
    $.ajax({
        type: "POST",
        data: $('#frmnuevoEmpleado').serialize(),
        url: "php/nuevoEmpleado_rol.php"
    });
}

function editarEmpleado(id) {
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "php/editarEmpleado.php",
        success: function (r) {
            datos = jQuery.parseJSON(r);

            console.log(datos); // trae los datos

            $('#act_id').val(datos['id']); // porque cuenado guardo me envía nulo los campos
            $('#act_nombre').val(datos['nombre']);
            $('#act_correo').val(datos['email']);
            $('#act_sexo').val(datos['sexo']);
            if(datos['sexo'] == "m"){
                $('#act_m').prop('checked', true);
            } else {
                $('#act_f').prop('checked', true);
            }
            $('#act_descripcion').val(datos['descripcion']);
            if(datos['boletin'] == 1){
                $('#act_boletin').prop('checked', true);
            }
            if (datos['rol'] == 1) {
                $('#act_rol1').prop('checked', true);
            }
            if (datos['rol'] == 2) {
                $('#act_rol2').prop('checked', true);
            }
            if (datos['rol'] == 3) {
                $('#act_rol3').prop('checked', true);
            }
        }
    });
}

function actualizarEmpleado() {
    if ($('#act_nombre').val() == "") {
        swal("Debes ingresar el nombre completo");
        return false;
    } else if ($('#act_correo').val() == "") {
        swal("Debes ingresar un correo electrónico");
        return false;
    } else if ($('input[name="act_sexo"]').is(':checked')) {
        
    } else{
        swal("Debes seleccionar un tipo de sexo");
        return false;
    }
    if ($('#act_descripcion').val() == "") {
        swal("Debes ingresar una descripción de tu experiencia");
        return false;
    } else if ($('#act_rol').is(':checked')) {

    } else {
        swal("Debes seleccionar un rol");
        return false;
    }

    $.ajax({
        type: "POST",
        data: $('#frmactualizarEmpleado').serialize(),
        url: "php/actualizarEmpleado.php",
        success: function (datos) {
            console.log(datos);

            if (datos == 1) {
                swal("Empleado actualizado con éxito!", "", "success");
                mostrarEmpleado();
            } else {
                swal("Hubo un error al actualizar el empleado", "", "error");
            }
        }
    });
}

function eliminarEmpleado(id) {
    swal({
            title: "Esta seguro?",
            text: "Una vez eliminado no se podrá recuperar!",
            icon: "warning",
            buttons: true,
            buttons: ['Cancelar', 'Aceptar'],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    data: "id=" + id,
                    url: "php/eliminarEmpleado.php",
                    success: function (datos) {
                        if (datos == 1) {
                            swal("¡Registro eliminado con éxito!", "", "success");
                            mostrarEmpleado();
                        } else {
                            swal("¡Error al eliminar registro!", "", "error");
                        }
                    }
                });
            }
        });
}

function eliminarEmp_rol(id) {
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "php/eliminarEmp_rol.php",
        success: function (datos) {
            if (datos == 1) {
            } else {
            }
        }
    });
}