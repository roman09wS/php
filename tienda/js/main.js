// Obtener los elementos del DOM
const numeroInput = document.getElementById("numeroInput");
const totalElement = document.getElementById("total");
const _precio = document.getElementById("precio");

// Agregar un evento al input para calcular el total en tiempo real
numeroInput.addEventListener("input", calcularTotal);

function calcularTotal() {
  // Obtener el valor del número ingresado
  const numero = parseInt(numeroInput.value);
  const precio = parseFloat(_precio.value);
    if (numero < 0 ) {
        totalElement.textContent = 'No se puede calcular, ingrese un valor positivo';
    }else if(isNaN(numero)){
        totalElement.textContent = 'Ingrese una cantidad para calcular';
    } else{
        // Realizar el cálculo
        const total = numero * precio;
        // Mostrar el total en el elemento h2
        totalElement.textContent = total;
    }
}


