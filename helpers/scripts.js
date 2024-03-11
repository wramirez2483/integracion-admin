function handleEye() {
  let x = document.getElementById("password");
  let icon = document.getElementById('icon-toggle');

  if (x.type === "password") {
    x.type = "text";
    icon.src = "../../img/BiEyeSlash.svg";
  } else {
    x.type = "password";
    icon.src = "../../img/RiEyeLine.svg";
  }
}

function handleEyeTwo() {
  let x = document.getElementById("verify-password");
  let icon = document.getElementById('icon-toggle2');

  if (x.type === "password") {
    x.type = "text";
    icon.src = "../../img/BiEyeSlash.svg";
  } else {
    x.type = "password";
    icon.src = "../../img/RiEyeLine.svg";
  }
}
function handleEyeGeneral(ruta) {
  let x = document.getElementById("password");
  let icon = document.getElementById('icon-toggle');

  if (x.type === "password") {
    x.type = "text";
    icon.src = `${ruta}BiEyeSlash.svg`;
  } else {
    x.type = "password";
    icon.src = `${ruta}RiEyeLine.svg`;
  }
}

function handleCheckBox(checkboxId) {
  console.log('xd')
  let si = document.getElementById('si');
  let no = document.getElementById('no');

  if (checkboxId === 'si') {
    si.checked = true;
    no.checked = false;
  } else if (checkboxId === 'no') {
    no.checked = true;
    si.checked = false;
  }
}

function submitForm() {
  var selectedValue = document.getElementById("amount").value;
  document.getElementById("selected_amount").value = selectedValue;
  this.form.submit(); // Enviar el formulario actual
  console.log(selectedValue);
}


function cerrarMensaje(button) {
  button.parentNode.style.display = "none"
}

function handleDelete(event) {
  // Obtener la fila del evento
  var row = event.target.parentNode.parentNode;

  // Ocultar la fila
  row.style.display = 'none';

}

// Obtener todos los elementos con la clase 'delete-event' (los botones de borrar)
var deleteButtons = document.querySelectorAll('.delete-event');

// Agregar un event listener a cada botón de borrar
deleteButtons.forEach(function (button) {
  button.addEventListener('click', handleDelete);
});



function notificationsTargetEdit1() {
  // Obtener referencias a los elementos del DOM
  var input = document.getElementById("notifications_target");
  var botonActivar = document.getElementById("notifications_target_edit_icon");

  // Agregar un event listener al botón de imagen
  botonActivar.addEventListener("click", function () {
    // Habilitar el campo de entrada
    input.disabled = false;
  });

}

function handleWindow(targetId) {
  // Obtener referencia al elemento del DOM
  let modal = document.querySelector(targetId);

  if (modal.open) {
    modal.close();
  } else {
    modal.showModal();
  }

}

function borrar(element) {
  element.parentNode.remove(); // Eliminar el elemento padre del botón (es decir, el div)
}

function addNotificationTarget() {
  console.log('se ejecuto')

  document.getElementById("agregar_destinatario").addEventListener("click", function () {
    var nuevoDestinatario = document.getElementById("nuevo_destinatario").value;

    // Crear una nueva opción
    var nuevaOpcion = document.createElement("option");
    nuevaOpcion.text = nuevoDestinatario;
    nuevaOpcion.value = nuevoDestinatario;

    // Agregar la nueva opción al select
    document.getElementById("notifications_target").appendChild(nuevaOpcion);

    // Limpiar el valor del campo de texto después de agregar el destinatario
    document.getElementById("nuevo_destinatario").value = "";
  });

}

function handleCheckBoxSofia(checkboxId) {

  let si = document.getElementById('si-sofia');
  let no = document.getElementById('no-sofia');
  let element = document.getElementById('info-sofia')


  if (checkboxId === 'si') {

    if(element.classList.contains('active')){
      si.checked = true;
      return
    }
    //desactiva clase 'disabled'
    element.className = element.className.replace('disabled','')
    // activa la clase 'active'
    element.className += ' active'


    si.checked = true;
    no.checked = false;
  } else if (checkboxId === 'no') {

    if(element.classList.contains('disabled')){
      no.checked = true;
      return
    }
    //desactiva clase 'active'
    element.className += ' disabled'
    // activa la clase 'disabled'che
    element.className = element.className.replace('active','')

    no.checked = true;
    si.checked = false;
  }
}
function handleCheckBoxLms(checkboxId) {

  let si = document.getElementById('si-lms');
  let no = document.getElementById('no-lms');
  let element = document.getElementById('info-lms')

  if (checkboxId === 'si') {
    if(element.classList.contains('active')){
      si.checked = true;
      return
    }
    //desactiva clase 'disabled'
    element.className = element.className.replace('disabled','')
    // activa la clase 'active'
    element.className += ' active'


    si.checked = true;
    no.checked = false;
  } else if (checkboxId === 'no') {
    if(element.classList.contains('disabled')){
      no.checked = true;
      return
    }
    //desactiva clase 'active'
    element.className += ' disabled'
    // activa la clase 'disabled'
    element.className = element.className.replace('active','')

    no.checked = true;
    si.checked = false;
  }
}