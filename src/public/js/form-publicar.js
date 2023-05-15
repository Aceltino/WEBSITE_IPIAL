/*--------Criando uma constante para pegar o formulário atráves do ID-----------*/
const form_publicar = document.getElementById('form-publicar');

//Criando constante para pegar todos os campos do formulario que tenham a class required-publicar
const campos = document.querySelectorAll('.required-publicar');

//Criando uma constante para pegar cada span dos inputs e da textarea da class span-required-publicar
const spans = document.querySelectorAll('.span-required-publicar');

//Criando uma regEx para o título da informação~
const regExtitulo = /^([A-Z][A-Za-zÀ-ÿ\s]{3,})+$/;

//Criando uma regex para validar o texto da informação
const regExtexto = /^([A-Z].{41,})$/;

//Criando um evento para que toda vez que o botão do tipo submit for criado
form_publicar.addEventListener('submit', (event) => {
    event.preventDefault();
    tituloValidate();
    textoValidate();
})


//Criando uma função para exibir os erros que receberá o "index" de cada input ou textarea
    function setError(index){
        campos[index].style.border = '2px solid red';
        spans[index].style.display = 'block';
    }

//Criando uma função para remover os erros que receberá o "index" de cada input ou textarea
    function removeError(index){
        campos[index].style.border = '2px solid #06338a';
        spans[index].style.display = 'none';
    }

//Criando uma função para validar o título da publicação
    function tituloValidate(){
        if(regExtitulo.test(campos[0].value)){
            removeError(0);
        }

        else{
            setError(0);
        }
    }

//Criando uma função para validar o texto de uma informação
    function textoValidate(){
        if(regExtexto.test(campos[1].value)){
           removeError(1);
        }

        else{
            setError(1);
        }
    }

//Criando um evento para quando for clicado no botão enviar
