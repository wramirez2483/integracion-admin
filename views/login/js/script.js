
function handleEye() {
    
    let x = document.getElementById("password");
    let icon = document.getElementById('icon-toggle')

    if (x.type === "password") {      
      x.type = "text";
      icon.src = "./img/BiEyeSlash.svg"; 
    } else {
      x.type = "password";
      icon.src = "./img/RiEyeLine.svg"; 
    }
  
}
