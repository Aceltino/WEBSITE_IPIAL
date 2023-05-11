//Criando a validação para a tela de login:

//Criando uma constante para pegar o formulário atráves do id:
const formLogin = document.getElementById('form-login');

/*****Criando uma constante para pegar todos os campos que possuem a class "required-login" ******/
const campos = document.querySelectorAll('.required-login');

/*****Criando uma constante para pegar todos os spans que possuem a class "span-required-login" ******/
const spans = document.querySelectorAll('span-required-login');

/*************Criando um RegEx para o username****************/
/***********O username não pode aceitar letras maiúsculas e caracters especiais**********/
const userRegEx = /^[a-z-0-9]+$/;


/******Criando um evento para toda vez que o botão do tipo submit for criado********/
    formLogin.addEventListener('submit', (event) =>{
        event.preventDefault();
        userValidate();
        senhaValidate();
    })



/************Criando uma função que receberá o erro de cada input************/
    function setError(index){
        campos[index].style.border = '2px solid red';
        spans[index].style.display = 'block';
    }

/*********Criando uma função para remover o erro de cada input, caso não tenha*********/
    function removeError(index){
        campos[index].style.border = '';
        spans[index].style.display = 'none';
    }


/*****************Criando uma função para validar o username*******************/
    function userValidate(){
        if(userRegEx.test(campos[0].value)){
            removeError(0);
        }

        else{
            setError(0);
        }
    }
/*********Criando uma função para a password*************/
    function senhaValidate(senha){
        var alfabetoNumeros = /^([a-zA-Z0-9]{1,})$/;
        var outrosCaracteres = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

        if(senha.value.length < 8){
            setError(1);
        }
        else{
            if(senha.match.value(alfabetoNumeros) && senha.match.value(outrosCaracteres)){
                removeError(1);
            }

            else{
                setError(1);
            }
        }
    }

