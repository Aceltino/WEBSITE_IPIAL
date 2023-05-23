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
const regExnascimento = /^(0[1-9]|1[0-9]|2[0-9]|3[01])\/(0[1-9]|1[0-2])\/(19[6-9][0-9]|200[0-9])$/;

/*---------------Criando um RegEx para o BI-----------------*/
const regExbi = /^([0-9-A-Z]{14})$/;

/*-----------Criando uma RegEx para número de telefone------------*/
const regExphone = /^([9][0-9]{8})$/;

/*------------Criando uma RegEx para email------------*/
const regExemail = /^([a-z0-9]{2,}\.)?([a-z0-9]{2,})@([a-z0-9]{2,})(\.[a-z]{2,})(\.ao|\.gov|\.co)?/;

/*-----Criando uma RegEx para o número de processo------*/
const regExprocesso = /^([0-9]{6})$/;

//Botões de avançar:
const btnNext1 = document.getElementById('btnNext1');
const btnNext2 = document.getElementById('btnNext2');
const btnNext3 = document.getElementById('btnNext3');
const btnNext5 = document.getElementById('btnNext4');

//Validações para o botão do avançar do primeiro passo
btnNext1.addEventListener("click", (event)=>{
    //Verificando se o campo nome está empty:
    if(campos[0].value === ""){
        alert('O campo nome precisa ser preenchido');
        setError(0);
        event.preventDefault();
        nome_candidatoValidate();
    }
    else{
        removeError(0);
    }

    if(campos[1].value === ""){
        alert('O campo Nome do pai precisa ser completado');
        setError(1);
        event.preventDefault();
        nome_paiValidate();
    }
    else{
        removeError(1);
    }

    if(campos[2].value === ""){
        alert('O campo Nome da mãe precisa ser completado');
        setError(2);
        event.preventDefault();
        nome_maeValidate();
    }
    else{
        removeError(2);
    }

    if(campos[3].value === ""){
        alert('O campo da sua data de nascimento precisa ser preenchida');
        setError(3);
        event.preventDefault();
        
    }
    else{
        removeError(3);
    }
})

//Validações do botão avançar para o segundo passo

btnNext2.addEventListener("click", (event)=>{
    //Verificando se o campo nome está empty:
    if(campos[4].value === ""){
        alert('O campo do BI precisa ser preenchido');
        setError(4);
        event.preventDefault();
        biValidate();
        
    }
    else{
        removeError(4);
    }

    if(campos[5].value === ""){
        alert('O campo do Telefone precisa ser completado');
        setError(5);
        event.preventDefault();
        telValidate();
       
    }
    else{
        removeError(5);
    }

    if(campos[6].value === ""){
        alert('O campo de Email precisa ser preenchido');
        setError(6);
        event.preventDefault();
        emailValidate();
       
    }
    else{
        removeError(6);
    }
})


//Validação do botão avançar para o terceiro passo
btnNext3.addEventListener("click", (event)=>{
    //Verificando se o campo nome está empty:
    if(campos[7].value === ""){
        alert('Preencha o campo do nome da escola de proveniência');
        setError(7);
        event.preventDefault();
        escola_antigaValidate();
        
    }
    else{
        removeError(7);
    }

    if(campos[8].value === ""){
        alert('Deve preencher obrigatoriamente o campo do número de processo');
        setError(8);
        event.preventDefault();
        nprocessoValiate();
    }
    else{
        removeError(8);
    }
})


//Criando um evento para que toda vez que o botão do tipo submit for criado
    form_inscricao.addEventListener('submit', (event) =>{
        event.preventDefault();
        nome_candidatoValidate();
        nome_paiValidate();
        nome_maeValidate();
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





