// ===== nuevos metodos estandar, reutilizables y no puntuales para cada caso =====

// === LEEME
// este es el color hexadecima de los textos de los alert ( #d1d1d1 ), si utilizas 
// un alert y sale muy oscuro el texto modificas sweetalert1_p.css y le pones ese color

// context => info, warning, error, success
// positions => bottom-right, bottom-left, top-left, top-right, top-full-width, bottom-full-width

const toastRight = (tipo, mensaje) => {
    toastr.options.timeOut = "false";
    toastr.options.closeButton = true;

    toastr.options = {
        "timeOut": "4000",
    };

    toastr.remove();
    toastr[tipo](mensaje, '', {
        positionClass: 'toast-top-right'
    });
}

const toastRightBottom = (tipo, mensaje) => {
    toastr.options.timeOut = "false";
    toastr.options.closeButton = true;

    toastr.options = {
        "timeOut": "3000",
    };

    toastr.remove();
    toastr[tipo](mensaje, '', {
        positionClass: 'toast-bottom-right'
    });
}

// alert con redirect a otra ruta
const alertRedirect = (titulo, mensaje, tipo, text_confir = 'Confirmar', text_cancel = 'Cancelar', redirect) => {
    swal.fire({
        title: titulo,
        text: mensaje,
        type: tipo,
        showCancelButton: true,
        cancelButtonText: text_cancel,
        confirmButtonText: text_confir
    }).then(function(result) {
        if (result.value) {
            window.location.href = redirect;
        }
    });
}

// click en un #id
const alertClick = (titulo, mensaje, tipo, text_confir = 'Confirmar', text_cancel = 'Cancelar', id) => {
    if( text_cancel == 'no_cancel' ){
        var mostrar_cancel = false;
    }else{
        var mostrar_cancel = true;
    }

    swal.fire({
        title: titulo,
        text: mensaje,
        type: tipo,
        showCancelButton: mostrar_cancel,
        cancelButtonText: text_cancel,
        confirmButtonText: text_confir
    }).then(function(result) {
        if (result.value) {
            console.log(id);
            document.getElementById( id ).click();
        }
    });
}

// confirm, despliega un callback
const alertClickCallback = (titulo, mensaje, tipo, text_confir = 'Confirmar', text_cancel = 'Cancelar', callback) => {
    if( text_cancel == 'no_cancel' ){
        var mostrar_cancel = false;
    }else{
        var mostrar_cancel = true;
    }

    swal.fire({
        title: titulo,
        text: mensaje,
        type: tipo,
        showCancelButton: mostrar_cancel,
        cancelButtonText: text_cancel,
        confirmButtonText: text_confir
    }).then(function(result) {
        if (result.value) {
            callback();
        }
    });
}


const alertClickEliminar = (titulo, mensaje, tipo, text_confir = 'Confirmar', text_cancel = 'Cancelar', id, then_tipo = 'error', then_mensaje = 'Eliminado con exito!') => {
    swal.fire({
        title: titulo,
        text: mensaje,
        type: tipo,
        showCancelButton: true,
        cancelButtonText: text_cancel,
        confirmButtonText: text_confir
    }).then(function(result) {
        if (result.value) {
            $('#' + id).click();
            toastRight(then_tipo, then_mensaje);
        }
    });
}

//alert Message
const alertMessage = (titulo, mensaje, tipo) => {
    swal.fire({
        title: titulo,
        text: mensaje,
        type: tipo,
        confirmButtonText: 'Ok',
        showCancelButton: false,
    });
}

const cerrarModal = () => {
    $('.close').click();
}

const cerrarAlert = () => {
    document.querySelector('.cancel').click();
}

function aceptarOrdenEmpresa(cod, domiciliarios) {
    Swal.fire({
        type: 'question',
        input: 'select',
        confirmButtonText: "Si, aceptar!",
        cancelButtonText: "Cancelar",
        html: `<h3>¿Aceptar orden #${ cod }?</h3>
            <label>Seleccionar domiciliario, el pedido cambiará su estado a EN CAMINO</label>
        `,
        inputOptions: JSON.parse( domiciliarios ),
          showCancelButton: true,
          inputValidator: (select) => {
            // emitimos un evento con el domiciliario seleccionado para su actualización
            Livewire.emit('asignar_domiciliario', { id_domiciliario : select, id_pedido : cod });
          }
    })

}

// ===== end funciones finales =====



// ===== SWEETALERTS =====


