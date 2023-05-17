/*******Pegar o formulário atráves do seu ID**********/
const form = document.getElementById('form-contacto');

/*****Pegar todos os campos que possuem a class "required" ******/
const campos = document.querySelectorAll('.required');

/****Pegar cada span dos inputs e da text-area******/
const spans = document.querySelectorAll('.span-required');


/****Criando um RegEx para os nomes*****/
const nomeRegEx = /^([A-Z][a-z-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{1,}) ([A-Z][a-z-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{0,}$)/;

/******Criando uma RegEx para o email*******/
const emailRegEx = /^([a-z0-9]{2,}\.)?([a-z0-9]{2,})@([a-z0-9]{2,})(\.[a-z]{2,})(\.ao|\.gov|\.co)?/;

/****Criando um ReqEx para o assunto******/
const assuntoRegEx = /^([A-Z][a-z]{0,}.*) ([A-z]{0,}.*)/;


//Criando um evento para que toda vez que o botão do tipo submit for criado

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        emailValidate();
    })


    //Criando uma funcão para validar o Email

    function emailValidate(){
        if(emailRegEx.test(campos[0].value)){
            campos[index].style.border = '2px solid #06338a';
            spans[index].style.display = 'none';
        }
        else{
            campos[index].style.border = '2px solid red';
            spans[index].style.display = 'block';
        }
    }

    
   