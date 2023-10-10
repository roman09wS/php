
// Mostrar contraseña
let inputPass = document.getElementById('exampleInputPassword1');
let btn_switch = document.getElementById('customSwitch3');
let countChichi = 0;
btn_switch.addEventListener('click', () => {
  console.log("mostrar");
  if (countChichi % 2 == 0) {
    inputPass.setAttribute('type','text');
  }else{
    inputPass.setAttribute('type','password');
  }
  countChichi++;
});