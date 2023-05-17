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
        nameValidate();
        emailValidate();
        assuntoValidate();
        smsValidate();
        
    })

//Criando uma função para exibir os erros que receberá o "index" de cada input
    function setError(index){
        campos[index].style.border = '2px solid red';
        spans[index].style.display = 'block';
    }

//Criando uma função para remover o erro
    function removeError(index){
        campos[index].style.border = '2px solid #06338a';
        spans[index].style.display = 'none';

    }

//Criando uma função para validar o nome:
    function nameValidate(){

        if(nomeRegEx.test(campos[0].value))
        {
           removeError(0);
        }

        else{
            setError(0);
        }
    }


    //Criando uma funcão para validar o Email

    function emailValidate(){
        if(emailRegEx.test(campos[1].value)){
            removeError(1);
        }
        else{
            setError(1);
        }
    }


    //Criando uma função para validar o assunto

    function assuntoValidate(){
        if(assuntoRegEx.test(campos[2].value)){
            removeError(2);
        }

        else{
            setError(2);
        }
    }


    //Craindo uma função para o texto
    function smsValidate(){
        if(campos[3].value.length < 25){
            setError(3);
        }

        else{
            removeError(3);
        }
    }

    //Criando uma constante para o botão de enviar mensagem
    const btn_Contacto = document.querySelector("button");
   

    //Criando uma função para abrir o alert quando o botão for clicado
    btn_Contacto.onclick = function(){
        console.log('Sua sms foi');
    }


   