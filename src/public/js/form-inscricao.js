/***********Validações para o formulário de inscrição*************/

/*********Pagando o formulário atráves do ID***********/
const form_inscricao = document.getElementById('form_inscricao');

/*************************Passo 1 da inscrição*******************/
/*******Pegar todos os campos com a class required-inscricao******/
const campos = document.querySelectorAll('.required-inscricao');

/*---------Pegar cada span dos inputs do formulário de inscrição --------------*/
const spans = document.querySelectorAll('.span-required-inscricao');



/*---------Criando uma função que retornará o erro de cada input-----------*/
    function setError(index){
        campos = [index].style.border = '2px solid red';
        spans = [index].style.display = 'block';
    }

/*--------Criando uma função que removerá o erro retornado, caso o for preenchido corretamente----------*/
    function removeError{
        campos = [index].style.border = '2px solid #06338a';
        spans = [index].style.display = 'none';
    }

/*-----Criando uma função para validar o nome do candidato-------*/
    function nome_candidatoValidate(){

    }


/*------------Criando uma função para validar o nome da encarregada---------*/
    function nome_maeValidate(){

    }

/*---------Criando uma função para validar o nome do encarregado-------------*/
    function nome_paiValidate(){

    }

/*----Criando uma função para validação da data de nascimento do candidato---*/
    function data_nascimentoValidate(){

    }

/*---Criando uma função para o número de BI do candidato----*/
    function biValidate(){

    }

/*------Criando uma função para o número de telefone do candidato-------*/
    function telValidate(){

    }

/*Criando uma função para o email do candidato*/
    function emailValidate(){

    }

/*-------Criando uma função para o nome da escola de proveniência--------*/
    function escola_antigaValidate(){

    }

/*-----------Criando uma função para o número de processo-----------*/
    function nprocessoValiate(){

    }

    


