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
  let si = document.getElementById('si');
  let no = document.getElementById('no');

  if (checkboxId === 'si') {
    si.checked = true;
    no.checked = false;
  } else if (checkboxId === 'no' ) {
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


function cerrarMensaje(button){
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
deleteButtons.forEach(function(button) {
  button.addEventListener('click', handleDelete);
});



function notificationsTargetEdit1() {
  // Obtener referencias a los elementos del DOM
  var input = document.getElementById("notifications_target");
  var botonActivar = document.getElementById("notifications_target_edit_icon");

  // Agregar un event listener al botón de imagen
  botonActivar.addEventListener("click", function() {
      // Habilitar el campo de entrada
      input.disabled = false;
  });

}

function notificationsTargetEdit() {
  // Obtener referencias a los elementos del DOM
  var input = document.getElementById("notifications_target");
      // Habilitar el campo de entrada
      input.disabled = false;
      input.focus();
}
