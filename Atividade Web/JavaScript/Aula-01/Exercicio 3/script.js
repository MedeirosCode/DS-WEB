var numero1 = Number.parseInt (prompt("Digite o primeiro valor"));
   
    var numero2 = Number.parseInt (prompt("Digite o segundo vaor"));
    var operacao = Number.parseInt (prompt("1 para mutiplicação, 2 para Subtracao, 3 para adicao 4 para divisao"));
    

    
    //verificação tipo de variável
    if (operacao == 1)
    
        alert(numero1 + numero2);

    if(operacao == 2)
   
        alert(numero1 - numero2);

    if(operacao ==3)
    
        alert(numero1 * numero2);

    if(operacao == 4)
   
        alert(numero1 / numero2);
