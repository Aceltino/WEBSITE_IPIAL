/***********Validações para o formulário de inscrição*************/

/*********Pagando o formulário atráves do ID***********/
const form_inscricao = document.getElementById('form_inscricao');

/*************************Passo 1 da inscrição*******************/
/*******Pegar todos os campos com a class required-inscricao******/
const campos = document.querySelectorAll('.required-inscricao');

/*---------Pegar cada span dos inputs do formulário de inscrição --------------*/
const spans = document.querySelectorAll('.span-required-inscricao');

/*-----------Criando uma RegEx para os nomes----------------*/
const regExnome = /^[A-Z][A-Za-zÀ-ÿ\s]+[A-Z][A-Za-zÀ-ÿ\s]+$/;

/*-------------Criando uma regEx para a data de nascimento----------------*/
const regExnascimento = /(^[0-9]{2})([0-9]{2})(19[6-9][0-9]|200[0-9])$/;

/*---------------Criando um RegEx para o BI-----------------*/
const regExbi = /^([0-9-A-Z]{14})$/;

/*-----------Criando uma RegEx para número de telefone------------*/
const regExphone = /^([9][0-9]{8})$/;

/*------------Criando uma RegEx para email------------*/
const regExemail = /^([a-z0-9]{2,}\.)?([a-z0-9]{2,})@([a-z0-9]{2,})(\.[a-z]{2,})(\.ao|\.gov|\.co)?/;

/*-----Criando uma RegEx para o número de processo------*/
const regExprocesso = /^([0-9]{6})$/;

//Criando uma const para pegar o primeiro botão avançar
const btnNext1 = document.getElementById('btnNext1');


//Criando um evento para que toda vez que o botão do tipo submit for criado
    form_inscricao.addEventListener('submit', (event) =>{
        event.preventDefault();
        nome_candidatoValidate();
        nome_paiValidate();
        nome_maeValidate();
        data_nascimentoValidate();
        biValidate();
        telValidate();
        emailValidate();
        escola_antigaValidate();
        nprocessoValiate();
    })
/*---Função para validar etapas----*/
   

/*---------Criando uma função que retornará o erro de cada input-----------*/
    function setError(index){
        campos[index].style.border = '2px solid red';
        spans[index].style.display = 'block';
    }

/*--------Criando uma função que removerá o erro retornado, caso o for preenchido corretamente----------*/
    function removeError(index){
        campos[index].style.border = '2px solid #06338a';
        spans[index].style.display = 'none';
    }

/*-----Criando uma função para validar o nome do candidato-------*/
    function nome_candidatoValidate(){
        if(regExnome.test(campos[0].value)){
           removeError(0);
        }
        else {
            setError(0);
        }
    }

/*---------Criando uma função para validar o nome do encarregado-------------*/
function nome_paiValidate(){
    if(regExnome.test(campos[1].value)){
        removeError(1);
    }

    else{
        setError(1);
    }
}

/*------------Criando uma função para validar o nome da encarregada---------*/
function nome_maeValidate(){
    if(regExnome.test(campos[2].value)){
        removeError(2);
    }

    else{
        setError(2);
    }
}


/*----Criando uma função para validação da data de nascimento do candidato---*/
function data_nascimentoValidate(){
    if(regExnascimento.test(campos[3].value)){
        removeError(3);
    }
    else{
        setError(3);
    }
}

/*---Criando uma função para o número de BI do candidato----*/
function biValidate(){
    if(regExbi.test(campos[4].value)){
        removeError(4);
    }

    else{
        setError(4);
    }

}

/*------Criando uma função para o número de telefone do candidato-------*/
function telValidate(){
    if(regExphone.test(campos[5].value)){
        removeError(5);
    }

    else{
        setError(5);
    }
}

/*Criando uma função para o email do candidato*/
function emailValidate(){
    if(regExemail.test(campos[6].value)){
        removeError(6);
    }

    else{
        setError(6);
    }

}

/*-------Criando uma função para o nome da escola de proveniência--------*/
function escola_antigaValidate(){
    if(regExnome.test(campos[7].value)){
        removeError(7);
    }

    else{
        setError(7);
    }
}

/*-----------Criando uma função para o número de processo-----------*/
function nprocessoValiate(){
    if(regExprocesso.test(campos[8].value)){
        removeError(8);
    }

    else{
        setError(8);
    }
}





