function alertaDeClique(){
    var n1 = document.getElementById("primeiro").value;
    
    resultado = document.getElementById("resultado");

    if (n1 % 2 === 0 ){
        resultado.innerHTML = "O numero é par";
    }
    else{
        resultado.innerHTML = "O numero é impar";
    }
}