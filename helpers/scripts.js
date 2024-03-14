// Metodo para mostrar la contrasena con el ojito
function handleEyeGeneral(route,type_pwd) {
  
  let input = document.getElementById(type_pwd);
  let icon = document.getElementById(type_pwd === 'password' ? 'icon-toggle' : 'icon-toggle2');

  if (input.type === "password") {
    input.type = "text";
    icon.src = `${route}BiEyeSlash.svg`;
  } else {
    input.type = "password";
    icon.src = `${route}RiEyeLine.svg`;
  }
}
// Metodo checkbox disponibilidad de integracion
function handleCheckBox(checkboxId) {
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
// Metodo para abrir o cerrar modals (dialog)
function handleWindow(targetId) {
  // Obtener referencia al elemento del DOM
  let modal = document.querySelector(targetId);
  if (modal.open) {
    modal.close();
  } else {
    modal.showModal();
  }
}
// Metodo para asignar los datos a los inputs del evento a editar
function handleEditEvent(seedCode, modality, training) {
  document.getElementById('event_seed_code').value = seedCode;
  document.getElementById('modality').value = modality;
  document.getElementById('training').value = training;
  document.getElementById('seed_code').value = seedCode;
  // abre el modal
  handleWindow('#window-target')

}
// Borrar evento
function handleDeleteEvent(seed){
  let option = document.getElementById('delete-option');
  option.setAttribute('href',`../app/controllers/batch/delete_event.php?seed_code=${seed}`)
  // abre el modal
  handleWindow('#windows-delete')
}
// Borrar de forma local el destinatario.
function deleteLocalNotificationTarget(element) {
  // Eliminar el elemento padre del botón (es decir, el div)
  element.parentNode.remove();
}