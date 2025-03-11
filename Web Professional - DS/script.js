//Função para validação dos dados do Cliente
function validarDadosCliente(){

    if(formulario.nome.value.length < 3 || formulario.nome.value == ""){
        formulario.nome.focus();
        document.getElementById('erro-nome').innerHTML = "Verifique se o nome possui mais do que 3 caracteres.";
        document.getElementById('erro-valor').innerHTML ="";
        document.getElementById('erro-estoque').innerHTML ="";
        document.getElementById('erro-codigo').innerHTML ="";

        return false;
    }


    if(formulario.codigo.value.length < 12 || formulario.codigo.value.length >12 ){
        formulario.codigo.focus();
        document.getElementById('erro-codigo').innerHTML ="Excedeu a capacidade de 12 caracteres!<br> No momento possui " + formulario.codigo.value.length;
        document.getElementById('erro-nome').innerHTML ="";
        document.getElementById('erro-valor').innerHTML ="";
        document.getElementById('erro-estoque').innerHTML ="";

        return false;
    }

    
    if(formulario.valor.value == "" || 
        formulario.email.value.indexOf(',')==-1 || 
        formulario.email.value.indexOf('.')==-1){
        formulario.valor.focus();
        document.getElementById('erro-valor').innerHTML ="Preencha o campo valor corretamente!";
        document.getElementById('erro-estoque').innerHTML ="";
        document.getElementById('erro-nome').innerHTML ="";
        document.getElementById('erro-codigo').innerHTML ="";
        return false;

    }


    

}