function alertaDeClique(){
    var n1 = document.getElementById("primeiro").value;
    var n2 = document.getElementById("segundo").value;
    var n3 = document.getElementById("terceiro").value;
    resultado = document.getElementById("resultado");

    if (n1 > n2 && n1 > n3){
        resultado.innerHTML = `o maior numero é ${n1}`;
    }
    if (n2 > n1 && n2 > n3){
        resultado.innerHTML = `o maior numero é ${n2}`;
    }
    if (n3 > n1 && n3 > n2){
        resultado.innerHTML = `O maior numero é ${n3}`;
    }
}

