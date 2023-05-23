var dataAtual = new Date();

var dataMinima = new Date();
dataMinima.setFullYear(dataMinima.getFullYear() - 14);

function validarDataNascimento(dia, mes, ano) {
    // Verifica se os valores do dia, mês e ano são numéricos
    if (isNaN(dia) || isNaN(mes) || isNaN(ano)) {
      return false;
    }
  
    var inputDate = new Date(ano, mes - 1, dia);
  
    // Verifica se o input é uma data válida
    if (inputDate.getDate() != dia || inputDate.getMonth() + 1 != mes || inputDate.getFullYear() != ano) {
      return false;
    }

    // Verifica se a data de nascimento é igual ou anterior à data mínima
  if (inputDate <= dataMinima) {
    return true;
  }

  return false;
}


var inputDia = 21; // Substitua pelo valor do input fornecido
var inputMes = 5; // Substitua pelo valor do input fornecido
var inputAno = 2011; // Substitua pelo valor do input fornecido

if (validarDataNascimento(inputDia, inputMes, inputAno)) {
  console.log("Data de nascimento válida para uma pessoa com 14 anos ou mais.");
} else {
  console.log("A pessoa deve ter 14 anos ou mais.");
}