const eliminarOrden = () => {
    swal({
        title: "¿Eliminar orden?",
        text: "Seguro deseas eliminar la orden #00000!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ed3c89",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('error', 'Orden aliminada');
            cerrarAlert();
        }
    });
}

const eliminarUsuario = () => {
    swal({
        title: "¿Eliminar Usuario?",
        text: "Seguro, deseas eliminar este usuario!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ed3c89",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('error', 'Usuario eliminado');
            cerrarAlert();
        }
    });
}

const InactivarUsuario = () => {
    swal({
        title: "¿Desea inactivar este usuario?",
        text: "EL usuario no podrá realizar ninguna acción en el sistema, mientras su estado sea inactivo!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ed3c89",
        confirmButtonText: "Si, inactivar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('error', 'Usuario inactivo');
            cerrarAlert();
        }
    });
}
const activarUsuario = () => {
    swal({
        title: "¿Desea activar este usuario?",
        text: "EL usuario tendrá nuevamente acceso a todas sus funciones!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#33a8f2",
        confirmButtonText: "Si, activar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('success', 'Usuario activado con exito!');
            cerrarAlert();
        }
    });
}

const inactivarEmpresa = () => {
    swal({
        title: "¿Desea inactivar esta empresa?",
        text: "La empresa ( nombre empresa ) y todos sus usuarios se les negerá el acceso al sistema, hasta que sea activada nuevamente.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ed3c89",
        confirmButtonText: "Si, inactivar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('error', 'Empresa ( nombre empresa ) inactiva');
            cerrarAlert();
        }
    });
}

const activarEmpresa = () => {
    swal({
        title: "¿Desea activar esta empresa?",
        text: "La empresa ( nombre empresa ) y todos sus usuarios tendran nuevamente acceso a las funciones de Clic Cloud.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ed3c89",
        confirmButtonText: "Si, activar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('success', 'Empresa ( nombre empresa ) activada con exito.');
            cerrarAlert();
        }
    });
}

const eliminarEmpresaAll = () => {
    swal({
        title: "¿Eliminar empresa?",
        text: "La empresa ( nombre empresa ) será borrada por completo del sistema, acción irreversible.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ed3c89",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('error', 'Empresa ( nombre empresa ) eliminada.');
            cerrarAlert();
        }
    });
}

function aceptarOrden() {

    swal({
        title: "¿Aceptar orden #0000?",
        text: 'Recuerde que si la orden es tipo de entrega "DOMICILIO", al aceptarla solicitaras el domiciliario de Clic Cloud!',
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#33a8f2",
        confirmButtonText: "Si, aceptar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('success', 'Orden aceptada');
            cerrarAlert();
        }
    });
}



const duplicarEntrada = () => {
    swal({
        title: "¿Duplicar entrada #0001?",
        text: 'Deseas duplicar esta entrada!',
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#33a8f2",
        confirmButtonText: "Si, aceptar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: true
    }, function(isConfirm) {
        if (isConfirm) {
            toastRight('success', 'Entrada duplicada');
            cerrarAlert();
        }
    });
}

const enviarMail = () => {
    $('#cerrar_modal').click();
    swal({
        title: "Enviado con exito",
        text: 'Se envío email a Nombre Empresa con exito!',
        confirmButtonText: "Ok",
    });
}

// function generarCombo(url) {
//     const { value: fruit } = Swal.fire({
//         type: 'warning',
//         background: '#262626',
//         border: ' 1px solid',
//         confirmButtonColor: "#33a8f2",
//         confirmButtonText: "Si, aceptar!",
//         cancelButtonText: "Cancelar",
//         html: `<h5>Se generara el siguiente combo</h5>
//                <div class="row">
//                   <div class="col-12">
//                     <div class=" col-12">
//                     <label>Nombre del combo</lable>: <b>Combo 1</b>
//                     </div>
//                     <div class=" col-12">
//                     <label>Combos dispolnibles</lable>: <b>6</b>
//                     </div>  
//                   </div>
//                   <div class="row">

//                   </div>    
//                 </div>`,

//         showCancelButton: true,
//         inputValidator: (select) => {
//             // return new Promise((resolve) => {
//             //     $.ajax({
//             //         type: "GET",
//             //         url: url+'&select='+select,
//             //         success: function(data)
//             //         {     
//             //            location.reload();
//             //         }
//             //     });
//             // })
//             toastRight('success', 'Orden aceptada');
//         }
//     })

// }