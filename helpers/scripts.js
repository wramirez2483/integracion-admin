
function handleEye() {
    
    let x = document.getElementById("password");
    let icon = document.getElementById('icon-toggle')

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
  let icon = document.getElementById('icon-toggle2')

  if (x.type === "password") {      
    x.type = "text";
    icon.src = "../../img/BiEyeSlash.svg"; 
  } else {
    x.type = "password";
    icon.src = "../../img/RiEyeLine.svg"; 
  }

}