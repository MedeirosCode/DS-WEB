
    const botao = document.getElementById("botao");
    const resultado = document.getElementById("resultado")
    var contador = 0;

    botao.addEventListener('click',function(){
        contador++;
        resultado.innerHTML = contador;
      });
    
