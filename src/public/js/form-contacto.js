/*******Pegar o formulário atráves do seu ID**********/
const form = document.getElementById('form-contacto');

/*****Pegar o campo que possui a class "required" ******/
const campo = document.querySelectorAll('.required');

/****Pegar o span do input-email******/
const span = document.querySelectorAll('.span-required');

/******Criando uma RegEx para o email*******/
const emailRegEx = /^([a-z0-9]{2,}\.)?([a-z0-9]{2,})@([a-z0-9]{2,})(\.[a-z]{2,})(\.ao|\.gov|\.co)?/;


//Criando um evento para que toda vez que o botão do tipo submit for clicado
    form.addEventListener("submit", (event) =>{
        event.preventDefault();
        emailValidate();
    })


//Criando uma funcão para validar o Email
    function emailValidate(){
        if(emailRegEx.test(campo)){
            campo.style.border = '2px solid #06338a';
            span.style.display = 'none';
        }
        else{
            campo.style.border = '2px solid red';
            span.style.display = 'block';    
        }
    }

    